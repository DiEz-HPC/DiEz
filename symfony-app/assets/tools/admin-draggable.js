$('tbody').sortable({
    onUpdate: function (event) {
        // Get all new positions
        var positions = [];
        $('tbody tr').each(function (index, element) {
            var id = $(element).data('id');
            var position = index + 1;
            positions.push({
                id: id,
                position: position,
            });
                changePositionNumber(element, position);
        });
        savePosition(positions);
    },
});

const changePositionNumber = (element, number) => {
    console.log(element, number);
    const positionElement = element.querySelector('[data-label="Position"]');
    if (!positionElement) return;
    positionElement.innerHTML = number;
};





const savePosition = (positions) => {
    console.log(positions);
    $.ajax({
        url: '/api/v2/prestation/order',
        method: 'POST',
        data: {
            positions: positions,
        },
        success: function (response) {
            console.log(response);
        },
    });
};
