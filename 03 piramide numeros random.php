<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <code>
        <?php
        $numero1 = random_int(1, 9);
        echo "Número generado: " . $numero1 . "<br>";

        for ($i = 1; $i <= $numero1; $i++) {
            for ($j = 0; $j < $numero1 - $i; $j++) {
                echo " ";
            }
            for ($l = 0; $l < 2 * $i - 1; $l++) {
                echo "*";
            }
            echo "<br>";
        }
        ?>
    </code>

</body>

</html>