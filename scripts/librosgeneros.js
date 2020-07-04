function vistaLibroGenero() {
    $.ajax({
        type: "POST",
        url: "../controllers/libro_genero/librogenListado.php",
        cache: false,
        success: function (r) {
            $('#tablalibrogenero').html(r);
        },
    });
}


//funcion para guardar
function guardarLibGen() {
    if (validacionModalAddLibGen() == true) {
        let formData = $("#formaddLibGen").serialize();//pasamos todas las variables del formulario modal
        ajaxGuardarLibGen(formData);
    }

}

//funcion de ajax para registrar un dato
function ajaxGuardarLibGen(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/libro_genero/librogenGuardar.php",
        data: datos,
        cache: false,
        success: function (response) {
            if (response == 1) {
                toastr.success("Genero agreado al libro!", "Aviso!");
                $("#formaddLibGen")[0].reset();//reseteamos los campos
                $("#selectlibgenlibro").focus();//colocamos el autofocus inicial
                vistaLibroGenero();//mostramos los datos
                $('#modalAddLibroGen').modal('hide');//cerramos el modal
                $("#selectlibgenlibro").load(location.href + " #selectlibgenlibro>*", "");//recarga de nuevo el selector
            }
        }
    });
}


//funcion para modificar
function modificarLibGen() {
    let formData = $("#formeditLibGen").serialize();//pasamos todas las variables del formulario modal
    ajaxModificarLibGen(formData);

}
//funcion de ajax para modificar un dato
function ajaxModificarLibGen(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/libro_genero/librogenModificar.php",
        data: datos,
        cache: false,
        success: function (response) {
            if (response) {
                toastr.success("Genero del libro modificado!", "Aviso!");
                vistaLibroGenero();//mostramos los datos
                $('#modalEditLibroGen').modal('hide');//cerramos el modal
            }
        }
    });

}




//funcion para poner el autofocus inicial en el modal
function focusInicial() {
    $('body').on('shown.bs.modal', '#modalAddLibroGen', function () {
        $('select:visible:enabled:first', this).focus();
    })
}



//funcion para obtener los datos a modificar por medio del id
function editarId(id) {
    $.ajax({
        type: 'POST',
        data: "id=" + id,
        url: '../controllers/libro_genero/librogenObtenerID.php',
        cache: false,
        success: function (r) {
            r = JSON.parse(r);
            $('#txtided').val(r['id_librogenero']);
            $('#txtlibrogened').val(r['nombre']);
            $('#selectlibgengeneroed').val(r['id_genero']);
        }
    });
}


//funcion para obtener los datos a modificar por medio del id
function eliminarId(id) {
    $.ajax({
        type: 'POST',
        data: "id=" + id,
        url: '../controllers/libro_genero/librogenObtenerID.php',
        cache: false,
        success: function (r) {
            r = JSON.parse(r);
            $('#txtidel').val(r['id_librogenero']);
            $('#txttitulolibgenel').html(r['nombre']);
            $('#txtgenerolibgenel').html(r['genero']);
        }
    });
}


//funcion para eliminar
function eliminarLibGen() {
    let formData = $("#formeliminarLibGen").serialize();//pasamos todas las variables del formulario modal
    $.ajax({
        type: "POST",
        url: "../controllers/libro_genero/librogenElimiinar.php",
        data: formData,
        cache: false,
        success: function (response) {
            if (response) {
                toastr.success("Genero del libro eliminado!", "Aviso!");
                vistaLibroGenero();//mostramos los datos
                $('#modalEliminarLibroGen').modal('hide');//cerramos el modal
                $("#selectlibgenlibro").load(location.href + " #selectlibgenlibro>*", "");
            }
        }
    });
}

//funcion para mostrar un mensaje de que cancelo la eliminacion
function modalCerrado() {
    toastr.info("Usted cancelo la eliminacion!", "Aviso!");
}

// funcion para validaciones de los campos
function validacionModalAddLibGen() {
    let idlibro = $('#selectlibgenlibro').val();
    let idgenero = $('#selectlibgengenero').val();
    if ($.trim(idlibro) == "") {
        toastr.error("Seleccione un libro", "Aviso!");
        $("#selectlibgenlibro").focus();
        return false;
    } else if ($.trim(idgenero) == "") {
        toastr.error("Seleccione un genero", "Aviso!");
        $("#selectlibgengenero").focus();
        return false;
    } else {
        return true;

    }
}

