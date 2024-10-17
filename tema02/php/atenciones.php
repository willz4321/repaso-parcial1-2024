<?php
    $ruta = '../';
    require_once('../html/header.html');
    require_once 'datos.php'; // Se asume que este archivo contiene el array $transportes

    // Array para contar las atenciones por cada tipo de transporte
    $atenciones = [];

    // Inicializar el contador para cada tipo de transporte
    foreach ($transportes as $transporte) {
        $atenciones[$transporte] = 0;
    }

    // Simular 500 atenciones seleccionando un tipo de transporte aleatoriamente
    for ($i = 0; $i < 500; $i++) {
        $transporteAleatorio = $transportes[array_rand($transportes)]; // Selección aleatoria
        $atenciones[$transporteAleatorio]++; // Incrementar el contador del transporte seleccionado
    }

    // Mostrar el total de atenciones por tipo de transporte
    echo "<h3>Total de atenciones por tipo de transporte:</h3>";
    foreach ($atenciones as $transporte => $total) {
        echo "Transporte: $transporte - Atenciones: $total <br>";
    }

    // Determinar el tipo de transporte con más atenciones
    $transporteMax = array_keys($atenciones, max($atenciones))[0]; // Obtener el transporte con más atenciones
    $maxAtenciones = max($atenciones); // El número máximo de atenciones

    // Mostrar el mensaje con el transporte que tuvo más atenciones
    echo "<h4>El transporte con mayor cantidad de atenciones es: $transporteMax con $maxAtenciones atenciones.</h4>";

    require_once('../html/footer.html'); 
?>
