$(document).ready(function(){
    $(".verModalReporte").click( function(){

        let id = $(this).attr("id");

        $.ajax({
            url:'/detalleReporte/'+id,
            type:'get',
            success:  function (detalleReporte) {
                console.log(detalleReporte);
                mapToForm(detalleReporte);
            },
            statusCode: {
               404: function() {
                  alert('web not found');
               }
            },
            error:function(x,xs,xt){
               window.open(JSON.stringify(x));
               //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
            }
         });
    });
    
    function mapToForm ( r ) {
        if ( r[0].empleadoAtendiendo != "" && r[0].empleadoAtendiendo != null ) {
            
            let html = '<p style="color: #DC5700;">Atendiendo:<b> '+r[0].empleadoAtendiendo+' - </b> '+r[0].fechaAtendiendo+' <b style="color: black;">|</b> '+r[0].horaAtendiendo;
            $(".colorFondoTitulo").append(html).css('background','#FFEDE2');
        }

        $(".tituloPrincipalModal").text(r[0].nombreCliente+' '+r[0].apellidoPaterno+' '+r[0].apellidoMaterno);

        if ( r[0].telefonoOpcional != "" && r[0].telefonoOpcional != null ) {
            $(".telefonoOcional").empty();
            let fragmento = `
            <div class="form-group tel2">
                <label class="control-label col-sm-3">Tel&eacute;fono 2:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control parametrotelefonoOpcional" id="telefono23" placeholder="`+r[0].telefonoOpcional+`" value="`+r[0].telefonoOpcional+`" onkeypress="return soloNumeros(event);" maxlength="10" name="telefonoOpcional">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9" style="float: right;">
                    <input type="button" class="btn form-control" value="+" style="background: mediumaquamarine; color: white; font-weight: bold; display: none;" id="mas3" onclick="mas()">
                    <input type="button" class="btn form-control" value="-" style="background: mediumaquamarine; color: white; font-weight: bold;" id="menos3" onclick="menos()">
                </div>
            </div>
            `;
            $(".telefonoOcional").html(fragmento);
        } else {
            $(".telefonoOcional").empty();
            let fragmento = `
            <div class="form-group tel2" style="visibility:hidden; display:none;">
                <label class="control-label col-sm-3">Tel&eacute;fono 2:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Tel&eacute;fono 2" id="telefono23" onkeypress="return soloNumeros(event);" maxlength="10" name="telefonoOpcional">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9" style="float: right;">
                    <input type="button" class="btn form-control" value="+" style="background: mediumaquamarine; color: white; font-weight: bold;" id="mas3" onclick="mas()">
                    <input type="button" class="btn form-control" value="-" style="background: mediumaquamarine; color: white; font-weight: bold; display: none;" id="menos3" onclick="menos()">
                </div>
            </div>
            `;
            $(".telefonoOcional").html(fragmento);
        }

        $(".poblacionParametro").val(r[0].PKCatPoblaciones).text(r[0].nombrePoblacion);
        $(".problemaParametro").val(r[0].PKCatProblemas).text(r[0].nombreProblema);

        let exepciones = [
            'direccion',
            'referencias',
            'descripcionProblema',
            'parametroobservaciones',
            'diagnostico',
            'solucion'
        ];

        Object.keys(r[0]).forEach(function(key) {
            $.inArray(key, exepciones) != -1 ? $(".parametro"+key).attr('placeholder', r[0][key]).text(r[0][key]) : $(".parametro"+key).attr('placeholder', r[0][key]).val(r[0][key]) ;
        })

        $(".empleadoRecibio").append(r[0].empleadoRecibio);
        
        if ( r[0].empleadoActualizo != "" && r[0].empleadoActualizo != null ) {
            $(".apartadoActualizo").show().css('visibility','visible');
            $(".empleadoActualizo").append(r[0].empleadoActualizo);
        } else {
            $(".apartadoActualizo").hide().css('visibility','hidden');
        }

        if ( r[0].empleadoRealizo != "" && r[0].empleadoRealizo != null ) {
            $(".apartadoAtendido").show().css('visibility','visible');
            $(".empleadoRealizo").append(r[0].empleadoRealizo);
        } else {
            $(".apartadoAtendido").hide().css('visibility','hidden');
        }

        let nombreEmpleadoSession = $('#nombreEmpleadoSession').val();
        
        $(".apartadoBotones").empty();
        if ( r[0].status == 'Atendido') {
            let insert = `
                <div class="col-sm-5">
                    <button class="btn form-control" style="margin-top: 15px; background: #FFA26D; font-weight: bold; color: white;">Actualizar</button>
                </div>
                <div class="col-sm-4">
                    <a href="controllers/actualizaciones.php?accion=retomarr&id_reporte=`+r[0].folio+`">
                        <input class="btn form-control" style="margin-top: 15px; background: mediumaquamarine; font-weight: bold; color: white;" value="Retomar">
                    </a>
                </div>
                <div class="col-sm-3">
                    <button data-dismiss="modal" class="btn form-control" style="margin-top: 15px; background: #FF6A6A; font-weight: bold; color: white;"><b>X</b></button>
                </div>
            `;
            $(".apartadoBotones").append(insert);
        } else if ( r[0].diagnostico != "" && r[0].diagnostico != null && r[0].solucion != "" && r[0].solucion != null ) {
            insert = `
                <div class="col-sm-4">
                    <button class="btn form-control" style="margin-top: 15px; background: #FFA26D; font-weight: bold; color: white;">Actualizar</button>
                </div>
                            
                <div class="col-sm-4">
                    <a href="controllers/actualizaciones.php?accion=atender&id_reporte=`+r[0].folio+`" class="btn form-control" style="margin-top: 15px; background: mediumaquamarine; font-weight: bold; color: white;">Atender</a>
                </div>
            `;
            $(".apartadoBotones").append(insert);
            if ( r[0].empleadoAtendiendo == "" || r[0].empleadoAtendiendo == null ) {
                insert = `
                    <div class="col-sm-2">
                        <a href="controllers/actualizaciones.php?accion=atendiendo&id_reporte=`+r[0].folio+`" class="btn btn-primary form-control" style="margin-top: 15px;"><img src="/images/proceso.png" alt="" width="22px"></a>
                    </div>
                `;
                $(".apartadoBotones").append(insert);
            } else if ( r[0].empleadoAtendiendo == nombreEmpleadoSession ) {
                insert = `
                    <div class="col-sm-2">
                        <a href="controllers/actualizaciones.php?accion=desatender&id_reporte=`+r[0].folio+`" class="btn btn-danger form-control" style="margin-top: 15px;"><img src="/images/proceso.png" alt="" width="22px"></a>
                    </div>
                `;
                $(".apartadoBotones").append(insert);
            } else {
                insert = `
                    <div class="col-sm-2">
                        <a class="btn btn-danger form-control" style="margin-top: 15px;"><img src="/images/proceso.png" alt="" width="22px"></a>
                    </div>
                `;
                $(".apartadoBotones").append(insert);
            }
            insert = `
                <div class="col-sm-2">
                    <button data-dismiss="modal" class="btn form-control" style="margin-top: 15px; background: #FF6A6A; font-weight: bold; color: white;"><b>X</b></button>
                </div>
            `;
            $(".apartadoBotones").append(insert);
        } else {
            insert = `
                <div class="col-sm-8">
                    <button class="btn form-control" style="margin-top: 15px; background: #FFA26D; font-weight: bold; color: white;">Actualizar</button>
                </div>
            `;
            $(".apartadoBotones").append(insert);
            if ( r[0].empleadoAtendiendo == "" || r[0].empleadoAtendiendo == null ) {
                insert = `
                    <div class="col-sm-2">
                        <a href="controllers/actualizaciones.php?accion=atendiendo&id_reporte=`+r[0].folio+`" class="btn btn-primary form-control" style="margin-top: 15px;"><img src="/images/proceso.png" alt="" width="22px"></a>
                    </div>
                `;
                $(".apartadoBotones").append(insert);
            } else if ( r[0].empleadoAtendiendo == nombreEmpleadoSession ) {
                insert = `
                    <div class="col-sm-2">
                        <a href="controllers/actualizaciones.php?accion=desatender&id_reporte=`+r[0].folio+`" class="btn btn-danger form-control" style="margin-top: 15px;"><img src="/images/proceso.png" alt="" width="22px"></a>
                    </div>
                `;
                $(".apartadoBotones").append(insert);
            } else {
                insert = `
                    <div class="col-sm-2">
                        <a class="btn btn-danger form-control" style="margin-top: 15px;"><img src="/images/proceso.png" alt="" width="22px"></a>
                    </div>
                `;
                $(".apartadoBotones").append(insert);
            }
            insert = `
                <div class="col-sm-2">
                    <button data-dismiss="modal" class="btn form-control" style="margin-top: 15px; background: #FF6A6A; font-weight: bold; color: white;"><b>X</b></button>
                </div>
            `;
            $(".apartadoBotones").append(insert);
        }
    }

    $(".verModalInstalacion").click( function(){
        $(".seccionModalInstalacion").empty();
        
        var id = $(this).attr('id');

        $.ajax({
            url: 'layouts/modalConsultaInstalacion.php',
            type: 'POST',
            dataType: 'html',
            data: {id_instalacion: id},
        })
        .done(function(resultado){
            $(".seccionModalInstalacion").html(resultado);
        })
    });

    var properties = ["cliente", "qwe", "ert", "bnm", "clas"];

    $.each(properties, function (i, val) {
        var orderClass = "";

        $("#" + val).click(function (e) {
            e.preventDefault();
            $(".filter__link.filter__link--active")
                .not(this)
                .removeClass("filter__link--active");
            $(this).toggleClass("filter__link--active");
            $(".filter__link").removeClass("asc desc");

            if (orderClass == "desc" || orderClass == "") {
                $(this).addClass("asc");
                orderClass = "asc";
            } else {
                $(this).addClass("desc");
                orderClass = "desc";
            }

            var parent = $(this).closest(".header__item");
            var index = $(".header__item").index(parent);
            var $table = $(".table-content");
            var rows = $table.find(".table-row").get();
            var isSelected = $(this).hasClass("filter__link--active");
            var isNumber = $(this).hasClass("filter__link--number");

            rows.sort(function (a, b) {
                var x = $(a).find(".table-data").eq(index).text();
                var y = $(b).find(".table-data").eq(index).text();

                if (isNumber == true) {
                    if (isSelected) {
                        return x - y;
                    } else {
                        return y - x;
                    }
                } else {
                    if (isSelected) {
                        if (x < y) return -1;
                        if (x > y) return 1;
                        return 0;
                    } else {
                        if (x > y) return -1;
                        if (x < y) return 1;
                        return 0;
                    }
                }
            });

            $.each(rows, function (index, row) {
                $table.append(row);
            });

            return false;
        });
    });



    var contadorAfk = 1;

    //Cada minuto se lanza la funci��n ctrlTiempo
    var contadorAfk = setInterval(ctrlTiempo, 60000); 

    //Si el usuario mueve el rat��n cambiamos la variable a 0.
    $(this).mousemove(function (e) {
        contadorAfk = 0;
    });
    //Si el usuario presiona alguna tecla cambiamos la variable a 0.
    $(this).keypress(function (e) {
        contadorAfk = 0;
    });
    $("#contrasena").keyup(function(){
        var contrasenaac  = $(this).val();
        var contrasenaac1 = "<?php echo $usuario['contrasena'];?>";
        if (contrasenaac == contrasenaac1) {
            $(".contrasenan").show();
            $("#contrasenan").attr('required','required');
            $(".contrasenaac").hide();
        }
    });

    function ctrlTiempo() {
        //Se aumenta en 1 la variable.
        contadorAfk++;
        //Se comprueba si ha pasado del tiempo que designemos.
        if (contadorAfk > 20) { // M��s de 59 minutos, lo detectamos como ausente o inactivo.
            var r = confirm("�0�7Desea continuar en esta sesion?");
            if (r == false) {
                window.location.assign('controllers/logout.php');
            }else{
                contadorAfk = 0;
            }
        }
    }
});

function mas() {
    $(".tel2").show().css('visibility', 'visible');
    $("#mas3").hide();
    $("#menos3").show();
}

function menos() {
    $(".tel2").hide().css('visibility', 'hidden');
    $("#telefono23").val('');
    $("#mas3").show();
    $("#menos3").hide();
}