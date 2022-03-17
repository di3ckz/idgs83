<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio</title>

    @include('layouts/cabeceraGeneral')
</head>
<body>

    @include('layouts/navbarPrincipal')

    <div class="col-md-12">
        <table class="table" style="margin-top:30px; text-align: center;" id="mytable">
            <thead class="table-header" style="background:gray;">
                <tr>
                    <th class="header__item" style="text-align: center;"><a style="color: white;" id="bnm" class="filter__link filter__link--number" href="#">Folio</a></th>
                    <th class="header__item" style="text-align: center;"><a style="color: white;" id="cliente" class="filter__link" href="#">Cliente</a></th>
                    <th style="text-align: center;"><a style="color: white;">Tel&eacute;fono</a></th>
                    <th class="header__item" style="text-align: center;"><a style="color: white;" id="qwe" class="filter__link" href="#">Problema</a></th>
                    <th style="text-align: center;"><a style="color: white;">Fecha</a></th>
                    <th class="header__item" style="text-align: center;"><a style="color: white;" id="ert" class="filter__link" href="#">Poblaci&oacute;n</a></th>
                    <th style="text-align: center;"><a style="color: white;">Maps</a></th>
                    @if ( $status == 'Pendiente')
                        <th style="text-align: center;"><a style="color: white;">Atender</a></th>
                    @else
                        <th style="text-align: center;"><a style="color: white;">Retomar</a></th>
                    @endif
                </tr>
            </thead>
            <tbody class="table-content">

                @foreach ($reportes as $item)
                
                    @if ( !empty($item->empleadoRealizo) )
                        {{ $titulo = "style='background:#ECFFE1;'"; }}
                    @elseif ( !empty($item->diagnostico) || !empty($item->solucion) )
                        {{ $titulo = "style='background:#E1F5FF;'"; }}
                    @elseif ( !empty($item->empleadoAtendiendo) )
                        {{ $titulo = "style='background:#FFEDE2;'"; }}
                    @else
                        {{$titulo = "";}}
                    @endif
                    
                        <tr class="table-row" {{$titulo}}>
                            <td class="table-data verModalReporte" data-toggle='modal' data-target='#verModalReporte' id="{{ $item->folio }}">
                                {{ $item->folio }}
                            </td>
                            <td class="table-data verModalReporte" data-toggle='modal' data-target='#verModalReporte' id="{{ $item->folio }}">
                                {{ $item->nombreCliente }}
                            </td>
                            <td class="table-data">
                                <a href="tel:{{ $item->telefono }}">
                                    <div style="height: 100%; width: 100%;">
                                        <b style="color: #00809C;">{{ $item->telefono }}</b>
                                    </div>
                                </a>
                            </td>
                            <td class="table-data verModalReporte" data-toggle='modal' data-target='#verModalReporte' id="{{ $item->folio }}">
                                {{ $item->nombreProblema }}
                            </td>
                            <td class="table-data verModalReporte" data-toggle='modal' data-target='#verModalReporte' id="{{ $item->folio }}">
                                {{ $item->fechaAlta }}
                            </td>
                            <td class="table-data verModalReporte" data-toggle='modal' data-target='#verModalReporte' id="{{ $item->folio }}">
                                {{ $item->nombrePoblacion }}
                            </td>

                            @if ( !empty($item->coordenadas) )
                                <td class="table-data verModalReporte"><b></b>
                                    <a target="_blank" href="https://www.google.es/maps?q={{ $item->coordenadas }}">
                                        <div style="width: 100%; height: 100%;">
                                            <img src="images/maps.png" alt="" width="22px">
                                        </div>
                                    </a>
                                </td>
                            @else
                                <td class="table-data verModalReporte" data-toggle='modal' data-target='#verModalReporte' id="{{ $item->folio }}">
                                    <img src="images/sinmaps.png" alt="" width="22px">
                                </td>
                            @endif

                            @if ( !empty($item->empleadoRealizo) )
                                <td style="text-align: center;">
                                    <a href="controllers/actualizaciones.php?accion=retomarr&id_reporte={{ $item->folio }}">
                                        <div style="width: 100%; height: 100%;">
                                            <img src="images/retomar.png" alt="" width="22px">
                                        </div>
                                    </a>
                                </td>
                            @elseif ( !empty($item->diagnostico) || !empty($item->solucion) )
                                <td class="table-data verModalReporte">                
                                    <a href="controllers/actualizaciones.php?accion=atender&id_reporte={{ $item->folio }}">
                                        <div style="width: 100%; height: 100%;">
                                            <img src="images/atender.png" alt="" width="22px">
                                        </div>
                                    </a>
                                </td>
                            @else
                                <td class="table-data verModalReporte">
                                    <img src="images/incompleto.png" alt="" width="22px">
                                </td>
                            @endif

                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>

    <script src="js/funcionalidadModales.js"></script>
</body>
</html>