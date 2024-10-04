<?php 
include "../conexion.inc.php";
$ci = $_GET["ci"];
$sql = "SELECT * FROM persona WHERE ci = $ci";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

$ci = $fila["ci"];
$nombre = $fila["nombre"];
$paterno = $fila["paterno"];
$materno = $fila["materno"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona - Catastro HAM-LP</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Editar Persona</h1>
        <form action="guardaeditarpersona.php" method="GET">
            <div class="mb-3">
                <label for="ci" class="form-label">Cedula de Identidad</label>
                <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $ci; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
            </div>
            <div class="mb-3">
                <label for="paterno" class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" id="paterno" name="paterno" value="<?php echo $paterno; ?>" required>
            </div>
            <div class="mb-3">
                <label for="materno" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" id="materno" name="materno" value="<?php echo $materno; ?>" required>
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
