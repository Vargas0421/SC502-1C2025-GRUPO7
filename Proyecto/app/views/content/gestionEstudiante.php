<?php
$titulo = "Gestion de Estudiante"; 
require_once('header/headerIndex.php'); 
require_once('../../config/config.php');
require_once('../../models/estudiantesModel.php');


$idEstudiante = $_GET['id'];
$estudiantesModel = new EstudiantesModel($pdo);
$cursos = $estudiantesModel->CursosNoIngresados($idEstudiante);
$cursosMatriculados = $estudiantesModel->obtenerCursosEstudiante($idEstudiante);
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idCurso = $_GET['id']; 
} 
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
    <h1 class="mb-3">Gestor estudiantes</h1>
    <form action="../../index.php?action=eliminarEstudiante" method="POST" 
    onsubmit = "return confirm('Seguro de que deseas eliminar este estudiante?')">
        <input type="hidden" name="id_estudiante" value="<?= htmlspecialchars($idEstudiante) ?>">
        <button type="submit" class="btn btn-danger mb-3">Eliminar Estudiante</button>
    </form>

    <form action="../../index.php?action=agregarCursoEstudiante" method="POST">
        <input type="hidden" name="id_estudiante" value="<?= htmlspecialchars($idEstudiante) ?>">
        <div class="form-group">
            <label for="id_curso">Cursos Disponibles</label>
            <?php if (!empty($cursos)): ?>
                <select name="id_curso" id="id_curso" class="form-control" required>
                    <?php foreach ($cursos as $curso): ?>
                        <option value="<?= htmlspecialchars($curso['id_curso']) ?>">
                            <?= htmlspecialchars($curso['nombre_curso']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-primary mt-3">Agregar al Curso</button>
            <?php else: ?>
                <div class="alert alert-warning" role="alert">No hay cursos disponibles</div>
            <?php endif; ?>
        </div>
    </form>

    <h1 class="mb-3 mt-5">Cursos Matriculados</h1>
    <div class="table-container">
    <?php if (!empty($cursosMatriculados)): ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Cursos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cursosMatriculados as $curso): ?>
                    <tr>
                        <td><?= htmlspecialchars($curso['nombre_curso']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <div class="alert alert-warning" role="alert">El estudiante no esta matriculado en ningun curso</div> <!--Seguir agregando else a todo -->
    <?php endif; ?>
</div>
</body>
</html>