
<?php

// Función que mostrará los resultados de la liquidación.
function mostrarLiquidacion($datos) {

    // Obtenemos los datos recibidos.
    $categoria = $datos['categoria'];
    $sueldoBasico = $datos['sueldo_basico'];

    // Mostramos la información.
    echo "<h2>Recibo de sueldo</h2>";
    echo "<p>Categoría: " . htmlspecialchars((string)$categoria, ENT_QUOTES, 'UTF-8') . "</p>";
    echo "<p>Sueldo básico: $" . number_format($sueldoBasico, 2, ',', '.') . "</p>";
}
?>

