function vistaGeneralLibros() {
    $.ajax({
        type: "POST",
        url: "../controllers/librosListado.php",
        cache: false,
        success: function (r) {
            $('#tablalibros').html(r);
        },
    });
}