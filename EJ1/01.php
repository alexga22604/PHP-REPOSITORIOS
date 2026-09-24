<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
$numero1 = random_int(1,10);
$numero2 = random_int(1,10);

echo $numero1. " + " . $numero2. "=" . ($numero1 + $numero2). "<br>";
echo $numero1. " - " . $numero2. "=" . ($numero1 - $numero2). "<br>";
echo $numero1. " * " . $numero2. "=" . ($numero1 * $numero2). "<br>";
echo $numero1. " / " . $numero2. "=" . ($numero1 / $numero2). "<br>";
echo $numero1. " % " . $numero2. "=" . ($numero1 % $numero2). "<br>";
echo $numero1. " ** " . $numero2. "=" . ($numero1 ** $numero2). "<br>";

?>
    
</body>
</html>