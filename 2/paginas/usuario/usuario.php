<?php 
include "../conexion.inc.php"; // Asegúrate de que este archivo establece la conexión a la base de datos.
$sql = "SELECT * FROM users WHERE role = 'cliente'"; // Consulta para obtener solo los registros de clientes.
$resultado = mysqli_query($con, $sql);
?>

<!DOCTYPE html> 
<html lang="es">
<head> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Catastro HAM-LP - Usuarios</title>

  <!-- Fonts Google -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../css/bootstrap.css">

  <!-- Custom Styles -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/responsive.css">
</head>
<body>
  <div class="hero_area">
    <!-- Header Section -->
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.php">
            <img src="../images/logocasa.png" alt="Logo La Paz" style="width: 60px; height: auto;">
            <span>Catastro HAM-LP</span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link" href="../persona/persona.php">Persona</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../catastro/catastro.php">Catastro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="usuario.php">Usuario</a>
              </li>
            </ul>
            <div class="quote_btn-container">
              <a href="tel:+011234567890">ADMINISTRACIÓN</a>
            </div>
          </div>
        </nav>
      </div>
    <!-- End Header Section -->

    <main class="container mt-4">
      <h1 class="text-center">Lista de Usuarios</h1>
      <table class="table table-striped mt-3">
        <thead>
          <tr>  
            <th scope="col">ID</th>
            <th scope="col">Nombre de Usuario</th>
            <th scope="col">Cédula de Identidad</th>
            <th scope="col">Contraseña</th>
            <th scope="col">Operaciones</th>
          </tr>
        </thead>
        <tbody>
          <?php while($fila = mysqli_fetch_array($resultado)): ?>
            <tr>
              <td scope="row"><?php echo $fila['id']; ?></td>
              <td><?php echo htmlspecialchars($fila['username']); ?></td>
              <td><?php echo $fila['ci']; ?></td>
              <td><?php echo htmlspecialchars($fila['password']); ?></td> <!-- Mostrar la contraseña -->
              <td>
                <a class="btn btn-secondary" href="editarusuario.php?id=<?php echo $fila['id']; ?>">Editar</a>
                <a class="btn btn-danger" href="eliminarusuario.php?id=<?php echo $fila['id']; ?>">Eliminar</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
      <div class="text-center mt-4">
        <a class="btn btn-primary" href="nuevousuario.php">Nuevo Usuario</a>
      </div>
    </main>

    <div class="text-center">
      <a href="../login/logout.php" class="btn btn-danger">Cerrar Sesión</a>
    </div>
    
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
