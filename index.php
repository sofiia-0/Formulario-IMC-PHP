<?php
// Inicializar variables con valores predeterminados
$nombre = "";
$edad = "";
$peso = "";
$altura = "";
$mensajeSaludo = "";
$imcResultado = "";

// Funciones
function saludar($nombre)
{
    return "Hola $nombre (๑'ᵕ'๑)⸝*";
}

function calcularIMC($peso, $altura)
{
    // Convertir altura a metros si viene en centímetros
    if ($altura > 3) {
        $altura = $altura / 100;
    }
    return round($peso / ($altura * $altura), 2);
}

// Si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"] ?? "";
    $edad = $_POST["edad"] ?? "";
    $peso = $_POST["peso"] ?? "";
    $altura = $_POST["altura"] ?? "";

    // Validaciones simples
    if ($nombre && $edad && $peso && $altura) {
        $mensajeSaludo = saludar($nombre);
        $imcResultado = "Su IMC es: " . calcularIMC($peso, $altura);
    } else {
        $mensajeSaludo = "Por favor complete todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario y Cálculo IMC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Formulario de Usuario</h1>
        <form method="POST" action="">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required value="<?= htmlspecialchars($nombre) ?>">

            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required value="<?= htmlspecialchars($edad) ?>">

            <label for="peso">Peso (kg):</label>
            <input type="number" id="peso" name="peso" required value="<?= htmlspecialchars($peso) ?>">

            <label for="altura">Altura (cm):</label>
            <input type="number" id="altura" name="altura" required value="<?= htmlspecialchars($altura) ?>">

            <button type="submit">Enviar</button>
        </form>

        <div class="resultado">
            <h2>Resultado</h2>
            <p><?= $mensajeSaludo ?></p>
            <p><?= $imcResultado ?></p>
        </div>
    </div>
</body>
</html>
