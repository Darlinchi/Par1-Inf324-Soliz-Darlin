<?php
session_start();
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Comparar la contraseña directamente
        if ($password === $user['password']) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            
            if ($user['role'] === 'administrador') {
                header("Location: ../persona/persona.php");
                exit();
            } else {
                header("Location: cliente.php");
                exit();
            }
        } else {
            echo "<script>alert('Usuario o contraseña incorrectos.');</script>";
        }
    } else {
        echo "<script>alert('Usuario o contraseña incorrectos.');</script>";
    }    
}
?>
