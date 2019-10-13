

<?php

require_once "dal/mysql/Database.php" ;
require_once "dal/interfaces/IUserSource.php" ;
require_once "models/User.php" ;

/**
 * Classe realiza o controle de acesso dos usu�rios, implementando a interface IUserSource.
 */
class UserSource implements IUserSource
{
    /**
     * M�todo para recuperar uma inst�ncia da classe de usu�rio.
     *
     * @param   $login
     * @param   $password
     * @return  uma inst�ncia do usu�rio
     */
    public function getUser($login, $password)
    {
        $conn = false ;
        $data = false ;

        $user = NULL  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT userId FROM Users WHERE login='".mysql_escape_string($login)."' AND password=MD5('".mysql_escape_string($password)."') LIMIT 1", $conn) ;
	        if (!$data)
	            return false ;

	        $row = mysql_fetch_array($data) ;
            if ($row)
            {
                $user = new User($row["userId"], $login, $password) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $user ;
    }

    /**
     * M�todo para criar uma inst�ncia da classe usu�rio.
     *
     * @param   $login
     * @param   $password
     * @return  true se o usu�rio foi criado com sucesso, false caso contr�rio.
     */
    public function createUser($login, $password)
    {
        $conn = false ;

        $wasCreated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasCreated = mysql_query("INSERT INTO Users(login, password) VALUES('".mysql_escape_string($login)."', MD5('".mysql_escape_string($password)."'))", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasCreated ;
    }

    public function userExists($login)
    {
        $conn = false ;
        $data = false ;

        $exists = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT userId FROM Users WHERE login='".mysql_escape_string($login)."' LIMIT 1", $conn) ;
	        if (!$data)
	            return false ;

	        $row = mysql_fetch_array($data) ;
            if ($row)
            {
                $exists = true ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $exists ;
    }
}

?>
