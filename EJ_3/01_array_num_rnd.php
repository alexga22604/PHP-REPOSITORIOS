<!DOCTYPE html>
<html lang="en">

<!-- 1.- Rellenar un array con 20 números aleatorios entre 1 y 10 
     y mostrar el contenido del array  mediante una tabla de una
     fila en HMTL. Mostrar a continuación el valor máximo, el mínimo 
     y el  valor que mas veces se repite. (Nota definir funciones 
     para cada caso) -->

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3_01</title>

    <?php

    $longitudad_array = 20;

    $array_numero_aleatorio = [];

    function obtenerMaximo($array) {
        return max($array);
    }
    function obtenerMinimo($array) {
        return min($array);
    }
    function obtenerValorRepetido($array) {
        $cont = array_count_values($array);
         return array_search(max($cont), $cont);

    }
    for ($i = 0; $i < $longitudad_array; $i++) {
        $num_aleatorio = rand(1, 10);
        $array_numero_aleatorio[$i] = $num_aleatorio;
        
    }
    ?>
</head>

<body>
<table>
    <tr>
        <?php
        for ($i = 0; $i < $longitudad_array; $i++) {
            echo "<td>" . $array_numero_aleatorio[$i] . "</td>";
        }
        ?>
    </tr>
    <tr>
        <td colspan="<?php echo $longitudad_array; ?>">Maximo: <?php echo obtenerMaximo($array_numero_aleatorio); ?></td>
    </tr>
    <tr>
        <td colspan="<?php echo $longitudad_array; ?>">Minimo: <?php echo obtenerMinimo($array_numero_aleatorio); ?></td>
    </tr>
    <tr>
        <td colspan="<?php echo $longitudad_array; ?>">Valor más repetido: <?php echo obtenerValorRepetido($array_numero_aleatorio); ?></td>
    </tr>
</table>
</body>

</html>