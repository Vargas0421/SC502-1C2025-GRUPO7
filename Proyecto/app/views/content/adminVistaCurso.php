<?php
require_once('../../config/config.php');
require_once('../../models/cursosModel.php');
require_once('../../models/profeModel.php');

require_once('../../controllers/VerificacionController.php');

$verificacion = new VerificacionController();
$verificacion->verificarSesion();

if (isset($_GET['id'])) {
    $id_curso = $_GET['id'];
    $cursoModel = new cursosModel($pdo);
    $curso = $cursoModel->obtenerCursosPorId($id_curso);
    if (!$curso) {
        echo "El curso no existe o no se encontró.";
        exit();
    }
} else {
    echo "No se ha seleccionado un curso.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vista de curso</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .card {
            max-width: 600px;
            margin: 0 auto;
        }

        .image-style {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php
    $titulo = "Área de gestion un curso";
    require_once('header/headerIndex.php');
    ?>



    <div class="container py-5">
        <h1 class="text-center mb-4">Curso</h1>

        <?php if ($curso): ?>
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= htmlspecialchars($curso['nombre_curso']) ?>
                    </h5>
                    <p class="card-text"><strong>Descripcion:</strong> <?= htmlspecialchars($curso['descripcion']) ?></p>
                    <P class="card-text"><strong>Profesor asigand@:</strong> <?= htmlspecialchars($curso['nombre_curso']) ?></P>
                </div>
            </div>
            <section>
                <a href="adminCursos.php" class="btn btn-success    mt-4">Volver al listado de cursos</a>
            </section>
        

        <?php endif; ?> 

    </div>

    <?php require_once('footer/footer.php'); ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>