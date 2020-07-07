function registro() {
    if (validacionRegisitro() == true) {
        let formData = $("#formRegistro").serialize();//pasamos todas las variables del formulario
        ajaxRegistro(formData);
    }
}

function login() {
    if (validacionLogin() == true) {
        let formData = $("#formLogin").serialize();//pasamos todas las variables del formulario
        ajaxLogin(formData);
        //console.log(formData);
    }
}
//funcion ajax para el ingreso de los datos del login
function ajaxLogin(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/perfil/login.php",
        data: datos,
        cache: "false",
        success: function (response) {
            if (response == 1) {
                toastr.success("Bienvenido!", "Aviso!");
                setTimeout("redirectMain()", 1000);
            } else if (response == 2) {
                toastr.warning("Usuario o contraseña no existe, verifique!", "Aviso!");
                $("#email").focus();
            } 
        }
    });
}




//funcion ajax para el ingreso de los datos del registro
function ajaxRegistro(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/perfil/registro.php",
        data: datos,
        cache: "false",
        success: function (response) {
            if (response == 1) {
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
function validacionLogin() {
    let email = $("#email").val();
    let pass = $("#password").val();
    if ($.trim(email) == "") {
        toastr.error("Ingrese su email", "Aviso!");
        $("#email").focus();
        return false;
    } else if ($.trim(pass) == "") {
        toastr.error("Ingrese su cotraseña", "Aviso!");
        $("#password").focus();
        return false;
    } else if ($.trim(email) != "") {
        if (validacionEmail2(email) == true) {
            return true;
        } else {
            return false;
        }
    }
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

//funcion para validar el email
function validacionEmail2(valor) {
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(valor)) {
        return true;
    } else {
        toastr.error("Formato de email no es valido", "Aviso!");
        $('#email').focus();
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
//funcion para dirigir a una pagina url
function redirectMain() {
    $(location).attr('href', '../views/main.php');
}