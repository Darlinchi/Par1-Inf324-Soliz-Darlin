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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Verificar la contraseña actual
    if ($client['password'] === $current_password) {
        // Verificar que la nueva contraseña y la confirmación coincidan
        if ($new_password === $confirm_password) {
            // Actualizar la contraseña en la base de datos
            $update_query = "UPDATE users SET password = ? WHERE username = ?";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bind_param('ss', $new_password, $username);
            if ($update_stmt->execute()) {
                header("Location: cliente.php");
                exit;
            } else {
                echo "Error al actualizar la contraseña.";
            }
        } else {
            echo "Las contraseñas no coinciden.";
        }
    } else {
        echo "Contraseña actual incorrecta.";
    }
}
?>
