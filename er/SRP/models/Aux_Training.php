
<?php

 /**
  * Essa classe representa poss�veis treinamentos utilizados no processo.
  */
class Aux_Training
{
    // Fields
    private $_trainingId = NULL ;
    private $_userId = NULL ;
    private $_name = NULL ;
    private $_description = NULL ;
    private $_public = NULL ;

    function __construct($trainingId, $userId, $name, $description, $public)
    {
        $this->_trainingId = $trainingId ;
        $this->_userId = $userId ;
        $this->_name = $name ;
        $this->_description = $description ;
        $this->_public = $public ;
    }

     /**
      * M�todo para recuperar o identificador do treinamento.
      *
      * @return retorna identificador do treinamneto
      */
    public function getTrainingId()
    {
        return $this->_trainingId ;
    }

     /**
      * M�todo para recuperar o identificador do usu�rio criador do treinamento.
      *
      * @return retorna identificador do usu�rio
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * M�todo para recuperar o nome do treinamento.
      *
      * @return retorna nome do treinamento
      */
    public function getName()
    {
        return $this->_name ;
    }

     /**
      * M�todo para setar o nome do treinamento.
      *
      * @param $name
      */
    public function setName($name)
    {
        $this->_name = $name ;
    }

     /**
      * M�todo para recuperar a descri��o do treinamento.
      *
      * @return retorna a descri�ao do treinamento
      */
    public function getDescription()
    {
        return $this->_description ;
    }

     /**
      * M�todo para setar a descri��o do treinamento.
      *
      * @param $description
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

     /**
      * M�todo para recuperar o publico alvo do treinamento.
      *
      * @return retorna o publico alvo do treinamento
      */
    public function getPublic()
    {
        return $this->_public ;
    }

     /**
      * M�todo para setar o publico alvo do treinamento.
      *
      * @param $public
      */
    public function setPublic($public)
    {
        $this->_public = $public ;
    }

     /**
      * M�todo para tranformar para string os atributos do treinamento.
      *
      * @return retorna o texto com os atributos do treinamento
      */
    public function __toString()
    {
        return "Training: {trainingId:".$this->_trainingId.", userId:".$this->_userId.", name:".$this->_name."}" ;
    }
}

?>