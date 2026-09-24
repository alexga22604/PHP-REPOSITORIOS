<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piedra Papel Tijeras</title>


      <?php
    define('PIEDRA1',  "&#x1F91C;");
    define('PIEDRA2',  "&#x1F91B;");
    define('TIJERAS',  "&#x1F596;");
    define('PAPEL',    "&#x1F91A;");

    $jugadas1 = [1 => PIEDRA1, 2 => PAPEL, 3 => TIJERAS];
    $jugadas2 = [1 => PIEDRA2, 2 => PAPEL, 3 => TIJERAS];

    function calcularGanador($jugador1, $jugador2)
    {
        if ($jugador1 === $jugador2) {
            return "Empate";
        } elseif (
            ($jugador1 === 1 && $jugador2 === 3) ||
            ($jugador1 === 2 && $jugador2 === 1) ||
            ($jugador1 === 3 && $jugador2 === 2)
        ) 
            return "Ha ganado jugador 1";
            
            
        else {
            return "Ha ganado jugador 2";
        }
    }
    

    function obtenerFicha($jugadas)
    {
        return array_rand($jugadas, 1); 
    }

    $jugador1 = obtenerFicha($jugadas1);
    $jugador2 = obtenerFicha($jugadas2);

    ?>
</head>

<body>
  
    <h1>¡Piedra, papel, tijera!</h1>
    <p>Actualice la página para mostrar otra partida.</p>

    <?php 
    
    echo "<h2>Jugador 1:  " . $jugadas1[$jugador1] . "</h2>";
    echo "<h2>Jugador 2:  " . $jugadas2[$jugador2] . "</h2>";
    echo "<h2>" . calcularGanador($jugador1, $jugador2) . "</h2>";
    
    
    ?>
</body>

</html>