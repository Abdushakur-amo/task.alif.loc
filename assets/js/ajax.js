// Start function Ajax_YahYo
function Ajax_YahYo(name, data, url=false){
    $.ajax({
        url: url,
        method: 'POST',
        data: { 'name': name,'data':  data },
        dataType: "html",
        beforeSend: function(){
            // Loader 
            $('.body-load').addClass('body-load-none');
        },
        success: function(result){
            //console.log(result);
            // Loader 
        	$('.body-load').removeClass('body-load-none');
            json = jQuery.parseJSON(result);
            // Message
            if(json.message && json.locat_function=='default') swal({ title: json.title, text: json.message, icon: json.icon, buttons: json.button });
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
            // Дилхо функсия барои ҳар як саҳифа
            // else if(name == 'name_ajax') name_function(json); 
            else console.log('Error: file ajax.js name not faud!');
        } //success
    }); // Ajax
}// End function Ajax_YahYo















