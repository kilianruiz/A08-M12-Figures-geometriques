<?php
// Iniciamos la sesión para acceder a los datos almacenados
session_start();

// Inicializamos las variables con valores predeterminados
$figura = $_SESSION['figura'] ?? ''; // Recuperamos la figura seleccionada desde la sesión
$lado1 = $_SESSION['lado1'] ?? null; // Recuperamos el lado1 desde la sesión
$lado2 = $_SESSION['lado2'] ?? null; // Recuperamos el lado2 desde la sesión (si aplica)
$area = 0;
$perimetre = 0;

// Verificamos si la figura fue seleccionada
if ($figura) {
    // Dependiendo de la figura, realizamos los cálculos correspondientes
    switch ($figura) {
        case 'cuadrado':
            $area = $lado1 * $lado1; // Área del cuadrado
            $perimetre = 4 * $lado1; // Perímetro del cuadrado
            break;
        case 'triangulo':
            $area = ($lado1 * $lado2) / 2; // Área del triángulo
            $perimetre = $lado1 + $lado2 + sqrt($lado1 ** 2 + $lado2 ** 2); // Perímetro del triángulo rectángulo
            break;
        case 'rectangulo':
            $area = $lado1 * $lado2; // Área del rectángulo
            $perimetre = 2 * ($lado1 + $lado2); // Perímetro del rectángulo
            break;
        case 'circulo':
            $area = pi() * pow($lado1, 2); // Área del círculo
            $perimetre = 2 * pi() * $lado1; // Perímetro del círculo
            break;
        default:
            // Si no se seleccionó una figura válida, mostramos un mensaje de error
            echo 'Selecciona una figura válida.';
            exit;
    }
} else {
    // Si no hay una figura seleccionada, mostramos un mensaje de error
    echo 'No se ha seleccionado ninguna figura.';
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <!-- Incluimos Bootstrap para los estilos -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./estilos/styles.css">

</head>
<body>
    <div class="container result-container">
        <!-- Contenedor centralizado de los resultados -->
        <div class="card result-card text-center">
            <h2>Resultados de la Figura: <?php echo ucfirst($figura); ?></h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Tipo de Figura:</strong> <?php echo ucfirst($figura); ?></li>
                <li class="list-group-item"><strong>Lado 1:</strong> <?php echo $lado1 !== null ? htmlspecialchars($lado1) : 'No especificado'; ?></li>
                
                <!-- Solo mostramos el Lado 2 si es necesario (en triángulos y rectángulos) -->
                <?php if ($lado2 !== null): ?>
                    <li class="list-group-item"><strong>Lado 2:</strong> <?php echo htmlspecialchars($lado2); ?></li>
                <?php endif; ?>

                <!-- Mostramos el área y el perímetro calculados redondeados a 2 decimales -->
                <li class="list-group-item"><strong>Área:</strong> <?php echo round($area, 2); ?></li>
                <li class="list-group-item"><strong>Perímetro:</strong> <?php echo round($perimetre, 2); ?></li>
            </ul>
        </div>

        <!-- Botones para elegir otra figura o cambiar las medidas -->
        <div class="text-center mt-4">
            <a href="proCerrarSesion.php" class="btn btn-primary">Elegir otra Figura</a>
            <a href="introduir_costats.php" class="btn btn-secondary">Cambiar las medidas</a>
        </div>
    </div>

    <!-- Scripts de Bootstrap (opcional, si usas interactividad) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
