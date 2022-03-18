<div id="modalReporte" class="modal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header" data-dismiss="modal" style="text-align: center;">
                <h4 class="modal-title"><b>Generar reporte</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('registrarReporte') }}" autocomplete="off" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nombre:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Nombre"   name="nombreCliente">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Tel&eacute;fono:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Tel&eacute;fono"  onkeypress="return soloNumeros(event);" maxlength="10" name="telefono">
                        </div>
                    </div>
                    <div class="form-group" style="visibility: hidden; display: none;" id="t">
                        <label class="control-label col-sm-3">Tel&eacute;fono 2:</label>
                        <div class="col-sm-9">
                            <input id="tel2" type="text" class="form-control" placeholder="Tel&eacute;fono 2 (Opcional)" onkeypress="return soloNumeros(event);" maxlength="10" name="telefonoOpcional">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9" style="float: right;">
                            <input type="button" class="btn form-control" value="+" style="background: #6DB3FF; color: white; font-weight: bold;" id="mas">
                            <input type="button" class="btn form-control" value="-" style="background: #6DB3FF; color: white; font-weight: bold; display: none;" id="menos">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Poblaci&oacute;n:</label>
                        <div class="col-sm-9">
                            <select id="poblacion" name="PKCatPoblaciones" class="form-control"  style="background: #D5EDFF;">
                                <option value="" style="visibility: hidden; display: none;">Seleccione una poblaci&oacute;n</option>
                                @foreach($poblaciones as $poblacion)
                                    <option value="{{$poblacion->PKCatPoblaciones}}">{{$poblacion->nombrePoblacion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Coordenadas:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Coordenadas" onkeypress="return soloNumerosp(event);" name="coordenadas">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Direcci&oacute;n:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control" id="direccion" placeholder="Direcci&oacute;n" name="direccion" ></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Referencias:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control" id="referencias" placeholder="Referencias" name="referencias"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Problema:</label>
                        <div class="col-sm-9">
                            <select id="tproblema" name="PKCatProblemas" class="form-control"  style="background: #D5EDFF;">
                                <option value="" style="visibility: hidden; display: none;">Seleccione un problema</option>
                                @foreach($problemas as $problema)
                                    <option value="{{$problema->PKCatProblemas}}">{{$problema->nombreProblema}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Descripci&oacute;n del problema:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control" id="problema" placeholder="Descripci&oacute;n del problema" name="descripcionProblema"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Observaciones:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control" id="observaciones" placeholder="Observaciones" name="observaciones"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9" style="text-align:center; margin-top: 3%;">
                            <button name="registrar" class="btn form-control" style="background: #FFA26D; font-weight: bold; color: white;"><b>Generar reporte</b></button>
                        </div>
                        <div class="col-sm-3" style="margin-top: 3%;">
                            <button data-dismiss="modal" class="btn form-control" style="background: #FF6A6A; color: white;"><b>X</b></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="/js/funcionalidadModales.js"></script>