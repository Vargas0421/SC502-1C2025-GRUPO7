// access_config.php
<?php
return [
    // Acciones basadas en "action"
    'adminHome' => [1],
    'dashboard' => [1, 2],
    'usuarioHome' => [2],

    // Rutas de archivos PHP directos
    'views/content/adminEstudiantes.php' => [1],
    'views/content/usuarioPerfil.php' => [1, 2],
];

?>
