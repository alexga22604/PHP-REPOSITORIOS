<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php  
function suma(int $a, int $b) {
    return $a + $b;
}
echo suma(10,20);

$num_aleatorio = rand(suma(20,30), suma(50,60)); 

echo suma($num_aleatorio,10);
?>

<body>
    
</body>
</html>