<?php
include "../data/crudStock.php";
?>

<!-- Modal -->
<div class="modal fade" id="modalAddStock" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-outdent"></i> Nuevo Stock</h4>
            </div>
            <div class="modal-body">
                <form role="form"  id="formaddstock" method="POST">
                    <fieldset>
                        <div class="form-group col-sm-12">
                            <label for="disabledSelect">Libro</label>
                            <select id="selectstocklib" name="selectstocklib" class="form-control">
                                <option selected disabled value="">-Seleccione-</option>
                                <?php foreach (CrudStock::_listadoLibrosEditorial() as $key => $value) : ?>
                                    <option value="<?php echo $value['id_libro']; ?>"><?php echo $value['titulo']; ?> - <?php echo $value['nombre']; ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Stock Min</label>
                            <input class="form-control" id="txtstockmin" name="txtstockmin" type="number"  placeholder="0" onKeyPress="return soloNumeros(event)">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Stock Max</label>
                            <input class="form-control" id="txtstockmax" name="txtstockmax" type="number"  placeholder="0" onKeyPress="return soloNumeros(event)">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Valor</label>
                            <input class="form-control decimales" id="txtstockvalor" name="txtstockvalor" type="number" placeholder="0.00" >
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Descuento %</label>
                            <input class="form-control" id="txtstockdescuento" name="txtstockdescuento" type="number" placeholder="0" onKeyPress="return soloNumeros(event)">
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="disabledSelect">Estado</label>
                            <select id="selectestadostock" name="selectestadostock" class="form-control">
                                <option selected disabled value="">-Seleccione-</option>
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                            </select>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar"><i class="fa fa-reply"></i> Cerrar</button>
                <button type="button" class="btn btn-primary" title="Guardar" onclick="guardarStock()"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="modalEditStock" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-outdent"></i> Editar Stock</h4>
            </div>
            <div class="modal-body">
                <form role="form"  id="formeditstock" method="POST">
                <input type="hidden" id=txtidstock name="txtidstock">
                    <fieldset>
                        <div class="form-group col-sm-12">
                            <label for="disabledSelect">Libro</label>
                            <input class="form-control" id="txtlibrostocke" name="txtlibrostocke" type="text"  disabled>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Stock Min</label>
                            <input class="form-control" id="txtstockmine" name="txtstockmine" type="number"  placeholder="0" onKeyPress="return soloNumeros(event)">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Stock Max</label>
                            <input class="form-control" id="txtstockmaxe" name="txtstockmaxe" type="number"  placeholder="0" onKeyPress="return soloNumeros(event)">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Valor</label>
                            <input class="form-control decimales" id="txtstockvalore" name="txtstockvalore" type="number" placeholder="0.00" >
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Descuento %</label>
                            <input class="form-control" id="txtstockdescuentoe" name="txtstockdescuentoe" type="number" placeholder="0" onKeyPress="return soloNumeros(event)">
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="disabledSelect">Estado</label>
                            <select id="selectestadostocke" name="selectestadostocke" class="form-control">
                                <option selected disabled value="">-Seleccione-</option>
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                            </select>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar"><i class="fa fa-reply"></i> Cerrar</button>
                <button type="button" class="btn btn-primary" title="modificar" onclick="modificarStock()"><i class="fa fa-save"></i> Modificar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="modalEliminarStock" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-outdent"></i> Eliminar Stock</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="formeliminarstock" method="POST">
                    <input type="hidden" id=txtidstockel name="txtidstockel">
                    <fieldset>
                        <center>
                            <div class="form-group col-sm-12">
                                <label for="disabledSelect">
                                    <h4>¿ Esta seguro que desea eliminar este stock para el libro ?</h4>
                                </label>
                            </div>
                            <h4 id="txttitulolibstock" style="font-size: x-large; color:brown"></h4>
                        </center>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar" onclick="modalCerrado()"><i class="fa fa-reply"></i> Cerrar</button>
                <button type="button" class="btn btn-danger" title="Eliminar" onclick="eliminarStock()"><i class="fa fa-trash"></i> Eliminar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script type="text/javascript">
    // Solo permite ingresar numeros.
    function soloNumeros(e) {
        var key = window.Event ? e.which : e.keyCode
        return (key >= 48 && key <= 57)
    }
</script>
