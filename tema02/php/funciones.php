<?php
    function fnCobro ($tipo, $litros) 
    {
       $costos = [
                    'Super' => 240.5,
                    'Premium' => 308.7,
                    'Gasoil' => 258.4,
                    'Euro' => 352.7 
                ]; 

    /* 1-c) c.	En el archivo funciones.php, desarrollar la función mencionada,  
    cuya tarea será trabajar con el arreglo $costos, para calcular y retornar 
    el importe del combustible cargado.*/

    // Verificar si el tipo de combustible existe en el arreglo
    if (array_key_exists($tipo, $costos)) {
        // Calcular el importe total
        $importe = $costos[$tipo] * $litros;
        return $importe;
    } else {
        // Retornar mensaje en caso de tipo de combustible inválido
        return "Tipo de combustible no válido.";
    }

    }
    

?>