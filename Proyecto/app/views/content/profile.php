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
        require_once('../../controllers/VerificacionController.php');

        $verificacion = new VerificacionController();
        $verificacion->verificarSesion();
    ?>
    <!-- Contenido principal -->
    <div class="bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="profile-header position-relative mb-4">
                    <div class="text-center">
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
                </div>

                <!-- Main Content -->
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <!-- Sidebar -->
                                <div class="col-lg-3 border-end">
                                    <div class="p-4">
                                        <div class="nav flex-column nav-pills">
                                            <a class="nav-link active" href="#"><i class="fas fa-user me-2"></i>Personal
                                                Info</a>
                                            <a class="nav-link" href="#"><i class="fas fa-lock me-2"></i>Security</a>
                                            <a class="nav-link" href="#"><i
                                                    class="fas fa-bell me-2"></i>Notifications</a>
                                            <a class="nav-link" href="#"><i
                                                    class="fas fa-credit-card me-2"></i>Billing</a>
                                            <a class="nav-link" href="#"><i
                                                    class="fas fa-chart-line me-2"></i>Activity</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Content Area -->
                                <div class="col-lg-9">
                                    <div class="p-4">
                                        <form action="../../index.php?action=actualizarPerfil" method="POST">
                                            <div class="mb-4">
                                                <h5 class="mb-4">Personal Information</h5>
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($_SESSION['email']['nombre']) ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" name="apellido" value="<?= htmlspecialchars($_SESSION['email']['apellido']) ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Password</label>
                                                        <input type="password" class="form-control" name="password" value="<?= htmlspecialchars($_SESSION['email']['password']) ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Puesto</label>
                                                        <input type="text" class="form-control" name="puesto" value="<?= htmlspecialchars($_SESSION['email']['puesto']) ?>">
                                                    </div>
                                                    <input type="hidden" name="id_profesor" value="<?= htmlspecialchars($_SESSION['email']['id_profesor']) ?>"> <!-- Campo con el id del profesor -->
                                                    <div class="mt-4">
                                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- Settings Cards -->
                                        <div class="row g-4 mb-4">
                                            <div class="col-md-6">
                                                <div class="settings-card card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <h6 class="mb-1">Two-Factor Authentication</h6>
                                                                <p class="text-muted mb-0 small">Add an extra layer of
                                                                    security</p>
                                                            </div>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="settings-card card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <h6 class="mb-1">Email Notifications</h6>
                                                                <p class="text-muted mb-0 small">Receive activity
                                                                    updates
                                                                </p>
                                                            </div>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Recent Activity -->
                                        <div>
                                            <h5 class="mb-4">Recent Activity</h5>
                                            <div class="activity-item mb-3">
                                                <h6 class="mb-1">Updated profile picture</h6>
                                                <p class="text-muted small mb-0">2 hours ago</p>
                                            </div>
                                            <div class="activity-item mb-3">
                                                <h6 class="mb-1">Changed password</h6>
                                                <p class="text-muted small mb-0">Yesterday</p>
                                            </div>
                                            <div class="activity-item">
                                                <h6 class="mb-1">Updated billing information</h6>
                                                <p class="text-muted small mb-0">3 days ago</p>
                                            </div>
                                        </div>
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

