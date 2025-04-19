<?php 
    $titulo = "Gestion Salarios"; 
    $_SESSION['vista_anterior'] = 'app/../../../index.php?action=adminHome';
    require_once('header/headerIndex.php'); 
    require_once('../../config/config.php');
    require_once('../../models/salarioModel.php');
    require_once('../../models/profeModel.php');
    require_once('../../controllers/VerificacionController.php');
    $verificacion = new VerificacionController();
    $verificacion->verificarSesion();
    
    $id_profesor = $_SESSION['email']['id_profesor'];
      $salarioModel = new salarioModel($pdo);
      $salarios = $salarioModel->historialSalario($id_profesor);
      $salarioActual = $salarioModel->salarioActual($id_profesor);
      $salarioActual = $salarioActual[0];
      $Profesores = new profeModel($pdo);
      $listaProfesores = $Profesores->obtenerProfesores();
  ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard de salarios</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/dashboard.css">

</head>
  <body>
  <div class="container mt-5">
    <h2 class="mb-4">Seleccionar Profesor</h2>
    <div class="table-container">
        <table class="table table-hover">
        <thead>
          <tr>
            <th></th>
            <th>Profesor</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($listaProfesores as $profesor): ?>
            <tr>
              <td></td>
              <td><?= htmlspecialchars($profesor['nombre']) . ' ' . ($profesor['apellido']) ?></td>
              <td>
                <a href="gestionSalario.php?id=<?= $profesor['id_profesor'] ?>" class="btn btn-success">Gestion Salario</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  </body>
</html>
  