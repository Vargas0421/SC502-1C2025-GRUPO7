<?php
// config.php
$host = 'localhost:4306';
$dbname = 'sc502_1c2025_grupo7';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "conexion exitosa con la base de datos del curso ";

} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>
