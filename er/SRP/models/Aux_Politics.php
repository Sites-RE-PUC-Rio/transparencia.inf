
<?php

 /**
  * Essa classe representa possíveis politicas utilizados no processo.
  */
class Aux_Politics
{
    // Fields
    private $_politicsId = NULL ;
    private $_userId = NULL ;
    private $_name = NULL ;
    private $_description = NULL ;

    function __construct($politicsId, $userId, $name, $description)
    {
        $this->_politicsId = $politicsId ;
        $this->_userId = $userId ;
        $this->_name = $name ;
        $this->_description = $description ;
    }

     /**
      * Método para recuperar o identificador da politica.
      *
      * @return retorna identificador da politica
      */
    public function getPoliticsId()
    {
        return $this->_politicsId ;
    }

     /**
      * Método para recuperar o identificador do usuário criador da politica.
      *
      * @return retorna identificador do usuário
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * Método para recuperar o nome da politica.
      *
      * @return retorna nome da politica
      */
    public function getName()
    {
        return $this->_name ;
    }

     /**
      * Método para setar o nome da politica.
      *
      * @param $name
      */
    public function setName($name)
    {
        $this->_name = $name ;
    }

     /**
      * Método para recuperar a descrição da politica.
      *
      * @return retorna a descriçao da politica
      */
    public function getDescription()
    {
        return $this->_description ;
    }

     /**
      * Método para setar a descrição da politica.
      *
      * @param $description
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

     /**
      * Método para tranformar para string os atributos da politica.
      *
      * @return retorna o texto com os atributos da politica
      */
    public function __toString()
    {
        return "Politics: {politicsId:".$this->_politicsId.", userId:".$this->_userId.", name:".$this->_name."}" ;
    }
}

?>