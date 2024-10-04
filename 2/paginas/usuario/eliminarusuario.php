<?php 
include "../conexion.inc.php"; // Asegúrate de que este archivo establece la conexión a la base de datos.

$id = $_GET["id"]; // Obtener el ID del usuario a eliminar
$sql = "DELETE FROM users WHERE id = $id"; // Consulta para eliminar el usuario
mysqli_query($con, $sql); // Ejecutar la consulta

header("Location: usuario.php"); // Redirigir a la página de clientes
exit(); // Asegúrate de finalizar el script después de redirigir
?>
