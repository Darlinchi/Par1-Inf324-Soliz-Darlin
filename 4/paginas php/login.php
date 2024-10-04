<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "bddarlin";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$input_username = $_POST['username'];
$input_password = $_POST['password'];
$sql = "SELECT * FROM users WHERE username = '$input_username' AND password = '$input_password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $ci = $user['ci'];

    $sql_catastro = "SELECT id_catastro, zona, distrito FROM catastro WHERE ci = $ci";
    $result_catastro = $conn->query($sql_catastro);

    if ($result_catastro->num_rows > 0) {
        $catastro_data = [];
        while ($catastro = $result_catastro->fetch_assoc()) {
            $id_catastro = $catastro['id_catastro'];
            $zona = $catastro['zona'];
            $distrito = $catastro['distrito'];
            $first_char = substr($id_catastro, 0, 1);
            
            $catastro_data[] = [
                'impuesto' => $first_char,
                'zona' => $zona,
                'distrito' => $distrito
            ];
        }

        $catastro_json = json_encode($catastro_data);
        header("Location: http://localhost:9090/WebApplication2/NewServlet?catastros=" . urlencode($catastro_json));
        exit();
    } else {
        echo "No se encontró un catastro asociado al usuario.";
    }
} else {
    echo "Nombre de usuario o contraseña incorrectos.";
}

$conn->close();
?>
