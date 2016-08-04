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
      droppable         : false, //jQueryUI draggable can be dropped onto
                                 // calendar
      editable          : true, //Events on the calendar can be modified
      events            : this.courses,
      eventOverlap      : false, //Event overlap
      eventDrop    : function(event, delta, revertFunc) { //Update date
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
            console.log('Couldn\'t change date: ' + error.responseText);
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
            console.log('Couldn\'t change time: ' + error.responseText);
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
      url    : 'calendar.php',
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

            let thisCalendarId = $('#' + el.calendarId);

            //Remove previous courses from calendar.
            thisCalendarId.fullCalendar('removeEvents');
            //Reload changes from filter button click.
            thisCalendarId.fullCalendar('addEventSource', filteredCourses[i]);

            //BUG IDS GET REARRANGED ON REMOVAL
            //Remove additional calendar object(s) from the previous
            // filtering if there are more than a new filtering. Because the
            // calendar objects are being reused, the additional ones will show
            // at the bottom.
            //let calendarObjectCount = $('[id^="calendar--"]').length;
            //if(calendarObjectCount > filteredCourses.length) {
            //  //Start calendar id at filtered courses length.
            //  let removeId = filteredCourses.length;
            //
            //  for(let i = removeId; i < calendarObjectCount; i++) {
            //    //Destroy additional calendar object from previous search.
            //    $('#calendar--' + removeId).fullCalendar('destroy');
            //    //Remove calendar card div.
            //    $('#calendar-card--' + removeId).hide();
            //  }
            //}
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