
<?php

 /**
  * Essa classe representa poss�veis artefatos utilizados no processo,
  * macro atividades ou atividades detalhadas.
  */
class Aux_Artifact
{
    // Fields
    private $_artifactId = NULL ;
    private $_userId = NULL ;
    private $_name = NULL ;
    private $_description = NULL ;

    function __construct($artifactId, $userId, $name, $description)
    {
        $this->_artifactId = $artifactId ;
        $this->_userId = $userId ;
        $this->_name = $name ;
        $this->_description = $description ;
    }
     /**
      * M�todo para recuperar o identificador do artefato.
      *
      * @return retorna identificador do artefato
      */
    public function getArtifactId()
    {
        return $this->_artifactId ;
    }

     /**
      * M�todo para recuperar o identificador do usu�rio criador do artefato.
      *
      * @return retorna identificador do usu�rio
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * M�todo para recuperar o nome do artefato.
      *
      * @return retorna nome do artefato
      */
    public function getName()
    {
        return $this->_name ;
    }

     /**
      * M�todo para setar o nome do artefato.
      *
      * @param $name
      */
    public function setName($name)
    {
        $this->_name = $name ;
    }

     /**
      * M�todo para recuperar a descri��o do artefato.
      *
      * @return retorna a descri��o do artefato
      */
    public function getDescription()
    {
        return $this->_description ;
    }

     /**
      * M�todo para setar a descri��o do artefato.
      *
      * @param $description
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

     /**
      * M�todo para tranformar para string os atributos do artefato.
      *
      * @return retorna o texto com os atributos do artefato
      */
    public function __toString()
    {
        return "Artifact: {artifactId:".$this->_artifactId.", userId:".$this->_userId.", name:".$this->_name.", description:".$this->_description."}" ;
    }
}

?>