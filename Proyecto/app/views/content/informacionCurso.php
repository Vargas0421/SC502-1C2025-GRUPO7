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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <?php 
    $titulo = "Cursos"; 
    require_once('header/headerIndex.php'); 
    ?>

  <main role="main" class="container mt-5 pt-5">
    <?php if ($cursoEncontrado): ?>
      <div class="row g-4">
        <div class="col-12">
          <div class="card shadow-sm">
            <div class="card-body">
              <h3 class="card-title"></i><?= htmlspecialchars($cursoEncontrado['nombre']) ?></h3>
              <p class="card-text"><?= htmlspecialchars($cursoEncontrado['descripcion']) ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card shadow-sm">
            <div class="card-header bg-white">
              <strong>Profesor</strong>
            </div>
            <div class="card-body">
              <p class="mb-1"><strong>Nombre: </strong> <?= htmlspecialchars($cursoEncontrado['profesor']) ?></p>
            </div>  
            <div class="card-footer">
                <strong>Contactos: </strong>
              <p class="mb-0"><strong>Email:</strong> <?= htmlspecialchars($cursoEncontrado['email']) ?></p>
              <p class="mb-0"><strong>Teléfono:</strong> <?= htmlspecialchars($cursoEncontrado['telefono']) ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card shadow-sm">
            <div class="card-header bg-white">
              <strong>Horario</strong>
            </div>
            <div class="card-body">
            <p class="mb-0"><?= htmlspecialchars($cursoEncontrado['horario']) ?>  (<?= htmlspecialchars($cursoEncontrado['hora_inicio']) ?> - <?= htmlspecialchars($cursoEncontrado['hora_fin']) ?> )</p>
            </div>
          </div>
        </div>
      </div>
    <?php else: ?>
      <div class="alert alert-danger">
        <p>Curso no encontrado.</p>
      </div>
    <?php endif; ?>
  </main>

  <?php require_once('footer/footer.php'); ?>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
