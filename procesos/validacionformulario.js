$(function(){

	$("#nombre").on({
		change: function(){
			validarNombre();
		}
	});

	$("#apellidos").on({
		change: function(){
			validarApellidos();
		}
	});

	$("#email").on({
		change: function(){
			validarEmail();
		}
	});

	$("#telefono").on({
		change: function(){
			validarTelefono();
		}
	});

	$("#ciudad").on({
		change: function(){
			validarCiudad();
		}
	});

	$("#cp").on({
		change: function(){
			validarCP();
		}
	});

});

function validarNombre() {
	
	var nombre=document.getElementById("nombre").value;
	var nombreregular=/^[A-Z||a-z]{3,12}$/;

	if(nombre==0){
		alert("El nombre debe contener al menos tres caracteres.");
	}else{
		if(!nombreregular.test(nombre)){
			alert("El nombre debe contener al menos tres caracteres.");
		}
	}
}

function validarApellidos() {
	
	var apellidos=document.getElementById("apellidos").value;
	var nombreregular=/^[A-Z||a-z]{3,12}$/;

	if(apellidos==0){
		alert("Debes incluir los dos apellidos.");
	}else{
		if(!nombreregular.test(nombre)){
			alert("Debes incluir los dos apellidos separados por un espacio.");
		}
	}
}

function validarEmail() {
	
	var email=document.getElementById("email").value;
	var emailregular=/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/;

	if(nombre==0){
		alert("El email no puede estar vacio.");
	}else{
		if(!emailregular.test(email)){
			alert("El email debe contener una @ y el resto del email.");
		}
	}
}

function validarTelefono() {
	
	var telefono=document.getElementById("telefono").value;
	var telefonoregular=/^6[0-9]{8}$/;

		if(!telefonoregular.test(telefono)){
			alert("El campo telefono debe contener 9 digitos y empezar por el numero 6.");
		}
}

function validarCiudad() {
	
	var ciudad=document.getElementById("ciudad").value;
	var ciudadregular=/^[aA-zZ]{3,20}$/;

	if(ciudad==0){
		alert("El campo ciudad debe contener al menos 3 caracteres.");
	}else{
		if(!ciudadregular.test(nombre)){
			alert("El campo ciudad debe contener al menos 3 caracteres.");
		}
	}
}

function validarCP() {
	
	var cp=document.getElementById("cp").value;
	var cpregular=/^[0-9]{5}$/;

	if(cp==0){
		alert("El codigo postal no puede estar vacio.");
	}else{
		if(!cpregular.test(cp)){
			alert("El codigo postal debe contener 5 digitos.");
		}
	}
}