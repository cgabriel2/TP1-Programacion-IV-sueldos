
<?php

// Muestra el recibo con los datos de la liquidación.
function mostrarLiquidacion($datos) {

    // Formato de moneda argentina.
    $pesos = function ($importe) {
        return '$' . number_format($importe, 2, ',', '.');
    };

    // Evita que la categoría se interprete como HTML.
    $categoria = htmlspecialchars(
        (string) $datos['categoria'],
        ENT_QUOTES,
        'UTF-8'
    );

    echo '
    <div class="container my-5">
        <div class="card border-0 shadow-sm mx-auto"
             style="max-width: 850px;">

            <div class="card-header bg-white p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold mb-1">RECIBO DE SUELDO</h3>
                        <p class="text-muted mb-0">Detalle de liquidación</p>
                    </div>
                    <span class="badge bg-primary fs-6">
                        Cat. ' . $categoria . '
                    </span>
                </div>
            </div>

            <div class="card-body p-4">

                <div class="d-flex justify-content-between mb-4">
                    <strong>Categoría del empleado</strong>
                    <span>' . $categoria . '</span>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Concepto</th>
                                <th class="text-end">Importe</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>Sueldo básico</td>
                                <td class="text-end">' . $pesos($datos['sueldo_basico']) . '</td>
                            </tr>
                            <tr>
                                <td>Antigüedad</td>
                                <td class="text-end">' . $pesos($datos['antiguedad_importe']) . '</td>
                            </tr>
                            <tr>
                                <td>Presentismo</td>
                                <td class="text-end">' . $pesos($datos['presentismo']) . '</td>
                            </tr>
                            <tr>
                                <td>Dedicación especial</td>
                                <td class="text-end">' . $pesos($datos['dedicacion_especial']) . '</td>
                            </tr>

                            <tr class="table-primary fw-bold">
                                <td>TOTAL HABERES</td>
                                <td class="text-end">' . $pesos($datos['total_haberes']) . '</td>
                            </tr>

                            <tr>
                                <td>Obra social</td>
                                <td class="text-end">' . $pesos($datos['obra_social']) . '</td>
                            </tr>
                            <tr>
                                <td>Aporte jubilatorio</td>
                                <td class="text-end">' . $pesos($datos['aporte_jubilatorio']) . '</td>
                            </tr>

                            <tr class="table-warning fw-bold">
                                <td>TOTAL DESCUENTOS</td>
                                <td class="text-end">' . $pesos($datos['total_descuentos']) . '</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="bg-success bg-opacity-10 rounded p-4 mt-4">
                    <p class="text-muted fw-semibold mb-1">
                        TOTAL NETO A COBRAR
                    </p>
                    <h2 class="fw-bold text-success mb-0">' .
                        $pesos($datos['sueldo_neto']) . '
                    </h2>
                </div>

            </div>
        </div>
    </div>';
}
?>
