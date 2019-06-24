function validar()
{
//validarcedula
 var i;
 var cedula;
 var acumulado;
 var cedula=document.getElementById('cedula').value;
 var instancia;
 acumulado=0;
 for (i=1;i<=9;i++)
 {
  if (i%2!=0)
  {
   instancia=cedula.substring(i-1,i)*2;
   if (instancia>9) instancia-=9;
  }
  else instancia=cedula.substring(i-1,i);
  acumulado+=parseInt(instancia);
 }
 while (acumulado>0)
  acumulado-=10;
 if (cedula.substring(9,10)!=(acumulado*-1))
 {
  alert("La cédula ingresada no es correcta");
  return false;
 }
//validarnombre
var expRegNombre=/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+(?: [a-zA-ZáéíóúÁÉÍÓÚñÑ]+)*$/;
var nombre=document.getElementById('nombre').value;
if (!expRegNombre.exec(nombre))
     {
        alert("El nombre sólo contiene letras y un espacio");
        return false;
     }
//validarapellido
var expRegApellido=/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+(?: [a-zA-ZáéíóúÁÉÍÓÚñÑ]+)*$/;
var apellido=document.getElementById('apellido').value;
if (!expRegApellido.exec(apellido))
     {
        alert("El apellido sólo contiene letras y un espacio");
        return false;
     }
//validartelefono
var expRegTelefono=/^[0-9]*$/;
var telefono=document.getElementById('telefono').value;
if(telefono.length!=""){
if (!expRegTelefono.exec(telefono) || telefono.length<9)
     {
        alert("El número de teléfono ingresado no es correcto");
        return false;
     }
}

//validarcarga
var expRegCarga=/^[0-9]*$/;
var carga=document.getElementById('carga').value;
if(carga.length!=""){
if (!expRegCarga.exec(carga) || (carga>0 || carga>12))
     {
        alert("La carga horaria ingresada no es correcta");
        return false;
     }
}

//validarcodigo
var expRegCodigo=/^[0-9]*$/;
var codigo=document.getElementById('codigo').value;
if (!expRegCodigo.exec(codigo) || codigo<0 )
     {
        alert("El código ingresado es incorrecto");
        return false;
     }
}
