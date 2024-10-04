<?php 
include "../conexion.inc.php"; // Asegúrate de que este archivo establece la conexión a la base de datos.

$id = $_POST["id"]; // Obtener el ID del usuario
$username = $_POST["username"]; // Obtener el nombre de usuario
$ci = $_POST["ci"]; // Obtener la cédula de identidad
$password = $_POST["password"]; // Obtener la nueva contraseña

// Preparar la consulta de actualización
if (!empty($password)) {
    // Si se proporciona una nueva contraseña, actualizarla
    $sql = "UPDATE users SET username='$username', ci='$ci', password='$password' WHERE id=$id";
} else {
    // Si no se proporciona una nueva contraseña, actualizar solo el nombre de usuario y la cédula
    $sql = "UPDATE users SET username='$username', ci='$ci' WHERE id=$id";
}

mysqli_query($con, $sql); // Ejecutar la consulta
header("Location: usuario.php"); // Redirigir a la lista de clientes
exit(); // Asegúrate de finalizar el script después de redirigir
?>
