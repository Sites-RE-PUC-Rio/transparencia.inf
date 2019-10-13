
<?php

 /**
  * Essa classe representa possíveis artefatos utilizados no processo,
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
      * Método para recuperar o identificador do artefato.
      *
      * @return retorna identificador do artefato
      */
    public function getArtifactId()
    {
        return $this->_artifactId ;
    }

     /**
      * Método para recuperar o identificador do usuário criador do artefato.
      *
      * @return retorna identificador do usuário
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * Método para recuperar o nome do artefato.
      *
      * @return retorna nome do artefato
      */
    public function getName()
    {
        return $this->_name ;
    }

     /**
      * Método para setar o nome do artefato.
      *
      * @param $name
      */
    public function setName($name)
    {
        $this->_name = $name ;
    }

     /**
      * Método para recuperar a descrição do artefato.
      *
      * @return retorna a descrição do artefato
      */
    public function getDescription()
    {
        return $this->_description ;
    }

     /**
      * Método para setar a descrição do artefato.
      *
      * @param $description
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

     /**
      * Método para tranformar para string os atributos do artefato.
      *
      * @return retorna o texto com os atributos do artefato
      */
    public function __toString()
    {
        return "Artifact: {artifactId:".$this->_artifactId.", userId:".$this->_userId.", name:".$this->_name.", description:".$this->_description."}" ;
    }
}

?>