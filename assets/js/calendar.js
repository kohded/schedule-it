//Calendar elements
var el = {
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
      editable          : false, //Events on the calendar can be modified
      events            : this.courses,
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
  filterClick: '',
  isFiltered         : false,
  //Display Auburn or Kent courses by room or instructor.
  selectCampusCourses: function(campus, filter) {
    $.ajax({
      url    : 'calendar.php',
      type   : 'POST', //Send post data
      data   : 'type=selectCampusCourses&campus=' + campus + '&filter=' +
      filter,
      success: function(c) {
        //Parse json encode returned from PHP.
        let filteredCourses = JSON.parse(c);

        //Iterate through filtered courses.
        for(let i = 0; i < filteredCourses.length; i++) {
          //Set one array of course objects filtered by room or instructor.
          calendar.courses = filteredCourses[i];

          //Dynamically generate the calendar div id.
          el.calendarId = 'calendar' + i;
          //Check if calendar div already exists, if true append new div.
          if(!document.getElementById(el.calendarId)) {
            //Dynamically generate title and divs for each calendar with the
            // previous el.calendarId. Each calendar must have its own div
            // with a unique id, then each calendar will append inside the
            // calendars div when the calendar is initialized with javascript.
            $('#calendars').append(
              '<div class="calendar-card col s12">' +
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
          }
          else {
            //Dynamically change title by room number or instructors last name.
            $('#calendar-title' + i).text(calendar.courses[0].title);
          }

          //Initialize each calendar only once when first filtering is executed.
          if(courses.isFiltered === false) {
            //Initialize the calendars with the generated el.calendarId.
            calendar.init(el.calendarId);

            //On the last element set isFiltered to true.
            if(i === filteredCourses.length - 1) {
              courses.isFiltered = true;
            }
          }
          //After initialization of calendars, only update data by removing
          // old data and re-rendering new data based on users filter input.
          else {
            let thisCalendar = $('#' + el.calendarId);

            //Remove previous courses from calendar.
            thisCalendar.fullCalendar('removeEvents');
            //Reload changes from filter button click.
            thisCalendar.fullCalendar('addEventSource', filteredCourses[i]);
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
    let campus = el.filterC.find("option:selected").val();

    //If BY ROOM button is clicked.
    if(this.id == 'filter-room') {
      courses.filterClick = 'room';
      courses.selectCampusCourses(campus, 'room');
    }
    //If BY INSTRUCTOR button is clicked.
    else if(this.id == 'filter-instructor') {
      courses.filterClick = 'instructor';
      courses.selectCampusCourses(campus, 'instructor')
    }
  });
});