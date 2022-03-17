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
                <li data-toggle="modal" data-target="#modalUsuario"><a><span class="glyphicon glyphicon-user"></span> &nbsp;{{ session('usuario')[0]->{'nombreEmpleado'} }} {{ session('usuario')[0]->{'apellidoPaterno'} }}</a></li>
                <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modales para la barra de navegación-->
@include('layouts/modalReporte')
@include('layouts/modalPoblacion')
@include('layouts/modalProblema')
@include('layouts/modalUsuario')