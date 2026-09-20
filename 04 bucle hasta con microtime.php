<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $contador = 0;
    $seis = 0;
    $start = microtime(true);
do {
   
        $numero1 = random_int(1,10);
        $contador++ ;
        if ($numero1 == 6) {
            $seis++;
        } else {
            $seis = 0;
        }

} while ($seis !=3);

    
echo "Han salido tres 6 seguidos tras generar $contador números en " . (microtime(true) - $start) * 1000 . " milisegundos";
    
     ?>
</body>
</html>