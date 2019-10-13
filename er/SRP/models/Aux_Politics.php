
<?php

 /**
  * Essa classe representa poss�veis politicas utilizados no processo.
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
      * M�todo para recuperar o identificador da politica.
      *
      * @return retorna identificador da politica
      */
    public function getPoliticsId()
    {
        return $this->_politicsId ;
    }

     /**
      * M�todo para recuperar o identificador do usu�rio criador da politica.
      *
      * @return retorna identificador do usu�rio
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * M�todo para recuperar o nome da politica.
      *
      * @return retorna nome da politica
      */
    public function getName()
    {
        return $this->_name ;
    }

     /**
      * M�todo para setar o nome da politica.
      *
      * @param $name
      */
    public function setName($name)
    {
        $this->_name = $name ;
    }

     /**
      * M�todo para recuperar a descri��o da politica.
      *
      * @return retorna a descri�ao da politica
      */
    public function getDescription()
    {
        return $this->_description ;
    }

     /**
      * M�todo para setar a descri��o da politica.
      *
      * @param $description
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

     /**
      * M�todo para tranformar para string os atributos da politica.
      *
      * @return retorna o texto com os atributos da politica
      */
    public function __toString()
    {
        return "Politics: {politicsId:".$this->_politicsId.", userId:".$this->_userId.", name:".$this->_name."}" ;
    }
}

?>