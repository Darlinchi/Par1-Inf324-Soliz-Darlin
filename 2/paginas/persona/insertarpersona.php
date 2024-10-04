<?php 
include "../conexion.inc.php";
$ci = $_POST['ci'];
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$sql = "INSERT INTO persona (ci, nombre, paterno, materno) VALUES ('$ci', '$nombre', '$paterno', '$materno')";
mysqli_query($con, $sql);
header("Location: persona.php")
?>