
<?php

require_once "dal/interfaces/IUserSource.php" ;
require_once "dal/dao/SourceFactory.php" ;

/**
 *  Classe de acesso a dados do usuário.
 **/
final class DAOUser
{
    private static $_SOURCE_NAME = "User" ;

    private function __construct()
    {
    }

    /**
     * Metodo que retorna um usuário dado seu login e senha.
     *
     * @param $login
     * @param $password
     * @return instância do usuário ou NULL se não encontrado.
     */
    public static function getUser($login, $password)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getUser($login, $password) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return NULL ;
        }
    }

    /**
     * Metodo que cria um novo usuário dado um login e senha.
     *
     * @param $login
     * @param $password
     * @return true se o usuário foi criado com sucesso ou false caso contrário.
     */
    public static function createUser($login, $password)
    {
        if (SourceFactory::getSource(self::$_SOURCE_NAME)->userExists($login))
        {
            return false ;
        }

        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createUser($login, $password) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }
}

?>