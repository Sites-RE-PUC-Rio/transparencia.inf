
<?php

/**
 * Classe representa o banco de dados (abrir conex�o com banco).
 */
final class Database
{
    private static $_server   = "localhost" ;
    private static $_user     = "root"      ; 
    private static $_password = ""          ;
    private static $_database = "srp"       ;

    /**
     * Metodo para pegar uma conex�o com o banco de dados.
     *
     * @return uma conex�o com o banco de dados.
     */
    public static function getConnection()
    {
        $conn = mysql_connect(self::$_server, self::$_user, self::$_password) ;
        if (!$conn)
        {
            die('Could not connect: ' . mysql_error()) ;
            return false ;
        }
        mysql_select_db(self::$_database, $conn) ;

        return $conn ;
    }

    /**
     * Metodo para retornar uma conex�o ao banco de dados.
     *
     * @param $conn conex�o a ser retornada.
     */
    public static function returnConnection($conn)
    {
        mysql_close($conn) ;
    }
}

?>
