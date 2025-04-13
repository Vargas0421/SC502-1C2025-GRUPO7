<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manejo Profesores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/profesores.css">
</head>

<body>
<?php 
$titulo = "Manejo de profesores"; 
require_once('header/headerIndex.php'); 
require_once('../../config/config.php'); 
require_once('../../models/profeModel.php'); 
require_once('../../controllers/VerificacionController.php'); 

$verificacion = new VerificacionController();
$verificacion->verificarSesion();
$profeModel = new profeModel($pdo);
$profesores = $profeModel->obtenerProfesores(); 
?>

<div class="container py-5">
    <h1 class="text-center mb-4">Listado de Profesores</h1>
    <div class="row" id="profesores-container">
        <?php foreach ($profesores as $profesor): ?>
            <div class="col-md-4 d-flex align-items-stretch mb-4">
                <div class="card shadow-sm w-100">
                    <img src="https://via.placeholder.com/400x200?text=Profesor" class="card-img-top image-style" alt="<?= htmlspecialchars($profesor['nombre']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($profesor['nombre']) . ' ' . htmlspecialchars($profesor['apellido']) ?></h5>
                        <p class="card-text">Puesto: <?= htmlspecialchars($profesor['puesto']) ?></p>
                        <p class="card-text">Email: <?= htmlspecialchars($profesor['email']) ?></p>
                        <a href="adminVistaProfesor.php?id=<?= $profesor['id_profesor'] ?>" class="btn btn-outline-primary btn-sm mt-auto">Ver perfil</a>
                        </div>
                </div>
            </div>
        <?php endforeach; ?>
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
