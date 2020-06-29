//funcion para listar todo los datos
function vistaAutor() {
    $.ajax({
        type: "POST",
        url: "../controllers/autor/autorListado.php",
        cache: false,
        success: function (r) {
            $("#tablaAutor").html(r);
        },
    });
}

//funcion para guardar
function guardarAutor() {
    if (validacionModalAddAutor() == true) {
        let formData = $("#formaddautor").serialize();//pasamos todas las variables del formulario modal
        ajaxGuardarAutor(formData);
    }
}

//funcion de ajax para registrar un dato
function ajaxGuardarAutor(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/autor/autorGuardar.php",
        data: datos,
        cache: false,
        success: function (response) {
            if (response == 1) {
                toastr.success("Autor registrado!", "Aviso!");
                $("#formaddautor")[0].reset();//reseteamos los campos
                $("#selectpaised").focus();//colocamos el autofocus inicial
                vistaAutor();//mostramos los datos
                $('#modalAddAutor').modal('hide');//cerramos el modal
            } else if (response == 2) {
                toastr.warning("Nombre del autor ya existe,  verifique!", "Aviso!");
                $("#txtnombreau").focus();
            } else if (response == 3) {
                toastr.warning("Email del autor ya existe,  verifique!", "Aviso!");
                $("#txtemailau").focus();
            }
        }
    });
}


//funcion para modificar
function modificarAutor() {
    if (validacionModalAEditAutor() == true) {
        let formData = $("#formeditautor").serialize();//pasamos todas las variables del formulario modal
        ajaxModificarAutor(formData);
    }
}
//funcion de ajax para modificar un dato
function ajaxModificarAutor(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/autor/autorModificar.php",
        data: datos,
        cache: false,
        success: function (response) {
            if (response) {
                toastr.success("Autor modificado!", "Aviso!");
                vistaAutor();//mostramos los datos
                $('#modalEditAutor').modal('hide');//cerramos el modal
            }
        }
    });

}

//funcion para eliminar
function eliminarAutor() {
    let formData = $("#formeliminarautor").serialize();//pasamos todas las variables del formulario modal
    $.ajax({
        type: "POST",
        url: "../controllers/autor/autorEliminar.php",
        data: formData,
        cache: false,
        success: function (response) {
            if (response) {
                toastr.success("Autor eliminado!", "Aviso!");
                vistaAutor();//mostramos los datos
                $('#modalEliminarAutor').modal('hide');//cerramos el modal
            }
        }
    });
}









//funcion para obtener los datos a modificar por medio del id
function editarId(id) {
    $.ajax({
        type: 'POST',
        data: "id=" + id,
        url: '../controllers/autor/autorObtenerID.php',
        cache: false,
        success: function (r) {
            r = JSON.parse(r);
            $('#txtided').val(r['id_autor']);
            $('#txtnombreaued').val(r['nombre']);
            $('#txtemailaued').val(r['email']);
            $('#selectestadoaued').val(r['estado']);
            $('#selectpaisaued').val(r['pais']);
        }
    });
}

//funcion para obtener los datos a modificar por medio del id
function eliminarId(id) {
    $.ajax({
        type: 'POST',
        data: "id=" + id,
        url: '../controllers/autor/autorObtenerID.php',
        cache: false,
        success: function (r) {
            r = JSON.parse(r);
            $('#txtidauel').val(r['id_autor']);
        }
    });
}

//funcion para mostrar un mensaje de que cancelo la eliminacion
function modalCerrado() {
    toastr.info("Usted cancelo la eliminacion!", "Aviso!");
}

// funcion para validaciones de los campos
function validacionModalAddAutor() {
    let nombreau = $('#txtnombreau').val();
    let emailau = $('#txtemailau').val();
    let idpais = $('#selectpaisau').val();
    let estadoau = $('#selectestadoau').val();
    if ($.trim(nombreau) == "") {
        toastr.error("Ingrese nombre del editorial", "Aviso!");
        $("#txtnombreau").focus();
        return false;
    } else if ($.trim(emailau) == "") {
        toastr.error("Ingrese email del editorial", "Aviso!");
        $("#txtemailau").focus();
        return false;
    } else if ($.trim(idpais) == "") {
        toastr.error("Seleccione un pais del autor", "Aviso!");
        $("#selectpaisau").focus();
        return false;
    } else if ($.trim(estadoau) == "") {
        toastr.error("Seleccione un estado del autor", "Aviso!");
        $("#selectestadoau").focus();
        return false;
    } else if ($.trim(emailau) != "") {
        if (validacionEmail(emailau) == true) {
            return true;
        } else {
            return false;
        }
    }
}

// funcion para validaciones de los campos
function validacionModalAEditAutor() {
    let nombreau = $('#txtnombreaued').val();
    let emailau = $('#txtemailaued').val();
    let idpais = $('#selectpaisaued').val();
    let estadoau = $('#selectestadoaued').val();
    if ($.trim(nombreau) == "") {
        toastr.error("Ingrese nombre del editorial", "Aviso!");
        $("#txtnombreaued").focus();
        return false;
    } else if ($.trim(emailau) == "") {
        toastr.error("Ingrese email del editorial", "Aviso!");
        $("#txtemailaued").focus();
        return false;
    } else if ($.trim(idpais) == "") {
        toastr.error("Seleccione un pais del autor", "Aviso!");
        $("#selectpaisaued").focus();
        return false;
    } else if ($.trim(estadoau) == "") {
        toastr.error("Seleccione un estado del autor", "Aviso!");
        $("#selectestadoaued").focus();
        return false;
    } else if ($.trim(emailau) != "") {
        if (validacionEmail(emailau) == true) {
            return true;
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
        $('#txtemailed').focus();
        return false;
    }
}

//funcion para poner el autofocus inicial en el modal
function focusInicial() {
    $('body').on('shown.bs.modal', '#modalAddEditorial', function () {
        $('select:input:visible:enabled:first', this).focus();
    })
}