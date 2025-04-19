<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

    <?php
    $titulo = "Bienvenido a tu perfil";

    // Requiere primero la información del profesor antes de la verificación
    require_once('../../config/config.php');
    require_once('../../models/UserModel.php');
    require_once('../../models/profeModel.php');
    require_once('../../controllers/VerificacionController.php');

    // Verificar la sesión antes de obtener datos del profesor
    $verificacion = new VerificacionController();
    $verificacion->verificarSesion();

    $id = $_SESSION['email']['id_profesor'];
    $profeModel = new profeModel($pdo);
    $infoProfesor = $profeModel->obtenerProfesorPorId($id); // Obtener info del profesor
    $direccion = $profeModel->obtenerDireccionId($id); // Obtener dirección del profesor
    
    // Luego, verificar el rol de este profesor
    if ((int) htmlspecialchars($infoProfesor['rol_id']) === 1) {
        $_SESSION['vista_anterior'] = 'app/../../../index.php?action=adminHome';
    } else {
        $_SESSION['vista_anterior'] = 'app/../../../index.php?action=home';
    }
    require_once('header/headerIndex.php');

    ?>

    <?php if (isset($_SESSION['mensaje_password'])): ?>
        <div class="alert alert-success text-center">
            <?= $_SESSION['mensaje_password'];
            unset($_SESSION['mensaje_password']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error_password'])): ?>
        <div class="alert alert-danger text-center"><?= $_SESSION['error_password'];
        unset($_SESSION['error_password']); ?>
        </div>
    <?php endif; ?>

    <!-- Contenido principal -->
    <div class="bg-light min-vh-100 d-flex align-items-center">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 mb-4">
                    <div class="profile-header text-center mb-4">
                        <div class="position-relative d-inline-block">
                            <img src="https://randomuser.me/api/portraits/men/40.jpg" class="rounded-circle profile-pic"
                                alt="Profile Picture">
                        </div>
                        <?php
                        echo '<h3 class="mt-3 mb-1">' . htmlspecialchars($_SESSION['email']['nombre']) . ' ' . htmlspecialchars($_SESSION['email']['apellido']) . '</h3>';
                        echo ' <p class="text-white mb-3">' . htmlspecialchars($_SESSION['email']['puesto']) . '</p>';
                        ?>
                    </div>

                    <!-- Main Content -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-12">
                                    <div class="p-4">
                                        <!-- Formulario de Información Personal -->
                                        <form action="../../index.php?action=actualizarPerfil" method="POST"
                                            id="updateProfesor">
                                            <div class="mb-4">
                                                <h5 class="mb-4">Información Personal</h5>
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre"
                                                            value="<?= htmlspecialchars($infoProfesor['nombre']) ?>"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Apellidos</label>
                                                        <input type="text" class="form-control" name="apellido"
                                                            value="<?= htmlspecialchars($infoProfesor['apellido']) ?>"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Contraseña</label>
                                                        <button type="button" class="btn btn-link" data-toggle="modal"
                                                            data-target="#changePasswordModal">
                                                            Cambiar Contraseña
                                                        </button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Teléfono</label>
                                                        <input type="text" class="form-control" name="telefono"
                                                            value="<?= htmlspecialchars($infoProfesor['telefono']) ?>"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Puesto</label>
                                                        <input type="text" class="form-control" name="puesto"
                                                            value="<?= htmlspecialchars($infoProfesor['puesto']) ?>"
                                                            required>
                                                    </div>
                                                    <input type="hidden" name="id_profesor"
                                                        value="<?= htmlspecialchars($_SESSION['email']['id_profesor']) ?>">
                                                    <div class="mt-4 text-center">
                                                        <button type="submit" class="btn btn-primary">Guardar
                                                            Cambios</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <!-- Formulario de Dirección -->
                                        <form action="../../index.php?action=actualizarDireccion" method="POST"
                                            id="updateDireccion">
                                            <div class="mb-4">
                                                <h5 class="mb-4">Dirección</h5>
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Calle</label>
                                                        <input type="text" class="form-control" name="calle"
                                                            value="<?= htmlspecialchars($direccion['calle']) ?>"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Ciudad</label>
                                                        <input type="text" class="form-control" name="ciudad"
                                                            value="<?= htmlspecialchars($direccion['ciudad']) ?>"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Estado</label>
                                                        <input type="text" class="form-control" name="estado"
                                                            value="<?= htmlspecialchars($direccion['estado']) ?>"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Código Postal</label>
                                                        <input type="text" class="form-control" name="codigo_postal"
                                                            value="<?= htmlspecialchars($direccion['codigo_postal']) ?>"
                                                            required>
                                                    </div>
                                                    <input type="hidden" name="id_profesor"
                                                        value="<?= htmlspecialchars($_SESSION['email']['id_profesor']) ?>">
                                                    <!-- Campo con el id del profesor -->
                                                    <div class="mt-4 text-center">
                                                        <button type="submit" class="btn btn-primary">Guardar
                                                            Cambios</button>
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

    <!-- Modal para cambiar la contraseña -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../../index.php?action=actualizarPassword" method="POST" id="updatePassword">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changePasswordModalLabel">Cambiar Contraseña</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="oldPassword">Contraseña Actual</label>
                            <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="newPassword">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirmar Nueva Contraseña</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                required>
                        </div>
                        <input type="hidden" name="id_profesor"
                            value="<?= htmlspecialchars($_SESSION['email']['id_profesor']) ?>">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Scripts necesarios para que el modal funcione -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        document.getElementById('updatePassword').addEventListener('submit', function (e) {
            const newPass = document.getElementById('newPassword').value;
            const confirmPass = document.getElementById('confirmPassword').value;
            if (newPass !== confirmPass) {
                e.preventDefault();
                alert("Las nuevas contraseñas no coinciden.");
            }
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>