$(".check").on("change", function () {

    //Agregamos una variable fija para comprobar la cantidad de elementos chekeados.

    var checked = $(".check:checked").length;

    //Condicionamos de manera que se ejecute si hay un elemento seleccionado o la cantidad de elementos en check no es igual a 0.

    if (checked != 0) {

        //Agregamos un poco de css.

        // Quitamos el atributo disabled.
        $("#span").css({"display":"none"});
        $("#boton").css({ "color": "white" });
        $("#boton").removeAttr("disabled");
        // $("h5").html("El boton esta activo.");

    } else {
        $("#span").css({"display":"block", "border":"1px solid black", "color":"red", "background-color":"white", "width":"150px", "text-align":"center", "margin":"0 auto"});
        $("#boton").css({ "color": "#d1d1e0" });

        //Agregamos el atributo disabled y lo seteamos en disabled.

        $("#boton").attr("disabled", "disabled");
        // $("h5").html("El boton esta inactivo.");

    }

});

// $("#boton").click(function () {

//     //Comprobamos la efectividad de la funcion probando el boton.

//     $("h5").html("Hiciste click en el boton.");

// });