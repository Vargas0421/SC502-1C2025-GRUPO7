<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset($titulo) ? $titulo : 'Administración'; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href='views/css/headerStyle.css'>
</head>

<body>
    <header class="fixed-top">
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <?php
                $pagina = basename($_SERVER['PHP_SELF']);
                $esHome = isset($_GET['action']) && $_GET['action'] === 'home';

                if ($pagina !== 'dashboard.php' && $pagina !== 'login.php' && !$esHome): ?>
                    <a href="javascript:history.back()" class="btn btn-outline-light d-flex align-items-center gap-2"
                        aria-label="Volver" title="Volver a la página anterior">Volver</a>
                <?php endif; ?>

                <a href="#" class="navbar-brand d-flex align-items-center">
                    <strong><?php echo isset($titulo) ? $titulo : 'Área Administrativa'; ?></strong>
                </a>

                <?php if ($esHome): ?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" id="perfil" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="views/Iconos/profile.svg" class="profile-icon" alt="perfil">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="perfil">
                            <a class="dropdown-item"  href="index.php?action=logout">Cerrar sesión</a>
                            <a class="dropdown-item" href="index.php?action=verPerfil">Ver perfil</a>
                        </div>
                    </div>
                <?php elseif ($pagina === 'profile.php'): ?>
                    <a href="../../../app/index.php?action=logout" class="btn btn-danger text-white text-decoration-none">Cerrar
                        sesión</a>
                <?php else: ?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" id="perfil" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="../../views/Iconos/profile.svg" class="profile-icon" alt="perfil">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="perfil">
                            <a href="../../../app/index.php?action=logout" class="dropdown-item btn btn-danger">Cerrar sesión</a>
                            <a class="dropdown-item" href="../../views/content/profile.php">Ver perfil</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>
</body>

</html>