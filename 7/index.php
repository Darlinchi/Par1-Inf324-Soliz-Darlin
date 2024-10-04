<?php
// Conexión a la base de datos
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "bddarlin";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener distritos únicos
$sql_distritos = "SELECT DISTINCT distrito FROM distritos_zonas ORDER BY distrito";
$result_distritos = $conn->query($sql_distritos);

// Obtener zonas si se seleccionó un distrito
$distrito_seleccionado = isset($_GET['distrito']) ? $_GET['distrito'] : '';
$zonas = array();
if ($distrito_seleccionado) {
    $sql_zonas = "SELECT zona FROM distritos_zonas WHERE distrito = ? ORDER BY zona";
    $stmt = $conn->prepare($sql_zonas);
    $stmt->bind_param("s", $distrito_seleccionado);
    $stmt->execute();
    $result_zonas = $stmt->get_result();
    while ($row = $result_zonas->fetch_assoc()) {
        $zonas[] = $row['zona'];
    }
    $stmt->close();
}

// Obtener catastros si se seleccionó una zona
$zona_seleccionada = isset($_GET['zona']) ? $_GET['zona'] : '';
$catastros = array();
if ($distrito_seleccionado && $zona_seleccionada) {
    $sql_catastros = "SELECT c.*, p.nombre FROM catastro c 
                      JOIN persona p ON c.ci = p.ci 
                      WHERE c.distrito = ? AND c.zona = ?";
    $stmt = $conn->prepare($sql_catastros);
    $stmt->bind_param("ss", $distrito_seleccionado, $zona_seleccionada);
    $stmt->execute();
    $result_catastros = $stmt->get_result();
    while ($row = $result_catastros->fetch_assoc()) {
        $catastros[] = $row;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selector de Distrito, Zona y Catastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Selector de Distrito, Zona y Catastro</h2>
        <form id="selectorForm">
            <div class="mb-3">
                <label for="distrito" class="form-label">Seleccione Distrito:</label>
                <select class="form-select" id="distrito" name="distrito" onchange="this.form.submit()">
                    <option value="">Seleccione un distrito</option>
                    <?php
                    if ($result_distritos->num_rows > 0) {
                        while($row = $result_distritos->fetch_assoc()) {
                            $selected = ($row['distrito'] == $distrito_seleccionado) ? 'selected' : '';
                            echo "<option value='" . $row['distrito'] . "' $selected>" . $row['distrito'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="zona" class="form-label">Seleccione Zona:</label>
                <select class="form-select" id="zona" name="zona" onchange="this.form.submit()" <?php echo empty($distrito_seleccionado) ? 'disabled' : ''; ?>>
                    <option value="">Seleccione una zona</option>
                    <?php
                    foreach ($zonas as $zona) {
                        $selected = ($zona == $zona_seleccionada) ? 'selected' : '';
                        echo "<option value='$zona' $selected>$zona</option>";
                    }
                    ?>
                </select>
            </div>
        </form>

        <?php if (!empty($catastros)): ?>
        <h3 class="mt-4">Catastros en <?php echo "$zona_seleccionada, $distrito_seleccionado"; ?></h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Propietario</th>
                        <th>CI</th>
                        <th>X Inicial</th>
                        <th>Y Inicial</th>
                        <th>X Final</th>
                        <th>Y Final</th>
                        <th>Superficie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($catastros as $catastro): ?>
                    <tr>
                        <td><?php echo $catastro['id_catastro']; ?></td>
                        <td><?php echo $catastro['nombre']; ?></td>
                        <td><?php echo $catastro['ci']; ?></td>
                        <td><?php echo $catastro['xini']; ?></td>
                        <td><?php echo $catastro['yini']; ?></td>
                        <td><?php echo $catastro['xfin']; ?></td>
                        <td><?php echo $catastro['yfin']; ?></td>
                        <td><?php echo $catastro['superficie']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php elseif ($distrito_seleccionado && $zona_seleccionada): ?>
        <div class="alert alert-info mt-4">No se encontraron catastros para la zona seleccionada.</div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>