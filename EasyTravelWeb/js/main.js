
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
        $(".log").css({"display":"inline-block"});
        $(".log input").css({"margin-bottom":"4px"});
        $('.login-register').animate({
            opacity: 1
        }), 300/*, function () {
            $('.login-register').show()
        }*/
    });
});

$('#logIn').click(function () {
    let user = $('.userName').val();
    let pwd = $('.userPWD').val();
    console.log(pwd);


    if (user.length != 0 && pwd.length != 0) {
        $.ajax({
            type: "POST",
            url: "http://localhost/EasyTravel/EasyTravelWeb/php/login.php",
            data: "user=" + user +"&pwd=" + pwd,
            dataType: "json",
            success: function (respJSON) {
                console.log(respJSON)
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







