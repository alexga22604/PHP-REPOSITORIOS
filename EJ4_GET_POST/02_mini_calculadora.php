<!DOCTYPE html>
<html lang="es">
    <!-- 2. Crear página que simule un calculadora
      sencilla, mediante un único archivo 02.php 
      que mostrará un formularios con dos campos 
      numéricos y 4 botones con los 4 tipos de 
      operaciones + - * /  posibles. Se incluirá 
      también 3 controles de tipo radio que indicarán como
       queremos que se muestre el resultado en decimal, 
       binario o hexadecimal.
-->
<?php

function calcular($n1, $n2, $operacion, $valor)
{

    if ($operacion == "sumar") {
        $resultado = $n1 + $n2;
    } elseif ($operacion == "restar") {
        $resultado = $n1 - $n2;
    } elseif ($operacion == "multiplicar") {
        $resultado = $n1 * $n2;
    } elseif ($operacion == "dividir") {
        if ($n2 == 0) {
            return "Error: División por cero";
        }
        $resultado = $n1 / $n2;
    }

    if ($valor == "binario") {
        return decbin($resultado);
    } elseif ($valor == "hexadecimal") {
        return dechex($resultado);
    } else {
        return $resultado;
    }
};
$mensaje = "";

if (isset($_POST['operacion'])) {
    $base = $_POST['base'] ?? 'decimal';
    $resultado = calcular($_POST['N1'], $_POST['N2'], $_POST['operacion'], $base);
    $mensaje = $resultado;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ4 - Mini Calculadora</title>
    <style>
        body {
            margin: 0;
            font-size: 16px;
        }

        h1 {
            margin: 0;
            width: 250px;
            padding: 22px 10px;
            background: #0000ff;
            color: #fff;
            font-size: 28px;
            text-align: center;
            text-shadow: 2px 2px 3px #000;
        }

        form {
            padding: 20px;
            border-bottom: 1px solid #555;
        }

        input[type="number"] {
            width: 140px;
            font-size: 16px;
            border: 1px solid #888;
            border-radius: 3px;
            padding: 1px 2px;
        }

        .caja {
            margin: 25px 0 20px 2px;
            padding: 12px 14px;
            width: 250px;
            border: 1px solid #999;
        }

        .caja-radios {
            margin: 20px 0 4px 2px;
            padding: 10px 18px;
            width: 300px;
        }

        button {
            font-family: inherit;
            font-size: 13px;
            padding: 1px 6px;
            color: #000;
            background: #efefef;
            border: 1px solid #888;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="radio"] {
            accent-color: #e0542b;
            margin: 0 2px 0 0;
        }
    </style>
</head>

<body>
    <h1>Mini Calculadora</h1>

    <form method="POST" action="02.php">
        N1: <input type="number" name="N1" required><br>
        N2: <input type="number" name="N2" required><br>
        <div class="caja">
            <button type="submit" name="operacion" value="sumar">+</button>
            <button type="submit" name="operacion" value="restar">-</button>
            <button type="submit" name="operacion" value="multiplicar">*</button>
            <button type="submit" name="operacion" value="dividir">/</button>
        </div>
        <div class="caja caja-radios">

            <input type="radio" name="base" value="decimal" checked> Decimal
            <input type="radio" name="base" value="binario"> Binario
            <input type="radio" name="base" value="hexadecimal"> Hexadecimal
        </div>
        <br>
        <button type="reset">borrar con reset</button><br>
        <p class="resultado">El resultado es: <?php echo $mensaje; ?></p>

    </form>
</body>

</html>