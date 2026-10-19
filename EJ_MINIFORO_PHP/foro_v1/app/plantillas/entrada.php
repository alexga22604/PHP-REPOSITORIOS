
<p><?= htmlspecialchars($msg ?? '', ENT_QUOTES, 'UTF-8') ?></p>

<div>
<form name="entrada" method="POST">
    <table>
        <tr>
            <td>Nombre:</td>
            <td>
                <input type="text" name="nombre"
                    value="<?= htmlspecialchars($_POST['nombre'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
            </td>
        </tr>
        <tr>
            <td>Contraseña:</td>
            <td>
                <input type="password" name="contraseña">
            </td>
        </tr>
    </table>

    <input type="submit" name="orden" value="Entrar">
</form>
</div>
