<div class="col-sm-10">
    <div class="form-group">
        <label>Buscar en Roles</label>
        <input id="search" type="text" class="form-control" placeholder="Buscar en Roles" maxlength="30">
    </div>
</div>
<div class="col-sm-2">
    <div class="form-group">
        <label>Reporte</label>
        <a href="javascript:void(0);"><button class="btn btn-info form-control"><img src="/images/reporte.png" alt="" width="22px"></button></a>
    </div>
</div>

<table class="table" style="margin-top:30px; text-align: center;" id="mytable">
    <thead class="table-header" style="background:gray;">
        <tr>
            <th class="header__item" style="text-align: center;"><a style="color: white;" id="bnm" class="filter__link filter__link--number" href="javascript:void(0);">Folio</a></th>
            <th class="header__item" style="text-align: center;"><a style="color: white;" id="cliente" class="filter__link" href="javascript:void(0);">Nombre Rol</a></th>
            <th class="header__item" style="text-align: center;"><a style="color: white;" id="qwe" class="filter__link" href="javascript:void(0);">Descripción Rol</a></th>
            <th style="text-align: center;"><a style="color: white;">Fecha</a></th>
            <th style="text-align: center;"><a style="color: white;">Opciones</a></th>
        </tr>
    </thead>
    <tbody class="table-content">

        @foreach ($roles as $item)

            <tr class="table-row">
                <td class="table-data verModalRol" data-toggle='modal' data-target='#verModalRol' id="{{ $item->folio }}">
                    {{ $item->PKCatRoles }}
                </td>
                <td class="table-data verModalRol" data-toggle='modal' data-target='#verModalRol' id="{{ $item->folio }}">
                    {{ $item->nombreRol }}
                </td>
                <td class="table-data verModalRol" data-toggle='modal' data-target='#verModalRol' id="{{ $item->folio }}">
                    {{ $item->descripcionRol }}
                </td>
                <td class="table-data verModalRol" data-toggle='modal' data-target='#verModalRol' id="{{ $item->folio }}">
                    {{ $item->fechaAlta }}
                </td>

                @if ( $item->Activo != 1)
                    <td class="table-data verModalRol">
                        <a href="javascript:void(0);">
                            <button class="btn btn-info"><b>Activar</b></button>
                        </a>
                    </td>
                @else
                    <td class="table-data verModalRol">
                        <a href="javascript:void(0);">
                            <button class="btn btn-danger"><b>Inactivar</b></button>
                        </a>
                    </td>
                @endif

            </tr>
        @endforeach
    </tbody>
</table>