$(function() {

function obtenerubicacion(posicion) {

			    Latitud = posicion.coords.latitude;
			    Longitud  = posicion.coords.longitude;
			    $.ajax({
					type: 'GET',
					url:  'http://api.openweathermap.org/data/2.5/weather?lat='+ Latitud +'&lon=' +
					Longitud + "&units=metric&appid=9f50a805aa0089a1edd1829a5db029f0",
					dataType:'json'
				})

				.done(function(data){
					var tiempo=data.main.temp;
					var ciudad=data.name;
					$("footer").append("<p>En "+ciudad+" hace "+tiempo+" grados</p>");
				})//Fin del Done

				.fail(function(){
					$("footer").append("<p>Se ha producido un fallo con el servicio que obtiene la temperatura.</p>");
				})//Fin del Fail
			         
			}
			function errorUbicacion() {
				$("footer").append("<p>Has denegado la ubicación no se mostrara la temperatura.</p>");
			}
				var Longitud="";
				var Latitud="";
				var fecha = new Date();
				var dia = fecha.getUTCDate();
				var mes = fecha.getUTCMonth() + 1;
				var año = fecha.getUTCFullYear();
				fechacompuesta = dia + "/" + mes + "/" + año;
				$("footer").prepend("<p>"+fechacompuesta+"</p>");
				if (navigator.geolocation){
					navigator.geolocation.getCurrentPosition(obtenerubicacion, errorUbicacion);
				}else{
					swal("Tu navegador no admite geolocation.", "", "error");
					$("footer").append("<p>Tu navegador no admite geolocation.</p>");
				}

});
