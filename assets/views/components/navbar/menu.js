import $ from "jquery";

  // Set up click and window resize callbacks, then init the nav.
  $(document).ready(function () {
    $('.toggle-menu').click (function(){
      $(this).toggleClass('active');
      $('#menu').toggleClass('open');
    });
  }); 