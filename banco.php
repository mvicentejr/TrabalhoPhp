<?php
class Banco {
    private static $dbNome='musica';
    private static $dbHost='localhost';
    private static $dbUsuario='root';
    private static $dbSenha='';

    private static $conn=null;

    public function _construct() {
        die('A função init não é permitida');
    }

    public static function conectar(){
        if (self::$conn == null){
            try{
               self::$conn = new PDO('mysql:host='.self::$dbHost.'; dbname='.self::$dbNome.';charset=utf8', self::$dbUsuario. self::$dbSenha); 
            }
            catch(PDOException $exception){
                die($exception -> getMessage());
            }
        }
        return self::$conn;
    }

    public static function desconectar(){
        self::$conn = null;
    }
}
?>