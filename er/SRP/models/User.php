
<?php

 /**
  * Essa classe representa os usu�rios do sistema.
  */
class User
{
    // Fields 
    private $_userId = NULL ;
    private $_login = NULL ;
    private $_password = NULL ;

    function __construct($userId, $login, $password)
    {
        $this->_userId = $userId ;
        $this->_login = $login ;
        $this->_password = $password ;
    }

     /**
      * M�todo para recuperar o identificador do usu�rio.
      *
      * @return retorna identificador do usu�rio
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * M�todo para recuperar o login do usu�rio.
      *
      * @return retorna login do usu�rio
      */
    public function getLogin()
    {
        return $this->_login ;
    }

     /**
      * M�todo para recuperar o password do usu�rio.
      *
      * @return retorna password do usu�rio
      */
    public function getPassword()
    {
        return $this->_password ;
    }

     /**
      * M�todo para tranformar para string os atributos do usuario.
      *
      * @return retorna o texto com os atributos do usuario
      */
    public function __toString()
    {
        return "User: {userId:".$this->_userId.", login:".$this->_login.", password:".$this->_password."}" ;
    }
}

?>