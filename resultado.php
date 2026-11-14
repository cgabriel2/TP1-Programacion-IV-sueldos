
<?php

// Muestra el recibo de sueldo con los datos recibidos
function mostrarLiquidacion($datos) {

    // Formatea los importes como pesos argentinos
    $pesos = function ($importe) {
        return '$' . number_format($importe, 2, ',', '.');
    };

    // Protege el texto de la categoría
    $categoria = htmlspecialchars(
        (string)$datos['categoria'],
        ENT_QUOTES,
        'UTF-8'
    );

    echo '
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Recibo de sueldo</h3>
            </div>

            <div class="card-body">
                <p><strong>Categoría:</strong> ' . $categoria . '</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
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
                                <td>Total haberes</td>
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
                                <td>Total descuentos</td>
                                <td class="text-end">' . $pesos($datos['total_descuentos']) . '</td>
                            </tr>
                            <tr class="table-success fw-bold">
                                <td>Sueldo neto</td>
                                <td class="text-end">' . $pesos($datos['sueldo_neto']) . '</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>';
}
?>
