<?php

function calcularDescuentos($totalHaberes)
{
    // Calcular los descuentos
    $obraSocial = $totalHaberes * 0.05;
    $jubilacion = $totalHaberes * 0.11;

    // Sumar los descuentos
    $totalDescuentos = $obraSocial + $jubilacion;

    // Calcular el sueldo neto
    $sueldoNeto = $totalHaberes - $totalDescuentos;

    // Devolver los resultados
    return [
        "obraSocial" => $obraSocial,
        "jubilacion" => $jubilacion,
        "totalDescuentos" => $totalDescuentos,
        "sueldoNeto" => $sueldoNeto
    ];
}

