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
if (!expRegCarga.exec(carga) || (carga<1 || carga>12))
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


//********************** VALIDAR (EDITAR) USUARIOS ******************************
function validarEditarUsuarios()
{
//validarcedula
 var i;
 var cedula;
 var acumulado;
 //var cedula=document.getElementById('cedula').value;
 var cedula=document.getElementById('cedulau').value;
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
var nombre=document.getElementById('nombreu').value;
if (!expRegNombre.exec(nombre))
     {
        alert("El nombre sólo contiene letras y un espacio");
        return false;
     }
//validarapellido
var expRegApellido=/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+(?: [a-zA-ZáéíóúÁÉÍÓÚñÑ]+)*$/;
var apellido=document.getElementById('apellidou').value;
if (!expRegApellido.exec(apellido))
     {
        alert("El apellido sólo contiene letras y un espacio");
        return false;
     }
//validartelefono
var expRegTelefono=/^[0-9]*$/;
var telefono=document.getElementById('telefonou').value;
if(telefono.length!=""){
if (!expRegTelefono.exec(telefono) || telefono.length<9)
     {
        alert("El número de teléfono ingresado no es correcto");
        return false;
     }
}

//validarcarga
var expRegCarga=/^[0-9]*$/;
var carga=document.getElementById('cargau').value;
if(carga.length!=""){
if (!expRegCarga.exec(carga) || (carga<1 || carga>12))
     {
        alert("La carga horaria ingresada no es correcta");
        return false;
     }
}
}

//********************** VALIDAR COMPONENTES ******************************
function validarComponente()
{
var codigo, descripcion, nombre, estado;

//validarCodigo
var expRegcodigo=/^[0-9]*$/;
var codigo=document.getElementById('codigoC').value;
if(codigo.length!=""){
if (!expRegcodigo.exec(codigo) || codigo<0)
     {
        alert("El codigo ingresado solo admite números");
        return false;
     }
}

//validarDescripcion
var expRegdescripcion=/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ]+(?: [0-9a-zA-ZáéíóúÁÉÍÓÚñÑ]+)*$/;
var descripcion=document.getElementById('descripcion').value;
if (!expRegdescripcion.exec(descripcion))
     {
        alert("La descripcion no es correcta");
        return false;
     }
//validarnombre
var expRegnombre=/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+(?: [a-zA-ZáéíóúÁÉÍÓÚñÑ]+)*$/;
var nombre=document.getElementById('nombre').value;
if (!expRegnombre.exec(nombre))
    {
       alert("El nombre sólo contiene letras y un espacio");
       return false;
    }
}

//********************** VALIDAR (EDITAR) COMPONENTES ******************************
function validarEditarComponente()
{
var codigo, descripcion, nombre, estado;

//validarCodigo
var expRegcodigo=/^[0-9]*$/;
var codigo=document.getElementById('codigou').value;
if(codigo.length!=""){
if (!expRegcodigo.exec(codigo) || codigo<0)
     {
        alert("El codigo ingresado solo admite números");
        return false;
     }
}

//validarDescripcion
var expRegdescripcion=/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ]+(?: [0-9a-zA-ZáéíóúÁÉÍÓÚñÑ]+)*$/;
var descripcion=document.getElementById('descripcionu').value;
if (!expRegdescripcion.exec(descripcion))
     {
        alert("La descripcion no es correcta");
        return false;
     }
//validarnombre
var expRegnombre=/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+(?: [a-zA-ZáéíóúÁÉÍÓÚñÑ]+)*$/;
var nombre=document.getElementById('nombreu').value;
if (!expRegnombre.exec(nombre))
    {
       alert("El nombre sólo contiene letras y un espacio");
       return false;
    }
}
