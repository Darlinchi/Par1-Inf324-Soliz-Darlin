<?php 
include "../conexion.inc.php"; // Asegúrate de que este archivo establece la conexión a la base de datos.

$id = $_GET["id"]; // Obtener el ID del usuario a editar
$sql = "SELECT * FROM users WHERE id = $id"; // Consulta para obtener los datos del usuario
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

// Asignar datos a variables
$username = $fila["username"];
$ci = $fila["ci"];
$password = $fila["password"]; // Si deseas mostrar la contraseña para ediciones futuras
$role = $fila["role"]; // Solo para referencia, no lo mostramos en el formulario
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario - Catastro HAM-LP</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Editar Usuario</h1>
        <form action="guardaeditarusuario.php" method="POST"> <!-- Cambiar a POST para más seguridad -->
            <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Campo oculto para el ID -->
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="mb-3">
                <label for="ci" class="form-label">Cédula de Identidad</label>
                <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $ci; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña (dejar vacío si no se desea cambiar)</label>
                <input type="text" class="form-control" id="password" name="password">
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
