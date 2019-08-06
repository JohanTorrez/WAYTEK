$(document).ready(function () {
    //escondemos los formularios antes de verificar
    $('.form-partes').hide();
    $('.form-accesorio').hide();
    //tipo de producto
    $('#tipo_producto').change(function () {
        var tipo = $(this).val();
        switch (tipo) {
            case 'accesorio':
                $('.form-accesorio').show(500);
                $('.form-partes').hide(500);
                $('#tipo').removeClass('col-6');
                $('#tipo').addClass('col-12');
                $('#marca').hide(500);
                break;
            case 'presupuesto':
            case 'pc escritorio':
                $('.form-partes').show(500);
                $('.form-accesorio').hide(500);
                $('#tipo').removeClass('col-6');
                $('#tipo').addClass('col-12');
                $('#marca').hide(500);
                break;

            default:
                $('.form-partes').show(500);
                $('.form-accesorio').hide(500);
                $('#tipo').removeClass('col-12');
                $('#tipo').addClass('col-6');
                $('#marca').show(500);
                break;
        }
    })

    //esconder todos los formulario antes verificar
    $('.form-procesador').hide();
    $('.form-almacenamiento').hide();
    $('.form-ram').hide();
    $('.form-tarjeta_video').hide();
    //tipo de componente
    $('#tipo_componente').change(function () {
        var tipo_componente = $(this).val();
        switch (tipo_componente) {
            case 'procesador':
                $('.form-procesador').show(500);
                $('.form-almacenamiento').hide(500);
                $('.form-ram').hide(500);
                $('.form-tarjeta_video').hide(500);
                break;

            case 'almacenamiento':
                $('.form-procesador').hide(500);
                $('.form-almacenamiento').show(500);
                $('.form-ram').hide(500);
                $('.form-tarjeta_video').hide(500);
                break;

            case 'ram':
                $('.form-procesador').hide(500);
                $('.form-almacenamiento').hide(500);
                $('.form-ram').show(500);
                $('.form-tarjeta_video').hide(500);
                break;

            default:
                    $('.form-procesador').hide(500);
                    $('.form-almacenamiento').hide(500);
                    $('.form-ram').hide(500);
                    $('.form-tarjeta_video').show(500);
                break;
        }

    })
});