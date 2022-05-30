$('.hero').slick({
    dots: true
});

$('.login').click(function () {
    $(".login-register").animate({
        opacity: 0
    }, 300, function () {
        $('.login').hide();
        $('.register').hide();
        $('p').hide(); // applies display: none; to the element .panel
        $('.login-register').append(document.getElementsByClassName("log"));
        $(".log").css({ "display": "inline-block" });
        $(".log input").css({ "margin-bottom": "4px" });
        $('.login-register').animate({
            opacity: 1
        }), 300/*, function () {
            $('.login-register').show()
        }*/
    });
});
var loged = false;
var nombreusuario = "";
$('#logIn').click(function () {
    let user = $('.userName').val();
    let pwd = $('.userPWD').val();


    if (user.length != 0 && pwd.length != 0) {
        //Ajax para iniciar sesión en el index, le enviamos el usuario y la contraseña, una vexz validada de que no está vacía
        $.ajax({
            type: "POST",
            url: "http://localhost/EasyTravel/EasyTravelWeb/php/login.php",
            data: "user=" + user + "&pwd=" + pwd,
            dataType: "json",
            success: function (respJSON) {

                if (respJSON.verified) {
                    alert("Bienvenido " + respJSON.nombre);
                    $(".login-register").css({ "display": "none" });
                    $(".account").mouseover(
                        function () {
                            $(".account").css({ "cursor": "pointer" });
                        }
                    )


                    $(".account").click(
                        function () {

                            window.location.href = "http://localhost/EasyTravel/EasyTravelWeb/MyPage.html";

                        }
                    )
                } else {
                    alert("Error en incio de sesión")
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                alert("Error en incio de sesión");

            }



        })




    }

})



//animacion categorias

$('.imagen img').mouseenter(function () {
    $(this).siblings('div:first').animate({
        opacity: 1
    }, 100, function () {
        $(this).show();
    })
})

$('.imagen div').mouseout(function () {
    $(this).animate({
        opacity: 0
    }, 100, function () {
        $(this).hide()
    })
})


//animacion nav principal
$('.nav-principal a').mouseenter(function () {
    $(this).animate({
        fontWeight: "bold",
        fontSize: "larger",
        fontSize: 28,
    }, 200)
    $(this).mouseout(function () {
        $(this).animate({
            fontWeight: "normal",
            fontSize: "20px",
            color: "black"
        }, 200)
    })
})






//AJAX genérico para ver si existe o no un usaurio activo en la sesión, si existe desaparecerá el div de log.

$.ajax({
    type: "GET",
    url: "http://localhost:3000/EasyTravelWeb/php/indexOcultar.php",
    dataType: "json",
    success: function (respJSON) {
        console.log(respJSON);
        if (respJSON.loged == true) {
            $(".login-register").css({ "display": "none" });
            $(".account").mouseover(
                function () {
                    $(".account").css({ "cursor": "pointer" });
                }
            )
            $(".account").click(
                function () {
                    window.location.href = "http://localhost/EasyTravel/EasyTravelWeb/MyPage.html";
                }
            )
        }
    },
    error: function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus);
        alert("Error en incio de sesión");

    }



})