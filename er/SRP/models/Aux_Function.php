
<?php

 /**
  * Essa classe representa poss�veis fun��es utilizados no processo,
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
      * M�todo para recuperar o identificador do formulario.
      *
      * @return retorna identificador do formulario
      */
    public function getFunctionId()
    {
        return $this->_functionId ;
    }

     /**
      * M�todo para recuperar o identificador do usu�rio criador da fun��o.
      *
      * @return retorna identificador do usu�rio
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * M�todo para recuperar o nome da fun��o.
      *
      * @return retorna nome da fun��o
      */
    public function getName()
    {
        return $this->_name ;
    }

     /**
      * M�todo para setar o nome da fun��o.
      *
      * @param $name
      */
    public function setName($name)
    {
        $this->_name = $name ;
    }

     /**
      * M�todo para recuperar a descri��o da fun��o.
      *
      * @return retorna a descri�ao da fun��o
      */
    public function getDescription()
    {
        return $this->_description ;
    }

     /**
      * M�todo para setar a descri��o da fun��o.
      *
      * @param $description
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

     /**
      * M�todo para tranformar para string os atributos da fun��o.
      *
      * @return retorna o texto com os atributos da fun��o
      */
    public function __toString()
    {
        return "Function: {functionId:".$this->_functionId.", userId:".$this->_userId.", name:".$this->_name."}" ;
    }
}

?>