(function () {
    'use strict';

    let timetable = new Timetable();
    timetable.setScope(9, 23);//hours line
    timetable.addLocations(['понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота', 'воскресенье']);
    //Add your events using addEvent(name, location, startDate, endDate[, options])
timetable.addEvent('свободно', 'вторник', new Date(2020, 9, 25, 13, 0), new Date(2020, 9, 25, 14, 30), {
         url: '#',
         onClick: function(event) {
             callModal(event);
      }});
     timetable.addEvent('свободно', 'понедельник', new Date(2020, 9, 25, 9, 0), new Date(2020, 9, 25, 10, 30), {
         url: '#',
         onClick: function(event) {
             callModal(event);
      }});

    let renderer = new Timetable.Renderer(timetable);
    renderer.draw('.timetable'); // any css selector

})()

function callModal(event) {

    $('#Modal').modal( "show", $( "#buttonBeingClicked" )); // JS modal call
             $('#Modal').find(".modal-title").text('Записаться на ' + event.location + ' на ' + event.startDate.getHours() + ' часов ?');

}
