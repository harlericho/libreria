function vistaEditorial() {
    $.ajax({
        type: "POST",
        url: "../controllers/editorialListado.php",
        cache: false,
        success: function (r) {
            $('#tablaEditorial').html(r);
        },
    });
}