// access_config.php
<?php
return [
    // Acciones basadas en "action"
    'adminHome' => [1],
    'home'=> [ 1,2],
    'dashboard' => [1, 2],
    'usuarioHome' => [2],

    // Rutas de archivos PHP directos
    'views/content/adminEstudiantes.php' => [1],
    'views/content/adminCurso.php' => [1],
    'views/content/adminDashboard.php' => [1],
    'views/content/adminProfesores.php' => [1],
    'views/content/adminSalario.php' => [1],
    'views/content/adminVistaCurso.php' => [1],
    'views/content/adminVistaProfesor.php' => [1],
    'views/content/calendario.php' => [1, 2],
    'views/content/dashboard.php' => [1, 2],
    'views/content/estudiantes.php' => [1, 2],
    'views/content/gestionEstudiante.php' => [1],
    'views/content/gestionSalario.php' => [1],
    'views/content/informacionCurso.php' => [1],
    'views/content/profile.php' => [1, 2],
    'views/content/salario.php' => [1, 2],


];

?>
