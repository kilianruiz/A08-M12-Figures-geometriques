<?php
session_start(); // Iniciamos la sesión para poder almacenar los datos en ella

// Inicializamos la variable de error
$error = "";

// Comprobamos si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificamos si se seleccionó una figura
    if (!isset($_POST['figura'])) {
        $error = "Por favor, selecciona una figura antes de continuar.";
    } else {
        // Guardamos la figura seleccionada en la sesión
        $_SESSION['figura'] = $_POST['figura'];
        // Redirigimos a la página siguiente si hay una figura seleccionada
        header("Location: introduir_costats.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona una Figura</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./estilos/styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Selecciona una Figura Geométrica</h2>

        <!-- Mostrar el mensaje de error si existe -->
        <?php if ($error): ?>
        <div class="alert alert-danger text-center">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>

        <form action="index.php" method="post">
            <div class="d-flex justify-content-center flex-wrap">
                <div class="card text-center m-3" style="width: 12rem;">
                    <div class="card-body">
                        <h5 class="card-title">Cuadrado</h5>
                        <input type="radio" value="cuadrado" name="figura" id="cuadrado">
                        <div class="image-container mt-2">
                            <img src="./img/cuadrado.png" alt="Cuadrado" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="card text-center m-3" style="width: 12rem;">
                    <div class="card-body">
                        <h5 class="card-title">Triángulo</h5>
                        <input type="radio" value="triangulo" name="figura" id="triangulo">
                        <div class="image-container mt-2">
                            <img src="./img/triangulo.png" alt="Triángulo" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="card text-center m-3" style="width: 12rem;">
                    <div class="card-body">
                        <h5 class="card-title">Rectángulo</h5>
                        <input type="radio" value="rectangulo" name="figura" id="rectangulo">
                        <div class="image-container mt-2">
                            <img src="./img/rectangulo.jfif" alt="Rectángulo" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="card text-center m-3" style="width: 12rem;">
                    <div class="card-body">
                        <h5 class="card-title">Círculo</h5>
                        <input type="radio" value="circulo" name="figura" id="circulo">
                        <div class="image-container mt-2">
                            <img src="./img/circulo.png" alt="Círculo" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Siguiente</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
