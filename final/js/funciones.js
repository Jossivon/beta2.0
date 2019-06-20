function agregaform(datos){
          d=datos.split('||');
          $('#cedulau').val(d[0]);
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
	 	url:"eliminar",
	 	data:cadena,
	 });
}