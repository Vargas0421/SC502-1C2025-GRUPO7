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
    $curso = $cursoModel->obtenerCursoFullPorId($id_curso);
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
                        <?= htmlspecialchars($curso['nombre']) ?>
                    </h5>
                    <p class="card-text">
                        <strong>Descripción:</strong> <?= htmlspecialchars($curso['descripcion']) ?>
                    </p>
                    <p class="card-text">
                        <strong>Profesor asignad@:</strong> <?= htmlspecialchars($curso['profesor']) ?>
                    </p>
                    <p class="card-text">
                        <strong>Teléfono:</strong> <?= htmlspecialchars($curso['telefono']) ?>
                    </p>
                    <p class="card-text">
                        <strong>Email:</strong> <?= htmlspecialchars($curso['email']) ?>
                    </p>
                    <p class="card-text">
                        <strong>Día:</strong> <?= htmlspecialchars($curso['horario']) ?>
                    </p>
                    <p class="card-text">
                        <strong>Hora de inicio:</strong> <?= htmlspecialchars($curso['hora_inicio']) ?>
                    </p>
                    <p class="card-text">
                        <strong>Hora de fin:</strong> <?= htmlspecialchars($curso['hora_fin']) ?>
                    </p>
                </div>
            </div>
            <section id="botones-acciones">
                <a href="adminCursos.php" class="btn btn-success mt-4">Volver al listado de cursos</a>
                <button class="btn btn-info mt-4" onclick="mostrarFormulario()">Editar información</button>
            </section>
            <form action="editarCurso.php" method="post" class="card shadow-sm p-4 mt-4" id="form-edicion"
                style="display: none;">
                <input type="hidden" name="id_curso" value="<?= htmlspecialchars($id_curso) ?>">

                <div class="form-group">
                    <label for="nombre">Nombre del curso</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        value="<?= htmlspecialchars($curso['nombre']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                        required><?= htmlspecialchars($curso['descripcion']) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono"
                        value="<?= htmlspecialchars($curso['telefono']) ?>">
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="<?= htmlspecialchars($curso['email']) ?>">
                </div>

                <div class="form-group">
                    <label for="horario">Día</label>
                    <input type="text" class="form-control" id="horario" name="horario"
                        value="<?= htmlspecialchars($curso['horario']) ?>">
                </div>

                <div class="form-group">
                    <label for="hora_inicio">Hora de inicio</label>
                    <input type="time" class="form-control" id="hora_inicio" name="hora_inicio"
                        value="<?= htmlspecialchars($curso['hora_inicio']) ?>">
                </div>

                <div class="form-group">
                    <label for="hora_fin">Hora de fin</label>
                    <input type="time" class="form-control" id="hora_fin" name="hora_fin"
                        value="<?= htmlspecialchars($curso['hora_fin']) ?>">
                </div>

                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <button type="button" class="btn btn-secondary ml-2" onclick="cancelarEdicion()">Cancelar</button>
            </form>



        <?php endif; ?>

    </div>

    <?php require_once('footer/footer.php'); ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="../JS/jsCursos.js" defer></script>

</body>

</html>