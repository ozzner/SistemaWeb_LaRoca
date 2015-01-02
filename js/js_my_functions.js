
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var dia = today.getDate();
    var mes = today.getMonth();
    var año = today.getFullYear();

    switch (mes) {
        case 0:
            mes = "Ene";
             break;
        case 1:
            mes = "Feb";
            break;
        case 2:
            mes = "Mar";
            break;
        case 3:
            mes = "Abr";
            break;
        case 4:
            mes = "May";
            break;
        case 5:
            mes = "Jun";
            break;
        case 6:
            mes = "Jul";
            break;
        case 7:
            mes = "Ago";
            break;
        case 8:
            mes = "Set";
            break;
        case 9:
            mes = "Oct";
            break;
        case 10:
            mes = "Nov";
            break;
        case 11:
            mes = "Dic";
            break;
    }

    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('reloj').innerHTML = dia  + "-" + mes + "-" + año + "  " + h + ":" + m + ":" + s;
    setTimeout("startTime()",1000);
//    setInterval(function (){
//        startTime();
//    },1000);
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
      
    return i;
}

function display_usgs_change() {
    var valor = event.target.value;
    if (valor == "salir") {
        window.location.href = 'logout.php';
    }
}


