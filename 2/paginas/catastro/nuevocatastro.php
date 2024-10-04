<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Catastro - Catastro HAM-LP</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Insertar Catastro</h1>
        <form action="insertarcatastro.php" method="post">
            <div class="form-group mt-4">
                <label for="id_catastro">Identificador:</label>
                <input type="number" class="form-control" name="id_catastro" required>
            </div>
            <div class="form-group mt-3">
                <label for="distrito">Distrito:</label>
                <input type="text" class="form-control" name="distrito" required>
            </div>
            <div class="form-group mt-3">
                <label for="zona">Zona:</label>
                <input type="text" class="form-control" name="zona" required>
            </div>
            <div class="form-group mt-3">
                <label for="xini">X Inicial:</label>
                <input type="text" class="form-control" name="xini" required>
            </div>
            <div class="form-group mt-3">
                <label for="yini">Y Inicial:</label>
                <input type="text" class="form-control" name="yini" required>
            </div>
            <div class="form-group mt-3">
                <label for="xfin">X Fin:</label>
                <input type="text" class="form-control" name="xfin" required>
            </div>
            <div class="form-group mt-3">
                <label for="yfin">Y Fin:</label>
                <input type="text" class="form-control" name="yfin" required>
            </div>
            <div class="form-group mt-3">
                <label for="superficie">Superficie:</label>
                <input type="text" class="form-control" name="superficie" required>
            </div>
            <div class="form-group mt-3">
                <label for="ci">Cedula de Identidad:</label>
                <input type="text" class="form-control" name="ci" required>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Insertar</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
