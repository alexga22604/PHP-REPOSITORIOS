<html>
<head>
<meta charset="UTF-8">
<link href="estilo.css" rel="stylesheet" type="text/css" />
<title>LA FRUTERIA - Realizar Compra</title>
</head>
<body>
<H1> La Frutería del siglo XXI</H1>
<div class="container">
    <div class="compra-detalle">
        <?= $compraRealizada ?>
    </div>
    <div class="mensaje-principal">REALICE SU COMPRA, <?= htmlspecialchars($_SESSION['cliente']) ?></div>
    
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
        <label for="fruta">Selecciona la fruta:</label>
        <?php $fruta_marcada = $_POST['fruta'] ?? '';  ?>
        <select name="fruta" id="fruta">
			<option value="Platanos" <?= $fruta_marcada == 'Platanos' ? '' : '' ?>>Plátanos 🍌</option>
			<option value="Naranjas" <?= $fruta_marcada == 'Naranjas' ? 'selected' : '' ?>>Naranjas 🍊</option>
			<option value="Limones" <?= $fruta_marcada == 'Limones' ? 'selected' : '' ?>>Limones 🍋</option>
			<option value="Manzanas" <?= $fruta_marcada == 'Manzanas' ? 'selected' : '' ?>>Manzanas 🍎</option>
        </select>
        
        <label for="cantidad">Cantidad (unidades/kg):</label>
        <input name="cantidad" id="cantidad" type="number" value="1" min="1" max="10" size="4">
        
        <div style="display: flex; justify-content: space-around; width: 100%;">
            <input type="submit" name="accion" value=" Anotar ">	
            <input type="submit" name="accion" value=" Anular ">	
            <input type="submit" name="accion" value=" Terminar ">	
        </div>
    </form>
</div>
</body>
</html>