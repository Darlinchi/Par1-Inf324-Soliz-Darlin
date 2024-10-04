<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'cliente') {
    header("Location: login_form.php");
    exit;
}

include('db_connection.php');

// Obtener la información del cliente
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$client = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Cliente - Catastro HAM-LP</title>

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
            <h1 class="text-center">Bienvenido, <?php echo htmlspecialchars($client['username']); ?></h1>

            <h2>Datos de tu cuenta</h2>
            <p><strong>Nombre de usuario:</strong> <?php echo htmlspecialchars($client['username']); ?></p>

            <h2>Consultas</h2>
            <p>Si tienes alguna consulta, no dudes en <a href="contact_us.php">contactarnos</a>.</p>

            <div class="text-center">
                <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
