<div>
<form name='mensaje' method="POST">
Tema<br>
 <input type="text" name="tema" size=30 
   value="<?= htmlspecialchars($_REQUEST['tema'] ?? '', ENT_QUOTES, 'UTF-8') ?>" ><br>
Comentario: <br>
<textarea name="comentario" rows="4" maxlength="300" cols="50">
<?= htmlspecialchars($_REQUEST['comentario'] ?? '', ENT_QUOTES, 'UTF-8')?>
</textarea>
<br><br>
<input type="submit" name="orden" value="Detalles">
<input type="submit" name="orden" value="Nueva opinión">
<input type="submit" name="orden" value="Terminar">
</form>
</div>
