<?php
$titulo = "Gestion de Estudiante";
$_SESSION['vista_anterior'] = 'adminSalario.php';

require_once('header/headerIndex.php');
require_once('../../config/config.php');
require_once('../../models/salarioModel.php');
require_once('../../models/profeModel.php');
require_once('../../controllers/VerificacionController.php');
$verificacion = new VerificacionController();
$verificacion->verificarAcceso();
$id_profesor = $_GET['id'];
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Curso</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Administración de Salarios</h2>

        <?php if ($id_profesor): ?>
            <?php if ($salarioActual): ?>
                <div class="mb-4">
                    <h4>Salario Actual</h4>
                    <p><strong>Cantidad:</strong> <?= number_format($salarioActual['cantidad']) ?></p>
                    <p><strong>Última Actualización:</strong> <?= htmlspecialchars($salarioActual['fecha']) ?></p>
                </div>
            <?php else: ?>
                <div class="alert alert-warning text-center">
                    No hay datos de salario para este profesor
                </div>
            <?php endif; ?>

            <form method="POST" action="../../index.php?action=editarSalarioProfesor" class="mb-4">
                <input type="hidden" name="id_profesor" value="<?= htmlspecialchars($id_profesor) ?>">
                <div class="form-group">
                    <label for="salarioNuevo">Nuevo Salario:</label>
                    <input type="number" step="0.01" name="salarioNuevo" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Actualizar Salario</button>
            </form>

            <?php if (!empty($salarios)): ?>
                <h3 class="mb-4">Historial Salario</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Cantidad</th>
                                <th>Fecha de Actualización</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $cantidad = 1;
                            foreach ($salarios as $s): ?>
                                <tr>
                                    <td><?= $cantidad++ ?></td>
                                    <td><?= number_format($s['cantidad']) ?></td>
                                    <td><?= htmlspecialchars($s['fecha']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

        <?php endif; ?>
    </div>

</body>

</html>