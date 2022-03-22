<div id="verModalReporte" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center; @if (!empty($detalleReporte->empleadoAtendiendo)) 'background: #FFEDE2;' @endif">
                <h4 data-dismiss="modal" class="modal-title"><b> {{ $detalleReporte->nombreCliente }} {{ $detalleReporte->apellidoPaterno }} {{ $detalleReporte->apellidoMaterno }} </b></h4>
                    @if (!empty($detalleReporte->empleadoAtendiendo))
                        <p style="color: #DC5700;">Atendiendo: 
                            <b> {{ $detalleReporte->empleadoAtendiendo }} </b>
                            <b>-</b> 
                            {{ $detalleReporte->fechaAtendiendo }}
                            <b style="color: black;">|</b>
                            {{ $detalleReporte->horaAtendiendo }}
                        </p>
                    @endif
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="controllers/actualizaciones.php?accion=reporte&id_reporte={{ $detalleReporte->folio }}" autocomplete="off" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Folio:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $detalleReporte->folio }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nombre:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $detalleReporte->nombreCliente }} {{ $detalleReporte->apellidoPaterno }} {{ $detalleReporte->apellidoMaterno }}" name="nombreCliente" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Tel&eacute;fono:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo telefono1($detalleReporte['telefono']);?>" onkeypress="return soloNumeros(event);" maxlength="10" name="telefono">
                        </div>
                    </div>
                    <?php
                        if (strlen($detalleReporte['telefono']) > 10) {
                            ?>
                                <div class="form-group tel2">
                                    <label class="control-label col-sm-3">Tel&eacute;fono 2:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo telefono2($detalleReporte['telefono']);?>" placeholder="<?php echo telefono2($detalleReporte['telefono']);?>" id="telefono23" onkeypress="return soloNumeros(event);" maxlength="10" name="telefono2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-9" style="float: right;">
                                        <input type="button" class="btn form-control" value="+" style="background: mediumaquamarine; color: white; font-weight: bold; display: none;" id="mas3">
                                        <input type="button" class="btn form-control" value="-" style="background: mediumaquamarine; color: white; font-weight: bold;" id="menos3">
                                    </div>
                                </div>
                            <?php
                        }else{
                            ?>
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
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Poblaci&oacute;n:</label>
                        <div class="col-sm-9">
                            <select name="id_poblacion" class="form-control poblacion" required style="background: #FFDFDF;" id="<?php echo $cont;?>">
                                <option value="<?php echo $detalleReporte['id_poblacionP'];?>" style="visibility: hidden; display: none;"><?php echo $detalleReporte['nombrePoblacion'];?></option>
                                <?php
                                    $sqlPoblaciones = "SELECT id, nombrePoblacion FROM catalogoPoblaciones ORDER BY nombrePoblacion ASC;";
                                    $respuestaPoblaciones = mysqli_query($conn, $sqlPoblaciones);

                                    while ($poblaciones = mysqli_fetch_array($respuestaPoblaciones)) {
                                        ?>
                                            <option value="<?php echo $poblaciones['id']?>"><?php echo $poblaciones['nombrePoblacion'];?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Coordenadas:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" style="background: #6DB3FF; color: white;" value="<?php echo $detalleReporte['coordenadas'];?>" placeholder="<?php echo $detalleReporte['coordenadas'];?>" onkeypress="return soloNumerosp(event);" name="coordenadas">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Direcci&oacute;n:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control" name="direccion" id="direccion" placeholder="Direcci&oacute;n"><?php echo $detalleReporte['direccion'];?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Referencias:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control" name="referencias" id="referencias" placeholder="Referencias"><?php echo $detalleReporte['referencias'];?></textarea>
                        </div>
                    </div>
                    <h6 align="center">
                        <b>Detalles del reporte</b>
                    </h6>
                    <hr>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Problema:</label>
                        <div class="col-sm-9">
                            <select name="id_problema" class="form-control tproblema" required style="background: #FFDFDF;" id="<?php echo $cont;?>">
                                <option value="<?php echo $detalleReporte['id_problemaP'];?>" style="visibility: hidden; display: none;"><?php echo $detalleReporte['problema'];?></option>
                                <option value="otroProblema">Otro...</option>
                                <?php
                                    $sqlProblemas = "SELECT id, problema FROM catalogoProblemas ORDER BY problema ASC;";
                                    $respuestaProblemas = mysqli_query($conn, $sqlProblemas);

                                    while ($problemas = mysqli_fetch_array($respuestaProblemas)) {
                                        ?>
                                            <option value="<?php echo $problemas['id']?>"><?php echo $problemas['problema'];?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <?php
                        if ($detalleReporte['otroProblema'] != "") {
                            ?>
                                <div class="form-group otroProblema1">
                                    <label class="control-label col-sm-3">Otro problema:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="otroProblema1" class="form-control" value="<?php echo $detalleReporte['otroProblema'];?>" placeholder="<?php echo $detalleReporte['otroProblema'];?>" name="otroProblema">
                                    </div>
                                </div>
                            <?php
                        }else{
                            ?>
                                <div class="form-group otroProblema1" style="display: none;">
                                    <label class="control-label col-sm-3">Otro problema:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="otroProblema1" class="form-control" placeholder="Otro Problema" name="otroProblema">
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Descripci&oacute;n del problema:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" name="descripcionProblema" class="form-control" placeholder="Descripci&oacute;n del problema"><?php echo $detalleReporte['descripcionProblema'];?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Observaciones:</label>
                        <div class="col-sm-9">
                            <textarea rows="1"class="form-control" name="observaciones" placeholder="Observaciones"><?php echo $detalleReporte['observaciones'];?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Diagnostico:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" name="diagnostico" class="form-control" placeholder="Diagn&oacute;stico"><?php echo $detalleReporte['diagnostico'];?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Soluci&oacute;n:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" name="solucion" class="form-control" placeholder="Soluci&oacute;n"><?php echo $detalleReporte['solucion'];?></textarea>
                        </div>
                    </div>

                    <h6 align="center">
                        <b>Registrado por 
                            <b style="color: #008FFF;">
                                <?php
                                    echo $detalleReporte['nombreRecibio']." ".$detalleReporte['aPaternoRecibio'];
                                ?>
                            </b>
                        </b>
                    </h6>
                    <hr>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Fecha:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo formatoFecha($detalleReporte['fechaRegistro']);?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Hora:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo formatoHora($detalleReporte['fechaRegistro']);?>" readonly>
                        </div>
                    </div>

                    <?php
                        if (!empty($detalleReporte['id_actualizo'])) {
                            ?>

                            <h6 align="center">
                                <b>Ultima actualizaci&oacute;n por 
                                    <b style="color: #008FFF;">
                                        <?php
                                            echo $detalleReporte['nombreActualizo']." ".$detalleReporte['aPaternoActualizo'];
                                        ?>
                                    </b>
                                </b>
                            </h6>
                            <hr>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Fecha:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?php echo formatoFecha($detalleReporte['fechaActualizacion']);?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Hora:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?php echo formatoHora($detalleReporte['fechaActualizacion']);?>" readonly>
                                </div>
                            </div>

                            <?php
                        }

                        if($detalleReporte['nombreEstado'] == 'atendido') {
                            ?>
                                <h6 align="center">
                                    <b>Realizada por 
                                        <b style="color: #008FFF;">
                                            <?php echo $detalleReporte['nombreAtendio']." ".$detalleReporte['aPaternoAtendio'];?>
                                        </b>
                                    </b>
                                </h6>
                                <hr>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Fecha:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo formatoFecha($detalleReporte['fechaAtencion']);?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Hora:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo formatoHora($detalleReporte['fechaAtencion']);?>" readonly>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                    
                    <div class="form-group" style="text-align: center;">
                        <?php
                            if ($detalleReporte['nombreEstado'] == 'atendido') {
                                ?>
                                    <div class="col-sm-5">
                                        <button class="btn form-control" style="margin-top: 15px; background: #FFA26D; font-weight: bold; color: white;">Actualizar</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="controllers/actualizaciones.php?accion=retomarr&id_reporte={{ $detalleReporte->folio }}">
                                            <input class="btn form-control" style="margin-top: 15px; background: mediumaquamarine; font-weight: bold; color: white;" value="Retomar">
                                        </a>
                                    </div>
                                    <div class="col-sm-3">
                                        <button data-dismiss="modal" class="btn form-control" style="margin-top: 15px; background: #FF6A6A; font-weight: bold; color: white;"><b>X</b></button>
                                    </div>
                                <?php
                            }else{
                                if ($detalleReporte['diagnostico'] != "" || $detalleReporte['solucion'] != "") {
                                    ?>
                                        <div class="col-sm-4">
                                            <button class="btn form-control" style="margin-top: 15px; background: #FFA26D; font-weight: bold; color: white;">Actualizar</button>
                                        </div>
                                                    
                                        <div class="col-sm-4">
                                            <a href="controllers/actualizaciones.php?accion=atender&id_reporte={{ $detalleReporte->folio }}" class="btn form-control" style="margin-top: 15px; background: mediumaquamarine; font-weight: bold; color: white;">Atender</a>
                                        </div>

                                        <?php
                                            if (empty($detalleReporte['id_atendiendo'])) {
                                                ?>
                                                    <div class="col-sm-2">
                                                        <a href="controllers/actualizaciones.php?accion=atendiendo&id_reporte={{ $detalleReporte->folio }}" class="btn btn-primary form-control" style="margin-top: 15px;"><img src="images/proceso.png" alt="" width="22px"></a>
                                                    </div>
                                                <?php
                                            }else{
                                                if ($detalleReporte['id_atendiendo'] == $_SESSION['usuario']['id']) {
                                                    ?>
                                                        <div class="col-sm-2">
                                                            <a href="controllers/actualizaciones.php?accion=desatender&id_reporte={{ $detalleReporte->folio }}" class="btn btn-danger form-control" style="margin-top: 15px;"><img src="images/proceso.png" alt="" width="22px"></a>
                                                        </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <div class="col-sm-2">
                                                            <a class="btn btn-danger form-control" style="margin-top: 15px;"><img src="images/proceso.png" alt="" width="22px"></a>
                                                        </div>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        <div class="col-sm-2">
                                            <button data-dismiss="modal" class="btn form-control" style="margin-top: 15px; background: #FF6A6A; font-weight: bold; color: white;"><b>X</b></button>
                                        </div>
                                    <?php
                                }else{
                                    ?>
                                        <div class="col-sm-8">
                                            <button class="btn form-control" style="margin-top: 15px; background: #FFA26D; font-weight: bold; color: white;">Actualizar</button>
                                        </div>
                                        <?php
                                            if (empty($detalleReporte['id_atendiendo'])) {
                                                ?>
                                                    <div class="col-sm-2">
                                                        <a href="controllers/actualizaciones.php?accion=atendiendo&id_reporte={{ $detalleReporte->folio }}" class="btn btn-primary form-control" style="margin-top: 15px;"><img src="images/proceso.png" alt="" width="22px"></a>
                                                    </div>
                                                <?php
                                            }else{
                                                if ($detalleReporte['id_atendiendo'] == $_SESSION['usuario']['id']) {
                                                    ?>
                                                        <div class="col-sm-2">
                                                            <a href="controllers/actualizaciones.php?accion=desatender&id_reporte={{ $detalleReporte->folio }}" class="btn btn-danger form-control" style="margin-top: 15px;"><img src="images/proceso.png" alt="" width="22px"></a>
                                                        </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <div class="col-sm-2">
                                                            <a class="btn btn-danger form-control" style="margin-top: 15px;"><img src="images/proceso.png" alt="" width="22px"></a>
                                                        </div>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        <div class="col-sm-2">
                                            <button data-dismiss="modal" class="btn form-control" style="margin-top: 15px; background: #FF6A6A; font-weight: bold; color: white;"><b>X</b></button>
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/funcionalidadModales.js"></script>