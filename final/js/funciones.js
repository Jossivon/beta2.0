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
          $('#cedulaIu').val(d[0]);
          $('#nombreu').val(d[1]);
          $('#apellidou').val(d[2]);
          $('#correou').val(d[3]);
          $('#telefonou').val(d[4]);
          $('#cargau').val(d[5]);
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