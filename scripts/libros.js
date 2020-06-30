function vistaGeneralLibros() {
    $.ajax({
        type: "POST",
        url: "../controllers/libro/librosListado.php",
        cache: false,
        success: function (r) {
            $('#tablalibros').html(r);
        },
    });
}

function vistaLibros() {
    $.ajax({
        type: "POST",
        url: "../controllers/libro/libroListado.php",
        cache: false,
        success: function (r) {
            $('#tablalibro').html(r);
        },
    });
}

//funcion para guardar
function guardarLibro() {
    if (validacionModalAddLibro() == true) {
        var formData = new FormData($("#formaddlibro")[0]);//pasamos todas la estructura del formulario modal
        ajaxGuardarLibro(formData);
    }
}

//funcion de ajax para registrar un dato
function ajaxGuardarLibro(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/libro/libroGuardar.php",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response == 1) {
                toastr.success("Libro registrado!", "Aviso!");
                $("#formaddlibro")[0].reset();//reseteamos los campos
                $("#selecteditlib").focus();//colocamos el autofocus inicial
                vistaLibros();//mostramos los datos
                $('#modalAddLibro').modal('hide');//cerramos el modal
                document.getElementById("imglib").src = "../image/default.png";
            } else if (response == 2) {
                toastr.warning("Nombre del libro ya existe,  verifique!", "Aviso!");
                $("#txtnombrelib").focus();
            }
        }
    });

}

//funcion para modificar
function modificarLibro() {
    if (validacionModalEditLibro() == true) {
        var formData = new FormData($("#formeditlibro")[0]);//pasamos todas la estructura del formulario modal
        ajaxModificarLibro(formData);
    }
}
//funcion de ajax para modificar un dato
function ajaxModificarLibro(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/libro/libroModificar.php",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response) {
                toastr.success("Libro modificado!", "Aviso!");
                vistaLibros();//mostramos los datos
                $('#modalEditLibro').modal('hide');//cerramos el modal
            }
        }
    });
}


//funcion para eliminar
function eliminarLibro(datos) {
    let formData = $("#formeliminarlibro").serialize();//pasamos todas las variables del formulario modal
    $.ajax({
        type: "POST",
        url: "../controllers/libro/libroEliminar.php",
        data: formData,
        cache: false,
        success: function (response) {
            if (response) {
                toastr.success("Libro eliminado!", "Aviso!");
                vistaLibros();//mostramos los datos
                $('#modalEliminarLibro').modal('hide');//cerramos el modal
            }
        }
    });
}




//funcion para obtener los datos a modificar por medio del id
function editarId(id) {
    $.ajax({
        type: 'POST',
        data: "id=" + id,
        url: '../controllers/libro/libroObtenerID.php',
        cache: false,
        success: function (r) {
            r = JSON.parse(r);
            $('#txtided').val(r['id_libro']);
            $('#txtnombrelibed').val(r['titulo']);
            $('#txtdescripcionlibed').val(r['descripcion']);
            $('#txtnumpaglibed').val(r['num_paginas']);
            $('#txtediccionlibed').val(r['edicion']);
            $("#imglibed").attr("src", "data:image/jpg;base64," + r['portada']);
            $('#txtannlibed').val(r['ann']);
            $('#selectestadolibed').val(r['estado']);
            $('#urlimagened').val(r['portada']);
            $('#selecteditlibed').val(r['id_editorial']);
        }
    });
}

//funcion para obtener los datos a modificar por medio del id
function eliminarId(id) {
    $.ajax({
        type: 'POST',
        data: "id=" + id,
        url: '../controllers/libro/libroObtenerID.php',
        cache: false,
        success: function (r) {
            r = JSON.parse(r);
            $('#txtidlibel').val(r['id_libro']);
        }
    });
}




// funcion para validaciones de los campos
function validacionModalAddLibro() {
    let nombrelib = $('#txtnombrelib').val();
    let descripcionlib = $('#txtdescripcionlib').val();
    let numpaglib = $('#txtnumpaglib').val();
    let ediccionlib = $('#txtediccionlib').val();
    let annlib = $('#txtannlib').val();
    let filelib = $('#filelib').val();
    let ideditorial = $('#selecteditlib').val();
    let estadolib = $('#selectestadolib').val();
    if ($.trim(nombrelib) == "") {
        toastr.error("Ingrese titulo del libro", "Aviso!");
        $("#txtnombrelib").focus();
        return false;
    } else if ($.trim(numpaglib) == "") {
        toastr.error("Ingrese numeros de paginas del libro", "Aviso!");
        $("#txtnumpaglib").focus();
        return false;
    } else if ($.trim(ediccionlib) == "") {
        toastr.error("Ingrese ediccion del libro", "Aviso!");
        $("#txtediccionlib").focus();
        return false;
    } else if ($.trim(descripcionlib) == "") {
        toastr.error("Ingrese descripcion del libro", "Aviso!");
        $("#txtdescripcionlib").focus();
        return false;
    } else if ($.trim(filelib) == "") {
        toastr.error("Ingrese una imagen del libro", "Aviso!");
        $("#filelib").focus();
        return false;
    } else if ($.trim(annlib) == "") {
        toastr.error("Ingrese año del libro", "Aviso!");
        $("#txtannlib").focus();
        return false;
    } else if ($.trim(ideditorial) == "") {
        toastr.error("Seleccione un editorial del libro", "Aviso!");
        $("#selecteditlib").focus();
        return false;
    } else if ($.trim(estadolib) == "") {
        toastr.error("Seleccione un estado del libro", "Aviso!");
        $("#selectestadolib").focus();
        return false;
    } else {
        return true;
    }
}

// funcion para validaciones de los campos
function validacionModalEditLibro() {
    let nombrelib = $('#txtnombrelibed').val();
    let descripcionlib = $('#txtdescripcionlibed').val();
    let numpaglib = $('#txtnumpaglibed').val();
    let ediccionlib = $('#txtediccionlibed').val();
    let annlib = $('#txtannlibed').val();
    let filelib = $('#urlimagened').val();
    let ideditorial = $('#selecteditlibed').val();
    let estadolib = $('#selectestadolibed').val();
    if ($.trim(nombrelib) == "") {
        toastr.error("Ingrese titulo del libro", "Aviso!");
        $("#txtnombrelibed").focus();
        return false;
    } else if ($.trim(numpaglib) == "") {
        toastr.error("Ingrese numeros de paginas del libro", "Aviso!");
        $("#txtnumpaglibed").focus();
        return false;
    } else if ($.trim(ediccionlib) == "") {
        toastr.error("Ingrese ediccion del libro", "Aviso!");
        $("#txtediccionlibed").focus();
        return false;
    } else if ($.trim(descripcionlib) == "") {
        toastr.error("Ingrese descripcion del libro", "Aviso!");
        $("#txtdescripcionlibed").focus();
        return false;
    } else if ($.trim(filelib) == "") {
        toastr.error("Ingrese una imagen del libro", "Aviso!");
        $("#filelibed").focus();
        return false;
    } else if ($.trim(annlib) == "") {
        toastr.error("Ingrese año del libro", "Aviso!");
        $("#txtannlibed").focus();
        return false;
    } else if ($.trim(ideditorial) == "") {
        toastr.error("Seleccione un editorial del libro", "Aviso!");
        $("#selecteditlibed").focus();
        return false;
    } else if ($.trim(estadolib) == "") {
        toastr.error("Seleccione un estado del libro", "Aviso!");
        $("#selectestadolibed").focus();
        return false;
    } else {
        return true;
    }
}

//funcion para poner el autofocus inicial en el modal
function focusInicial() {
    $('body').on('shown.bs.modal', '#modalAddLibro', function () {
        $('select:input:visible:enabled:first', this).focus();
    })
}

//funcion para visualizar la imagen cuando seleccionamos una con el file
function viewImage() {
    function init() {
        var inputFile = document.getElementById('filelib');
        inputFile.addEventListener('change', mostrarImagen, false);
    }
    function mostrarImagen(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function (event) {
            var img = document.getElementById('imglib');
            img.src = event.target.result;
        }
        reader.readAsDataURL(file);
    }
    window.addEventListener('load', init, false);
}

//funcion para visualizar la imagen cuando seleccionamos una con el file
function viewImage2() {
    function init() {
        var inputFile = document.getElementById('filelibed');
        inputFile.addEventListener('change', mostrarImagen, false);
    }
    function mostrarImagen(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function (event) {
            var img = document.getElementById('imglibed');
            img.src = event.target.result;
        }
        reader.readAsDataURL(file);
    }
    window.addEventListener('load', init, false);
}

//funcion para mostrar un mensaje de que cancelo la eliminacion
function modalCerrado() {
    toastr.info("Usted cancelo la eliminacion!", "Aviso!");
}