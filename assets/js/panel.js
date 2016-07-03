$(document).ready(function() {
  //Materialize
  //Modals
  $('#add-instructor-modal-btn').leanModal();
  $('#remove-instructor-modal-btn').leanModal();
  $('.remove-instructor-modal-confirm-btn').leanModal();
  $('#add-course-modal-btn').leanModal();
  $('#remove-course-modal-btn').leanModal();
  $('.remove-course-modal-confirm-btn').leanModal();
  $('#add-room-modal-btn').leanModal();
  $('#remove-room-modal-btn').leanModal();
  $('.remove-room-modal-confirm-btn').leanModal();

  //Date Picker
  $('.datepicker').pickadate({
    selectMonths: true, // Months dropdown
    selectYears : 5 // Number of years in dropdown
  });

  //Instructor Modal Form Additional Input
  $('.additional-instructor').click(function(e) {
    e.preventDefault();

    $('#instructor-name').append(
      '<div class="row">' +
      '<div class="col s5 input-field">' +
      '<input class="validate" id="first-name" type="text" required>' +
      '<label for="first-name">First Name</label>' +
      '</div>' +
      '<div class="col s5 input-field">' +
      '<input class="validate" id="last-name" type="text" required>' +
      '<label for="last-name">Last Name</label>' +
      '</div>' +
      '<button class="btn col s2 remove-btn remove-instructor waves-effect waves-light red">' +
      '<i class="material-icons">remove</i>' +
      '</button>' +
      '</div>'
    ).on('click', '.remove-instructor', function(e) {
      e.preventDefault();
      $(this).parent('div').remove();
    });
  });

  //Course Modal Form Additional Input
  $('.additional-course').click(function(e) {
    e.preventDefault();

    $('#course-code').append(
      '<div class="row">' +
      '<div class="col s10 input-field">' +
      ' <input class="validate" id="course-code" type="text" required>' +
      '<label for="course-code">Course</label>' +
      '</div>' +
      '<button class="btn col s2 remove-btn remove-course waves-effect waves-light red">' +
      '<i class="material-icons">remove</i>' +
      '</button>' +
      '</div>'
    ).on('click', '.remove-course', function(e) {
      e.preventDefault();
      $(this).parent('div').remove();
    });
  });

  //Room Modal Form Additional Input
  $('.additional-room').click(function(e) {
    e.preventDefault();

    $('#room-number').append(
      '<div class="row">' +
      '<div class="col s10 input-field">' +
      ' <input class="validate" id="room-number" type="text" required>' +
      '<label for="room-number">Room</label>' +
      '</div>' +
      '<button class="btn col s2 remove-btn remove-room waves-effect waves-light red">' +
      '<i class="material-icons">remove</i>' +
      '</button>' +
      '</div>'
    ).on('click', '.remove-room', function(e) {
      e.preventDefault();
      $(this).parent('div').remove();
    });
  });
});
