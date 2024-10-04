<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Inicio de Sesión</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/log.css">
</head>

<body>

    <div class="hero_area">
        <h1>Bienvenido a HAM-LP</h1>
        <p>Inicie sesión para acceder a su cuenta</p>
    </div>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="login-container">
                    <h2 class="text-center">Iniciar Sesión</h2>
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese su nombre de usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <img src="../images/logolapaz.png" alt="La Paz - Bolivia" class="image-container img-fluid">
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
