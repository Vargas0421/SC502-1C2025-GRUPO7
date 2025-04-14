<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manejo Cursos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/profesores.css">
</head>

<body>
    <?php

    $titulo = "Manejo de cursos";
    require_once('header/headerIndex.php');
    require_once('../../models/cursosModel.php');
    require_once('../../models/profeModel.php');

    require_once('../../config/config.php');



    $cursoModel = new cursosModel($pdo);
    $cursos = $cursoModel->obtenerCursos();
    $profeModel = new profeModel($pdo);
    $profesores = $profeModel->obtenerProfesores();
    ?>

    <div class="container py-5">
        <h1 class="text-center mb-4">Listado de cursos</h1>
        <div class="row" id="profesores-container">
            <?php foreach ($cursos as $curso): ?>
                <div class="col-md-4 d-flex align-items-stretch mb-4">
                    <div class="card shadow-sm w-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= htmlspecialchars($curso['id_curso']) . '-' . htmlspecialchars($curso['nombre_curso']) ?>
                            </h5>
                            <p class="card-text">Puesto: <?= htmlspecialchars($curso['descripcion']) ?></p>
                            <a href="adminVistacurso.php?id=<?= $curso['id_curso'] ?>"
                                class="btn btn-outline-primary btn-sm mt-auto">Ver curso</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mb-3 text-left">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCurso">
                Agregar un curso
            </button>
        </div>

        <div class="modal fade" id="modalAgregarCurso" tabindex="-1" role="dialog" aria-labelledby="modalAgregarLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="../../index.php?action=agregarCurso" method="POST" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAgregarLabel">Agregar un nuevo curso </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre del curso </label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Descripcion</label>
                            <input type="text" name="apellido" class="form-control" required>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Agregar el curso </button>
                        </div>
                    </div>
                </form>
            </div>  
        </div>




    </div>

    <?php require_once('footer/footer.php'); ?>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</body>

</html>