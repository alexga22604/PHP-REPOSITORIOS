<?php
function usuarioOk($usuario, $contraseña): bool {
    return $contraseña === strrev($usuario)
        && mb_strlen($usuario, 'UTF-8') >= 8;
}
