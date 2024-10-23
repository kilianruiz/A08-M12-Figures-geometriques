<link rel="stylesheet" href="./estilos/styles.css">

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['lado1'] = $_POST['lado1'] ?? null;
    $_SESSION['lado2'] = $_POST['lado2'] ?? null;
    $figura = $_SESSION['figura'] ?? '';
    $lado1 = $_SESSION['lado1'];
    $lado2 = $_SESSION['lado2'] ?? null;

    $area = 0;
    $perimetre = 0;

    switch ($figura) {
        case 'cuadrado':
            $area = $lado1 * $lado1;
            $perimetre = 4 * $lado1;
            break;
        case 'triangulo':
            $area = ($lado1 * $lado2) / 2;
            $perimetre = $lado1 + $lado2 + sqrt($lado1 ** 2 + $lado2 ** 2); // Exemple per un triangle rectangle
            break;
        case 'rectangulo':
            $area = $lado1 * $lado2;
            $perimetre = 2 * ($lado1 + $lado2);
            break;
        case 'circulo':
            $area = pi() * pow($lado1, 2);
            $perimetre = 2 * pi() * $lado1;
            break;
        default:
            echo 'Selecciona una figura vàlida.';
            exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultats</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Resultados de la Figura: <?php echo ucfirst($figura); ?></h2>
        <ul>
            <li><strong>Tipo de Figura:</strong> <?php echo ucfirst($figura); ?></li>
            <li><strong>Lado 1:</strong> <?php echo $lado1; ?></li>
            <?php if ($lado2): ?>
                <li><strong>Lado 2:</strong> <?php echo $lado2; ?></li>
            <?php endif; ?>

            <li><strong>Área:</strong> <?php echo round($area, 2); ?></li>
            <li><strong>Perímetro:</strong> <?php echo round($perimetre, 2); ?></li>
        </ul>
        <a href="proCerrarSesion.php" class="btn btn-secondary">Elegir otra Figura</a>
        <a href="introduir_costats.php" class="btn btn-secondary">Cambiar las medidas</a>
    </div>
</body>
</html>
