$(document).ready(function(){
    $(".verModalReporte").click( function(){
        $(".seccionModalReporte").empty();

        var id = $(this).attr('id');

        $.ajax({
            url: 'layouts/modalConsultaReporte.php',
            type: 'POST',
            dataType: 'html',
            data: {id_reporte: id},
        })
        .done(function(resultado){
            $(".seccionModalReporte").html(resultado);
        })
    });

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

    //Cada minuto se lanza la función ctrlTiempo
    var contadorAfk = setInterval(ctrlTiempo, 60000); 

    //Si el usuario mueve el ratón cambiamos la variable a 0.
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
        if (contadorAfk > 20) { // Más de 59 minutos, lo detectamos como ausente o inactivo.
            var r = confirm("¿Desea continuar en esta sesion?");
            if (r == false) {
                window.location.assign('controllers/logout.php');
            }else{
                contadorAfk = 0;
            }
        }
    }
});