<!DOCTYPE html>
<html lang="en">
<!-- 5.  Realizar un programa en PHP que 
     muestre un posible resultado de la bonoloto: 
Se presentarán 6 números obtenidos aleatoriamente 
en el rango de 1 a 49 (ambos inclusive) Los
5 primeros forman la jugada ganadora y deberán 
presentar ordenados de menor a mayor en una 
tabla html; el sexto es el número complementario. 
 Por supuesto los números no pueden repetirse.
-->

<?php
$bonoloto = [];
for ($i = 0; $i < 6; $i++) {
    $num = rand(1, 49);
    if (in_array($num, $bonoloto)) {
        $i--;              
    } else {
        $bonoloto[$i] = $num;
    }
}
$complementario = $bonoloto[5];    
$array_sin_complementario = array_slice($bonoloto, 0, 5);
sort($array_sin_complementario);                     
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3_05</title>
</head>
<body>
  <table border="1">
    <tr>
        <?php
        for ($i = 0; $i < 5; $i++) {
            echo "<td>" . $array_sin_complementario[$i] . "</td>";
        }
        ?>
        <td><?php echo "Complementario ". $complementario; ?></td>
    </tr>
</table>
</body>
</html>