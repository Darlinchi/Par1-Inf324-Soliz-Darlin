<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'cliente') {
    header("Location: login_form.php");
    exit;
}

include('db_connection.php');

// Obtener el CI del cliente
$username = $_SESSION['username'];
$query = "SELECT ci FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$client = $result->fetch_assoc();
$client_ci = $client['ci'];

// Consulta para obtener las propiedades del cliente según su CI
$query = "SELECT * FROM catastro WHERE ci = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $client_ci);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Propiedades - Catastro HAM-LP</title>

    <!-- Fonts Google -->
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
</head>
<body>
    <div class="hero_area">
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
                            <a class="nav-link" href="cliente.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clienteedit.php">Editar Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clientepro.php">Ver Propiedades</a>
                        </li>
                    </ul>
                    <div class="quote_btn-container">
                        <a href="">CLIENTE</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container mt-4">
            <h1 class="text-center">Datos de tus Propiedades</h1>

            <?php if ($result->num_rows > 0): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Zona</th>
                            <th>X Inicio</th>
                            <th>Y Inicio</th>
                            <th>X Fin</th>
                            <th>Y Fin</th>
                            <th>Superficie</th>
                            <th>CI</th>
                            <th>Distrito</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id_catastro']; ?></td>
                                <td><?php echo htmlspecialchars($row['zona']); ?></td>
                                <td><?php echo $row['xini']; ?></td>
                                <td><?php echo $row['yini']; ?></td>
                                <td><?php echo $row['xfin']; ?></td>
                                <td><?php echo $row['yfin']; ?></td>
                                <td><?php echo $row['superficie']; ?></td>
                                <td><?php echo $row['ci']; ?></td>
                                <td><?php echo htmlspecialchars($row['distrito']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center">No tienes propiedades disponibles.</p>
            <?php endif; ?>

            <div class="text-center mt-4">
                <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
