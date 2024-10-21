<link rel="stylesheet" href="./estilos/styles.css">

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['figura'] = $_POST['figura'];
}
$figura = $_SESSION['figura'] ?? '';

// Determinar els inputs que es necessiten segons la figura
function mostrarInputs($figura) {
    switch ($figura) {
        case 'cuadrado':
            echo '<label for="lado1">Lado:</label>';
            echo '<input type="number" name="lado1" id="lado1" class="form-control" value="' . ($_SESSION['lado1'] ?? '') . '" required>';
            break;
        case 'triangulo':
        case 'rectangulo':
            echo '<label for="lado1">Lado 1:</label>';
            echo '<input type="number" name="lado1" id="lado1" class="form-control" value="' . ($_SESSION['lado1'] ?? '') . '" required>';
            echo '<label for="lado2" class="mt-2">Lado 2:</label>';
            echo '<input type="number" name="lado2" id="lado2" class="form-control" value="' . ($_SESSION['lado2'] ?? '') . '" required>';
            break;
        case 'circulo':
            echo '<label for="radio">Radio:</label>';
            echo '<input type="number" name="radio" id="radio" class="form-control" value="' . ($_SESSION['lado1'] ?? '') . '" required>';
            break;
        default:
            echo 'Selecciona una figura vàlida.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduir Costats</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Introduir Costats de la Figura: <?php echo ucfirst($figura); ?></h2>
        <form action="resultats.php" method="post">
            <div class="form-group">
                <?php mostrarInputs($figura); ?>
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>
    </div>
</body>
</html>
