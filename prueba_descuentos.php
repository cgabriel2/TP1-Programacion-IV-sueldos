<?php

require_once 'descuentos.php';

// Ejemplo: empleado con $10.000 de haberes
$totalHaberes = 10000;

// Ejecutar la función
$resultado = calcularDescuentos($totalHaberes);

// Mostrar los resultados
echo "Obra social: $" . $resultado["obraSocial"] . "<br>";
echo "Jubilación: $" . $resultado["jubilacion"] . "<br>";
echo "Total descuentos: $" . $resultado["totalDescuentos"] . "<br>";
echo "Sueldo neto: $" . $resultado["sueldoNeto"];
