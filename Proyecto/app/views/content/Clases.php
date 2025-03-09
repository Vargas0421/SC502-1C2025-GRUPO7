<?php
include "datosPhp/cursos.php";
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
<?php 
$titulo = "Maneja tus cursos"; 
require_once('header/headerIndex.php'); ?>

    <main role="main">
        <div class="container marketing mt-5 pt-5">
            <h2 class="text-center mb-4">Listado de curos impartidos</h2>
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
                                <a href="informacionCurso.php?nombre=<?= urlencode($curso->nombre) ?>" class="btn btn-primary">Más información</a>
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