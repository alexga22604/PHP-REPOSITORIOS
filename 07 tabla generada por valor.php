<!DOCTYPE html>
<html lang="en">

<head>
        <?php
    $numero1 = random_int(100, 500);
    $numero2 = random_int(100, 500);
    $numero3 = random_int(100, 500);
    ?>
    <meta charset="UTF-8" http http-equiv="refresh" content="2">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .row1 {
            background-color: rgb(255, 0, 0);
            color: black;
            width: <?php echo $numero1; ?>px;
            height: 35px;
            display: flex;
            align-items: center;
        }

        .row2 {
            background-color: rgb(9, 147, 9);
            color: black;
            width: <?php echo $numero2; ?>px;
            height: 35px;
            display: flex;
            align-items: center;
        }

        .row3 {
            background-color: rgb(0, 0, 255);
            width: <?php echo $numero3; ?>px;
            color: black;
            height: 35px;
            display: flex;
            align-items: center;
        }
    </style>

</head>

<body>


    <div class="row1">
        <table>
            <td>
                <tr>
                    <?php echo "Rojo : (" . $numero1 . ")<br>"; ?>

                </tr>
            </td>
        </table>
    </div>
    <div class="row2">
        <table>
            <td>
                <tr>
                    <?php echo "Verde : (" . $numero2 . ")<br>"; ?>


                </tr>
            </td>
        </table>
    </div>
    <div class="row3">
        <table>
            <td>
                <tr>
                    <?php echo "Azul : (" . $numero3 . ")<br>"; ?>
                </tr>
            </td>
        </table>
    </div>

</body>

</html>