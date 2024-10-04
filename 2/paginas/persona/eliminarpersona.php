<?php 
include "../conexion.inc.php";
$ci = $_GET["ci"];

// eliminar los registros en users relacionados
$sql_users = "DELETE FROM users WHERE ci = $ci";
mysqli_query($con, $sql_users);

// eliminar los registros en catastro relacionados
$sql_catastro = "DELETE FROM catastro WHERE ci = $ci";
mysqli_query($con, $sql_catastro);

// eliminar la persona
$sql_persona = "DELETE FROM persona WHERE ci = $ci";
mysqli_query($con, $sql_persona);

header("Location: persona.php");
exit();
?>
