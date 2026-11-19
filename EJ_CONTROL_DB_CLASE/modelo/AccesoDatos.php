<?php
require_once "Cliente.php";
require_once "Pedido.php";

/*
 * Acceso a datos con BD y Patrón Singleton
 */
class AccesoDatos
{

    private static $modelo = null;
    private $dbh = null;
    private $stmt = null;

    public static function initModelo()
    {
        if (self::$modelo == null) {
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }


    private function __construct()
    {
        // Cambiar le password !!!!!
        try {
            $dsn = "mysql:host=localhost;dbname=etienda;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión " . $e->getMessage();
            exit();
        }
    }

    // Evito que se pueda clonar el objeto.
    public function __clone()
    {
        trigger_error('La clonación no permitida', E_USER_ERROR);
    }

    //DEVUELVE EL COD DEL CLIENTE SI EXISTE, SINO DEVUELVE STRING VACIO
    function getCliente(string $nombre, string $clave): string
    {

        $cod_cliente = "";
        // Sobre la conexión PDO prepara la consulta;
        $stmt  = $this->dbh->prepare("select cod_cliente from clientes where nombre = :nombre and clave =:clave");
        $stmt->bindValue(':nombre', $nombre);
        $stmt->bindValue(':clave', $clave);


        if ($stmt->execute()) {
            $cod_cliente = $stmt->fetchColumn();
            if ($cod_cliente === false) {
                $cod_cliente = "";
            }
        }

        return $cod_cliente;
    }
    //DEVUELVE UN ARRAY DE OBJETOS PEDIDO DEL CLIENTE
    function getPedidosCliente(string $cod_cliente): array
    {
        $pedidos = [];
        // Sobre la conexión PDO prepara la consulta;
        $stmt  = $this->dbh->prepare("select * from pedidos where cod_cliente = :cod_cliente");
        $stmt->bindValue(':cod_cliente', $cod_cliente);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pedido');

        if ($stmt->execute()) {
            // Mientra $pedido no sea false, sea un objeto
            while ($pedido = $stmt->fetch()) {
                // añado ese objeto a la tabla
                $pedidos[] = $pedido;
            }
        }
        return $pedidos;
    }

    /* =====================================================================
 * EJEMPLO ALTERNATIVO: comprobar login con un método que devuelve bool
 * =====================================================================
 *
 * 1) En modelo/AccesoDatos.php, dentro de la clase:
 *
 *    // Devuelve true si existe un cliente con ese nombre y esa clave
 *    function userOk(string $nombre, string $clave): bool
 *    {
 *        $stmt = $this->dbh->prepare(
 *            "select cod_cliente from clientes where nombre = :nombre and clave = :clave");
 *        $stmt->bindValue(':nombre', $nombre);
 *        $stmt->bindValue(':clave', $clave);
 *        $stmt->execute();
 *
 *        // fetchColumn() devuelve false si no hay fila
 *        return $stmt->fetchColumn() !== false;
 *    }
 *
 *    (getCliente() volvería a buscar solo por nombre, como al principio)
 *
 * 2) Aquí en el controlador, en vez de las líneas de getCliente + if:
 *
 *    if (!$ac->userOk($_GET["nombre"], $_GET["clave"])) {
 *        $msgError = "Usuario o contraseña incorrectos";
 *        include 'vistas/error.php';
 *        exit();
 *    }
 *
 *    // Si llega aquí, el login es correcto: ya puedo pedir el código
 *    $cliente_cod = $ac->getCliente($_GET["nombre"]);
 *    $pedidosClientes = $ac->getPedidosCliente($cliente_cod);
 *    ...cookie + include 'vistas/listadopedidos.php';
 */
}
function h(string $str): string
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
