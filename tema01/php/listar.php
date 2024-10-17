<?php
$ruta = '../';
require_once 'encabezado.php';

// 1-c) Mostrar en una tabla los datos del archivo que coincidan con el mes y el año ingresados por la URL.
// Los datos del archivo son: año-mes-dia;dni;vacuna;cantidad

// Validar que el mes y el año sean proporcionados en la URL
if (isset($_GET['mes']) && isset($_GET['anio']) && isset($_GET['dia'])) {
    $mes = $_GET['mes'];
    $anio = $_GET['anio'];
    $dia = $_GET['dia'];
    // Ruta del archivo que contiene los datos
    $archivoVentas =  '../'. $anio . '/' . $anio . '-' . $mes . '-'. $dia . '-ventas.txt';

    // Verificar si el archivo existe
    if (file_exists($archivoVentas)) {
        echo "<h2>Datos del mes: $mes y año: $anio</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Fecha</th><th>DNI</th><th>Vacuna</th><th>Cantidad</th></tr>";

        // Abrir el archivo y leer línea por línea
        $archivo = fopen($archivoVentas, 'r');
        while (($linea = fgets($archivo)) !== false) {
            // Los datos están en el formato: año-mes-dia;dni;vacuna;cantidad
            $datos = explode(';', trim($linea)); // Separar los datos por punto y coma
            $fecha = $datos[0];
            $dni = $datos[1];
            $vacuna = $datos[2];
            $cantidad = $datos[3];

            // Mostrar los datos en la tabla
            echo "<tr>";
            echo "<td>$fecha</td>";
            echo "<td>$dni</td>";
            echo "<td>$vacuna</td>";
            echo "<td>$cantidad</td>";
            echo "</tr>";
        }

        // Cerrar el archivo
        fclose($archivo);

        echo "</table>";
    } else {
        echo "<p>No se encontró el archivo para el mes y año especificados.</p>";
    }
} else {
    echo "<p>Error: No se proporcionaron los parámetros de mes y año en la URL.</p>";
}

require_once 'pie.php';
?>
