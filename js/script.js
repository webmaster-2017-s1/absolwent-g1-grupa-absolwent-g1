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
