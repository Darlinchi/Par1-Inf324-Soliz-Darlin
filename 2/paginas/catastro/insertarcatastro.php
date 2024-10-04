<?php 
include "../conexion.inc.php";
$id_catastro = $_POST['id_catastro'];
$distrito = $_POST['distrito'];
$zona = $_POST['zona'];
$xini = $_POST['xini'];
$ini = $_POST['yini'];
$xfin = $_POST['xfin'];
$yfin = $_POST['yfin'];
$superficie = $_POST['superficie'];
$ci = $_POST['ci'];
$sql = "INSERT INTO catastro (id_catastro, distrito, zona, xini, yini, xfin, yfin, superficie, ci) VALUES ('$id_catastro', '$distrito', '$zona', '$xini', '$yini', '$xfin', '$yfin', '$superficie', '$ci')";
mysqli_query($con, $sql);
header("Location: catastro.php")
?>