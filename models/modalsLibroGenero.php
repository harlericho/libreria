<?php
include "../data/crudLibGen.php";
?>

<!-- Modal -->
<div class="modal fade" id="modalAddLibroGen" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-book"></i> Nuevo genero a libro</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="formaddLibGen" method="POST">
                    <fieldset>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Libro-Editorial</label>
                            <select id="selectlibgenlibro" name="selectlibgenlibro" class="form-control">
                                <option selected disabled value="">-Seleccione-</option>
                                <?php foreach (CrudLibGen::_listadoLibros() as $key => $value) : ?>
                                    <option value="<?php echo $value['id_libro']; ?>"><?php echo $value['titulo']; ?> - <?php echo $value['nombre']; ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Genero</label>
                            <select id="selectlibgengenero" name="selectlibgengenero" class="form-control">
                                <option selected disabled value="">-Seleccione-</option>
                                <?php foreach (CrudLibGen::_listadoGenero() as $key => $value) : ?>
                                    <option value="<?php echo $value['id_genero']; ?>"><?php echo $value['genero']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar"><i class="fa fa-reply"></i> Cerrar</button>
                <button type="button" class="btn btn-primary" title="Guardar" onclick="guardarLibGen()"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="modalEditLibroGen" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-book"></i> Editar genero a libro</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="formeditLibGen" method="POST">
                    <input type="hidden" id=txtided name="txtided">
                    <fieldset>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Libro-Editorial</label>
                            <input class="form-control" id="txtlibrogened" name="txtlibrogened" type="text" placeholder="Libro" disabled>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Genero</label>
                            <select id="selectlibgengeneroed" name="selectlibgengeneroed" class="form-control">
                                <option selected disabled value="">-Seleccione-</option>
                                <?php foreach (CrudLibGen::_listadoGenero() as $key => $value) : ?>
                                    <option value="<?php echo $value['id_genero']; ?>"><?php echo $value['genero']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar"><i class="fa fa-reply"></i> Cerrar</button>
                <button type="button" class="btn btn-primary" title="Modificar" onclick="modificarLibGen()"><i class="fa fa-edit"></i> Modificar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="modalEliminarLibroGen" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-book"></i> Eliminar genero a libro</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="formeliminarLibGen" method="POST">
                    <input type="hidden" id=txtidel name="txtidel">
                    <fieldset>
                        <center>
                            <div class="form-group col-sm-12">
                                <label for="disabledSelect">
                                    <h4>¿ Esta seguro que desea eliminar este genero para el libro ?</h4>
                                </label>
                            </div>
                            <h4 id="txttitulolibgenel" style="font-size: x-large; color:brown"></h4>
                            <h5 id="txtgenerolibgenel" style="font-size: medium; color:crimson"></h5>
                        </center>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar" onclick="modalCerrado()"><i class="fa fa-reply"></i> Cerrar</button>
                <button type="button" class="btn btn-danger" title="Eliminar" onclick="eliminarLibGen()"><i class="fa fa-trash"></i> Eliminar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->