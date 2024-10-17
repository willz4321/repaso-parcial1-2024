<?php
// 1-a) Recibir la fecha y el archivo del formulario de admin.php.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar que los campos no lleguen vacíos
    if (!empty($_POST['fecha']) && !empty($_FILES['archivo']['name'])) {
        $fecha = $_POST['fecha'];
        $archivo = $_FILES['archivo'];
           
        echo $fecha;
        // Separar la fecha en año, mes y día utilizando la función explode
        $fechaPartes = explode('-', $fecha);
        $anio = $fechaPartes[0];
        $mes = $fechaPartes[1];
        $dia = $fechaPartes[2];

        // Crear la carpeta con el nombre del año si no existe
        $rutaCarpeta = '../' . $anio;
        if (!is_dir($rutaCarpeta)) {
            mkdir($rutaCarpeta, 0777, true); // Crear la carpeta con permisos adecuados
        }

        // 1-b) Mover el archivo a la carpeta indicada.
        // El nuevo nombre del archivo será: año-mes-dia-ventas.txt
        $nuevoNombreArchivo = $anio . '-' . $mes . '-' . $dia . '-ventas.txt';
        $rutaDestino = $rutaCarpeta . '/' . $nuevoNombreArchivo;

        if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
            // 1-c) Redireccionar a la página listar.php sin demoras
            header('refresh:3; url=listar.php?mes=' . $mes . '&anio=' . $anio . '&dia=' . $dia);
            exit();
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        echo "Error: Debes seleccionar una fecha y un archivo.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
