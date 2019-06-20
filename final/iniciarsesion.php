<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Aiking</title>
    <link rel="stylesheet" href="interfaz/estilos/estilo.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>

    <div class="contenedor-izquierda">
      <img src="interfaz/imagenes/3.png" alt="foco">
      <br>
      <h2>Gestor de proyectos "Aiking"</h2>
    </div>


    <div class="contenedor-form">
      <div class="toggle">
        <span>Cear cuenta</span>
      </div>

        <div class="formulario">
          <h2>Iniciar Sesión</h2>
          <form action="php/login.php" method="POST">
            <input type="text" placeholder="Nombre" name="usuario" required>
            <input type="password" placeholder="Contraseña" name="clave" required>
            <input type="submit" value="Iniciar Sesión">
          </form>
        </div>

        <div class="formulario">
          <h2>Crea tu cuenta</h2>
          <form action="a">
            <input type="text" placeholder="Usuario" required>
            <input type="password" placeholder="Constraseña" required>
            <input type="email" placeholder="Correo electronico" required>
            <input type="text" name="Telefono" placeholder="Cédula de identidad">
            <input type="submit" value="Registrarse">
          </form>
        </div>

        <div class="reset-password">
          <a href="a">Olvide mi contraseña?</a>
        </div>

    </div>
<script src="javaScript\jquery-3.1.1.min.js"></script>
<script src="javaScript\main.js"></script>
  </body>
</html>
