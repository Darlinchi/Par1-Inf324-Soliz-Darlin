<?php
include('../login/db_connection.php'); // Asegúrate de que la ruta sea correcta

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $new_username = $_POST['username'];
    $new_ci = $_POST['ci'];
    $new_password = $_POST['password'];
    
    // Insertar en la base de datos
    $sql = "INSERT INTO users (username, ci, password, role) VALUES (?, ?, ?, 'cliente')";
    
    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sis', $new_username, $new_ci, $new_password);

    if ($stmt->execute()) {
        // Redirigir a usuarios.php después de la inserción exitosa
        header("Location: usuario.php");
        exit(); // Asegúrate de finalizar el script después de redirigir
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
