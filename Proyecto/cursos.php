<?php
include "php/estudiantes.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos Universitarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<header class="fixed-top">
        <div class="navbar navbar-dark bg-dark shadow-sm">
          <div class="container d-flex justify-content-between align-items-center">
            <a href="index.html" class="btn btn-outline-light d-flex align-items-center gap-2" aria-label="Volver"
              title="Volver a la página anterior">
              <span>Volver</span> </a>
            <a href="#" class="navbar-brand d-flex align-items-center">
              <strong>Cursos</strong>
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

    <main role="main">
        <div class="container marketing mt-5 pt-5">
            <h2 class="text-center mb-4">Listado de Cursos</h2>
            <div class="row">
                <?php foreach ($cursos as $curso): ?>
                    <div class="col-lg-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><?= $curso->nombre ?></h5>
                                <p class="card-text">
                                    <strong>Profesor:</strong> <?= $curso->profesor ?><br>
                                    <strong>Créditos:</strong> <?= $curso->creditos ?><br>
                                    <strong>Alumnos:</strong> <?= $curso->cantidadAlumnos ?><br>
                                    <strong>Horario:</strong> <?= $curso->horario ?><br>
                                    <strong>Sede:</strong> <?= $curso->sede ?>
                                </p>
                                <a href="#" class="btn btn-primary">Más información</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <footer class="container mt-5">
        <p class="text-center">&copy; 2025 Universidad &middot; <a href="#">Privacidad</a> &middot; <a href="#">Términos</a></p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>