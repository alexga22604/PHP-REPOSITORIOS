<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: lightgray;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .main-container {
            background-color: white;
            width: 320px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .header-box {
            background-color: blue;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 26px;
            font-weight: bold;
            text-shadow: 5px 2px 3px rgba(0, 0, 0, 0.3) ;
        }

        .table-container {
            padding: 25px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }



        th,
        td {
            border: 1px solid gray;
            padding: 8px 12px;
            font-size: 18px;
        }

        th {
            color: gray;
            text-align: left;
            background-color: white;
        }

        td:first-child {
            text-align: left;
            color: gray;
            font-weight: bold;
        }

        td:last-child {
            text-align: right;
            color: gray;
        }
    </style>
</head>

<body>
    <?php
    $numero1 = random_int(1, 10);



    ?>
    <div class=" main-container">
        <div class="header-box">
            TABLA DE<br>MULTIPLICAR
        </div>
        <div class="table-container">
            <table>
                <tr>
                    <th>Tabla del <?php echo $numero1; ?></th>
                    <th></th>
                </tr>
                <?php for ($i = 1; $i <= 10; $i++) { ?>
                    <tr>
                        <td><?php echo $numero1 . " × " . $i . " = "; ?></td>
                        <td><?php echo ($numero1 * $i); ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>


</body>

</html>