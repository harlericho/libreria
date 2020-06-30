//funcion para listar todo los datos
function vistaRol() {
    $.ajax({
        type: "POST",
        url: "../controllers/rol/rolListado.php",
        cache: false,
        success: function (r) {
            $("#tablaRol").html(r);
        },
    });
}

//funcion para guardar
function guardarRol() {
    if (validacionModalAddRol() == true) {
        let formData = $("#formaddrol").serialize();//pasamos todas las variables del formulario modal
        ajaxGuardarRol(formData);
    }
}

//funcion de ajax para registrar un dato
function ajaxGuardarRol(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/rol/rolGuardar.php",
        data: datos,
        cache: false,
        success: function (response) {
            if (response == 1) {
                toastr.success("Rol registrado!", "Aviso!");
                $("#formaddrol")[0].reset();//reseteamos los campos
                $("#txtnombrerol").focus();//colocamos el autofocus inicial
                vistaRol();//mostramos los datos
                $('#modalAddRol').modal('hide');//cerramos el modal
            } else if (response == 2) {
                toastr.warning("Nombre del rol ya existe,  verifique!", "Aviso!");
                $("#txtnombrerol").focus();
            }
        }
    });
}



// funcion para validaciones de los campos
function validacionModalAddRol() {
    let nombrerol = $('#txtnombrerol').val();
    let estadorol = $('#selectestadorol').val();
    if ($.trim(nombrerol) == "") {
        toastr.error("Ingrese nombre del rol", "Aviso!");
        $("#txtnombrerol").focus();
        return false;
    } else if ($.trim(estadorol) == "") {
        toastr.error("Seleccione un estado del rol", "Aviso!");
        $("#selectestadorol").focus();
        return false;
    } else {
        return true;
    }
}

//funcion para poner el autofocus inicial en el modal
function focusInicial() {
    $('body').on('shown.bs.modal', '#modalAddRol', function () {
        $('input:visible:enabled:first', this).focus();
    })
}