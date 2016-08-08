var courseFormModal = {
  init      : function() {
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

    courseFormModal.instructor();
    courseFormModal.course();
    courseFormModal.room();
    courseFormModal.day();
  },
  instructor: function() {
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
  },
  course    : function() {
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
  },
  room      : function() {
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
  },
  day       : function() {
    let count = 1;
    //Day Form Additional Input
    $('.additional-day').click(function(e) {
      e.preventDefault();

      $('#days').append(
        '<div id="day-' + count++ + '">' +
        '<div class="row">' +
        '<div class="input-field col s4">' +
        '<select class="select-days" multiple required>' +
        '<option value="monday">Monday</option>' +
        '<option value="tuesday">Tuesday</option>' +
        '<option value="wednesday">Wednesday</option>' +
        '<option value="thursday">Thursday</option>' +
        '<option value="friday">Friday</option>' +
        '</select>' +
        '<label>Day(s)</label>' +
        '</div>' +
        '<div class="input-field col s2">' +
        '<select class="select-start-hour" required>' +
        '<option value="08">8 AM</option>' +
        '<option value="09">9 AM</option>' +
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
        '<div class="input-field col s2">' +
        '<select class="select-start-minute" required>' +
        '<option value="00">00</option>' +
        '<option value="10">10</option>' +
        '<option value="20">20</option>' +
        '<option value="30">30</option>' +
        '<option value="40">40</option>' +
        '<option value="50">50</option>' +
        '</select>' +
        '<label>Start Time (Minute)</label>' +
        '</div>' +
        '<div class="input-field col s2">' +
        '<select class="select-end-hour" required>' +
        '<option value="08">8 AM</option>' +
        '<option value="09">9 AM</option>' +
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
        '<div class="input-field col s2">' +
        '<select class="select-end-minute" required>' +
        '<option value="00">00</option>' +
        '<option value="10">10</option>' +
        '<option value="20">20</option>' +
        '<option value="30">30</option>' +
        '<option value="40">40</option>' +
        '<option value="50">50</option>' +
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
  }
};

var courseForm = {
  init        : function() {
    //Initialize form modals.
    courseFormModal.init();
    //Initialize three year drop down.
    courseForm.year.init();
  },
  quarter     : function() {
  },
  year        : { //Quarter Year Dropdown
    //Dynamically generate up to 3 years.
    current: moment().year(),
    second : moment().year() + 1,
    third  : moment().year() + 2,
    init   : function() {
      //Dynamically add three years in the dropdown.
      let yearCurrent = $('#quarter-year-current');
      let yearSecond  = $('#quarter-year-second');
      let yearThird   = $('#quarter-year-third');

      //Set select option value.
      yearCurrent.val(courseForm.year.current);
      yearSecond.val(courseForm.year.second);
      yearThird.val(courseForm.year.third);

      //Display text in div.
      yearCurrent.html(this.current);
      yearSecond.html(this.second);
      yearThird.html(this.third);

      //Reload select after adding html.
      $('#select-quarter-year').material_select();
    }
  },
  submit      : function() {
    let campus       = $('#select-campus option:selected').val();
    let quarter      = $('#select-quarter-season option:selected').val();
    let year         = $('#select-quarter-year option:selected').val();
    let instructor   = $('#select-instructor option:selected').val();
    let course       = $('#select-course option:selected').val();
    let room         = $('#select-room option:selected').val();
    let dayIds       = []; //Stores parent row id of day(s) and time.
    let startEndTime = []; //
    let courseDays   = [];

    //Iterate through all select inputs and get the ids.
    $.each($('[id^="day-"]'), function() {
      //Get the day(s), start time, and end time row parent id and store in
      // dayIds array.
      dayIds.push($(this).attr('id'));
    });

    //Iterate through dayIds array.
    for(let i = 0; i < dayIds.length; i++) {
      let currentDayId      = dayIds[i]; //Current day row
      let previousDayId     = '';
      let selectStartHour   = '';
      let selectStartMinute = '';
      let selectEndHour     = '';
      let selectEndMinute   = '';
      let startTime         = '';
      let endTime           = '';

      //Iterate through all selects for each row of day(s), start time,
      // and end time.
      $.each($('#' + currentDayId + ' option:selected'), function() {
        //Set the day(s), start time, and end time option selected value.
        let optionValue = $(this).val();

        //If the day id changes reset previousDayId, start and end time.
        if(!previousDayId) {
          previousDayId     = currentDayId;
          selectStartHour   = $(
            '#' + currentDayId + ' .select-start-hour option:selected').val();
          selectStartMinute = $(
            '#' + currentDayId + ' .select-start-minute option:selected').val();
          selectEndHour     = $(
            '#' + currentDayId + ' .select-end-hour option:selected').val();
          selectEndMinute   = $(
            '#' + currentDayId + ' .select-end-minute option:selected').val();
        }

        //Refactor this code when working on the quarter date (duplications).
        // This only works for one quarter.
        if(previousDayId === currentDayId) {
          if(optionValue === 'monday') {
            //Set the start time and end time for each day.
            startTime =
              '2016-07-18T' + selectStartHour + ':' + selectStartMinute + ':00';
            endTime   =
              '2016-07-18T' + selectEndHour + ':' + selectEndMinute + ':00';
            //Add the start and end time to startEndTime array temporarily.
            startEndTime.push(startTime);
            startEndTime.push(endTime);
            //Add the startEndTime array to courseDays array.
            courseDays.push(startEndTime);
            //Reset startEndTime array.
            startEndTime = [];
          }
          else if(optionValue === 'tuesday') {
            startTime =
              '2016-07-19T' + selectStartHour + ':' + selectStartMinute + ':00';
            endTime   =
              '2016-07-19T' + selectEndHour + ':' + selectEndMinute + ':00';
            startEndTime.push(startTime);
            startEndTime.push(endTime);
            courseDays.push(startEndTime);
            startEndTime = [];
          }
          else if(optionValue === 'wednesday') {
            startTime =
              '2016-07-20T' + selectStartHour + ':' + selectStartMinute + ':00';
            endTime   =
              '2016-07-20T' + selectEndHour + ':' + selectEndMinute + ':00';
            startEndTime.push(startTime);
            startEndTime.push(endTime);
            courseDays.push(startEndTime);
            startEndTime = [];
          }
          else if(optionValue === 'thursday') {
            startTime =
              '2016-07-21T' + selectStartHour + ':' + selectStartMinute + ':00';
            endTime   =
              '2016-07-21T' + selectEndHour + ':' + selectEndMinute + ':00';
            startEndTime.push(startTime);
            startEndTime.push(endTime);
            courseDays.push(startEndTime);
            startEndTime = [];
          }
          else if(optionValue === 'friday') {
            startTime =
              '2016-07-22T' + selectStartHour + ':' + selectStartMinute + ':00';
            endTime   =
              '2016-07-22T' + selectEndHour + ':' + selectEndMinute + ':00';
            startEndTime.push(startTime);
            startEndTime.push(endTime);
            courseDays.push(startEndTime);
            startEndTime = [];
          }
        }
        else {
          previousDayId = currentDayId;
        }
      });
    }

    courseForm.insertCourse(campus, instructor, course, room, courseDays);
  },
  insertCourse: function(campus, instructor, course, room, courseDays) {
    $.ajax({
      url     : 'panel-form.php',
      type    : 'POST',
      data    : 'type=insertCourse' +
      '&campus=' + campus +
      '&instructor=' + instructor +
      '&course=' + course +
      '&room=' + room +
      '&courseDays=' + JSON.stringify(courseDays), //Stringify array before pass
      dataType: 'json',
      success : function(response) {
        //Get the campus where the course was just inserted from the response.
        let responseCampus = response.campus;

        //Based on campus and what filter has been clicked, if any, call
        // courses.selectCampusCourses and reload new course data into calendar.
        if(responseCampus === 'auburn') {
          if(courses.filterClick === 'room') {
            courses.filterClick = 'room';
            courses.selectCampusCourses(responseCampus, 'room');
          }
          if(courses.filterClick === 'instructor') {
            courses.filterClick = 'instructor';
            courses.selectCampusCourses(responseCampus, 'instructor')
          }
        }
        else if(responseCampus === 'kent') {
          if(courses.filterClick === 'room') {
            courses.filterClick = 'room';
            courses.selectCampusCourses(responseCampus, 'room')
          }
          if(courses.filterClick === 'instructor') {
            courses.filterClick = 'instructor';
            courses.selectCampusCourses(responseCampus, 'instructor')
          }
        }
      },
      error   : function(error) {
        console.log(error);
      }
    })
  }
};

$(document).ready(function() {
  courseForm.init();

  $('#course-submit-btn').click(function(e) {
    e.preventDefault();
    courseForm.submit();
  });
});