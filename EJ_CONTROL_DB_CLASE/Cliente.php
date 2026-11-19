<?php

class Clientes
{
    private string $cod_cliente;
    private string $nombre;
    private string $clave;
    private int $veces;

    public function __get(string $name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        } else {
            throw new Exception("Propiedad no encontrada: " . $name);
        }
    }

    public function __set(string $name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            throw new Exception("Propiedad no encontrada: " . $name);
        }
    }
}
