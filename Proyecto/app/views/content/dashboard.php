    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administracion</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href='../css/estilos.css'>
    </head>

    <body>
        <?php 
        $titulo = "Área Administrativa"; 
        require_once('header/headerIndex.php'); 
        require_once('../../controllers/VerificacionController.php');

        $verificacion = new VerificacionController();
        $verificacion->verificarSesion();
        ?>

        <main role="main">
            <section class="jumbotron text-center">
                <div class="container">
                    <h1 class="jumbotron-heading">Bienvenido <?= htmlspecialchars($user['nombre']) ?> <?= htmlspecialchars($user['apellido']) ?> </h1>
                </div>
            </section>
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top image-style" src="../Images/Calendar.webp" alt="Calendar">
                                <div class="card-body">
                                    <h3>Calendario</h3>
                                    <p class="card-text">Puede administrar las fechas y tiempos de las asignaturas</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="calendario.html" class="btn btn-sm btn-outline-primary">Abrir
                                                calendario</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top image-style" src="../Images/imagenCurso.png" alt="Cursos">
                                <div class="card-body">
                                    <h3>Cursos</h3>
                                    <p class="card-text">En este elemento podrás administrar los cursos que impartes</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="views/content/Clases.php" class="btn btn-sm btn-outline-primary">Ir a los cursos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top image-style" src="../Images/imagenSalario.png" alt="Salario">
                                <div class="card-body">
                                    <h3>Salario</h3>
                                    <p class="card-text">Aquí podrás manejar el historial de tus Salarios.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="views/content/salario.php" class="btn btn-sm btn-outline-primary">Ver mis pagos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top image-style" src="../Images/imagenEstudiantes.png" alt="Clases">
                                <div class="card-body">
                                    <h3>Estudiantes</h3>
                                    <p class="card-text">En este apartado puede encontrar información sobre sus
                                        estudiantes.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="views/content/estudiantes.php" class="btn btn-sm btn-outline-primary">Ver los estudiantes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php require_once('footer/footer.php'); ?>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>

    </html>