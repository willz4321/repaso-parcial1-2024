<?php
$ruta = '../';
require_once 'encabezado.php';
require_once 'datos.php'; // El archivo donde está el arreglo $costos
require_once 'funciones.php'; // El archivo donde está la función reservarTurno

// 2-a) Controlar los datos que provienen del formulario
// Verificar si todos los campos están completos
if (isset($_POST['apellido'], $_POST['nombre'], $_POST['dni'], $_POST['correo'], $_POST['celular'], $_POST['vacuna'], $_POST['fecha'], $_POST['hora']) &&
    !empty($_POST['apellido']) && !empty($_POST['nombre']) && !empty($_POST['dni']) && !empty($_POST['correo']) && !empty($_POST['celular']) &&
    !empty($_POST['vacuna']) && !empty($_POST['fecha']) && !empty($_POST['hora'])) {

    // Guardar los datos del formulario en variables
    $apellido = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $vacuna = $_POST['vacuna'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // 2-b) Buscar el costo de la vacuna elegida en el arreglo $costos
    if (isset($costos[$vacuna])) {
        $costoVacuna = $costos[$vacuna];

        // 2-c) Llamar al procedimiento reservarTurno con todos los datos necesarios
        reservarTurno($apellido, $nombre, $dni, $correo, $celular, $vacuna, $fecha, $hora, $costoVacuna);

        // Mensaje de éxito o redirección
        echo "<p>Turno reservado correctamente para $nombre $apellido el $fecha a las $hora con un costo de $costoVacuna.</p>";
    } else {
        echo "<p>Error: La vacuna seleccionada no tiene un costo asociado.</p>";
    }
} else {
    // Mensaje de error si faltan campos
    echo "<p>Error: Todos los campos son obligatorios. Por favor complete el formulario correctamente.</p>";
}

require_once 'pie.php';
?>
