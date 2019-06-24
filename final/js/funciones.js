function agregardatosagregardatos(cedulaI,codigoFacultad,nombre,apellido,correo,telefono,carga,cargo){
	cadena="cedulaI=" + cedulaI +
		   "codigoFacultad=" + codigoFacultad +
		   "nombre=" + nombre +
		   "apellido=" + apellido +
		   "correo=" + correo +
		   "telefono=" + telefono +
		   "carga=" + carga +
		   "cargo=" + cargo;

	$.ajax({
		type:"POST",
		url:"php/ingresarCFac.php",
		data:cadena,
		succes:function (r){
			if(r==1){
				alertify.succes('Agregado con exito');
			}else{
				alertify.error('Fallo el servidor');
			}
		}
	})
}

function agregaform(datos){
          d=datos.split('||');
          $('#cedulau').val(d[0]);
          $('#nombreu').val(d[1]);
          $('#apellidou').val(d[2]);
          $('#correou').val(d[3]);
          $('#telefonou').val(d[4]);
          $('#cargau').val(d[5]);
}

function editarA(datos){

	d=datos.split('||');


	$('#codigou').val(d[0]);
	$('#nombreu').val(d[2]);
	$('#descripcionu').val(d[3]);
	$('#fechaiu').val(d[4]);
	$('#fechafu').val(d[5]);
	$('#estadou').val(d[6]);

}

function editarC(datos){

	d=datos.split('||');

	$('#codigou').val(d[0]);
	$('#descripcionu').val(d[1]);
	$('#nombreu').val(d[2]);
	$('#estadou').val(d[3]);

}

function editarp(datos){
	d=datos.split('||');

	$('#nombreAu').val(d[1]);
	$('#descripcionu').val(d[2]);
	$('#fechaIniciou').val(d[3]);
	$('#fechaFinu').val(d[4]);
	$('#estadou').val(d[5]);
}


function editarE(datos){
	d=datos.split('||');

	$('#codigou').val(d[0]);
	$('#nombreu').val(d[1]);
	$('#siglasu').val(d[2]);
	$('#ciudadu').val(d[3]);
	$('#paginawebu').val(d[4]);
	$('#telefonou').val(d[5]);
	$('#descripcionu').val(d[6]);
}


function editarRE(datos){

	d=datos.split('||');

	$('#cedulau').val(d[0]);
	$('#nombreu').val(d[1]);
	$('#apellidou').val(d[2]);
	$('#correou').val(d[3]);
	$('#telefonou').val(d[4]);
	$('#cargou').val(d[5]);
	$('#descripcionu').val(d[6]);

}


function preguntar(id){
	

	alertify.confirm('Eliminar datos', 'Esta seguro', 
		function(){eliminarU(id)},
		function(){alertify.error('Cancelar')});

}


function eliminarU(id){

	cadena = "id="+ id;

	 $.ajax({
	 	type: "POST",
	 	url:"eliminar.php",
	 	data:cadena,
	 });
}