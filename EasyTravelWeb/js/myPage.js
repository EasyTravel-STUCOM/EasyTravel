$(".guardar").click(actualizarDatos);
function actualizarDatos(){
    
    let nombre = $("#nombre").val();
    let apellido1 = $("#apellido1").val();
    let apellido2 = $("#apellido2").val();


    $.ajax({
        type: "POST",
        url: "../php/MyPage.php",
        data: "nombre="+nombre+"apellido1="+apellido1+"apellido2="+apellido2+"changed="+false,
        dataType: "json",
        succes: function(respJSON){
            console.log()
        }
    })
}