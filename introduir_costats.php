<?php
session_start(); // Inicio la sesión para poder usar variables compartidas entre páginas

// Recupero la figura seleccionada desde la sesión
$figura = $_SESSION['figura'] ?? '';  // Si no existe una figura seleccionada, dejo la variable vacía

// Recupero los valores de los lados desde la sesión si existen, o uso los valores enviados por el formulario
$lado1 = isset($_SESSION['lado1']) ? $_SESSION['lado1'] : ($_POST['lado1'] ?? '');
$lado2 = isset($_SESSION['lado2']) ? $_SESSION['lado2'] : ($_POST['lado2'] ?? '');

// Inicializo variables para errores en los lados
$error_lado1 = $error_lado2 = ""; // Variables para guardar los mensajes de error si hay problemas en los campos

// Comprobamos si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Actualizamos los valores con los datos enviados en el formulario, ya que estos pueden haber cambiado
    $lado1 = $_POST['lado1'] ?? '';  // Asignamos el nuevo valor de lado1, si se envió en el formulario
    $lado2 = $_POST['lado2'] ?? '';  // Asignamos el nuevo valor de lado2, si se envió en el formulario

    // Validamos que el campo lado1 no esté vacío (necesario para todas las figuras)
    if (empty($lado1)) {
        $error_lado1 = "Este campo es obligatorio."; // Si está vacío, mostramos este mensaje de error
    }

    // Para triángulo o rectángulo, también validamos el campo lado2
    if (($figura == 'triangulo' || $figura == 'rectangulo') && empty($lado2)) {
        $error_lado2 = "Este campo es obligatorio."; // Si lado2 está vacío, mostramos este mensaje de error
    }

    // Si no hay errores en los campos, actualizamos los valores en la sesión
    if (empty($error_lado1) && empty($error_lado2)) {
        $_SESSION['lado1'] = $lado1; // Guardamos lado1 actualizado en la sesión
        $_SESSION['lado2'] = $lado2; // Guardamos lado2 actualizado en la sesión (si aplica)
        header('Location: resultats.php'); // Redirigimos a la página de resultados
        exit(); // Detenemos la ejecución del script para evitar que se ejecute código adicional
    }
}

// Esta función muestra los campos de formulario adecuados según la figura seleccionada
function mostrarInputs($figura, $lado1, $lado2, $error_lado1, $error_lado2) {
    // Dependiendo de la figura seleccionada, mostramos diferentes campos
    switch ($figura) {
        case 'cuadrado': // Si es un cuadrado, solo necesitamos un input para el lado
            echo '<label for="lado1">Lado:</label>';
            echo '<input type="number" name="lado1" id="lado1" class="form-control" value="' . htmlspecialchars($lado1) . '">';
            if ($error_lado1) { // Si hay un error en lado1, lo mostramos debajo del campo
                echo '<div class="text-danger">' . $error_lado1 . '</div>';
            }
            break;
        case 'triangulo': // Si es un triángulo, necesitamos dos inputs para los lados
            echo '<label for="lado1">Lado 1:</label>';
            echo '<input type="number" name="lado1" id="lado1" class="form-control" value="' . htmlspecialchars($lado1) . '">';
            if ($error_lado1) { // Si hay un error en lado1, lo mostramos
                echo '<div class="text-danger">' . $error_lado1 . '</div>';
            }
            echo '<label for="lado2" class="mt-2">Lado 2:</label>';
            echo '<input type="number" name="lado2" id="lado2" class="form-control" value="' . htmlspecialchars($lado2) . '">';
            if ($error_lado2) { // Si hay un error en lado2, lo mostramos
                echo '<div class="text-danger">' . $error_lado2 . '</div>';
            }
            break;
        case 'rectangulo': // Si es un rectángulo, también necesitamos dos inputs
            echo '<label for="lado1">Lado 1:</label>';
            echo '<input type="number" name="lado1" id="lado1" class="form-control" value="' . htmlspecialchars($lado1) . '">';
            if ($error_lado1) { // Si hay un error en lado1, lo mostramos
                echo '<div class="text-danger">' . $error_lado1 . '</div>';
            }
            echo '<label for="lado2" class="mt-2">Lado 2:</label>';
            echo '<input type="number" name="lado2" id="lado2" class="form-control" value="' . htmlspecialchars($lado2) . '">';
            if ($error_lado2) { // Si hay un error en lado2, lo mostramos
                echo '<div class="text-danger">' . $error_lado2 . '</div>';
            }
            break;
        case 'circulo': // Si es un círculo, solo necesitamos un input para el radio (lado1)
            echo '<label for="radio">Radio:</label>';
            echo '<input type="number" name="lado1" id="lado1" class="form-control" value="' . htmlspecialchars($lado1) . '">';
            if ($error_lado1) { // Si hay un error en lado1, lo mostramos
                echo '<div class="text-danger">' . $error_lado1 . '</div>';
            }
            break;
        default: // Si no se selecciona una figura válida, mostramos un mensaje de error
            echo 'Selecciona una figura válida.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduir Costats</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./estilos/styles.css">
</head> 
<body> 
    <div class="container">
        <div class="form-container mt-4">
            <h2>Introduce los lados de la Figura: <?php echo ucfirst($figura); ?></h2> <!-- Mostramos el nombre de la figura seleccionada en el título -->
            
            <!-- Si hay algún error en lado1 o lado2, mostramos un mensaje de advertencia general -->
            <?php if ($error_lado1 || $error_lado2): ?>
                <div class="alert alert-danger text-center">
                    Por favor, rellena todos los campos obligatorios.
                </div>
            <?php endif; ?>

            <form action="introduir_costats.php" method="post"> <!-- El formulario se envía a la misma página -->
                <div class="form-group">
                    <?php 
                    // Llamamos a la función para mostrar los inputs según la figura seleccionada
                    if ($figura) {
                        mostrarInputs($figura, $lado1, $lado2, $error_lado1, $error_lado2); 
                    } else {
                        echo '<p class="text-danger">Selecciona una figura válida.</p>'; // Si no hay una figura seleccionada, mostramos un mensaje
                    }
                    ?>
                </div>
                <div class="button-group">
                    <button type="submit" class="btn btn-primary">Calcular</button> <!-- Botón para enviar el formulario -->
                    <a href="./proCerrarSesion.php" class="btn btn-secondary">Elegir otra figura</a> <!-- Enlace para volver y elegir otra figura -->
                </div>
            </form>
        </div>
    </div>
</body>
</html>
