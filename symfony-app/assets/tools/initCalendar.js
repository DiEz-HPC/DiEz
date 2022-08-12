import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-icons/font/bootstrap-icons.css';

import { Calendar, formatDate } from '@fullcalendar/core';
import bootstrap5Plugin from '@fullcalendar/bootstrap5';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import frLocale from '@fullcalendar/core/locales/fr';
import axios from 'axios';

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
        plugins: [
            dayGridPlugin,
            timeGridPlugin,
            bootstrap5Plugin,
            interactionPlugin,
        ],
        locale: frLocale,
        timeZone: 'local',
        themeSystem: 'bootstrap5',
        height: 650,
        aspectRatio: 2,
        defaultTimedEventDuration: '01:00:00',
        headerToolbar: {
            start: 'title',
            center: 'dayGridMonth,timeGridWeek',
            end: 'today prev,next',
        }, // buttons for switching between views
        buttonIcons: {
            prev: 'chevrons-left',
            next: 'chevrons-right',
        },
        dayMaxEvents: true, // allow "more" link when too many events
        editable: true, // Permet de déplacer et agrandire les evenement
        selectable: true, // Permet de selectionné plusieurs jours
        businessHours: {
            // days of week. an array of zero-based day of week integers (0=Sunday)
            daysOfWeek: [1, 2, 3, 4, 5], // Monday - Thursday
            startTime: '09:00', // a start time (10am in this example)
            endTime: '18:00', // an end time (6pm in this example)
        },
        nowIndicator: true, // Permet de selectionné le moment actuel
        eventMouseEnter: function (info) {
            HandleEventMouseEnter(info);
        },
        eventMouseLeave: function () {
            HandleEventMouseLeave();
        },
        select: function (e) {
            handleSelect(e, calendar);
        },
        events: '/admin/service/calendarGet',
        eventDrop: function (info) {
            EditEvent(info);
        },
    });
    calendar.render();
});

function handleSelect(e, calendar) {
    const modal = document.getElementById('calendarmodal');
    const closeButton = document.getElementById('calendarModalCloseButton');
    const saveButton = document.getElementById('calendarModalSaveButton');
    const inputStartDate = document.getElementById('evtStart');
    const inputEndDate = document.getElementById('evtEnd');
    const inputTitle = document.getElementById('evtTitle');
    const inputColor = document.getElementById('evtColor');

    /* Modal Actions */
    closeButton.onclick = function () {
        modal.style.display = 'none';
    }; // If close button is clicked close the modal

    modal.classList.add('show'); // Show the modal
    modal.style.display = 'block'; // Show the modal
    /* End Modal Actions */

    /* Form parts  */
    var startDate = e.start; // Get the start date from calendar
    var endDate = e.end; // Get the end date from calendar

    // Fill the form with the start and end formated date
    inputStartDate.value = formatInputDate(startDate);
    inputEndDate.value = formatInputDate(endDate);
    inputTitle.value = '';

    // If save button is clicked add the event to the calendar
    saveButton.onclick = function () {
        var title = inputTitle.value; // Get the title input from the form
        var color = inputColor.value; // Get the color input from the form
        var start = inputStartDate.value; // Get the start date input from the form
        var end = inputEndDate.value; // Get the end date input from the form
        var eventData = {
            title: title,
            start: start,
            end: end,
            color: color,
        };
        calendar.addEvent(eventData);
        SaveNewEvent(eventData);
        modal.style.display = 'none';
    };
}

function formatInputDate(date) {
    date.setMinutes(date.getMinutes() - date.getTimezoneOffset());
    return date.toISOString().slice(0, 16);
}

function HandleEventMouseEnter(info) {
    const textContainer = info.el.getElementsByClassName('fc-event-title')[0];
    // add an children to the event on mouseenter
    textContainer.style =
        'display:flex; justify-content: space-between; margin-right: 10px;';
    textContainer.appendChild(document.createElement('div')).innerHTML =
        '<i class="fas fa-trash-alt" id="deleteButton"></i>';
    info.el
        .getElementsByClassName('fas fa-trash-alt')[0]
        .addEventListener('click', function () {
            info.event.remove();
            DeleteEvent(info.event.id);
        });
}

function HandleEventMouseLeave() {
    const deleteButton = document.getElementsByClassName('fas fa-trash-alt');
    while (deleteButton.length > 0) deleteButton[0].remove();
}

function EditEvent(info) {
    var start = info.event.start;
    var end = info.event.end;
    var title = info.event.title;
    var color = info.event.backgroundColor;
    var id = info.event.id;
    if (end === null) {
        end = new Date(start) + 1;
    }
    const data = {
        id: id,
        title: title,
        start: start,
        end: end,
        color: color,
    };

    axios.post('/admin/service/calendarEdit', data);
}

function SaveNewEvent(eventData) {
    axios.post('/admin/service/calendarAdd', eventData);
}

function DeleteEvent(eventId) {
    axios.post('/admin/service/calendarDelete', eventId);
}