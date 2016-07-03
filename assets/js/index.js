$(document).ready(function() {
  //Materialize
  //Calendar
  //Select
  $('select').material_select();

  //Nav
  //Modals
  $('#login-modal-btn').leanModal();

  //Side Nav
  $("#panel-btn").sideNav({
    closeOnClick: true,
    dismissible : false,
    edge        : 'right',
    menuWidth   : 400
  });
});