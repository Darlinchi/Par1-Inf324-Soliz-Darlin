<?php 
include "../conexion.inc.php";
$id_catastro = $_GET["id_catastro"];
$sql = "SELECT * FROM catastro WHERE id_catastro = $id_catastro";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

$id_catastro = $fila["id_catastro"];
$zona = $fila["zona"];
$xini = $fila["xini"];
$yini = $fila["yini"];
$xfin = $fila["xfin"];
$yfin = $fila["yfin"];
$superficie = $fila["superficie"];
$ci = $fila["ci"];
$distrito = $fila["distrito"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Catastro - HAM-LP</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Editar Catastro</h1>
        <form action="guardaeditarcatastro.php" method="GET">
            <div class="mb-3">
                <label for="id_catastro" class="form-label">Identificador</label>
                <input type="text" class="form-control" id="id_catastro" name="id_catastro" value="<?php echo $id_catastro; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="zona" class="form-label">Zona</label>
                <input type="text" class="form-control" id="zona" name="zona" value="<?php echo $zona; ?>" required>
            </div>
            <div class="mb-3">
                <label for="xini" class="form-label">X Inicio</label>
                <input type="text" class="form-control" id="xini" name="xini" value="<?php echo $xini; ?>" required>
            </div>
            <div class="mb-3">
                <label for="yini" class="form-label">Y Inicio</label>
                <input type="text" class="form-control" id="yini" name="yini" value="<?php echo $yini; ?>" required>
            </div>
            <div class="mb-3">
                <label for="xfin" class="form-label">X Fin</label>
                <input type="text" class="form-control" id="xfin" name="xfin" value="<?php echo $xfin; ?>" required>
            </div>
            <div class="mb-3">
                <label for="yfin" class="form-label">Y Fin</label>
                <input type="text" class="form-control" id="yfin" name="yfin" value="<?php echo $yfin; ?>" required>
            </div>
            <div class="mb-3">
                <label for="superficie" class="form-label">Superficie</label>
                <input type="text" class="form-control" id="superficie" name="superficie" value="<?php echo $superficie; ?>" required>
            </div>
            <div class="mb-3">
                <label for="distrito" class="form-label">Distrito</label>
                <input type="text" class="form-control" id="distrito" name="distrito" value="<?php echo $distrito; ?>" required>
            </div>
            <div class="mb-3">
                <label for="ci" class="form-label">Cedula de Identidad</label>
                <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $ci; ?>" required>
            </div>
            <div class="text-center mt-4">
                <input type="submit" name="Aceptar" value="Aceptar" class="btn btn-secondary"/>
                <input type="button" name="Cancelar" value="Cancelar" class="btn btn-danger" onclick="window.history.back();"/>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
