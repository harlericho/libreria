//funcion para listar todo los datos
function vistaStock() {
    $.ajax({
        type: "POST",
        url: "../controllers/stock/stockListado.php",
        cache: false,
        success: function (r) {
            $("#tablaStock").html(r);
        },
    });
}

//funcion para guardar
function guardarStock() {
    if (validacionModalAddStock() == true) {
        let formData = $("#formaddstock").serialize(); //pasamos todas las variables del formulario modal
        ajaxGuardarStock(formData);
    }
}

//funcion de ajax para registrar un dato
function ajaxGuardarStock(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/stock/stockGuardar.php",
        data: datos,
        cache: false,
        success: function (response) {
            if (response == 1) {
                toastr.success("Stock registrado!", "Aviso!");
                $("#formaddstock")[0].reset(); //reseteamos los campos
                $("#selectstocklib").focus(); //colocamos el autofocus inicial
                vistaStock(); //mostramos los datos
                $("#modalAddStock").modal("hide"); //cerramos el modal
                $("#selectstocklib").load(location.href + " #selectstocklib>*", ""); //recarga de nuevo el selector
            }
        },
    });
}

//funcion para modificar
function modificarStock() {
    if (validacionModalEditStock() == true) {
        let formData = $("#formeditstock").serialize(); //pasamos todas las variables del formulario modal
        ajaxModificarStock(formData);
    }
}
//funcion de ajax para modificar un dato
function ajaxModificarStock(datos) {
    $.ajax({
        type: "POST",
        url: "../controllers/stock/stockModificar.php",
        data: datos,
        cache: false,
        success: function (response) {
            if (response) {
                toastr.success("Stock modificado!", "Aviso!");
                vistaStock(); //mostramos los datos
                $("#modalEditStock").modal("hide"); //cerramos el modal
            }
        },
    });
}


//funcion para eliminar
function eliminarStock() {
    let formData = $("#formeliminarstock").serialize();//pasamos todas las variables del formulario modal
    $.ajax({
        type: "POST",
        url: "../controllers/stock/stockEliminar.php",
        data: formData,
        cache: false,
        success: function (response) {
            if (response) {
                toastr.success("Stock eliminado!", "Aviso!");
                vistaStock();//mostramos los datos
                $('#modalEliminarStock').modal('hide');//cerramos el modal
                $("#selectstocklib").load(location.href + " #selectstocklib>*", "");
            }
        }
    });
}

//funcion para mostrar un mensaje de que cancelo la eliminacion
function modalCerrado() {
    toastr.info("Usted cancelo la eliminacion!", "Aviso!");
}

//funcion para obtener los datos a modificar por medio del id
function editarId(id) {
    $.ajax({
        type: "POST",
        data: "id=" + id,
        url: "../controllers/stock/stockObtenerID.php",
        cache: false,
        success: function (r) {
            r = JSON.parse(r);
            $("#txtidstock").val(r["id_parametro"]);
            $("#txtlibrostocke").val(r["titulo"]);
            $("#txtstockmine").val(r["stock_min"]);
            $("#txtstockmaxe").val(r["stock_max"]);
            $("#txtstockvalore").val(r["valor"]);
            $("#txtstockdescuentoe").val(r["descuento"]);
            $("#selectestadostocke").val(r["estado"]);
        },
    });
}

//funcion para obtener los datos a modificar por medio del id
function eliminarId(id) {
    $.ajax({
        type: "POST",
        data: "id=" + id,
        url: "../controllers/stock/stockObtenerID.php",
        cache: false,
        success: function (r) {
            r = JSON.parse(r);
            $("#txtidstockel").val(r["id_parametro"]);
            $("#txttitulolibstock").html(r["titulo"]);
        },
    });
}

function observacion() {
    toastr.info("Solo se muestran los libros que no tienen stock!", "Aviso!");
}

function decimales() {
    // Solo permite ingresar numeros con punto o coma
    $(".decimales").on("input", function () {
        this.value = this.value.replace(/[^0-9,.]/g, "").replace(/,/g, ".");
    });
}

// funcion para validaciones de los campos
function validacionModalAddStock() {
    let libroid = $("#selectstocklib").val();
    let stockmin = $("#txtstockmin").val();
    let sotckmax = $("#txtstockmax").val();
    let valor = $("#txtstockvalor").val();
    let descuento = $("#txtstockdescuento").val();
    let estadostock = $("#selectestadostock").val();
    if ($.trim(libroid) == "") {
        toastr.error("Seleccion un libro", "Aviso!");
        $("#selectstocklib").focus();
        return false;
    } else if ($.trim(stockmin) == "") {
        toastr.error("Ingrese un stock minimo", "Aviso!");
        $("#txtstockmin").focus();
        return false;
    } else if ($.trim(sotckmax) == "") {
        toastr.error("Ingrese un stock maximo", "Aviso!");
        $("#txtstockmax").focus();
        return false;
    } else if ($.trim(valor) == "") {
        toastr.error("Ingrese un valor al libro", "Aviso!");
        $("#txtstockvalor").focus();
        return false;
    } else if ($.trim(descuento) == "") {
        toastr.error("Ingrese un descuento al libro", "Aviso!");
        $("#txtstockdescuento").focus();
        return false;
    } else if ($.trim(estadostock) == "") {
        toastr.error("Seleccione un estado del stock", "Aviso!");
        $("#selectestadostock").focus();
        return false;
    } else {
        return true;
    }
}

// funcion para validaciones de los campos
function validacionModalEditStock() {
    let stockmin = $("#txtstockmine").val();
    let sotckmax = $("#txtstockmaxe").val();
    let valor = $("#txtstockvalore").val();
    let descuento = $("#txtstockdescuentoe").val();
    if ($.trim(stockmin) == "") {
        toastr.error("Ingrese un stock minimo", "Aviso!");
        $("#txtstockmine").focus();
        return false;
    } else if ($.trim(sotckmax) == "") {
        toastr.error("Ingrese un stock maximo", "Aviso!");
        $("#txtstockmaxe").focus();
        return false;
    } else if ($.trim(valor) == "") {
        toastr.error("Ingrese un valor al libro", "Aviso!");
        $("#txtstockvalore").focus();
        return false;
    } else if ($.trim(descuento) == "") {
        toastr.error("Ingrese un descuento al libro", "Aviso!");
        $("#txtstockdescuentoe").focus();
        return false;
    } else {
        return true;
    }
}

//funcion para poner el autofocus inicial en el modal
function focusInicial() {
    $("body").on("shown.bs.modal", "#modalAddStock", function () {
        $("select:input:visible:enabled:first", this).focus();
    });
}
