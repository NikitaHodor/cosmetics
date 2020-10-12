(function drawTable() {
    'use strict';
    const path = 'http://localhost/enso_cosmetics/timetable/';
    const strtipLength = path.length;
    const windLoc = window.location.href;
    const parameters = windLoc.substring(strtipLength, );
    const url = 'http://localhost/enso_cosmetics/timetable/data/' + parameters;

    $.getJSON(url, function (data) {
        let timetable = new Timetable();
        timetable.setScope(9, 23); //hours line
        timetable.addLocations(calendarMaker()); //массив locations из дней недели
        data.forEach(function (item) { //ЗАНЯТАЯ ЯЧЕЙКА ДЛЯ КАЖДОЙ ЗАПИСИ
            if (timetable.locations.includes(item['timetable_location'])) { //проверка на вхождение в locations
                timetable.addEvent(item['name'], item['timetable_location'], datetimeToJSdate(item['timetable_start_date']), datetimeToJSdate(item['timetable_end_date']));

                if (item['timetable_status'] == 'свободно') {
                    timetable.addEvent('свободно', item['timetable_location'], datetimeToJSdate(item['timetable_start_date']), datetimeToJSdate(item['timetable_end_date']), {
                        url: '#',
                        onClick: function (event) {
                            callModal(event);
                            sendModalData(event.name, event.location, event.startDate, event.endDate);
                        }
                    });
                }

            };
        });
        let renderer = new Timetable.Renderer(timetable);
        renderer.draw('.timetable'); // any css selector
    });
})();

function callModal(eventInfo) {

    $('#Modal').modal("show", $("#buttonBeingClicked")); // JS modal call
    $('#Modal').find(".modal-title").text('Записаться на ' + eventInfo.location + ' на ' + eventInfo.startDate.getHours() + ' часов ?');
    //console.log(eventInfo.startDate);
}

function sendModalData(name, location, dateStart, dateEnd) { //ОТПРАВКА DATA В БД ДЛЯ СВОБОДНОЙ ЯЧЕЙКИ
    let path = 'http://localhost/enso_cosmetics/timetable/';
    let strtipLength = path.length;
    let windLoc = window.location.href;
    let parameters = windLoc.substring(strtipLength, );
    let url = 'http://localhost/enso_cosmetics/timetable/add/' + parameters;
    let dateStartSQL = jsDateToSQL(dateStart);
    let dateEndSQL = jsDateToSQL(dateEnd);
    let sendData = {
        name: name,
        location: location,
        date_start: dateStartSQL,
        date_end: dateEndSQL
    };
    $("#Modal").submit(function (event) {
        event.preventDefault();
        $.ajax({
                method: "POST",
                url: url,
                data: sendData
            })
            .done(function (msg) { //отладка
                console.log(sendData);
                console.log(parameters);
                window.location.href = path + parameters;
            });
    });

}

function jsDateToSQL(insertedDate) {
    return insertedDate.toISOString().split('T')[0] + ' ' + insertedDate.toTimeString().split(' ')[0];
}

function datetimeToJSdate(insertedDate) {
    let a = insertedDate.split(" ");
    let d = a[0].split("-");
    let t = a[1].split(":");
    let formatedDate = new Date(d[0], (d[1] - 1), d[2], t[0], t[1], t[2]);
    return formatedDate;
}

function calendarMaker(dateArr = []) {
    const d = new Date();
    let date = d.getDate();
    const month = d.getMonth();
    const year = d.getFullYear();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const weekLength = 7;
    //    let dateArr = [];

    function getSevenDays(date, counter = 0) {
        if (date > daysInMonth || counter >= weekLength) {
            return dateArr;
        } else {
            dateArr.push(date);
            getSevenDays(date + 1, counter + 1);
        }

    }
    getSevenDays(date);

    dateArr.forEach(function (element, index) {
        dateArr[index] = `${year}-${month+1}-${element}`;
    });

    return dateArr;
}
