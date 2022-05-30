$(".guardar").click(function () {

    let nombre = $("#nombre").val();
    let apellido1 = $("#apellido1").val();
    let apellido2 = $("#apellido2").val();

    console.log(nombre);

    //Ajax que detecta si hemos cambiadoalgo, una vez detectado cuales son, lo actulaizara en el php.

    if (nombre.length == 0 && apellido1.length == 0 && apellido2.length != 0) {


        if (isDigit(apellido2) == false) {
            $.ajax({
                type: "POST",
                url: "php/ChangeNameAndSurname.php",
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

        } else {
            alert("No pueden haber números en el segundo apellido")
        }


    } else if (nombre.length != 0 && apellido1.length == 0 && apellido2.length == 0) {

        if (isDigit(nombre) == false) {
            $.ajax({
                type: "POST",
                url: "php/ChangeNameAndSurname.php",
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
        } else {
            alert("No pueden haber números en el nombre")
        }


    } else if (nombre.length == 0 && apellido1.length != 0 && apellido2.length == 0) {

        if (isDigit(apellido1) == false) {
            $.ajax({
                type: "POST",
                url: "php/ChangeNameAndSurname.php",
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
        } else {
            alert("No pueden haber números en el primer apellido")
        }


    } else if (nombre.length == 0 && apellido1.length != 0 && apellido2.length != 0) {
        if (isDigit(apellido1) == false && isDigit(apellido2) == false) {
            $.ajax({
                type: "POST",
                url: "php/ChangeNameAndSurname.php",
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
        } else {
            if (isDigit(apellido1) == true) {
                alert("No pueden haber números en el primer apellido")
            }
            if (isDigit(apellido2) == true) {
                alert("No pueden haber números en el segundo apellido")
            }
        }


    } else if (nombre.length != 0 && apellido1.length != 0 && apellido2.length != 0) {

        if (isDigit(apellido1) == false && isDigit(apellido2) == false && isDigit(nombre) == false) {
            $.ajax({
                type: "POST",
                url: "php/ChangeNameAndSurname.php",
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
        } else {
            if (isDigit(apellido1) == true) {
                alert("No pueden haber números en el primer apellido")
            }
            if (isDigit(apellido2) == true) {
                alert("No pueden haber números en el segundo apellido")
            }

            if (isDigit(nombre) == true) {
                alert("No pueden haber números en el nombre")
            }
        }



    } else if (nombre.length != 0 && apellido1.length != 0 && apellido2.length == 0) {

        if (isDigit(apellido1) == false && isDigit(nombre) == false) {
            $.ajax({
                type: "POST",
                url: "php/ChangeNameAndSurname.php",
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
        } else {
            if (isDigit(apellido1) == true) {
                alert("No pueden haber números en el primer apellido")
            }
            if (isDigit(nombre) == true) {
                alert("No pueden haber números en el nombre")
            }
        }


    } else if (nombre.length != 0 && apellido1.length == 0 && apellido2.length != 0) {
        if (isDigit(apellido2) == false && isDigit(nombre) == false) {
            $.ajax({
                type: "POST",
                url: "php/ChangeNameAndSurname.php",
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
        } else {
            if (isDigit(apellido2) == true) {
                alert("No pueden haber números en el segundo apellido")
            }
            if (isDigit(nombre) == true) {
                alert("No pueden haber números en el nombre")
            }
        }
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





$(".tarjeta__guardar").click(function () {

    let nombreT = $("#tarjeta__nombre").val();
    let cvT = $("#tarjeta__CV").val();
    let numeroT = $("#tarjeta__numero").val();
    let fechaT = String($("#tarjeta__fecha").val());
    let numeroINT = Number(numeroT);
    let cvINT = Number(cvT);
    numberBool = true;
    cvBool = true;





    if (isNaN(numeroINT)) {
        numberBool = false;
    } else {
        numeroT = String(numeroT)
        if (numeroT.length != 16) {
            numberBool = false;
        }


    }

    if (isNaN(cvINT)) {
        cvBool = false;
    } else {
        cvT = String(cvT);

        if (cvT.length != 3) {
            cvBool = false;
        }

    }



    if ((nombreT.length === 0 || isDigit(nombreT) == true) || cvBool === false || numberBool === false || fechaT.length === 0) {

        if (isDigit(nombreT) == true) {
            alert("No pueden haber números en el nombre")
        }

        if (numberBool === false) {
            alert("Debes poner números de 16 dígitos sin espacios.");
        }

        if (cvBool === false) {
            alert("Debes poner un CV de 3 dígitos");
        }



    } else {
        $.ajax({
            type: "POST",
            url: "php/ModifyCard.php",
            data: "name=" + nombreT + "&cv=" + cvT + "&numero=" + numeroT + "&fecha=" + fechaT,
            dataType: "json",
            success: function (respJSON) {
                console.log("Datos actualizados");
            }
        })


    }




});


function isDigit(string) {
    let digit = false;

    for (var i = 0; i < string.length && digit == false; i++) {

        if (string.charAt(i) == "0" || string.charAt(i) == "1" || string.charAt(i) == "2" || string.charAt(i) == "3" || string.charAt(i) == "4" || string.charAt(i) == "5" || string.charAt(i) == "6" || string.charAt(i) == "7" || string.charAt(i) == "8" || string.charAt(i) == "09") {
            digit = true;
            console.log("hay numero")
        }

    }

    return digit;
}


$('.changePWD').click(function () {
    let pwd = prompt("Pon una contraseña");
    let pwdConfirm = prompt("Repite la contraseá");
    console.log(pwd);
    if (pwd == pwdConfirm && pwd.length != 0 && pwdConfirm.length != 0) {
        $.ajax({
            type: "POST",
            url: "php/changePWD.php",
            data: "pwd=" + pwd,
            dataType: "json",
            success: function (respJSON) {

                console.log(respJSON.userPassword);
                console.log("Bien");


            }
        })
    }

    if (pwd != pwdConfirm) {
        alert("La contraseña no coincide");
    }

    if (pwd.length == 0 && pwdConfirm.length == 0) {
        alert("No puedes dejar campos en vacío");
    }
})

$("#eliminar").click(function () {
    let confirmar = confirm("Estás seguro de querer eliminar la cuenta?");

    if (confirmar) {

        $.ajax({
            type: "GET",
            url: "php/deleteUser.php",
            dataType: "json",
            success: function (respJSON) {

                console.log(respJSON.elimnado);
                alert("Eliminado correctamente");
                window.location.href = "index.php";


            }
        })
    }

})

$("#cerrarSesion").mouseover(
    function () {
        $(".account").css({ "cursor": "pointer" });
    }
)

$("#cerrarSesion").click(function () {


    $.ajax({
        type: "GET",
        url: "php/cerrarSesion.php",
        dataType: "json",
        success: function (respJSON) {

            if (respJSON.cerrada) {
                window.location.href = "index.php";
            }


        }
    })

})

$(".encabezado_titulo").mouseover(
    function () {
        $(".encabezado_titulo").css({ "cursor": "pointer" });
    }
)

$(".encabezado__titulo").click(function () {
    window.location.href = "index.php";
})



$.ajax({
    type: "GET",
    url: "php/userName.php",
    dataType: "json",
    success: function (respJSON) {
        console.log(respJSON.nombre+"-"+respJSON.id);
        $(".tarjeta__texto").html("Visa de " + respJSON.nombre)
    }
})