$(".guardar").click(function () {

    let nombre = $("#nombre").val();
    let apellido1 = $("#apellido1").val();
    let apellido2 = $("#apellido2").val();

    console.log(nombre);

    if (nombre.length != 0 && apellido1.length == 0 && apellido2.length == 0) {
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
    }else if (nombre.length == 0 && apellido1.length != 0 && apellido2.length == 0) {
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
    $(".tarjeta__modificar").append(".tarjeta__ventana");
    document.getElementsByClassName("tarjeta__ventana").style.display = "block";
    
})