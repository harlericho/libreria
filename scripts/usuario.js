


//funcion para modificar usuario
function modificarUsu() {
    if (validacionMoidficarUsuario()==true) {
            let formData = $("#formusuario").serialize();//pasamos todas las variables del formulario
            //console.log(formData);
            ajaxModificarUsuario(formData);
    }
}


//funcion ajax para modificar usuario
function ajaxModificarUsuario(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/perfil/perfilModificar.php",
        data: datos,
        cache: "false",
        success: function (response) {
            if (response==1) {
                toastr.success("Datos personales modificados!", "Aviso!");
            }
        }
    });
}



//funcion para validar campos modificar usuario
function validacionMoidficarUsuario() {
    let nombresusu = $("#nombreusu").val();
    let direccionusu = $("#direccionusu").val();
    let fechausu = $("#fechanacusu").val();
    let telfonousu = $("#telefonousu").val();
    if ($.trim(nombresusu) == "") {
        toastr.error("Ingrese sus nombres", "Aviso!");
        $("#nombreusu").focus();
        return false;
    } else if ($.trim(direccionusu) == "") {
        toastr.error("Ingrese su direccion", "Aviso!");
        $("#direccionusu").focus();
        return false;
    } else if ($.trim(fechausu) == "") {
        toastr.error("Ingrese su fecha nacimiento", "Aviso!");
        $("#fechanacusu").focus();
        return false;
    } else if ($.trim(telfonousu) == "") {
        toastr.error("Ingrese su telefono", "Aviso!");
        $("#telefonousu").focus();
        return false;
    } else if ($.trim(fechausu)!="") {
        var edad = Edad(fechausu);
        if (edad<18) {
            //console.log(edad);
            toastr.warning("Fecha nacimiento erronea, Verifique!", "Aviso!");
            $("#fechanacusu").focus();
            return false;
        }else{
            console.log(edad);
            return true;
        }
        
    }
}



function Edad(FechaNacimiento) {

    var fechaNace = new Date(FechaNacimiento);
    var fechaActual = new Date()

    var mes = fechaActual.getMonth();
    var dia = fechaActual.getDate();
    var año = fechaActual.getFullYear();

    fechaActual.setDate(dia);
    fechaActual.setMonth(mes);
    fechaActual.setFullYear(año);

    edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));
   
    return edad;
}

function focusInicial() { 
    document.getElementById("nombreusu").focus();

 }