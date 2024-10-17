<?php
function reservarTurno($apellido, $nombre, $dni, $correo, $celular, $vacuna, $fecha, $hora, $costo) {
    // Abrir el archivo 'turnos.csv' en modo de escritura (append para agregar nuevas líneas)
    $archivo = fopen('turnos.csv', 'a');
    
    // Crear la línea a guardar en el archivo CSV
    $linea = "$apellido,$nombre,$dni,$correo,$celular,$vacuna,$fecha,$hora,$costo\n";
    
    // Escribir la línea en el archivo
    fwrite($archivo, $linea);
    
    // Cerrar el archivo
    fclose($archivo);
    
    // Mostrar mensaje de guardado exitoso
    echo "<p>Guardado exitoso</p>";
    
    // Esperar 3 segundos y redireccionar a index.php
    header("refresh:6; url=../index.php");
}
?>
