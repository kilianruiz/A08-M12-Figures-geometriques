<link rel="stylesheet" href="./estilos/styles.css">

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['figura'] = $_POST['figura'];
}
$figura = $_SESSION['figura'] ?? '';


function mostrarInputs($figura) {
    switch ($figura) {
        case 'cuadrado':
            echo '<label for="lado1">Lados :</label>';
            echo '<input type="number" name="lado1" id="lado1" class="form-control" onblur="ValidaLado1()" required>';
            echo '<div id="error_lado1" class="invalid-feedback"></div>'; 
            break;
        case 'triangulo':
            echo '<label for="lado1">Lado 1:</label>';
            echo '<input type="number" name="lado1" id="lado1" class="form-control" onblur="ValidaLado1()" required>';
            echo '<div id="error_lado1" class="invalid-feedback"></div>'; 
            echo '<label for="lado2" class="mt-2">Lado 2:</label>';
            echo '<input type="number" name="lado2" id="lado2" class="form-control" onblur="ValidaLado2()" required>';
            echo '<div id="error_lado2" class="invalid-feedback"></div>'; 
            break;
        case 'rectangulo':
            echo '<label for="lado1">Lado 1:</label>';
            echo '<input type="number" name="lado1" id="lado1" class="form-control" onblur="ValidaLado1()" required>';
            echo '<div id="error_lado1" class="invalid-feedback"></div>'; 
            echo '<label for="lado2" class="mt-2">Lado 2:</label>';
            echo '<input type="number" name="lado2" id="lado2" class="form-control" onblur="ValidaLado2()" required>';
            echo '<div id="error_lado2" class="invalid-feedback"></div>'; 
            break;
        case 'circulo':
            echo '<label for="radio">Radio:</label>';
            echo '<input type="number" name="lado1" id="lado1" class="form-control" onblur="ValidaRadio()" required>';
            echo '<div id="error_lado1" class="invalid-feedback"></div>'; // estilo de boostrap para mostrar borde en rojo
            break;
        default:
            echo 'Selecciona una figura válida.';
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
    <script src="./JavaScript/validaciones.js"></script>
</head> 
<body> 
    <div class="container mt-4">
        <h2>Introducir los lados de las Figuras: <?php echo ucfirst($figura); ?></h2>
        <form action="resultats.php" method="post">
            <div class="form-group">
                <?php mostrarInputs($figura); ?>
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
            <a href="index.php" class="btn btn-secondary">Elegir otra figura</a>
        </form>
    </div>
</body>
</html>
