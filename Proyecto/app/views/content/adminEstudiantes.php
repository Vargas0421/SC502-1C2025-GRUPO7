
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
$cursosEstudiantes = $estudiantesModel->obtenerCursos(); 
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
                        <td>
                            <?= htmlspecialchars($estudiante['nombre']) . ' ' . htmlspecialchars($estudiante['apellido']) ?>
                        </td>
                        
                        <td>
                            <a href="gestionEstudiante.php?id=<?= urlencode($estudiante['id_estudiante']) ?>" class="btn btn-success">
                                Gestion Informacion
                            </a>
                        </td>
                    </tr>                  
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="mb-3 text-left">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEstudiante">
                Agregar Estudiante
            </button>
        </div>
        
        <div class="modal fade" id="modalAgregarEstudiante" tabindex="-1" role="dialog" aria-labelledby="modalAgregarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="../../index.php?action=agregarEstudiante" method="POST" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAgregarLabel">Agregar Nuevo Estudiante</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Contraseña</label>
                            <input type="password" name="password" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" autocomplete="off" required>
                        </div>
                        <h5>Dirección</h5>
                        <div class="form-group">
                            <label for="calle">Calle</label>
                            <input type="text" name="calle" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="ciudad">Ciudad</label>
                            <input type="text" name="ciudad" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" name="estado" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="codigo_postal">Código Postal</label>
                            <input type="text" name="codigo_postal" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
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