<?php 
include "../conexion.inc.php";
$ci=$_GET["ci"];
$nombre=$_GET["nombre"];
$paterno=$_GET["paterno"];
$materno=$_GET["materno"];
$sql="update persona set nombre='$nombre', paterno='$paterno', materno='$materno' where ci=$ci";
mysqli_query($con, $sql);
header("Location: persona.php")
?>