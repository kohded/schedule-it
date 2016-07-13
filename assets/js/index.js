$(document).ready(function() {
  //Materialize
  //Calendar
  //Select
  $('select').material_select();

  //Nav
  //Modals
  $('#login-modal-btn').leanModal();

  //Admin Panel
  $('#panel-btn').click(function() {
    $('#panel').slideToggle('fast');
  });
});