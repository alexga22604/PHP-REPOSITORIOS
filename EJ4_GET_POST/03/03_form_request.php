<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EJ4 - Form Request</title>
</head>
<body>
  <h1>Datos recibidos</h1>
  <h2>print_r($_REQUEST)</h2>
  <pre>
      <?php
        echo (print_r($_REQUEST, true)); ?>
  </pre>
    <h2>var_dump($_REQUEST)</h2>

    <pre><?php var_dump($_REQUEST)?></pre>
</body>
</html>
