<div id="verModalReporte" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center; @if (!empty($detalleReporte[0]->empleadoAtendiendo)) 'background: #FFEDE2;' @endif">
                <h4 data-dismiss="modal" class="modal-title"><b> {{ $detalleReporte[0]->nombreCliente }} {{ $detalleReporte[0]->apellidoPaterno }} {{ $detalleReporte[0]->apellidoMaterno }} </b></h4>
                    @if (!empty($detalleReporte[0]->empleadoAtendiendo))
                        <p style="color: #DC5700;">Atendiendo: 
                            <b> {{ $detalleReporte[0]->empleadoAtendiendo }} </b>
                            <b>-</b> 
                            {{ $detalleReporte[0]->fechaAtendiendo }}
                            <b style="color: black;">|</b>
                            {{ $detalleReporte[0]->horaAtendiendo }}
                        </p>
                    @endif
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="controllers/actualizaciones.php?accion=reporte&id_reporte={{ $detalleReporte[0]->folio }}" autocomplete="off" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Folio:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $detalleReporte[0]->folio }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nombre:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $detalleReporte[0]->nombreCliente }} {{ $detalleReporte[0]->apellidoPaterno }} {{ $detalleReporte[0]->apellidoMaterno }}" name="nombreCliente" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Tel&eacute;fono:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $detalleReporte[0]->telefono }}" onkeypress="return soloNumeros(event);" maxlength="10" name="telefono">
                        </div>
                    </div>
                        @if ( !empty($detalleReporte[0]->telefonoOpcional) )
                            <div class="form-group tel2">
                                <label class="control-label col-sm-3">Tel&eacute;fono 2:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $detalleReporte[0]->telefonoOpcional }}" placeholder="{{ $detalleReporte[0]->telefonoOpcional }}" id="telefono23" onkeypress="return soloNumeros(event);" maxlength="10" name="telefono2">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9" style="float: right;">
                                    <input type="button" class="btn form-control" value="+" style="background: mediumaquamarine; color: white; font-weight: bold; display: none;" id="mas3">
                                    <input type="button" class="btn form-control" value="-" style="background: mediumaquamarine; color: white; font-weight: bold;" id="menos3">
                                </div>
                            </div>
                        @else
                            <div class="form-group tel2" style="visibility:hidden; display:none;">
                                <label class="control-label col-sm-3">Tel&eacute;fono 2:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Tel&eacute;fono 2" id="telefono23" onkeypress="return soloNumeros(event);" maxlength="10" name="telefono2">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9" style="float: right;">
                                    <input type="button" class="btn form-control" value="+" style="background: mediumaquamarine; color: white; font-weight: bold;" id="mas3">
                                    <input type="button" class="btn form-control" value="-" style="background: mediumaquamarine; color: white; font-weight: bold; display: none;" id="menos3">
                                </div>
                            </div>
                        @endif    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Poblaci&oacute;n:</label>
                        <div class="col-sm-9">
                            <!-- ver el porque de la variable cont-->
                            <!--select name="id_poblacion" class="form-control poblacion" required style="background: #FFDFDF;" id="<?php //echo $cont;?>"-->
                            <select name="id_poblacion" class="form-control poblacion" required style="background: #FFDFDF;">
                                <option value="{{ $detalleReporte[0]->PKCatPoblaciones }}" style="visibility: hidden; display: none;">{{ $detalleReporte[0]->nombrePoblacion}}</option>
                                @foreach($poblaciones as $poblacion)
                                    <option value="{{$poblacion->PKCatPoblaciones}}">{{$poblacion->nombrePoblacion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Coordenadas:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" style="background: #6DB3FF; color: white;" value="{{ $detalleReporte[0]->coordenadas }}" placeholder="{{ $detalleReporte[0]->coordenadas }}" onkeypress="return soloNumerosp(event);" name="coordenadas">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Direcci&oacute;n:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control" name="direccion" id="direccion" placeholder="Direcci&oacute;n">{{ $detalleReporte[0]->direccion }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Referencias:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control" name="referencias" id="referencias" placeholder="Referencias">{{ $detalleReporte[0]->referencias }}</textarea>
                        </div>
                    </div>
                    <h6 align="center">
                        <b>Detalles del reporte</b>
                    </h6>
                    <hr>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Problema:</label>
                        <div class="col-sm-9">
                            <!-- ver el porque de la variable cont-->
                            <!--select name="id_problema" class="form-control tproblema" required style="background: #FFDFDF;" id="<?php //echo $cont;?>"-->
                            <select name="id_problema" class="form-control tproblema" required style="background: #FFDFDF;">
                                <option value="{{ $detalleReporte[0]->PKCatProblemas }}" style="visibility: hidden; display: none;">{{ $detalleReporte[0]->nombreProblema }}</option>
                                @foreach($problemas as $problema)
                                    <option value="{{ $problema->PKCatProblemas }}">{{ $problema->nombreProblema }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Descripci&oacute;n del problema:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" name="descripcionProblema" class="form-control" placeholder="Descripci&oacute;n del problema">{{ $detalleReporte[0]->descripcionProblema }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Observaciones:</label>
                        <div class="col-sm-9">
                            <textarea rows="1"class="form-control" name="observaciones" placeholder="Observaciones">{{ $detalleReporte[0]->observaciones }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Diagnostico:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" name="diagnostico" class="form-control" placeholder="Diagn&oacute;stico">{{ $detalleReporte[0]->diagnostico }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Soluci&oacute;n:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" name="solucion" class="form-control" placeholder="Soluci&oacute;n">{{ $detalleReporte[0]->solucion }}</textarea>
                        </div>
                    </div>

                    <h6 align="center">
                        <b>Registrado por 
                            <b style="color: #008FFF;">
                                {{ $detalleReporte[0]->empleadoRecibio }}
                            </b>
                        </b>
                    </h6>
                    <hr>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Fecha:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $detalleReporte[0]->fechaAlta }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Hora:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $detalleReporte[0]->horaAlta }}" readonly>
                        </div>
                    </div>

                    @if (!empty($detalleReporte[0]->empleadoActualizo))
                        <h6 align="center">
                            <b>Ultima actualizaci&oacute;n por 
                                <b style="color: #008FFF;">
                                    {{ $detalleReporte[0]->empleadoActualizo }}
                                </b>
                            </b>
                        </h6>
                        <hr>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Fecha:</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $detalleReporte[0]->fechaActualizacion }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Hora:</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $detalleReporte[0]->horaActualizacion }}" readonly>
                            </div>
                        </div>
                    @endif

                    @if ( $detalleReporte[0]->status == 'Atendido')
                        <h6 align="center">
                            <b>Realizada por 
                                <b style="color: #008FFF;">
                                    {{ $detalleReporte[0]->empleadoRealizo }}
                                </b>
                            </b>
                        </h6>
                        <hr>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Fecha:</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $detalleReporte[0]->fechaAtencion }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Hora:</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $detalleReporte[0]->horaAtencion }}" readonly>
                            </div>
                        </div>
                    @endif
                    
                    <div class="form-group" style="text-align: center;">
                            @if ( $detalleReporte[0]->status == 'Atendido')
                                <div class="col-sm-5">
                                    <button class="btn form-control" style="margin-top: 15px; background: #FFA26D; font-weight: bold; color: white;">Actualizar</button>
                                </div>
                                <div class="col-sm-4">
                                    <a href="controllers/actualizaciones.php?accion=retomarr&id_reporte={{ $detalleReporte[0]->folio }}">
                                        <input class="btn form-control" style="margin-top: 15px; background: mediumaquamarine; font-weight: bold; color: white;" value="Retomar">
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <button data-dismiss="modal" class="btn form-control" style="margin-top: 15px; background: #FF6A6A; font-weight: bold; color: white;"><b>X</b></button>
                                </div>
                            @elseif ( !empty($detalleReporte[0]->diagnostico) || !empty($detalleReporte[0]->solucion) )
                                <div class="col-sm-4">
                                    <button class="btn form-control" style="margin-top: 15px; background: #FFA26D; font-weight: bold; color: white;">Actualizar</button>
                                </div>
                                            
                                <div class="col-sm-4">
                                    <a href="controllers/actualizaciones.php?accion=atender&id_reporte={{ $detalleReporte[0]->folio }}" class="btn form-control" style="margin-top: 15px; background: mediumaquamarine; font-weight: bold; color: white;">Atender</a>
                                </div>

                                @if ( empty($detalleReporte[0]->empleadoAtendiendo) )
                                    <div class="col-sm-2">
                                        <a href="controllers/actualizaciones.php?accion=atendiendo&id_reporte={{ $detalleReporte[0]->folio }}" class="btn btn-primary form-control" style="margin-top: 15px;"><img src="images/proceso.png" alt="" width="22px"></a>
                                    </div>
                                @elseif ( $detalleReporte['empleadoAtendiendo'] == session('usuario')[0]->{'nombreEmpleado'} )
                                    <div class="col-sm-2">
                                        <a href="controllers/actualizaciones.php?accion=desatender&id_reporte={{ $detalleReporte[0]->folio }}" class="btn btn-danger form-control" style="margin-top: 15px;"><img src="images/proceso.png" alt="" width="22px"></a>
                                    </div>
                                @else
                                    <div class="col-sm-2">
                                        <a class="btn btn-danger form-control" style="margin-top: 15px;"><img src="images/proceso.png" alt="" width="22px"></a>
                                    </div>
                                @endif

                                <div class="col-sm-2">
                                    <button data-dismiss="modal" class="btn form-control" style="margin-top: 15px; background: #FF6A6A; font-weight: bold; color: white;"><b>X</b></button>
                                </div>
                            @else
                                <div class="col-sm-8">
                                    <button class="btn form-control" style="margin-top: 15px; background: #FFA26D; font-weight: bold; color: white;">Actualizar</button>
                                </div>
                                    @if ( empty($detalleReporte[0]->empleadoAtendiendo) )
                                        <div class="col-sm-2">
                                            <a href="controllers/actualizaciones.php?accion=atendiendo&id_reporte={{ $detalleReporte[0]->folio }}" class="btn btn-primary form-control" style="margin-top: 15px;"><img src="images/proceso.png" alt="" width="22px"></a>
                                        </div>
                                    @elseif ( $detalleReporte['empleadoAtendiendo'] == session('usuario')[0]->{'nombreEmpleado'} )
                                        <div class="col-sm-2">
                                            <a href="controllers/actualizaciones.php?accion=desatender&id_reporte={{ $detalleReporte[0]->folio }}" class="btn btn-danger form-control" style="margin-top: 15px;"><img src="images/proceso.png" alt="" width="22px"></a>
                                        </div>
                                    @else
                                        <div class="col-sm-2">
                                            <a class="btn btn-danger form-control" style="margin-top: 15px;"><img src="images/proceso.png" alt="" width="22px"></a>
                                        </div>
                                    @endif
                                <div class="col-sm-2">
                                    <button data-dismiss="modal" class="btn form-control" style="margin-top: 15px; background: #FF6A6A; font-weight: bold; color: white;"><b>X</b></button>
                                </div>
                            @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/funcionalidadModales.js"></script>