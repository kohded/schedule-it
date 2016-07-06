$(document).ready(function() {
  $('#calendar').fullCalendar({
    allDaySlot        : false, //All day slot on top of week/day view
    allDayText        : false, //All day slot text
    aspectRatio       : 1.35, //Default is 1.35
    contentHeight     : 'auto',
    customButtons     : {
      prevQtr: { //Previous quarter button
        themeIcon: 'circle-triangle-w',
        click    : function() {
          $('#calendar').fullCalendar('incrementDate',
            moment.duration(-14, 'days'));
        }
      },
      nextQtr: { //Next quarter button
        themeIcon: 'circle-triangle-e',
        click    : function() {
          $('#calendar').fullCalendar('incrementDate',
            moment.duration(14, 'days'));
        }
      }
    },
    defaultView       : 'agendaWeek', //Default view on load
    droppable         : false, //jQueryUI draggable can be dropped onto calendar
    editable          : false, //Events on the calendar can be modified
    fixedWeekCount    : false, //Default is 6 weeks fixed
    handleWindowResize: true, //Resize calendar on browser resize
    header            : {
      left  : 'prevQtr,nextQtr',
      center: 'title',
      right : null //'agendaWeek,month'
    },
    titleFormat       : '[AC 102]',
    height            : 'auto',
    minTime           : '08:00:00', //Week view min time
    maxTime           : '22:00:00', //Week view max time
    scrollTime        : "08:00:00", //Scroll start
    slotDuration      : '00:30:00', //Duration of each slot on week/day view
    slotEventOverlap  : false, //Overlap slot
    snapDuration      : '00:05:00', //Duration of each snap
    theme             : true, //Calendar theme
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
    weekends          : false, //Show weekends

    dayClick   : function() {
      alert('a day has been clicked!');
    },
    events     : [
      {
        title     : 'IT 355',
        start     : '2016-07-05T10:00:00',
        end       : '2016-07-05T12:30:00',
        instructor: 'Tina Ostrander'
      },
      {
        title     : 'IT 355',
        start     : '2016-07-07T10:00:00',
        end       : '2016-07-07T12:30:00',
        instructor: 'Tina Ostrander'
      },
      {
        title     : 'IT 328',
        start     : '2016-07-06T12:00:00',
        end       : '2016-07-06T14:30:00',
        instructor: 'Josh Archer'
      },
      {
        title     : 'IT 328',
        start     : '2016-07-08T12:00:00',
        end       : '2016-07-08T14:30:00',
        instructor: 'Josh Archer'
      }
    ],
    eventRender: function(event, element) {
      element.find('.fc-title').append("<br/>" + event.instructor);
    }
  });
});