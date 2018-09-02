$("#login").click(function () {
  $("#log-form").delay(250).fadeIn(250);
  $("#sign-form").fadeOut(250);
  $(this).addClass(disabled);
  $("#signin").removeClass(disabled);
});

$("#signin").click(function () {
  $("#sign-form").delay(250).fadeIn(250);
  $("#log-form").fadeOut(250);
  $("#signin").addClass(disabled);
  $(this).removeClass(disabled);
});


$(function () {
  $('a[href*="#"]').not('[href="#"]').click(function () {
    if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') || location.hostname === this.hostname) {
      var target = $(this.hash);
      if (!target.length) {
        target = $('[name=' + this.hash.slice(1) + ']');
      }
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 10)
        }, 1000, "easeInOutExpo");
      }
    }
  });
});

