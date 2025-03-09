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
require_once('header/headerIndex.php'); ?>


    <div class="container">
        <div class="text-center mb-4">
            <p class="text-muted">Aquí puedes ver la información de todos los estudiantes.</p>
        </div>

        <div class="table-container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Cursos</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tabla_estudiantes">
                </tbody>
            </table>
        </div>
    </div>

    <footer class="text-muted text-center py-4 bg-dark ">
        <div class="container">
            <p class="text-white">&copy; 2024 Álbum Bootstrap. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script src="../../controllers/estudiantes.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>



