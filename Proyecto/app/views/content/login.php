<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inicio de Sesión</title>

    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href='../css/estilos.css'>
  </head>
  <body class="text-center">
    <form class="form-signin" method="POST" action="index.php?action=login">
      <h1 class="h3 mb-3 font-weight-normal">Inicio de Sesión</h1>
      <?php if (isset($error)) { echo "<p class='text-danger'>$error</p>"; } ?>
      <label for="inputEmail" class="sr-only">Correo Electrónico</label>
      <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
    </form>
    <footer class="text-muted text-center py-4">
      <div class="container">
        <p>&copy; 2024 Álbum Bootstrap. Todos los derechos reservados.</p>
      </div>
    </footer>
  </body>
</html>
