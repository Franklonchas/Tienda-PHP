var inicio = function () {
    $(".cantidad").keyup(function (e) {
        if ($(this).val() != '') {
            if (e.keyCode == 13) {
                var id = $(this).attr('data-id');
                var precio = $(this).attr('data-precio');
                var cantidad = $(this).val();
                var subtotal = (precio * cantidad);
                $(this).parent().parent().find('.subtotal').text(subtotal + '€');
                $.post('../modelo/js/modificarDatos.php', {
                    Id: id,
                    Precio: precio,
                    Cantidad: cantidad
                }, function (e) {
                    $("#total").text('Total: ' + e);
                });
            }
        }
    });
    $(".eliminar").click(function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        console.log($(this));
        $(this).parent().parent().remove();

        $.post('../modelo/js/modificarDatos.php', {
            Id: id,
            Precio: 0,
            Cantidad: 0
        }, function (e) {
            $("#total").text('Total: ' + e);
        });

        $.post('../modelo/js/eliminar.php', {
            Id: id
        }, function (a) {
            if (a == '0') {
                location.href = "../vista/carrito.php";
            }
        });

    });
}
$(document).on('ready', inicio);