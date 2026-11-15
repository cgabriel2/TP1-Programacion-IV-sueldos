<?php

// Devuelve el sueldo básico según la categoría del empleado.
function obtenerSueldoBasico($categoria)
{
    $sueldos = [
        'A' => 4050.55,
        'B' => 3209.20,
        'C' => 2575.73,
        'D' => 1812.28
    ];

    // Verificamos que la categoría exista.
    if (!array_key_exists($categoria, $sueldos)) {
        throw new InvalidArgumentException(
            "La categoría ingresada no es válida."
        );
    }

    return $sueldos[$categoria];
}

