function validarproyecto()
{

//validarcodigo
var expRegCodigo=/^[0-9]*$/;
var codigo=document.getElementById('codigoPro').value;
if (!expRegCodigo.exec(codigo))
     {
        alert("El código ingresado es incorrecto");
        return false;
     }

//validarcedula
      var i;
      var cedula;
      var acumulado;
      var cedula=document.getElementById('cedulaC').value;
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
//validar nombre programa
var expRegNombre=/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
var nombre=document.getElementById('nombrePrograma').value;
if (!expRegNombre.exec(nombre))
     {
        alert("El nombre del programa sólo puede contener letras");
        return false;
     }

//validar nombre proyecto
var expRegNombreP=/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
var nombre=document.getElementById('nombreProyecto').value;
if (!expRegNombreP.exec(nombre))
     {
        alert("El nombre del proyecto sólo puede contener letras");
        return false;
     }
//validar duracion
var expRegDuracion=/^[0-9]*$/;
var duracion=document.getElementById('duracion').value;
if (!expRegDuracion.exec(duracion) || duracion<1 )
     {
        alert("La duración ingresada es incorrecta");
        return false;
     }
//validar tipo
var expRegTipo=/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
var tipo=document.getElementById('tipo').value;
if (!expRegTipo.exec(tipo))
     {
        alert("El tipo sólo puede contener letras");
        return false;
     }

//validar localizacion
var expRegLocalizacion=/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
var localizacion=document.getElementById('localizacion').value;
if (!expRegLocalizacion.exec(localizacion))
     {
        alert("La localización sólo puede contener letras");
        return false;
     }

//validar OG
     var expRegOG=/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
     var og=document.getElementById('objetivoGeneral').value;
     if (!expRegOG.exec(og))
          {
             alert("El objetivo general sólo puede contener letras");
             return false;
          }

//validar bg
var expRegBD=/^[0-9]*$/;
var bd=document.getElementById('beneficiariosD').value;
if (!expRegBD.exec(bd) || bd<1 )
     {
        alert("El campo ingresado es incorrecto");
        return false;
     }
//validar bi
var expRegBI=/^[0-9]*$/;
var bi=document.getElementById('beneficiariosI').value;
if (!expRegBI.exec(bi) || bi<1 )
     {
        alert("El campo ingresado es incorrecto");
        return false;
     }





}
