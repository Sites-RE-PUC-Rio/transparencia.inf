
<?php

 /**
  * Essa classe representa os usuários do sistema.
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
      * Método para recuperar o identificador do usuário.
      *
      * @return retorna identificador do usuário
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * Método para recuperar o login do usuário.
      *
      * @return retorna login do usuário
      */
    public function getLogin()
    {
        return $this->_login ;
    }

     /**
      * Método para recuperar o password do usuário.
      *
      * @return retorna password do usuário
      */
    public function getPassword()
    {
        return $this->_password ;
    }

     /**
      * Método para tranformar para string os atributos do usuario.
      *
      * @return retorna o texto com os atributos do usuario
      */
    public function __toString()
    {
        return "User: {userId:".$this->_userId.", login:".$this->_login.", password:".$this->_password."}" ;
    }
}

?>