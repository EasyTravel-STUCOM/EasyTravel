$(".guardar").click(function () {

    let nombre = $("#nombre").val();
    let apellido1 = $("#apellido1").val();
    let apellido2 = $("#apellido2").val();

    console.log(nombre);
    if (nombre.length == 0 && apellido1.length == 0 && apellido2.length != 0) {

        $.ajax({
            type: "POST",
            url: "http://localhost/EasyTravel/EasyTravelWeb/php/MyPage.php",
            data: "apellido2=" + apellido2,
            dataType: "json",
            success: function (respJSON) {
                if (respJSON.changed == true) {
                    console.log("Datos actualizados");
                } else {
                    console.log("Error en la actualización de datos.");

                }
            }
        })

    } else if (nombre.length != 0 && apellido1.length == 0 && apellido2.length == 0) {
        $.ajax({
            type: "POST",
            url: "http://localhost/EasyTravel/EasyTravelWeb/php/MyPage.php",
            data: "nombre=" + nombre,
            dataType: "json",
            success: function (respJSON) {
                if (respJSON.changed == true) {
                    console.log("Datos actualizados");
                } else {
                    console.log("Error en la actualización de datos.");

                }
            }
        })
    } else if (nombre.length == 0 && apellido1.length != 0 && apellido2.length == 0) {
        $.ajax({
            type: "POST",
            url: "http://localhost/EasyTravel/EasyTravelWeb/php/MyPage.php",
            data: "apellido1=" + apellido1,
            dataType: "json",
            success: function (respJSON) {
                if (respJSON.changed == true) {
                    console.log("Datos actualizados");
                } else {
                    console.log("Error en la actualización de datos.");

                }
            }
        })

    } else if (nombre.length == 0 && apellido1.length != 0 && apellido2.length != 0) {
        $.ajax({
            type: "POST",
            url: "http://localhost/EasyTravel/EasyTravelWeb/php/MyPage.php",
            data: "apellido1=" + apellido1 + "&apellido2=" + apellido2,
            dataType: "json",
            success: function (respJSON) {
                if (respJSON.changed == true) {
                    console.log("Datos actualizados");
                } else {
                    console.log("Error en la actualización de datos.");

                }
            }
        })

    } else if (nombre.length != 0 && apellido1.length != 0 && apellido2.length != 0) {
        $.ajax({
            type: "POST",
            url: "http://localhost/EasyTravel/EasyTravelWeb/php/MyPage.php",
            data: "nombre=" + nombre + "&apellido1=" + apellido1 + "&apellido2=" + apellido2,
            dataType: "json",
            success: function (respJSON) {
                if (respJSON.changed == true) {
                    console.log("Datos actualizados");
                } else {
                    console.log("Error en la actualización de datos.");

                }
            }
        })

    } else if (nombre.length != 0 && apellido1.length != 0 && apellido2.length == 0) {
        $.ajax({
            type: "POST",
            url: "http://localhost/EasyTravel/EasyTravelWeb/php/MyPage.php",
            data: "nombre=" + nombre + "&apellido1=" + apellido1,
            dataType: "json",
            success: function (respJSON) {
                if (respJSON.changed == true) {
                    console.log("Datos actualizados");
                } else {
                    console.log("Error en la actualización de datos.");

                }
            }
        })

    } else if (nombre.length != 0 && apellido1.length == 0 && apellido2.length != 0) {
        $.ajax({
            type: "POST",
            url: "http://localhost/EasyTravel/EasyTravelWeb/php/MyPage.php",
            data: "nombre=" + nombre + "&apellido2=" + apellido2,
            dataType: "json",
            success: function (respJSON) {
                if (respJSON.changed == true) {
                    console.log("Datos actualizados");
                } else {
                    console.log("Error en la actualización de datos.");

                }
            }
        })
    }


});


$(".tarjeta__modificar").click(function () {


    if (screen.width >= 949) {
        $(".tarjeta").append(document.getElementsByClassName("tarjeta__ventana"));
        $(".tarjeta__grid").css({ "display": "none" });
        $(".tarjeta__ventana").css({ "display": "grid" });
        $(".ventana__misDatos").css({ "height": "54rem" });
    } else if (screen.width <= 948 && screen.width >= 801) {
        $(".tarjeta").append(document.getElementsByClassName("tarjeta__ventana"));
        $(".tarjeta__grid").css({ "display": "none" });
        $(".tarjeta__ventana").css({ "display": "grid" });
        $(".ventana__misDatos").css({ "height": "60rem" });
    } else if (screen.width <= 800 && screen.width >= 500) {
        $(".tarjeta").append(document.getElementsByClassName("tarjeta__ventana"));
        $(".tarjeta__grid").css({ "display": "none" });
        $(".tarjeta__ventana").css({ "display": "grid" });
        $(".ventana__misDatos").css({ "height": "55rem" });
    } else if (screen.width < 500) {
        $(".tarjeta").append(document.getElementsByClassName("tarjeta__ventana"));
        $(".tarjeta__grid").css({ "display": "none" });
        $(".tarjeta__ventana").css({ "display": "grid" });
        $(".ventana").css({ "height": "61rem" });
    }
});


$(".tarjeta__cerrar").click(function () {

    if (screen.width >= 950) {
        $(".tarjeta").append(document.getElementsByClassName("tarjeta__ventana"));
        $(".tarjeta__grid").css({ "display": "grid" });
        $(".tarjeta__ventana").css({ "display": "none" });
        $(".ventana__misDatos").css({ "height": "36rem" });
    } else if (screen.width <= 948 && screen.width >= 801) {
        $(".tarjeta").append(document.getElementsByClassName("tarjeta__ventana"));
        $(".tarjeta__grid").css({ "display": "grid" });
        $(".tarjeta__ventana").css({ "display": "none" });
        $(".ventana__misDatos").css({ "height": "32rem" });
    } else if (screen.width <= 800 && screen.width >= 500) {
        $(".tarjeta").append(document.getElementsByClassName("tarjeta__ventana"));
        $(".tarjeta__grid").css({ "display": "grid" });
        $(".tarjeta__ventana").css({ "display": "none" });
        $(".ventana__misDatos").css({ "height": "30rem" });
    } else if (screen.width < 500) {
        $(".tarjeta").append(document.getElementsByClassName("tarjeta__ventana"));
        $(".tarjeta__grid").css({ "display": "grid" });
        $(".tarjeta__ventana").css({ "display": "none" });
        $(".ventana").css({ "height": "42rem" });
    }



});
