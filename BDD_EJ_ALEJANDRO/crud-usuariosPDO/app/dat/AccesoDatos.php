<?php
include_once "app/dat/Producto.php";
include_once "app/config.php";

/*
 * Acceso a datos con BD Productos y Patrón Singleton 
 * Un único objeto para la clase
 * VERSION 1:  las sentencias precompiladas ser crean en cada función
 */
class AccesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    
    
    public static function getModelo(){
        // Si no existe lo crea el acceso de a la BD
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
    

   // Constructor privado  Patron singleton, se accede por getModelo
   
    private function __construct(){
        
        try {
            $dsn = "mysql:host=".SERVER_DB.";port=".DB_PORT.";dbname=".DATABASE.";charset=utf8";
            // Creo el objeto PDO estableciendo la conexión a la BD
            $this->dbh = new PDO($dsn,DB_USER,DB_PASSWD);
            // Si falla genera una excepción
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }   
    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;
            $obj->dbh = null;     // Cierro la conexión
            self::$modelo = null; // Borro el objeto.
        }
    }


    // Devuelvo un array de objeto de Productos
    public function getProductos ():array {
        $tproducto = [];
        // Sobre la conexión PDO prepara la consulta;
        $stmt_productos  = $this->dbh->prepare("select * from Productos");
        // Los resultados se devuelven como objetos de la clase Productos
        $stmt_productos->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        
        // Ejecuto la sentencias 
        if ( $stmt_productos->execute() ){
            //$tproducto = $stmt_productos->fetchAll();
            // Mientra $producto no sea false, sea un objeto
            while ( $producto = $stmt_productos->fetch()){
               // añado ese objeto a la tabla
               $tproducto[]= $producto;
            }
        }
        

        return $tproducto;
    }
    
    // Devuelvo un producto o false
    public function getProducto (String $codigo) {
        $producto = false;
        $stmt_producto   = $this->dbh->prepare("select * from Productos where codigo=:codigo");
        $stmt_producto->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        $stmt_producto->bindParam(':codigo', $codigo);
        if ( $stmt_producto->execute() ){
             // Solo hay un objeto
             if ( $obj = $stmt_producto->fetch()){
                $producto= $obj;
            }
        }
        return $producto;
    }
    
    // UPDATE
    public function modProducto($producto):bool{
      
        $stmt_modproducto   = $this->dbh->prepare("update Productos set nombre=:nombre, precio=:precio, stock=:stock where codigo=:codigo");
        $stmt_modproducto->bindValue(':codigo',$producto->codigo);
        $stmt_modproducto->bindValue(':nombre',$producto->nombre);
        $stmt_modproducto->bindValue(':precio',$producto->precio);
        $stmt_modproducto->bindValue(':stock',$producto->stock);
        $stmt_modproducto->execute();
        // El número de filas modificadas debe ser 1
        $resu = ($stmt_modproducto->rowCount () == 1);
        return $resu;
    }

    //INSERT
    public function addProducto($producto):bool{
        $stmt_creauser  = $this->dbh->prepare("insert into Productos (codigo,nombre,precio,stock) Values(?,?,?,?)");
        //$stmt_creauser->bindValue(1,$user->login);
        $stmt_creauser->execute( [$producto->codigo, $producto->nombre, $producto->precio, $producto->stock]);
        $resu = ($stmt_creauser->rowCount () == 1);
        return $resu;
    }

    //DELETE
    public function borrarProducto(String $codigo):bool {
        $stmt_borproducto = $this->dbh->prepare("delete from Productos where codigo =:codigo");
        $stmt_borproducto->bindValue(':codigo', $codigo);
        $stmt_borproducto->execute();
        $resu = ($stmt_borproducto->rowCount () == 1);
        return $resu;
    }   
    
     // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
}

