<?php
    $ruta = '../';
    require_once '../html/header.html';
    require_once 'funciones.php';

/* 1-a)	Controle los datos que provienen del formulario que se encuentra en el archivo index.php. */
if (!empty($_POST['dni']) && !empty($_POST['combustible']) && !empty($_POST['litros'])) {
    $dni = $_POST['dni'];
    $tipo = $_POST['combustible'];
    $litros = $_POST['litros'];
/* 1-b) Llame a la función fnCobro ($tipo, $litros), que se encontrará en el archivo 
funciones.php */ 
 $costo = fnCobro($tipo, $litros );
/* 1-d) A continuación, en surtidor.php, mostrar DNI, tipo de combustible, litros y precio total.*/

echo "<h3>Detalles de la operación:</h3>";
echo "DNI: " . htmlspecialchars($dni) . "<br>";
echo "Tipo de combustible: " . htmlspecialchars($tipo) . "<br>";
echo "Litros cargados: " . htmlspecialchars($litros) . "<br>";
echo "Precio total: $" . htmlspecialchars($costo) . "<br>";
} else{
    echo "Error: Falta completar datos.";
}
    require_once '../html/footer.html';
?>