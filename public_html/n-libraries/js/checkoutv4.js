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
        var errorEmail = false;
        var errorNombre = false;
        var errorApellido = false;
        var errorCelular = false;
        var wizard = $("#procederPagoForm");

        if (!wizard.validate({errorPlacement: function (error, element) {}}).element("#nombre")) {
            error = true;
            errorNombre = true;
        }

        if (!wizard.validate({errorPlacement: function (error, element) {}}).element("#apellido")) {
            error = true;
            errorApellido = true;
        }


        if (!wizard.validate({errorPlacement: function (error, element) {}}).element("#celular")) {
            error = true;
            errorCelular = true;
        }
        
        if (!wizard.validate({errorPlacement: function (error, element) {}}).element("#email")) {
            error = true;
            errorEmail = true;
        }
        
        if (errorEmail){
            jQuery('#email').removeClass("valid");
            jQuery('#email').addClass("error");
        } else {
            jQuery('#email').removeClass("error");
            jQuery('#email').addClass("valid");
        }
        
        if (errorCelular){
            jQuery('#celular').removeClass("valid");
            jQuery('#celular').addClass("error");
        } else {
            jQuery('#celular').removeClass("error");
            jQuery('#celular').addClass("valid");
        }
        
        if (errorApellido){
            jQuery('#apellido').removeClass("valid");
            jQuery('#apellido').addClass("error");
        } else {
            jQuery('#apellido').removeClass("error");
            jQuery('#apellido').addClass("valid");
        }
        
        if (errorNombre){
            jQuery('#nombre').removeClass("valid");
            jQuery('#nombre').addClass("error");
        } else {
            jQuery('#nombre').removeClass("error");
            jQuery('#nombre').addClass("valid");
        }

        if (error == false)
        {
            $('#spinnerloading').show();
            $('#proceder_pago').hide();
            str = '';
            $.ajax(
                    {
                        url: "/n-libraries/realizarVenta.php",
                        type: "get",
                        data: {
                            nombre: $('#nombre').val(),
                            apellido: $('#apellido').val(),
                            celular: $('#celular').val(),
                            email: $('#email').val(),
                            curso: $('#curso').val(),
                            dir: $('#dir').val(),
                            pack: $('#pack').val(),
                            descuento: $('#descuento').val()
                        },
                        success: function (response) {
                            window.location.href = response;
                        },
                        error: function (xhr) {
                            alert(xhr);
                            $('#spinnerloading').hide();
                            $('#proceder_pago').show();
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
});
