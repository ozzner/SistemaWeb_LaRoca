
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var dia = today.getUTCDay();
    var mes = today.getMonth() + 1;
    var año = today.getFullYear();

    switch (mes) {
        case 1:
            break;
            mes = "Ene";
        case 2:
            mes = "Feb";
            break;
        case 3:
            mes = "Mar";
            break;
        case 4:
            mes = "Abr";
            break;
        case 5:
            mes = "May";
            break;
        case 6:
            mes = "Jun";
            break;
        case 7:
            mes = "Jul";
            break;
        case 8:
            mes = "Ago";
            break;
        case 9:
            mes = "Set";
            break;
        case 10:
            mes = "Oct";
            break;
        case 11:
            mes = "Nov";
            break;
        case 12:
            mes = "Dic";
            break;
    }

    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('reloj').innerHTML = (dia+7)  + "-" + mes + "-" + año + "  " + h + ":" + m + ":" + s;
    var t = setTimeout(function () {
        startTime()
    }, 500);
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i
    }
    ;  // add zero in front of numbers < 10
    return i;
}

function display_usgs_change() {
    var valor = event.target.value;
    if (valor == "salir") {
        window.location.href = 'logout.php';
    }
}


