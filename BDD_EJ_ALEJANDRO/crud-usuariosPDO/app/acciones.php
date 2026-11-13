<?php
require_once "app/dat/Producto.php";
require_once 'app/dat/AccesoDatos.php';

function accionBorrar ($login){    
    $db = AccesoDatos::getModelo();
    $producto = $db->borrarProducto($login);
}

function accionTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
    header("Refresh:0 url='./index.php'");
}
 
function accionAlta(){
    $producto = new Producto();
    $producto->nombre  = "";
    $producto->codigo   = "";
    $producto->precio   = "";
    $producto->stock = "";
    $orden= "Nuevo";
    include_once "layout/formulario.php";
}

function accionDetalles($login){
    $db = AccesoDatos::getModelo();
    $producto = $db->getProducto($login);
    $orden = "Detalles";
    include_once "layout/formulario.php";
}


function accionModificar($login){
    $db = AccesoDatos::getModelo();
    $producto = $db->getProducto ($login);
    $orden="Modificar";
    include_once "layout/formulario.php";
}
    
function accionPostAlta(){
    $producto = new Producto();
    $producto->nombre  = $_POST['nombre'];
    $producto->codigo   = $_POST['codigo'];
    $producto->precio   = $_POST['precio'];
    $producto->stock = $_POST['stock'];
    $db = AccesoDatos::getModelo();
    $db->addProducto($producto);
    
}

function accionPostModificar(){
    
    $producto = new Producto();
    $producto->nombre  = $_POST['nombre'];
    $producto->codigo   = $_POST['codigo'];
    $producto->precio   = $_POST['precio'];
    $producto->stock = $_POST['stock'];
    $db = AccesoDatos::getModelo();
    $db->modProducto($producto);
    
}

