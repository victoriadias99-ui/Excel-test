var errorValidEmail=false;
var email = jQuery('#email');
    var hint = jQuery("#hint");

    email.on('blur',function() {
        hint.css('display', 'none').empty(); // hide hint initially
		error=false;
        jQuery(this).mailcheck({
            suggested: function(element, suggestion) {
                if(!hint.html()) {
                    // misspell - display hint element
                     var suggestion = "Quisiste decir <span class='suggestion'>" +
                        "<span class='address'>" + suggestion.address + "</span>"
                        + "@<a href='#' class='domain'>" + suggestion.domain +
                        "</a></span>?";
						
						email.addClass("error");
						errorValidEmail=true;
                    hint.html(suggestion).fadeIn(150);
                } else {
                    // Subsequent errors
                    jQuery(".address").html(suggestion.address);
                    jQuery(".domain").html(suggestion.domain);
					email.addClass("error");
					errorValidEmail=true;
                }
            }
        });
    });

    hint.on('click', '.domain', function() {
        // Display with the suggestion and remove the hint
        email.val(jQuery(".suggestion").text());
        hint.fadeOut(200, function() {
            jQuery(this).empty();
			email.removeClass("error");
			errorValidEmail=false;
        });
        return false;
    });
	

jQuery.extend(jQuery.validator.messages, {
    required: "Campo requerido.",
	email: "Ingrese Email válido."
});

$(document).ready(function () {
	var errorCount=0;
	$('#spinnerloading').hide();
	$('#verificarBtn').click(function(event) {
		event.preventDefault();
		
		
		var error=false;
	    var wizard = $("#reclamosForm"); 
		
		if(!wizard.validate({errorPlacement: function (error, element) {}}).element( "#curso" )){ 
			error=true;
		}

		
		if(email.val()=='')
		{
			error==true;
			email.removeClass("valid");
			email.addClass("error");
		}
		else
		{
			email.removeClass("error");
			email.addClass("valid");			
		}
		
		
		if(errorValidEmail==false)
		{
			if(email.val()=='')
			{
				error==true;
				email.removeClass("valid");
				email.addClass("error");
			}
			else
			{
				email.removeClass("error");
				email.addClass("valid");			
			}
		}

		if (error==false && errorValidEmail==false  && email.val()!='')
		{
				var response=false;
				errorCount= errorCount + 1;
				//alert(errorCount);
				///$('#spinnerloading').show();
				str = '';
				$.ajax(
				{
					  url: "reclamos.php",
					  type: "get", 
					  data: { 
						mail: $('#email').val(),
						curso: $('#curso').val()
					  },
					  success: function(response) {
						//window.location.href = response;
						if(response== true)
						{
							window.location.href = 'sucurso.php?curso=' + $('#curso').val()  + '&mail=' +$('#email').val();
						}
						else
						{
							if (errorCount<=2)
							{
								Swal.fire({title: 'Error!',
											  html: 'No hemos podido encontrar su compra. <br> Por favor verifique mail y nombre del curso y vuelva a intentar.',
											  icon: 'error',
											  confirmButtonText: 'Ok'
											});
							}
							else
							{
								Swal.fire({title: 'Error!',
											  html: 'Vemos que tiene problemas para encontrar su compra. Por favor comuniquese con nosotrs via Whatsapp: <br> <a class="" href="https://api.whatsapp.com/send?phone=541135116867&amp;text=Hola!%20Te%20escribo%20por%20el%20curso%20de%20Excel"> <img class="img-fluid d-block  mx-auto" src="img/wp.png"> </a>',
											  icon: 'error',
											  confirmButtonText: 'Ok'
											});
							}
							
						}
								
							
					  },
					  error: function(xhr) {
						alert(xhr);
					  }
				});
				
		}
	});

})
