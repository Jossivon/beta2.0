function validaractividad()
{

//validarcodigo
var expRegCodigo=/^[0-9]*$/;
var codigo=document.getElementById('codigo').value;
if (!expRegCodigo.exec(codigo))
     {
        alert("El código ingresado es incorrecto");
        return false;
     }

//validar nombre
var expRegNombre=/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
var nombre=document.getElementById('nombre').value;
if (!expRegNombre.exec(nombre))
     {
        alert("El nombre ingresado no es correcto");
        return false;
     }

//validar descripcion
var expRegDescripcion=/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
var descripcion=document.getElementById('descripcion').value;
if (!expRegDescripcion.exec(descripcion))
     {
        alert("La descripción ingresada no es correcta");
        return false;
     }
}
