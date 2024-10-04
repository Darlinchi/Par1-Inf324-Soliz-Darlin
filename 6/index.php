<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "bddarlin";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL con CASE WHEN y GROUP BY para agrupar personas por tipo de catastro
$sql = "
SELECT 
    CASE
        WHEN LEFT(c.id_catastro, 1) = '1' THEN 'Alto'
        WHEN LEFT(c.id_catastro, 1) = '2' THEN 'Medio'
        WHEN LEFT(c.id_catastro, 1) = '3' THEN 'Bajo'
    END AS tipo_catastro,
    p.nombre,
    p.paterno,
    p.materno,
    c.zona
FROM persona p
JOIN catastro c ON p.ci = c.ci
GROUP BY tipo_catastro, p.nombre, p.paterno, p.materno, c.zona
ORDER BY tipo_catastro;
";

// Ejecutar la consulta 
$result = $conn->query($sql);

// Arreglos para almacenar personas y propiedades según el tipo de catastro
$alto = [];
$medio = [];
$bajo = [];

if ($result->num_rows > 0) {
    // Clasificar las personas y sus propiedades según el tipo de catastro
    while($row = $result->fetch_assoc()) {
        $persona = $row["nombre"] . " " . $row["paterno"] . " " . $row["materno"];
        $propiedad = $row["zona"];
        if ($row["tipo_catastro"] == 'Alto') {
            $alto[] = ['persona' => $persona, 'propiedad' => $propiedad];
        } elseif ($row["tipo_catastro"] == 'Medio') {
            $medio[] = ['persona' => $persona, 'propiedad' => $propiedad];
        } elseif ($row["tipo_catastro"] == 'Bajo') {
            $bajo[] = ['persona' => $persona, 'propiedad' => $propiedad];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas y Propiedades por Tipo de Catastro</title>
    <!-- Agregar Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Lista de Personas y Propiedades por Tipo de Catastro</h2>

    <div class="row">
        <!-- Columna Alto -->
        <div class="col-md-4">
            <h3 class="text-center">Alto</h3>
            <ul class="list-group">
                <?php
                if (!empty($alto)) {
                    foreach ($alto as $item) {
                        echo "<li class='list-group-item'>
                                <strong>{$item['persona']}</strong><br>
                                <em>Propiedad: {$item['propiedad']}</em>
                              </li>";
                    }
                } else {
                    echo "<li class='list-group-item'>No hay personas en esta categoría</li>";
                }
                ?>
            </ul>
        </div>

        <!-- Columna Medio -->
        <div class="col-md-4">
            <h3 class="text-center">Medio</h3>
            <ul class="list-group">
                <?php
                if (!empty($medio)) {
                    foreach ($medio as $item) {
                        echo "<li class='list-group-item'>
                                <strong>{$item['persona']}</strong><br>
                                <em>Propiedad: {$item['propiedad']}</em>
                              </li>";
                    }
                } else {
                    echo "<li class='list-group-item'>No hay personas en esta categoría</li>";
                }
                ?>
            </ul>
        </div>

        <!-- Columna Bajo -->
        <div class="col-md-4">
            <h3 class="text-center">Bajo</h3>
            <ul class="list-group">
                <?php
                if (!empty($bajo)) {
                    foreach ($bajo as $item) {
                        echo "<li class='list-group-item'>
                                <strong>{$item['persona']}</strong><br>
                                <em>Propiedad: {$item['propiedad']}</em>
                              </li>";
                    }
                } else {
                    echo "<li class='list-group-item'>No hay personas en esta categoría</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<!-- Agregar Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
