<?php 
include "../conexion.inc.php";
$id_catastro=$_GET["id_catastro"];
$distrito=$_GET["distrito"];
$zona=$_GET["zona"];
$xini=$_GET["xini"];
$yini=$_GET["yini"];
$xfin=$_GET["xfin"];
$yfin=$_GET["yfin"];
$superficie=$_GET["superficie"];
$ci=$_GET["ci"];
$sql="update catastro set distrito='$distrito', zona='$zona', xini='$xini', yini='$yini', xfin='$xfin', yfin='$yfin', superficie='$superficie', ci='$ci' where id_catastro=$id_catastro";
mysqli_query($con, $sql);
header("Location: catastro.php")
?>