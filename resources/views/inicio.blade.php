<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio</title>

    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="icon" type="image/png" href="images/icono.png" />

    <script src="js/validaciones.js"></script>
    <script src="js/tools.js"></script>

    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <script src="{{ asset('js/tools.js') }}"></script>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

        html, body, #container1, #container2, #container3, #container4 {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif !important;
            background: linear-gradient(315deg, #ffffff, #d7e1ec);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-inverse" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">Emenet Sistemas</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Inicio</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">Reportes <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li data-toggle="modal" data-target="#modalReporte"><a>Generar reporte</a></li>
                            <li><a href="#">Pendientes</a></li>
                            <li><a href="#">Atendidos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">Agregar <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li data-toggle="modal" data-target="#modalPoblacion"><a>Poblaci&oacute;n</a></li>
                            <li data-toggle="modal" data-target="#modalProblema"><a>Tipo problema</a></li>
                        </ul>
                    </li>
                    <!--li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">M&aacute;s <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="estadisticas.php">Estad&iacute;sticas</a></li>
                            <li><a href="generarReporte.php">Generar reporte</a></li>
                        </ul>
                    </li-->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li data-toggle="modal" data-target="#modalUsuario"><a><span class="glyphicon glyphicon-user"></span> &nbsp;Administrador</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="modalReporte" class="modal" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header" data-dismiss="modal" style="text-align: center;">
                    <h4 class="modal-title"><b>Generar reporte</b></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="" autocomplete="off" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Nombre:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Nombre" required  name="nombreCliente">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Tel&eacute;fono:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Tel&eacute;fono" required onkeypress="return soloNumeros(event);" maxlength="10" name="telefono">
                            </div>
                        </div>
                        <div class="form-group" style="visibility: hidden; display: none;" id="t">
                            <label class="control-label col-sm-3">Tel&eacute;fono 2:</label>
                            <div class="col-sm-9">
                                <input id="tel2" type="text" class="form-control" placeholder="Tel&eacute;fono 2" onkeypress="return soloNumeros(event);" maxlength="10" name="telefono2">
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
                                <select id="poblacion" name="id_poblacion" class="form-control" required style="background: #D5EDFF;">
                                    <option value="" style="visibility: hidden; display: none;">Seleccione una poblaci&oacute;n</option>
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
                                <textarea rows="1" name="direccion" class="form-control" id="direccion" placeholder="Direcci&oacute;n" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Referencias:</label>
                            <div class="col-sm-9">
                                <textarea rows="1" name="referencias" class="form-control" id="referencias" placeholder="Referencias"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Problema:</label>
                            <div class="col-sm-9">
                                <select id="tproblema" name="id_problema" class="form-control" required style="background: #D5EDFF;">
                                    <option value="" style="visibility: hidden; display: none;">Seleccione un problema</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group otroProblema" style="display: none;">
                            <label class="control-label col-sm-3">Otro problema:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="otroProblema" name="otroProblema" placeholder="Otro Problema">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Descripci&oacute;n del problema:</label>
                            <div class="col-sm-9">
                                <textarea rows="1" name="descripcionProblema" class="form-control" id="problema" placeholder="Descripci&oacute;n del problema"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Observaciones:</label>
                            <div class="col-sm-9">
                                <textarea rows="1" name="observaciones" class="form-control" id="observaciones" placeholder="Observaciones"></textarea>
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

    <div id="modalPoblacion" class="modal" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                
                <div class="modal-header" data-dismiss="modal" style="text-align: center;">
                    <h4 class="modal-title"><b style="color: #6C3483;">Registrar poblaci&oacute;n</b></h4>
                </div>
                
                <div class="modal-body">
                    <form class="form-horizontal" action="" method="get" autocomplete="off">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Nombre:</label>
                            <div class="col-sm-9">
                                <input id="nombrePoblacion" name="npoblacion" type="text" class="form-control" placeholder="Nombre poblaci&oacute;n" required >
                            </div>
                        </div>
                        <p style="text-align: center;"><b id="texto" style="color: red;">No disponible</b></p>
                        <div class="form-group">
                            <div class="col-sm-12" style="text-align:center; margin-top: 3%;">
                                <button class="btn" id="envio" style="background: #6C3483; display: none;"><b style="color:white;">Registrar poblaci&oacute;n</b></button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div id="modalProblema" class="modal" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header" data-dismiss="modal" style="text-align: center;">
                    <h4 class="modal-title"><b style="color: #6C3483;">Registrar problema</b></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="" autocomplete="off" method="get">
                        
                        <div class="form-group">
                            <label class="control-label col-sm-3">Descripci&oacute;n:</label>
                            <div class="col-sm-9">
                                <input id="nombreProblema" name="dproblema" type="text" class="form-control" placeholder="Descripci&oacute;n" required >
                            </div>
                        </div>
                        <p style="text-align: center;"><b id="texto1" style="color: red;">No disponible</b></p>
                        <div class="form-group">
                            <div class="col-sm-12" style="text-align:center; margin-top: 3%;">
                                <button class="btn" id="envio1" style="background: #6C3483; display: none;"><b style="color:white;">Registrar problema</b></button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <div id="modalUsuario" class="modal" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header" data-dismiss="modal" style="text-align: center;">
                    <h4 class="modal-title"><b>Administrador</b></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="" autocomplete="off" method="get">
                        
                        <div class="form-group">
                            <label class="control-label col-sm-3">Nombre:</label>
                            <div class="col-sm-9">
                                <input name="nombre" type="text" class="form-control" placeholder="Nombre" value="Admin" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Apellido Paterno:</label>
                            <div class="col-sm-9">
                                <input name="aPaterno" type="text" class="form-control" placeholder="Apellido Paterno" value="Prueba" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Apellido Materno:</label>
                            <div class="col-sm-9">
                                <input name="aMaterno" type="text" class="form-control" placeholder="Apellido Materno" >
                            </div>
                        </div>

                        <h6 align="center"><b style="color: gray;">Datos de la sesi&oacute;n</b></h6>
                        <hr>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Usuario:</label>
                            <div class="col-sm-9">
                                <input name="usuario" type="text" class="form-control" placeholder="Usuario" value="Admin" required>
                            </div>
                        </div>

                        <div class="form-group contrasenaac">
                            <label class="control-label col-sm-3">Contrase&ntilde;a Actual:</label>
                            <div class="col-sm-9">
                                <input id="contrasena" name="contrasena" type="password" class="form-control" placeholder="Contrase&ntilde;a Actual">
                            </div>
                        </div>

                        <!--div class="form-group contrasenan" style="display: none;">
                            <label class="control-label col-sm-3">Nueva Contrase&ntilde;a:</label>
                            <div class="col-sm-9">
                                <input id="contrasenan" name="contrasenan" type="password" class="form-control" placeholder="Nueva Contrase&ntilde;a">
                            </div>
                        </div-->

                        <!--div class="alert alert-warning" style="text-align: justify;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <p style="padding-right: 25px;">
                                <strong>Atenci&oacute;n!</strong> Para realizar alguna actualizaci&oacute;n de su informaci&oacute;n posteriormente se tendr&aacute; que loguear nuevamente para aplicar los cambios.
                            </p>
                        </div-->

                        <div class="form-group">
                            <div class="col-sm-12" style="text-align:center; margin-top: 3%;">
                                <button class="btn btn-primary"><b style="color:white;">Actualizar informaci&oacute;n</b></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <h2 align="center"><br><br><b style="color:mediumaquamarine;">Pendientes</b></h2>
        <div class="col-md-12">
            <hr>
            <h4 align="center"><b style="color:gray;">Reportes</b></h4>
            <hr>
            <div class="notifications">
                @for($i = 1; $i <=5; $i++)
                <div class="notifications__item verModalReporte" style="height: auto; padding-top: 15px; padding-bottom: 15px;" data-toggle='modal' data-target='#verModalReporte'>
                    
                    <div class="notifications__item__avatar">
                        <img src="images/reportes/{{$i}}.png" />
                    </div>

                    <div class="notifications__item__content">
                        <span class="notifications__item__title"><b>Nombre de prueba {{$i}}</b></span>
                        <span class="notifications__item__message"><b>Atarasquillo</b></span>
                        <span class="notifications__item__message">Falla</span>
                        <span class="notifications__item__message">10/02/2022</span>
                    </div>

                </div>
                @endfor
                <a href="#"><h4><b style="color: gray;">Ver m&aacute;s...</b></h4></a>
            </div>
        </div>
    </div>

    <script src="js/funcionalidadModales.js"></script>
</body>
</html>