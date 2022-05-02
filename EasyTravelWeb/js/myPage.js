$(".guardar").click(function (){
    
    let nombre = $("#nombre").val();
    let apellido1 = $("#apellido1").val();
    let apellido2 = $("#apellido2").val();

    console.log(nombre);

    $.ajax({
        type: "POST",
        url: "../php/MyPage.php",
        data: "nombre="+nombre+"apellido1="+apellido1+"apellido2="+apellido2+"changed="+false,
        dataType: "json",
        succes: function(respJSON){
            console.log(respJSON['user'])
        }
    })
});


function copyToClipBoard() {

    var content = document.getElementById('textArea');
    
    content.select();
    document.execCommand('copy');

    alert("Copied!");
}