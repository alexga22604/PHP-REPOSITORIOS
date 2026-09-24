<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th {
            color: blue;
        }

        th,
        td {
            border: 1px solid gray;
            padding: 5px;
            text-align: right;
        }

        th {

            background-color: lightgray;
        }
    </style>
</head>

<body>
    <?php
    $numero1 = random_int(1, 10);
    $numero2 = random_int(1, 10);

    echo "1º numero : " . $numero1 . "<br>";
    echo "2º numero : " . $numero2 . "<br>";


    ?>
    <table>
        <tr>
            <th>Operación</th>
            <th>Resultado</th>
        </tr>
        <tr>
            <td> <?php echo $numero1 . " + " . $numero2; ?> </td>
            <td> <?php echo ($numero1 + $numero2); ?> </td>
        </tr>
        <tr>
            <td> <?php echo $numero1 . " - " . $numero2; ?> </td>
            <td> <?php echo ($numero1 - $numero2); ?> </td>
        </tr>
        <tr>
            <td> <?php echo $numero1 . " * " . $numero2; ?> </td>
            <td> <?php echo ($numero1 * $numero2); ?> </td>
        </tr>
        <tr>
            <td> <?php echo $numero1 . " / " . $numero2; ?> </td>
            <td> <?php echo ($numero1 / $numero2); ?> </td>
        </tr>
        <tr>
            <td> <?php echo $numero1 . " % " . $numero2; ?> </td>
            <td> <?php echo ($numero1 % $numero2); ?> </td>
        </tr>
        <tr>
            <td> <?php echo $numero1 . "<sup>" . $numero2 . "</sup>"; ?></td>
            <td> <?php echo ($numero1 ** $numero2); ?> </td>
        </tr>


    </table>
</body>

</html>