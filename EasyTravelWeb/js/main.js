
$('.hero').slick({
    dots: true
});

$('.login').click(function () {
    $(".login-register").animate({
        opacity: 0
    }, 300, function () {
        $('.login').hide(); // applies display: none; to the element .panel
        $('.login-register').html(
            "<form class='signInForm'method='POST'><input class='username' name='username' type='text' placeholder='Inserta tu nombre de usuario'/>&nbsp;<input class='password' name='password' type='password' placeholder='Inserta tu contraseña'/><br><button class='submitButton'>Iniciar Sesión</button></form>"
        );
        $('.login-register').animate({
            opacity: 1
        }), 300, function () {
            $('.login-register').show()
        }
    });
});

$('.submitButton').click(function () {
    let user = $('.username').val();
    let pwd = $('.password').val();

    if (user.length != 0 && pwd.length != 0) {
        $.ajax({
            type: "POST",
            url: "http://localhost/EasyTravel/EasyTravelWeb/php/login.php",
            data: "user=" + user +"&pwd="+pwd,
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







