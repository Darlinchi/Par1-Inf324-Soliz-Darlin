<?php 
include "../conexion.inc.php";
$id_catastro=$_GET["id_catastro"];
$sql="delete from catastro where id_catastro=$id_catastro";
mysqli_query($con, $sql);
header("Location: catastro.php")
?> 