<?php
require_once('header/headerIndex.php'); 
require_once('../../config/config.php');
require_once('../../models/cursosModel.php');
require_once('../../controllers/VerificacionController.php');

$verificacion = new VerificacionController();
$verificacion->verificarSesion();


$cursoEncontrado = null;
// Recibe el id
if (isset($_GET['id'])) {
    $idCurso = $_GET['id']; 
    $cursosModel = new cursosModel($pdo);
    $cursoEncontrado = $cursosModel->obtenerCursoPorId($idCurso);
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
              <strong>Información sobre el curso</strong>
            </a>
        </div>
    </div>
</header>

<main role="main" class="container mt-5 pt-5">
    <?php if ($cursoEncontrado): ?>
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title"><?= htmlspecialchars($cursoEncontrado['nombre']) ?></h2>
                <p class="card-text">
                    <strong>Profesor:</strong> <?= htmlspecialchars($cursoEncontrado['profesor']) ?><br>
                    <strong>Descripción:</strong> <?= htmlspecialchars($cursoEncontrado['descripcion']) ?><br>
                    <strong>Sede:</strong> <?= htmlspecialchars($cursoEncontrado['sede']) ?>
                </p>
                <a href="Clases.php" class="btn btn-secondary">Regresar</a>
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