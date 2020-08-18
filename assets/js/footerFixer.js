//Когда задрало мучиться с CSS и Bootstrap классами
'use strict';

(function footerFix() {
    let docHeight = document.body.clientHeight,
        wind = window.innerHeight,
        foot = document.getElementById("Footer");

    if (wind >= docHeight) {
        foot.classList.add("fixed-bottom");
    }
}());
