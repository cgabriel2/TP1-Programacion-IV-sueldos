<?php

const PORC_ANTIGUEDAD  = 0.10; // 10% del básico por cada año
const PORC_PRESENTISMO = 0.15; // 15% del básico
const PORC_DEDICACION  = 0.50; // 50% del básico

/**
 * @param float $basico     Sueldo básico de la categoría
 * @param int   $antiguedad Años de antigüedad (ya validado, 1 a 30)
 * @return array            Cada concepto y el total de haberes
 */
function calcularHaberes(float $basico, int $antiguedad): array
{
    // (Básico * 10%) * años
    $montoAntiguedad  = ($basico * PORC_ANTIGUEDAD) * $antiguedad;

    // 15% del básico
    $montoPresentismo = $basico * PORC_PRESENTISMO;

    // 50% del básico
    $montoDedicacion  = $basico * PORC_DEDICACION;

    // El total INCLUYE el sueldo básico
    $totalHaberes = $basico + $montoAntiguedad + $montoPresentismo + $montoDedicacion;

    return [
        'basico'      => round($basico, 2),
        'antiguedad'  => round($montoAntiguedad, 2),
        'presentismo' => round($montoPresentismo, 2),
        'dedicacion'  => round($montoDedicacion, 2),
        'total'       => round($totalHaberes, 2),
    ];
}
