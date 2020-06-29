//funcion para listar todo los datos
function vistaEditorial() {
    $.ajax({
        type: "POST",
        url: "../controllers/editorial/editorialListado.php",
        cache: false,
        success: function (r) {
            $("#tablaEditorial").html(r);
        },
    });
}

//funcion para guardar
function guardarEditorial() {
    if (validacionModalAddEditorial() == true) {
        let formData = $("#formaddeditorial").serialize();//pasamos todas las variables del formulario modal
        ajaxGuardarEditorial(formData);
    }
}

//funcion de ajax para registrar un dato
function ajaxGuardarEditorial(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/editorial/editorialGuardar.php",
        data: datos,
        cache: false,
        success: function (response) {
            if (response == 1) {
                toastr.success("Editorial registrado!", "Aviso!");
                $("#formaddeditorial")[0].reset();//reseteamos los campos
                $("#selectpaised").focus();//colocamos el autofocus inicial
                vistaEditorial();//mostramos los datos
                $('#modalAddEditorial').modal('hide');//cerramos el modal
            } else if (response == 2) {
                toastr.warning("Nombre del editorial ya existe,  verifique!", "Aviso!");
                $("#txtnombreed").focus();
            } else if (response == 3) {
                toastr.warning("Email del editorial ya existe,  verifique!", "Aviso!");
                $("#txtemailed").focus();
            }
        }
    });
}

//funcion para obtener los datos a modificar por medio del id
function editarId(id) {
    $.ajax({
        type: 'POST',
        data: "id=" + id,
        url: '../controllers/editorial/editoriaObtenerID.php',
        cache: false,
        success: function (r) {
            r = JSON.parse(r);
            $('#txtided').val(r['id_editorial']);
            $('#txtnombreeded').val(r['nombre']);
            $('#txtdireccioneded').val(r['direccion']);
            $('#txtemaileded').val(r['email']);
            $('#selectestadoeded').val(r['estado']);
            $('#selectpaiseded').val(r['pais']);
        }
    });
}

//funcion para obtener los datos a modificar por medio del id
function eliminarId(id) {
    $.ajax({
        type: 'POST',
        data: "id=" + id,
        url: '../controllers/editorial/editoriaObtenerID.php',
        cache: false,
        success: function (r) {
            r = JSON.parse(r);
            $('#txtidedel').val(r['id_editorial']);
        }
    });
}

//funcion para mostrar un mensaje de que cancelo la eliminacion
function modalCerrado() {
    toastr.info("Usted cancelo la eliminacion!", "Aviso!");
}

//funcion para modificar
function modificarEditorial() {
    if (validacionModalEditEditorial() == true) {
        let formData = $("#formediteditorial").serialize();//pasamos todas las variables del formulario modal
        ajaxModificarEditorial(formData);
    }
}
//funcion de ajax para modificar un dato
function ajaxModificarEditorial(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/editorial/editorialModificar.php",
        data: datos,
        cache: false,
        success: function (response) {
            if (response) {
                toastr.success("Editorial modificado!", "Aviso!");
                vistaEditorial();//mostramos los datos
                $('#modalEditEditorial').modal('hide');//cerramos el modal
            }
        }
    });

}
//funcion para eliminar
function eliminarEditorial(params) {
    let formData = $("#formeliminareditorial").serialize();//pasamos todas las variables del formulario modal
    $.ajax({
        type: "POST",
        url: "../controllers/editorial/editorialEliminar.php",
        data: formData,
        cache: false,
        success: function (response) {
            if (response) {
                toastr.success("Editorial eliminado!", "Aviso!");
                vistaEditorial();//mostramos los datos
                $('#modalEliminarEditorial').modal('hide');//cerramos el modal
            }
        }
    });
}

// funcion para validaciones de los campos
function validacionModalAddEditorial() {
    let nombreed = $('#txtnombreed').val();
    let direccioned = $('#txtdireccioned').val();
    let emailed = $('#txtemailed').val();
    let idpais = $('#selectpaised').val();
    let estadoed = $('#selectestadoed').val();
    if ($.trim(nombreed) == "") {
        toastr.error("Ingrese nombre del editorial", "Aviso!");
        $("#txtnombreed").focus();
        return false;
    } else if ($.trim(direccioned) == "") {
        toastr.error("Ingrese direccion del editorial", "Aviso!");
        $("#txtdireccioned").focus();
        return false;
    } else if ($.trim(emailed) == "") {
        toastr.error("Ingrese email del editorial", "Aviso!");
        $("#txtemailed").focus();
        return false;
    } else if ($.trim(idpais) == "") {
        toastr.error("Seleccione un pais del editorial", "Aviso!");
        $("#selectpaised").focus();
        return false;
    } else if ($.trim(estadoed) == "") {
        toastr.error("Seleccione un estado del editorial", "Aviso!");
        $("#selectestadoed").focus();
        return false;
    } else if ($.trim(emailed) != "") {
        if (validacionEmail(emailed) == true) {
            return true;
        } else {
            return false;
        }
    }
}

// funcion para validaciones de los campos
function validacionModalEditEditorial() {
    let nombreed = $('#txtnombreeded').val();
    let direccioned = $('#txtdireccioneded').val();
    let emailed = $('#txtemaileded').val();
    let idpais = $('#selectpaiseded').val();
    let estadoed = $('#selectestadoeded').val();
    if ($.trim(nombreed) == "") {
        toastr.error("Ingrese nombre del editorial", "Aviso!");
        $("#txtnombreeded").focus();
        return false;
    } else if ($.trim(direccioned) == "") {
        toastr.error("Ingrese direccion del editorial", "Aviso!");
        $("#txtdireccioneded").focus();
        return false;
    } else if ($.trim(emailed) == "") {
        toastr.error("Ingrese email del editorial", "Aviso!");
        $("#txtemaileded").focus();
        return false;
    } else if ($.trim(idpais) == "") {
        toastr.error("Seleccione un pais del editorial", "Aviso!");
        $("#selectpaiseded").focus();
        return false;
    } else if ($.trim(estadoed) == "") {
        toastr.error("Seleccione un estado del editorial", "Aviso!");
        $("#selectestadoeded").focus();
        return false;
    } else if ($.trim(emailed) != "") {
        if (validacionEmail(emailed) == true) {
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
function focusInical() {
    $('body').on('shown.bs.modal', '#modalAddEditorial', function () {
        $('select:input:visible:enabled:first', this).focus();
    })
}