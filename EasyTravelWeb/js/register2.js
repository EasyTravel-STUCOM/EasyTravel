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
        user: {
            required: true,
            minlength: 3
        },
        password: {
            required: true,
            minlength: 5
        },
        confirmPassword: {
            required: true,
            equalTo: ".confirmPassword"
        }
        

    },

    messages: {
        user: {
            required: "<br><span style='color: red; font-weight: bold; font-size: 1rem; background-color: #fff; border: 1px solid black'>Nombre vacío<span>",
            minlength: "<br><span style='color: red; font-weight: bold; font-size: 1rem; background-color: #fff; border: 1px solid black'>Mínimo 3 carácteres<span>"
        },
        password: {
            required: "<br><span style='color: red; font-weight: bold; font-size: 1rem; background-color: #fff; border: 1px solid black'>Pon una contraseña válida<span>",
            minlength: "<br><span style='color: red; font-weight: bold; font-size: 1rem; background-color: #fff; border: 1px solid black'>Mínimo 5 carácteres<span>"
        },
        confirmPassword: {
            required: "<br><span style='color: red; font-weight: bold; font-size: 1rem; background-color: #fff; border: 1px solid black'>Apellido vacío<span>",
            equalTo: "<br><span style='color: red; font-weight: bold; font-size: 1rem; background-color: #fff; border: 1px solid black'>La contraseña no coincide<span>"
        }
        

    }


})


$("#userForm").valid();