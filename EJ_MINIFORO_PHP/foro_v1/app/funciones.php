<?php
function usuarioOk($usuario, $contraseña) :bool {
  
   return $contraseña === strrev($contraseña) && (mb_strlen($usuario, 'UTF-8') > 8);
    
}
