<?php
include "datosPhp/cursos.php";

$cursoEncontrado = null;

if (isset($_GET['nombre'])) {
    $nombreCurso = urldecode($_GET['nombre']);

    foreach ($cursos as $curso) {
        if ($curso->nombre === $nombreCurso) {
            $cursoEncontrado = $curso;
            break;
        }
    }
} else {
    header("Location: cursos.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="fixed-top">
        <div class="navbar navbar-dark bg-dark shadow-sm">
          <div class="container d-flex justify-content-between align-items-center">
            <a href="Clases.php" class="btn btn-outline-light d-flex align-items-center gap-2" aria-label="Volver"
              title="Volver a la página anterior">
              <span>Volver</span> </a>
            <a href="#" class="navbar-brand d-flex align-items-center">
              <strong>Informacion sobre el curso</strong>
            </a>
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <img src="Assets/Images/profile.svg" style="width: 35px;" alt="perfil">
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="perfil">
                  <a class="dropdown-item" href="profile.html">Ver perfil</a>
                  <a class="dropdown-item btn btn-danger" href="login.html">Cerrar sesión</a>
              </div>
          </div>
          </div>
        </div>
      </header>

    <main role="main" class="container mt-5 pt-5">
        <?php if ($cursoEncontrado): ?>
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title"><?= $cursoEncontrado->nombre ?></h2>
                    <p class="card-text">
                        <strong>Profesor:</strong> <?= $cursoEncontrado->profesor ?><br>
                        <strong>Créditos:</strong> <?= $cursoEncontrado->creditos ?><br>
                        <strong>Alumnos:</strong> <?= $cursoEncontrado->cantidadAlumnos ?><br>
                        <strong>Horario:</strong> <?= $cursoEncontrado->horario ?><br>
                        <strong>Sede:</strong> <?= $cursoEncontrado->sede ?>
                    </p>
                    <a href="cursos.html" class="btn btn-secondary">Regresar</a>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-danger">
                <p>Curso no encontrado.</p>
            </div>
        <?php endif; ?>
    </main>

    <footer class="container mt-5">
        <p class="text-center">&copy; 2025 Universidad &middot; <a href="#">Privacidad</a> &middot; <a href="#">Términos</a></p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
