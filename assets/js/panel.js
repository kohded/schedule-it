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
      '<button class="btn col s2 remove-btn waves-effect waves-light red" id="remove-instructor">' +
      '<i class="material-icons">remove</i>' +
      '</button>' +
      '</div>'
    ).on('click', '#remove-instructor', function(e) {
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
      '<input class="validate" id="course-code" type="text" required>' +
      '<label for="course-code">Course</label>' +
      '</div>' +
      '<button class="btn col s2 remove-btn waves-effect waves-light red" id="remove-course">' +
      '<i class="material-icons">remove</i>' +
      '</button>' +
      '</div>'
    ).on('click', '#remove-course', function(e) {
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
      '<input class="validate" id="room-number" type="text" required>' +
      '<label for="room-number">Room</label>' +
      '</div>' +
      '<button class="btn col s2 remove-btn waves-effect waves-light red" id="remove-room">' +
      '<i class="material-icons">remove</i>' +
      '</button>' +
      '</div>'
    ).on('click', '#remove-room', function(e) {
      e.preventDefault();
      $(this).parent('div').remove();
    });
  });

  //Day Form Additional Input
  $('.additional-day').click(function(e) {
    e.preventDefault();

    $('#days').append(
      '<div class="day">' +
      '<div class="row">' +
      '<div class="input-field col s12">' +
      '<select multiple>' +
      '<option value="1">Monday</option>' +
      '<option value="2">Tuesday</option>' +
      '<option value="3">Wednesday</option>' +
      '<option value="4">Thursday</option>' +
      '<option value="5">Friday</option>' +
      '</select>' +
      '<label>Day(s)</label>' +
      '</div>' +
      '</div>' +
      '<div class="row">' +
      '<div class="input-field col s6">' +
      '<select>' +
      '<option value="" disabled selected>Select</option>' +
      '<option value="8">8 AM</option>' +
      '<option value="9">9 AM</option>' +
      '<option value="10">10 AM</option>' +
      '<option value="11">11 AM</option>' +
      '<option value="12">12 PM</option>' +
      '<option value="13">1 PM</option>' +
      '<option value="14">2 PM</option>' +
      '<option value="15">3 PM</option>' +
      '<option value="16">4 PM</option>' +
      '<option value="17">5 PM</option>' +
      '<option value="18">6 PM</option>' +
      '<option value="19">7 PM</option>' +
      '<option value="20">8 PM</option>' +
      '<option value="21">9 PM</option>' +
      '</select>' +
      '<label>Start Time (Hour)</label>' +
      '</div>' +
      '<div class="input-field col s6">' +
      '<select>' +
      '<option value="" disabled selected>Select</option>' +
      '<option value="10">00</option>' +
      '<option value="10:10">10</option>' +
      '<option value="10:10">20</option>' +
      '<option value="10:10">30</option>' +
      '<option value="10:10">40</option>' +
      '<option value="10:10">50</option>' +
      '</select>' +
      '<label>Start Time (Minute)</label>' +
      '</div>' +
      '</div>' +
      '<div class="row">' +
      '<div class="input-field col s6">' +
      '<select>' +
      '<option value="" disabled selected>Select</option>' +
      '<option value="8">8 AM</option>' +
      '<option value="9">9 AM</option>' +
      '<option value="10">10 AM</option>' +
      '<option value="11">11 AM</option>' +
      '<option value="12">12 PM</option>' +
      '<option value="13">1 PM</option>' +
      '<option value="14">2 PM</option>' +
      '<option value="15">3 PM</option>' +
      '<option value="16">4 PM</option>' +
      '<option value="17">5 PM</option>' +
      '<option value="18">6 PM</option>' +
      '<option value="19">7 PM</option>' +
      '<option value="20">8 PM</option>' +
      '<option value="21">9 PM</option>' +
      '</select>' +
      '<label>End Time (Hour)</label>' +
      '</div>' +
      '<div class="input-field col s6">' +
      '<select>' +
      '<option value="" disabled selected>Select</option>' +
      '<option value="10">00</option>' +
      '<option value="10:10">10</option>' +
      '<option value="10:10">20</option>' +
      '<option value="10:10">30</option>' +
      '<option value="10:10">40</option>' +
      '<option value="10:10">50</option>' +
      '</select>' +
      '<label>End Time (Minute)</label>' +
      '</div>' +
      '</div>' +
      '<div class="row">' +
      '<div class="col s12">' +
      '<button class="remove-day btn col s12 waves-effect waves-light red">' +
      '<i class="material-icons">remove</i>' +
      '</button>' +
      '</div>' +
      '</div>' +
      '</div>'
    ).on('click', '.remove-day', function(e) {
      e.preventDefault();
      $(this).parent().parent().parent('div').remove();
    });

    //Reload select after appending additional day, prevents overlapping
    $('select').material_select();
  });

  //Quarter Year Dropdown
  //Dynamically add up to three years in dropdown
  var yearCurrent = moment().year();
  var yearSecond  = yearCurrent + 1;
  var yearThird   = yearCurrent + 2;
  $('#quarter-year-current').html(yearCurrent);
  $('#quarter-year-second').html(yearSecond);
  $('#quarter-year-third').html(yearThird);

  //Reload select after adding html
  $('#quarter-year').material_select();
});