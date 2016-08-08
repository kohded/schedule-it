//Calendar elements
var el = {
  calendars : $("#calendars"),
  calendarId: '',
  filterRI  : $('#filter-room, #filter-instructor'),
  filterC   : $("#filter-campus")
};

//Calendar object
var calendar = {
  courses: '', //Courses returned from the db
  zone   : "08:00",  //Timezone
  init   : function(calendarId) {
    let thisCalendar = $('#' + calendarId);

    thisCalendar.fullCalendar({
      allDaySlot        : false, //All day slot on top of week/day view
      allDayText        : false, //All day slot text
      aspectRatio       : 1.35, //Default is 1.35
      contentHeight     : 'auto', //Height of the content
      customButtons     : {
        prevQtr: { //Previous quarter button
          themeIcon: 'circle-triangle-w',
          click    : function() {
            thisCalendar.fullCalendar('incrementDate',
              moment.duration(-7, 'days'));
          }
        },
        nextQtr: { //Next quarter button
          themeIcon: 'circle-triangle-e',
          click    : function() {
            thisCalendar.fullCalendar('incrementDate',
              moment.duration(7, 'days'));
          }
        }
      },
      defaultDate       : '2016-07-18', //dates.defaultDate(),
      defaultView       : 'agendaWeek', //Default view on load
      droppable         : false, //Draggable can be dropped onto calendar
      editable          : isAdminLoggedIn, //Edit calendar events
      events            : this.courses,
      eventOverlap      : false, //Event overlap
      eventClick        : function(event, jsEvent, view) {
        //If admin is logged in, trigger eventClick.
        if(isAdminLoggedIn) {
          let eventInstructor   = event.instructor;
          let eventroomNumber   = event.roomNumber;
          let eventcourseNumber = event.courseNumber;

          //Find select option text & set it to clicked course data.
          $("#select-instructor-update option").filter(function() {
            return this.text == eventInstructor;
          }).attr('selected', true);
          $("#select-room-update option").filter(function() {
            return this.text == eventroomNumber;
          }).attr('selected', true);
          $("#select-course-update option").filter(function() {
            return this.text == eventcourseNumber;
          }).attr('selected', true);

          //Reload select after setting select.
          $('#select-instructor-update').material_select();
          $('#select-room-update').material_select();
          $('#select-course-update').material_select();

          //Open modal to update course.
          $('#calendar-update-course').openModal();

          //Delete course
          $('#delete-course-btn').click(function() {
            $.ajax({
              url     : 'calendar-event.php',
              type    : 'POST',
              data    : 'type=deleteCourse&campus=' + courses.campus +
              '&eventId=' + event.id,
              dataType: 'json',
              success : function(response) {
                if(response.status == 'success') {
                  //On successful removal from db, remove course from calendar.
                  thisCalendar.fullCalendar('removeEvents',
                    function(eventDelete) {
                      return event === eventDelete;
                    });
                }
              },
              error   : function(error) {
                alert('Couldn\'t delete course: ' + error.responseText);
              }
            });
          });

          //Update course
          $('#update-course-btn').click(function() {
            //Get values of select option.
            let instructorSelect = $('#select-instructor-update ' +
              'option:selected').val();
            let roomSelect       = $('#select-room-update ' +
              'option:selected').val();
            let courseSelect     = $('#select-course-update ' +
              'option:selected').val();

            $.ajax({
              url     : 'calendar-event.php',
              type    : 'POST',
              data    : 'type=updateCourse&campus=' + courses.campus +
              '&eventId=' + event.id + '&instructor=' + instructorSelect +
              '&room=' + roomSelect + '&course=' + courseSelect,
              dataType: 'json',
              success : function(response) {
                if(response.status == 'success') {
                  //On successful update from db, update calendar.
                  courses.selectCampusCourses(courses.campus,
                    courses.filterClick);
                }
              },
              error   : function(error) {
                alert('Couldn\'t update course: ' + error.responseText);
              }
            });
          });
        }
      },
      eventDrop         : function(event, delta, revertFunc) { //Update date
        let start = event.start.format();
        let end   = (event.end == null) ? start : event.end.format();

        $.ajax({
          url     : 'calendar-event.php',
          type    : 'POST',
          data    : 'type=updateStartEnd&campus=' + courses.campus +
          '&eventId=' + event.id + '&start=' + start + '&end=' + end,
          dataType: 'json',
          success : function(response) {
            if(response.status != 'success') {
              revertFunc();
            }
          },
          error   : function(error) {
            revertFunc();
            console.log('Couldn\'t update date: ' + error.responseText);
          }
        });
      },
      eventRender       : function(event, element) {
        //Display room or instructor for each course, based on filter.
        if(event.title === event.roomNumber) {
          element.find('.fc-title').append("<br/>" + event.instructor);
        }
        else {
          element.find('.fc-title').append("<br/>" + event.roomNumber);
        }

        //Display course number
        element.find('.fc-title').append("<br/>" + event.courseNumber);
      },
      eventResize       : function(event, delta, revertFunc) { //Update time
        let end   = event.end.format();
        let start = event.start.format();

        $.ajax({
          url     : 'calendar-event.php',
          type    : 'POST',
          data    : 'type=updateStartEnd&campus=' + courses.campus +
          '&eventId=' + event.id + '&start=' + start + '&end=' + end,
          dataType: 'json',
          success : function(response) {
            if(response.status != 'success') {
              revertFunc();
            }
          },
          error   : function(error) {
            revertFunc();
            console.log('Couldn\'t update time: ' + error.responseText);
          }
        });
      },
      fixedWeekCount    : false, //Default is 6 weeks fixed
      handleWindowResize: true, //Resize calendar on browser resize
      header            : {
        left  : 'prevQtr,nextQtr',
        center: 'title',
        right : null //'agendaWeek,month'
      },
      height            : 'auto',
      minTime           : '08:00:00', //Week view min time
      maxTime           : '22:00:00', //Week view max time
      scrollTime        : "08:00:00", //Scroll start
      slotDuration      : '00:30:00', //Duration of each slot on week/day view
      slotEventOverlap  : false, //Overlap slot
      snapDuration      : '00:10:00', //Duration of each snap
      titleFormat       : '[]',
      theme             : true, //Calendar theme
      utc               : true, //Store event timezone info and display in UTC
      views             : {
        agenda: {
          //agendaWeek/agendaDay views
          columnFormat: 'ddd'
        },
        basic : {
          //basicWeek/basicDay views
        },
        day   : {
          //basicDay/agendaDay views
        },
        week  : {
          //basicWeek/agendaWeek views
        }
      },
      weekends          : false //Show weekends
    });
  }
};

//Ajax calls to PHP file that get courses data from MySql queries.
var courses = {
  campus             : '',
  filterClick        : '',
  //Display Auburn or Kent courses by room or instructor.
  selectCampusCourses: function(campus, filter) {
    $.ajax({
      url    : 'calendar-filter.php',
      type   : 'POST', //Send post data
      data   : 'type=selectCampusCourses&campus=' + campus + '&filter=' +
      filter,
      success: function(courses) {
        //Parse json encode returned from PHP.
        let filteredCourses = JSON.parse(courses);

        //Iterate through filtered courses.
        for(let i = 0; i < filteredCourses.length; i++) {
          //Set one array of course objects filtered by room or instructor.
          calendar.courses = filteredCourses[i];

          //Dynamically generate the calendar div id.
          el.calendarId = 'calendar--' + i;

          //Check if calendar div already exists, if false append new calendar.
          if(!document.getElementById(el.calendarId)) {
            //Dynamically generate title and divs for each calendar with the
            // previous el.calendarId. Each calendar must have its own div
            // with a unique id, then each calendar will append inside the
            // calendars div when the calendar is initialized with javascript.
            el.calendars.append(
              '<div class="calendar-card col s12" id="calendar-card--' + i +
              '">' +
              '<div class="card clearfix">' +
              '<div class="card-content green white-text">' +
              '<span  class="calendar-title card-title" ' +
              'id=calendar-title' + i + '>' + calendar.courses[0].title +
              '</span>' +
              '<div id="' + el.calendarId +
              '" class="col s12 calendar"></div>' +
              '</div>' +
              '</div>' +
              '</div>'
            );

            //Initialize the calendar with generated calendar id.
            calendar.init(el.calendarId);
          }
          //After initialization of calendars, only update data by removing
          // old data and re-rendering new data based on users filter input.
          else {
            //Dynamically change title by room number or instructors last name.
            $('#calendar-title' + i).text(calendar.courses[0].title);

            //Get current calendar div by setting id.
            let thisCalendarId = $('#' + el.calendarId);

            //Remove calendar courses from previous filtering.
            thisCalendarId.fullCalendar('removeEvents');
            //Reload changes for current filtering.
            thisCalendarId.fullCalendar('addEventSource', filteredCourses[i]);

            //Remove additional calendars from the previous filtering if there
            // are more than the current filtering. Because the calendar objects
            // are being reused, the additional ones will show at the bottom.
            //Iterate through all select inputs that exist.
            $.each($('[id^="calendar-card--"]'), function(index) {
              //If calendar count is greater than filteredCourses count, remove.
              //Index keeps track of the number of calendar cards existing.
              if((index + 1) > filteredCourses.length) {
                //Remove additional calendars from previous filtering.
                $(this).remove();
              }
            });
          }
        }
      },
      error  : function(error) {
        console.log(error);
      }
    });
  }
};

$(document).ready(function() {
  //Filter calendar by clicking the room or instructor button.
  el.filterRI.click(function() {
    //Get campus from select input value.
    courses.campus = el.filterC.find("option:selected").val();

    //If BY ROOM button is clicked.
    if(this.id == 'filter-room') {
      courses.filterClick = 'room';
      courses.selectCampusCourses(courses.campus, 'room');
    }
    //If BY INSTRUCTOR button is clicked.
    else if(this.id == 'filter-instructor') {
      courses.filterClick = 'instructor';
      courses.selectCampusCourses(courses.campus, 'instructor')
    }
  });
});