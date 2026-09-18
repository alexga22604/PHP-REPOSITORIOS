<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $numero1 = random_int(1,9);
    echo "Número generado: " . $numero1 . "<br>";

    for ($i = 1; $i < $numero1; $i++) {
        for ($j = 0; $j < $i; $j++) {
            if ($i % 2 == 0) {
                
                echo '<span style="color:red">' . $i . '</span>';
            } else {
                echo '<span style="color:blue">' . $i . '</span>';
            }
        }
        echo "<br>";
    }
    ?>
    
</body>
</html>