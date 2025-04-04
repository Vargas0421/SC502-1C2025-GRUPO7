<!-- views/header.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset($titulo) ? $titulo : 'Administración'; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href='../../css/estilos.css'>
</head>

<body>
    <header class="fixed-top">
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                
                <!-- Solo mostrar el botón "Volver" si no estás en index.php ni en login.php -->
                <?php if (basename($_SERVER['PHP_SELF']) != 'dashboard.php' && basename($_SERVER['PHP_SELF']) != 'login.php'): ?>
                    <a href="javascript:history.back()" class="btn btn-outline-light d-flex align-items-center gap-2" aria-label="Volver" title="Volver a la página anterior">Volver</a>
                <?php endif; ?>
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <strong><?php echo isset($titulo) ? $titulo : 'Área Administrativa'; ?></strong>
                </a>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.Lps0Q-ivqNODwTLHs3RdRwHaHa%26pid%3DApi&f=1&ipt=048f0547ee544d1ba8370e393b316fe0fb1f29caadee2ac29749afb7b717a755&ipo=images" style="width: 35px;" alt="perfil">
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="perfil">
                        <?php if (basename($_SERVER['PHP_SELF']) != 'profile.php'): ?>
                            <a class="dropdown-item" href="views/content/profile.php">Ver perfil</a>
                        <?php endif; ?>
                        <a href="index.php?action=logout" class="dropdown-item btn btn-danger" href="login.php">Cerrar sesión</a>

                    </div>
                </div>
            </div>
        </div>
    </header>
</body>

</html>
