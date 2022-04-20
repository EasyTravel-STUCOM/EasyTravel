
$('.hero').slick({
    dots: true
}); 

$('.login').click(function(){
    $(".login-register").animate({
        opacity: 0
    }, 300, function() {
        $('.login').hide(); // applies display: none; to the element .panel
        $('.login-register').html(
            "<form class='signInForm'method='POST'><input class='username' name='username' type='text' placeholder='Inserta tu nombre de usuario'/>&nbsp;<input class='password' name='password' type='password' placeholder='Inserta tu contraseña'/><br><input class='submitButton'name='signInButton'type='submit' value='Iniciar Sesión'/></form>"
        );
        $('.login-register').animate({
            opacity: 1
        }),300, function(){
            $('.login-register').show()
        }
    }); 
});

//animacion categorias

$('.imagen img').mouseenter(function(){
    $(this).siblings('div:first').animate({
        opacity : 1
    },100,function(){
        $(this).show();
    })
})

$('.imagen div').mouseout(function(){
    $(this).animate({            
        opacity: 0
    },100,function(){
        $(this).hide()
    })
})


//animacion nav principal
 $('.nav-principal a').mouseenter(function(){
     $(this).animate({
        fontWeight: "bold", 
        fontSize: "larger", 
        fontSize: 28, 
     },200)
     $(this).mouseout(function(){
         $(this).animate({
             fontWeight: "normal", 
             fontSize : "20px",
             color: "black"
         },200)
     })
 })







