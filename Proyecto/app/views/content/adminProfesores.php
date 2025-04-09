<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manejo Profesores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
<?php 
$titulo = "Manejo de profesores"; 
require_once('header/headerIndex.php'); 
require_once('../../config/config.php'); 
require_once('../../models/profeModel.php'); 
require_once('../../controllers/VerificacionController.php'); 

$verificacion = new VerificacionController();
$verificacion->verificarSesion();  // Verificar la sesión del usuario
$profeModel = new profeModel($pdo);  // Instancia del modelo para manejar los datos de los profesores
$profesores = $profeModel->obtenerProfesores();  // Obtener todos los profesores desde la base de datos
?>

<div class="container">
    <div class="text-center mb-4">
        <p class="text-muted">Aquí puedes ver la información de todos los profesores.</p>
    </div>
    <div class="table-container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($profesores as $profesor): ?>
                    <tr>
                        <td><?= htmlspecialchars($profesor['nombre']) . ' ' . htmlspecialchars($profesor['apellido']) ?></td>
                        <td><?= htmlspecialchars($profesor['puesto']) ?></td>
                        <td><?= htmlspecialchars($profesor['email']) ?></td>
                        <td>
                            <button 
                                class="btn btn-info" 
                                data-toggle="modal" 
                                data-target="#modalProfesor-<?= htmlspecialchars($profesor['id_profesor']) ?>"
                            >
                                Ver Detalles
                            </button>
                        </td>
                    </tr>
                    <!-- Modal para mostrar los detalles del profesor -->
                    <div class="modal" id="modalProfesor-<?= htmlspecialchars($profesor['id_profesor']) ?>" tabindex="-1" role="dialog" aria-labelledby="modalProfesorLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalProfesorLabel">Detalles del Profesor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> 
                                </div>
                                <div class="modal-body">
                                    <p><strong>Nombre:</strong> <?= htmlspecialchars($profesor['nombre']) ?></p>
                                    <p><strong>Apellido:</strong> <?= htmlspecialchars($profesor['apellido']) ?></p>
                                    <p><strong>Email:</strong> <?= htmlspecialchars($profesor['email']) ?></p>
                                    <p><strong>Puesto:</strong> <?= htmlspecialchars($profesor['puesto']) ?></p>
                                    <p><strong>Dirección:</strong> 
                                        <?php 
                                        // Suponiendo que 'direccion_id' corresponde a un registro en una tabla de direcciones
                                        $direccion = $profeModel->obtenerDireccionProfesor($profesor['direccion_id']);
                                        echo htmlspecialchars($direccion['calle']) . ', ' . htmlspecialchars($direccion['ciudad']) . ', ' . htmlspecialchars($direccion['estado']);
                                        ?>
                                    </p>
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
