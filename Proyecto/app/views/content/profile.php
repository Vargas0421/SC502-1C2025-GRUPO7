<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="css/profile.css" rel="stylesheet">
</head>

<body>

    <?php 
        $titulo = "Bienvenido a tu perfil"; 
        require_once('header/headerIndex.php'); 
        require_once('../../config/config.php');
        require_once('../../models/UserModel.php');
        require_once('../../models/profeModel.php');
        require_once('../../controllers/VerificacionController.php');

        $verificacion = new VerificacionController();
        $verificacion->verificarSesion();

        $id = $_SESSION['email']['id_profesor'];
        $profeModel = new profeModel($pdo);
        $direccion = $profeModel->obtenerDireccionId($id);
    ?>
    <!-- Contenido principal -->
    <div class="bg-light min-vh-100 d-flex align-items-center">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 mb-4">
                    <div class="profile-header text-center mb-4">
                        <div class="position-relative d-inline-block">
                            <img src="https://randomuser.me/api/portraits/men/40.jpg" class="rounded-circle profile-pic"
                                alt="Profile Picture">
                            <button class="btn btn-primary btn-sm position-absolute bottom-0 end-0 rounded-circle">
                                <i class="fas fa-camera"></i>
                            </button>
                        </div>
                        <?php 
                            echo '<h3 class="mt-3 mb-1">' . htmlspecialchars($_SESSION['email']['nombre']) .' '. htmlspecialchars($_SESSION['email']['apellido']) . '</h3>';
                            echo ' <p class="text-muted mb-3">' . htmlspecialchars($_SESSION['email']['puesto']) .'</p>';
                        ?>
                        <div class="d-flex justify-content-center gap-2 mb-4">
                            <button class="btn btn-outline-primary"><i class="fas fa-envelope me-2"></i>Message</button>
                            <button class="btn btn-primary"><i class="fas fa-user-plus me-2"></i>Connect</button>
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-12">
                                    <div class="p-4">
                                        <form action="../../index.php?action=actualizarPerfil" method="POST" id="updateProfesor">
                                            <div class="mb-4">
                                                <h5 class="mb-4">Información Personal</h5>
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($_SESSION['email']['nombre']) ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Apellidos</label>
                                                        <input type="text" class="form-control" name="apellido" value="<?= htmlspecialchars($_SESSION['email']['apellido']) ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Password</label>
                                                        <input type="password" class="form-control" name="password" value="<?= htmlspecialchars($_SESSION['email']['password']) ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Telefono</label>
                                                        <input type="text" class="form-control" name="telefono" value="<?= htmlspecialchars($_SESSION['email']['telefono']) ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Puesto</label>
                                                        <input type="text" class="form-control" name="puesto" value="<?= htmlspecialchars($_SESSION['email']['puesto']) ?>">
                                                    </div>
                                                    <input type="hidden" name="id_profesor" value="<?= htmlspecialchars($_SESSION['email']['id_profesor']) ?>"> <!-- Campo con el id del profesor -->
                                                    <div class="mt-4 text-center">
                                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <!-- Calle, ciudad, estado, código postal -->
                                        <form action="../../index.php?action=actualizarDireccion" method="POST" id="updateDireccion">
                                            <div class="mb-4">
                                                <h5 class="mb-4">Dirección</h5>
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Calle</label>
                                                        <input type="text" class="form-control" name="calle" value="<?= htmlspecialchars($direccion['calle']) ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Ciudad</label>
                                                        <input type="text" class="form-control" name="ciudad" value="<?= htmlspecialchars($direccion['ciudad']) ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Estado</label>
                                                        <input type="text" class="form-control" name="estado" value="<?= htmlspecialchars($direccion['estado']) ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Código Postal</label>
                                                        <input type="text" class="form-control" name="codigo_postal" value="<?= htmlspecialchars($direccion['codigo_postal']) ?>">
                                                    </div>
                                                    <input type="hidden" name="id_profesor" value="<?= htmlspecialchars($_SESSION['email']['id_profesor']) ?>"> <!-- Campo con el id del profesor -->
                                                    <div class="mt-4 text-center">
                                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
