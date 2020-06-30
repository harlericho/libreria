//funcion para listar todo los datos
function vistaPais() {
    $.ajax({
        type: "POST",
        url: "../controllers/pais/paisListado.php",
        cache: false,
        success: function (r) {
            $("#tablaPais").html(r);
        },
    });
}

//funcion para guardar
function guardarPais() {
    if (validacionModalAddPais() == true) {
        let formData = $("#formaddpais").serialize();//pasamos todas las variables del formulario modal
        ajaxGuardarPais(formData);
    }
}
//funcion de ajax para registrar un dato
function ajaxGuardarPais(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/pais/paisGuardar.php",
        data: datos,
        cache: false,
        success: function (response) {
            if (response == 1) {
                toastr.success("Pais registrado!", "Aviso!");
                $("#formaddpais")[0].reset();//reseteamos los campos
                $("#txtnombrepa").focus();//colocamos el autofocus inicial
                vistaPais();//mostramos los datos
                $('#modalAddPais').modal('hide');//cerramos el modal
            } else if (response == 2) {
                toastr.warning("Nombre del pais ya existe,  verifique!", "Aviso!");
                $("#txtnombrepa").focus();
            }
        }
    });
}

// funcion para validaciones de los campos
function validacionModalAddPais() {
    let nombrepa = $('#txtnombrepa').val();
    let estadopa = $('#selectestadopa').val();
    if ($.trim(nombrepa) == "") {
        toastr.error("Ingrese nombre del pais", "Aviso!");
        $("#txtnombrepa").focus();
        return false;
    } else if ($.trim(estadopa) == "") {
        toastr.error("Seleccione un estado del pais", "Aviso!");
        $("#selectestadopa").focus();
        return false;
    } else {
        return true;
    }
}






//funcion para poner el autofocus inicial en el modal
function focusInicial() {
    $('body').on('shown.bs.modal', '#modalAddPais', function () {
        $('input:visible:enabled:first', this).focus();
    })
}