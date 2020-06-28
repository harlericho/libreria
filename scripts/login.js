function registro() {
    if (validacionRegisitro() == true) {
        let formData = $("#formRegistro").serialize();//pasamos todas las variables del formulario
        ajaxRegistro(formData);
    }
}

//funcion ajax para el ingreso de los datos del registro
function ajaxRegistro(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/registro.php",
        data: datos,
        cache: "false",
        success: function (response) {
            if (response==1) {
                toastr.success("Usuario registrado!", "Aviso!");
                $("#formRegistro")[0].reset();
                $("#txtnombres").focus();
            } else if (response == 2) {
                toastr.warning("Dni ya esta registrado, verifique!", "Aviso!");
                $("#txtdni").focus();
            } else if (response == 3) {
                toastr.warning("Email ya esta registrado, verifique!", "Aviso!");
                $("#txtemail").focus();
            }
        }
    });
}



//funcion para validar campos
function validacionRegisitro() {
    let names = $("#txtnombres").val();
    let dni = $("#txtdni").val();
    let email = $("#txtemail").val();
    let pass = $("#txtpass").val();
    let passc = $("#txtpassc").val();
    if ($.trim(names) == "") {
        toastr.error("Ingrese su nombre", "Aviso!");
        $("#txtnombres").focus();
        return false;
    } else if ($.trim(dni) == "") {
        toastr.error("Ingrese su dni", "Aviso!");
        $("#txtdni").focus();
        return false;
    } else if ($.trim(email) == "") {
        toastr.error("Ingrese su email", "Aviso!");
        $("#txtemail").focus();
        return false;
    } else if ($.trim(pass) == "") {
        toastr.error("Ingrese su contraseña", "Aviso!");
        $("#txtpass").focus();
        return false;
    } else if ($.trim(passc) == "") {
        toastr.error("Confirmar la contraseña", "Aviso!");
        $("#txtpassc").focus();
        return false;
    } else if ($.trim(email) != "") {
        if (validacionEmail(email) == true) {
            if (validacionPasswords() == true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
//funcion para validar el email
function validacionEmail(valor) {
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(valor)) {
        return true;
    } else {
        toastr.error("Formato de email no es valido", "Aviso!");
        $('#txtemail').focus();
        return false;
    }
}
//funcion para validar la igual de las contraseñas
function validacionPasswords() {
    let pass = $("#txtpass").val();
    let passc = $("#txtpassc").val();
    if ($.trim(pass) == $.trim(passc)) {
        return true;
    } else {
        toastr.error("Contraseñas no son iguales", "Aviso!");
        $("#txtpassc").focus();
        return false;
    }
}