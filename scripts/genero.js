//funcion para listar todo los datos
function vistaGenero() {
    $.ajax({
        type: "POST",
        url: "../controllers/genero/generoListado.php",
        cache: false,
        success: function (r) {
            $("#tablaGenero").html(r);
        },
    });
}


//funcion para guardar
function guardarGenero() {
    if (validacionModalAddPais() == true) {
        let formData = $("#formaddgenero").serialize();//pasamos todas las variables del formulario modal
        ajaxGuardarGenero(formData);
    }
}

//funcion de ajax para registrar un dato
function ajaxGuardarGenero(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/genero/generoGuardar.php",
        data: datos,
        cache: false,
        success: function (response) {
            if (response == 1) {
                toastr.success("Genero registrado!", "Aviso!");
                $("#formaddgenero")[0].reset();//reseteamos los campos
                $("#txtnombrege").focus();//colocamos el autofocus inicial
                vistaGenero();//mostramos los datos
                $('#modalAddGenero').modal('hide');//cerramos el modal
            } else if (response == 2) {
                toastr.warning("Nombre del genero ya existe,  verifique!", "Aviso!");
                $("#txtnombrege").focus();
            }
        }
    });
}



// funcion para validaciones de los campos
function validacionModalAddPais() {
    let nombrege = $('#txtnombrege').val();
    let estadoge = $('#selectestadoge').val();
    if ($.trim(nombrege) == "") {
        toastr.error("Ingrese nombre de genero", "Aviso!");
        $("#txtnombrege").focus();
        return false;
    } else if ($.trim(estadoge) == "") {
        toastr.error("Seleccione un estado del genero", "Aviso!");
        $("#selectestadoge").focus();
        return false;
    } else {
        return true;
    }
}


//funcion para poner el autofocus inicial en el modal
function focusInicial() {
    $('body').on('shown.bs.modal', '#modalAddGenero', function () {
        $('input:visible:enabled:first', this).focus();
    })
}