$(document).ready(function() {
	$('form').submit(function(event) {
		var json;
		event.preventDefault();
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function(){
				// Loader 
				$('.body-load').addClass('body-load-none');
			},
			success: function(result) {
				// Loader 
				$('.body-load').removeClass('body-load-none');
				console.log(result);
				json = jQuery.parseJSON(result);
				// Message
				if(json.message && json.locat_function=='default') {
					swal({ title: json.title, text: json.message, icon: json.icon, buttons: json.button });
					// Сброс все форма 
					if( json.reset) $(json.reset).val(" ");
				}
				// Location
				else if(json.url){ 
					if ( json.time ) {
						let Secund = json.time * 1000;
						let SwalSecund = Secund - 1000;
						swal({ title: json.title, text: json.message, icon: json.icon, buttons: json.button, timer: SwalSecund  });
						setTimeout(function () {
							window.location.href = json.url; 
						}, Secund);
					}
					else window.location.href = json.url; 
				}
				else swal('Ягон запрос коркард нашуд! /form.js');
			},
		});
	});
});