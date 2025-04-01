
<?php
$host = 'localhost:4306';
$dbname = 'sc502-1c2025-grupo7';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "conexion exitosa";
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>


