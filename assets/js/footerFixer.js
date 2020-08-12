//Когда задрало мучиться с CSS и Bootstrap классами
(function footerFix(){
    let docHeight = document.body.clientHeight;
    let wind = window.innerHeight;
    let foot = document.getElementById("Footer");

    if(wind>=docHeight){
        foot.classList.add("fixed-bottom");
    }
}());
