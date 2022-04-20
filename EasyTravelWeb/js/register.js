$.validator.addMethod("maxDate", function (value, element) {
    var curDate = new Date();
    var inputDate = new Date(value);
    if (inputDate < curDate)
        return true;
    return false;
}, "Invalid Date!");

$("#userFrom").validate({
    focusCleanup: true,
    rules: {
        name: {
            required: true,
            minlength: 2
        },
        secondName: {
            required: true,
            minlength: 2
        },
        thirdName: {
            required: true,
            minlength: 2
        },
        birthday: {
            required: true,
            maxDate: true,
        },
        

    },

    messages: {
        name: {
            required: "<br><span style='color: red; font-weight: bold; font-size: 1rem; background-color: #fff; border: 1px solid black'>Nombre vacío<span>",
            minlength: "<br><span style='color: red; font-weight: bold; font-size: 1rem; background-color: #fff; border: 1px solid black'>Mínimo 2 carácteres<span>"
        },
        secondName: {
            required: "<br><span style='color: red; font-weight: bold; font-size: 1rem; background-color: #fff; border: 1px solid black'>Apellido vacío<span>",
            minlength: "<br><span style='color: red; font-weight: bold; font-size: 1rem; background-color: #fff; border: 1px solid black'>Mínimo 2 carácteres<span>"
        },
        thirdName: {
            required: "<br><span style='color: red; font-weight: bold; font-size: 1rem; background-color: #fff; border: 1px solid black'>Apellido vacío<span>",
            minlength: "<br><span style='color: red; font-weight: bold; font-size: 1rem; background-color: #fff; border: 1px solid black'>Mínimo 2 carácteres<span>"
        },
        birthday: {
            required: "<br><span style='color: red; font-weight: bold; font-size: 1rem; background-color: #fff; border: 1px solid black'>Pon una fecha correcta<span>",
            maxDate: "<br><span style='color: red; font-weight: bold; font-size: 1rem; background-color: #fff; border: 1px solid black'>Pon una fecha correcta<span>"
        },
        

    }


})

$(".cookies_aceptarRechazar").click(
    function () {
        let cookieDiv = $(".cookies");
        cookieDiv.css({ "display": "none" });

        localStorage.setItem("cookies", "clickado");
    }
)


let cookie = localStorage.getItem("cookies");
if (cookie == "clickado") {
    let cookieDiv = $(".cookies");
    cookieDiv.css({ "display": "none" });
}

$("#userForm").valid();

/**email: {
            required: true,
            email: true,
        },userName: {
            required: true,
            minlength: 3,
        },
        password: {
            required: true,
            minlength: 5
        },
        confirmPassword: {
            required: true,
            equalTo: "#password"
        },

        acceptTerms: {
            required: "#acceptTermsC:checked"
        }
 * 
 *   email: {
            required: "<br><span style='color: red; font-size: .75rem;'>Pon un email<span>",
            email: "<br><span style='color: red; font-size: .75rem;'>Pon un email válido<span>"
        },
        userName: {
            required: "<br><span style='color: red; font-size: .75rem;'>Pon un usuario correcto<span>",
        },
        password: {
            required: "<br><span style='color: red; font-size: .75rem;'>Pon una contraseña<span>",
            minlength: "<br><span style='color: red; font-size: .75rem;'>Pon una contraseña con al menos 5 carácteres<span>"
        },
        confirmPassword: {
            required: "<br><span style='color: red; font-size: .75rem;'>Confirma la contraseña<span>",
            equalTo: "<br><span style='color: red; font-size: .75rem;'>La contraseña no coincide<span>"
        },
        acceptTerms: {
            required: "<br><span style='color: red; font-size: .75rem;'>Acepta los términos y las condicionesspan>"
        }
*/