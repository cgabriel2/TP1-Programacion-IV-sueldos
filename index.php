
<?php
// Importamos los módulos del sistema
require_once 'categorias.php';
require_once 'haberes.php';
require_once 'descuentos.php';
require_once 'resultado.php';

// Variables iniciales
$error = '';
$datos = null;
$categoria = '';
$antiguedad = '';

// Procesamos el formulario cuando se presiona Calcular
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $categoria = $_POST['categoria'] ?? '';
    $antiguedad = $_POST['antiguedad'] ?? '';

    // Validamos los datos ingresados
    if (!in_array($categoria, ['A', 'B', 'C', 'D'], true)) {
        $error = 'Seleccioná una categoría válida.';
    } elseif (
        filter_var($antiguedad, FILTER_VALIDATE_INT) === false ||
        (int)$antiguedad < 1 ||
        (int)$antiguedad > 30
    ) {
        $error = 'La antigüedad debe estar entre 1 y 30 años.';
    } else {

        // Módulo 2: obtener sueldo básico
        $basico = obtenerSueldoBasico($categoria);

        // Módulo 3: calcular haberes
        $haberes = calcularHaberes($basico, (int)$antiguedad);

        // Módulo 4: calcular descuentos
        $descuentos = calcularDescuentos($haberes['total']);

        // Adaptamos los datos para el módulo 5
        $datos = [
            'categoria' => $categoria,
            'sueldo_basico' => $basico,
            'antiguedad_importe' => $haberes['antiguedad'],
            'presentismo' => $haberes['presentismo'],
            'dedicacion_especial' => $haberes['dedicacion'],
            'total_haberes' => $haberes['total'],
            'obra_social' => $descuentos['obraSocial'],
            'aporte_jubilatorio' => $descuentos['jubilacion'],
            'total_descuentos' => $descuentos['totalDescuentos'],
            'sueldo_neto' => $descuentos['sueldoNeto']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Liquidación de Sueldos</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Estilos del grupo -->
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body class="bg-light">

    <div class="container my-5" style="max-width: 850px;">

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white p-3">
                <h2 class="mb-0">Liquidación de Sueldos</h2>
            </div>

            <div class="card-body p-4">

                <form method="POST" action="">

                    <div class="mb-3">
                        <label for="categoria" class="form-label">
                            Categoría
                        </label>

                        <select
                            name="categoria"
                            id="categoria"
                            class="form-select"
                            required
                        >
                            <option value="">Seleccionar categoría</option>

                            <?php foreach (['A', 'B', 'C', 'D'] as $opcion): ?>
                                <option
                                    value="<?= $opcion ?>"
                                    <?= $categoria === $opcion ? 'selected' : '' ?>
                                >
                                    Categoría <?= $opcion ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="antiguedad" class="form-label">
                            Años de antigüedad
                        </label>

                        <input
                            type="number"
                            name="antiguedad"
                            id="antiguedad"
                            class="form-control"
                            min="1"
                            max="30"
                            step="1"
                            value="<?= htmlspecialchars((string)$antiguedad, ENT_QUOTES, 'UTF-8') ?>"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Calcular sueldo
                    </button>

                </form>

                <?php if ($error !== ''): ?>
                    <div class="alert alert-danger mt-3">
                        <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <?php
    // Módulo 5: mostrar recibo
    if ($datos !== null) {
        mostrarLiquidacion($datos);
    }
    ?>

</body>
</html>
