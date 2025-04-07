<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administracion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
<?php 
$titulo = "Manejo de estudiantes"; 
require_once('header/headerIndex.php'); 
require_once('../../config/config.php'); 
require_once('../../models/estudiantesModel.php'); 
require_once('../../controllers/VerificacionController.php'); 

$verificacion = new VerificacionController();
$verificacion->verificarSesion();
$estudiantesModel = new EstudiantesModel($pdo);
$estudiantes = $estudiantesModel->obtenerEstudiantes(); 
?>

<div class="container">
    <div class="text-center mb-4">
        <p class="text-muted">Aquí puedes ver la información de todos los estudiantes.</p>
    </div>
    <div class="table-container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estudiantes as $estudiante): ?>
                    <tr>
                        <td><?= htmlspecialchars($estudiante['nombre']) . ' ' . htmlspecialchars($estudiante['apellido']) ?></td>
                        <td>
                            <button 
                                class="btn btn-info" 
                                data-toggle="modal" 
                                data-target="#modalEstudiante-<?= htmlspecialchars($estudiante['id_estudiante']) ?>"
                            >
                                Ver Detalles
                            </button>
                        </td>
                    </tr>
                    <div class="modal" id="modalEstudiante-<?= htmlspecialchars($estudiante['id_estudiante']) ?>" tabindex="-1" role="dialog" aria-labelledby="modalEstudianteLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEstudianteLabel">Detalles del Estudiante</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Nombre:</strong> <?= htmlspecialchars($estudiante['nombre']) ?></p>
                                    <p><strong>Apellido:</strong> <?= htmlspecialchars($estudiante['apellido']) ?></p>
                                    <p><strong>Email:</strong> <?= htmlspecialchars($estudiante['email']) ?></p>
                                    <p><strong>Teléfono:</strong> <?= htmlspecialchars($estudiante['telefono']) ?></p>
                                    <p><strong>Cursos inscritos:</strong></p>
                                    <ul>
                                        <?php 
                                        $cursos = $estudiantesModel->obtenerCursosEstudiante($estudiante['id_estudiante']);
                                        foreach ($cursos as $curso): ?>
                                            <p><?= htmlspecialchars($curso['nombre_curso']) ?></p>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<footer class="text-muted text-center py-4 bg-dark">
    <div class="container">
        <p class="text-white">&copy; 2024 Álbum Bootstrap. Todos los derechos reservados.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>