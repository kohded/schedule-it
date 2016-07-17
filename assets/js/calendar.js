//Calendar elements
var el = {
  calendar: $('#calendar'),
  filterRI: $('#filter-room, #filter-instructor'),
  filterC : $("#filter-campus")
};

//Calendar object
var calendar = {
  courses: '', //Courses returned from the db
  zone   : "08:00",  //Timezone
  init   : function() {
    el.calendar.fullCalendar({
      allDaySlot        : false, //All day slot on top of week/day view
      allDayText        : false, //All day slot text
      aspectRatio       : 1.35, //Default is 1.35
      contentHeight     : 'auto', //Height of the content
      customButtons     : {
        prevQtr: { //Previous quarter button
          themeIcon: 'circle-triangle-w',
          click    : function() {
            el.calendar.fullCalendar('incrementDate',
              moment.duration(-7, 'days'));
          }
        },
        nextQtr: { //Next quarter button
          themeIcon: 'circle-triangle-e',
          click    : function() {
            el.calendar.fullCalendar('incrementDate',
              moment.duration(7, 'days'));
          }
        }
      },
      defaultView       : 'agendaWeek', //Default view on load
      droppable         : false, //jQueryUI draggable can be dropped onto
                                 // calendar
      editable          : false, //Events on the calendar can be modified
      events            : JSON.parse(this.courses),
      eventRender       : function(event, element) {
        element.find('.fc-title').append("<br/>" + event.instructor);
        element.find('.fc-title').append("<br/>" + event.roomNumber);
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
      titleFormat       : '[AC 102]',
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
  isFiltered         : false,
  //Display Auburn or Kent courses by room or instructor.
  selectCampusCourses: function(campus, filter) {
    $.ajax({
      url    : 'calendar.php',
      type   : 'POST', //Send post data
      data   : 'type=selectCampusCourses&campus=' + campus + '&filter=' +
      filter,
      success: function(c) {
        calendar.courses = c;
        //console.log(calendar.courses);
        //console.log(JSON.parse(calendar.courses));

        //Initialize calendar only once when first filtering is executed.
        if(courses.isFiltered === false) {
          calendar.init();
          courses.isFiltered = true;
        }
        //After first filtering, remove old data and re-render new data based on
        // the users filtering preferences.
        else {
          //Remove events from calendar.
          el.calendar.fullCalendar('removeEvents');
          //Reload changes from filter.
          el.calendar.fullCalendar('addEventSource', JSON.parse(c));
        }
      },
      error  : function(e) {
        alert(e);
      }
    });
  }
};

$(document).ready(function() {
  //Filter calendar by clicking the room or instructor button.
  el.filterRI.click(function() {
    //Get campus from select input.
    var campus = el.filterC.find("option:selected").val();

    //If BY ROOM button is clicked.
    if(this.id == 'filter-room') {
      courses.selectCampusCourses(campus, 'room');
    }
    //If BY INSTRUCTOR button is clicked.
    else if(this.id == 'filter-instructor') {
      courses.selectCampusCourses(campus, 'instructor')
    }
  });
});