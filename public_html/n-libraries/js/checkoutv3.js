function logCheckoutError(tipo, detalle, datos) {
    try {
        $.ajax({
            url: '/n-libraries/logCheckoutError.php',
            type: 'POST',
            data: JSON.stringify({
                tipo: tipo,
                detalle: detalle,
                curso: datos && datos.curso ? datos.curso : '',
                email: datos && datos.email ? datos.email : '',
                url: window.location.href,
                userAgent: navigator.userAgent,
                timestamp: new Date().toISOString()
            }),
            contentType: 'application/json',
            timeout: 3000
        });
    } catch (e) {}
}

var errorValidEmail = false;
var email = jQuery('#email');
var hint = jQuery("#hint");

email.on('blur', function () {
    hint.css('display', 'none').empty(); // hide hint initially
    error = false;
    jQuery(this).mailcheck({
        suggested: function (element, suggestion) {
            if (!hint.html()) {
                // misspell - display hint element
                var suggestion = "Quisiste decir <span class='suggestion'>" +
                        "<span class='address'>" + suggestion.address + "</span>"
                        + "@<a href='#' class='domain'>" + suggestion.domain +
                        "</a></span>?";

                email.addClass("error");
                errorValidEmail = true;
                hint.html(suggestion).fadeIn(150);
            } else {
                // Subsequent errors
                jQuery(".address").html(suggestion.address);
                jQuery(".domain").html(suggestion.domain);
                email.addClass("error");
                errorValidEmail = true;
            }
        }
    });
});

hint.on('click', '.domain', function () {
    // Display with the suggestion and remove the hint
    email.val(jQuery(".suggestion").text());
    hint.fadeOut(200, function () {
        jQuery(this).empty();
        email.removeClass("error");
        errorValidEmail = false;
    });
    return false;
});


//jQuery.extend(jQuery.validator.messages, {
//    required: "Campo requerido.",
//    email: "Ingrese Email válido."
//});

$(document).ready(function () {
    $('#spinnerloading').hide();
    $('#proceder_pago').click(function (event) {
        event.preventDefault();
        //fbq('track', 'InitiateCheckout');

        var error = false;
        var wizard = $("#procederPagoForm");

        if (!wizard.validate({errorPlacement: function (error, element) {

            }}).element("#nombre")) {
            error = true;
        }

        if (!wizard.validate({errorPlacement: function (error, element) {}}).element("#apellido")) {
            error = true;
        }


        if (!wizard.validate({errorPlacement: function (error, element) {}}).element("#celular")) {
            error = true;
        }

        if (email.val() == '')
        {
            error = true;
            email.removeClass("valid");
            email.addClass("error");
        } else
        {
            email.removeClass("error");
            email.addClass("valid");
        }


        if (errorValidEmail == false)
        {
            if (email.val() == '')
            {
                error = true;
                email.removeClass("valid");
                email.addClass("error");
            } else
            {
                email.removeClass("error");
                email.addClass("valid");
            }
        }

        if (error == false && errorValidEmail == false && email.val() != '')
        {
            $('#spinnerloading').show();
            $('#proceder_pago').hide();
            str = '';
            var checkoutData = {
                nombre: $('#nombre').val(),
                apellido: $('#apellido').val(),
                celular: $('#celular').val(),
                email: $('#email').val(),
                curso: $('#curso').val(),
                dir: $('#dir').val(),
                pack: $('#pack').val(),
                descuento: $('#descuento').val(),
                moneda: $('#moneda').val() || 'ARS',
                country: $('#country').val() || 'AR'
            };
            $.ajax(
                    {
                        url: "/n-libraries/realizarVenta.php",
                        type: "get",
                        data: checkoutData,
                        success: function (response) {
                            if (response.indexOf('error:') === 0) {
                                $('#spinnerloading').hide();
                                $('#proceder_pago').show();
                                logCheckoutError('realizarVenta_response', response, checkoutData);
                                alert('Hubo un problema al procesar tu solicitud. Por favor intentá de nuevo o contactanos por WhatsApp.');
                                return;
                            }
                            window.location.href = response;
                        },
                        error: function (xhr) {
                            $('#spinnerloading').hide();
                            $('#proceder_pago').show();
                            logCheckoutError('realizarVenta_ajax', 'HTTP ' + xhr.status + ': ' + xhr.statusText, checkoutData);
                            alert('Error de conexión. Por favor intentá de nuevo.');
                        }
                    });
        }
    });

    $(".check-producto-paquete").on("click", function () {
        var inputs = new Array();
        inputs = $("#pack").val().split('|');
        var idProducto = $(this).val();

        var amount = parseFloat($("#amount").val());
        console.log("#" + idProducto + "_item_price");
        var amountPack = parseFloat($("#" + idProducto + "_item_price").val());

        if ($(this).is(":checked")) {
            $("#item_" + idProducto + "").attr('style', '');
            amount += amountPack;
            inputs.push(idProducto);
        } else {
            $("#item_" + idProducto + "").attr('style', 'display: none!important');
            inputs = inputs.filter(function (elem) {
                return elem != idProducto;
            });
            amount -= amountPack;
        }
        $("#pack").val(inputs.sort().join("|"));
        $("#amount").val(getFloatValue(amount));
        $("#total_price").html('$' + getFloatValue(amount) + ' ARG');

    });

    function getFloatValue(value) {
        return parseFloat(Math.round(value * 100) / 100).toFixed(2);
    }

    // FIX BFCACHE: forzar reload si la página es restaurada desde bfcache
    // al volver atrás desde la pasarela de pago. Evita estado JS corrupto
    // en upsells/pack (checkboxes desincronizados con #amount y #pack).
    window.addEventListener('pageshow', function (event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
    window.addEventListener('unload', function () {});

});
