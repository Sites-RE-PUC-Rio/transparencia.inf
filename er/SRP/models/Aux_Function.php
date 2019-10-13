
<?php

 /**
  * Essa classe representa possíveis funções utilizados no processo,
  * macro atividades ou atividades detalhadas.
  */
class Aux_Function
{
    // Fields
    private $_functionId = NULL ;
    private $_userId = NULL ;
    private $_name = NULL ;
    private $_description = NULL ;

    function __construct($functionId, $userId, $name, $description)
    {
        $this->_functionId = $functionId ;
        $this->_userId = $userId ;
        $this->_name = $name ;
        $this->_description = $description ;
    }

     /**
      * Método para recuperar o identificador do formulario.
      *
      * @return retorna identificador do formulario
      */
    public function getFunctionId()
    {
        return $this->_functionId ;
    }

     /**
      * Método para recuperar o identificador do usuário criador da função.
      *
      * @return retorna identificador do usuário
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * Método para recuperar o nome da função.
      *
      * @return retorna nome da função
      */
    public function getName()
    {
        return $this->_name ;
    }

     /**
      * Método para setar o nome da função.
      *
      * @param $name
      */
    public function setName($name)
    {
        $this->_name = $name ;
    }

     /**
      * Método para recuperar a descrição da função.
      *
      * @return retorna a descriçao da função
      */
    public function getDescription()
    {
        return $this->_description ;
    }

     /**
      * Método para setar a descrição da função.
      *
      * @param $description
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

     /**
      * Método para tranformar para string os atributos da função.
      *
      * @return retorna o texto com os atributos da função
      */
    public function __toString()
    {
        return "Function: {functionId:".$this->_functionId.", userId:".$this->_userId.", name:".$this->_name."}" ;
    }
}

?>