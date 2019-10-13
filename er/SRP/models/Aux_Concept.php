
<?php

 /**
  * Essa classe representa poss�veis Conceitos utilizados no processo.
  */
class Aux_Concept
{
    // Enums
    public static $TERM_TYPE = array( "Neg�cio"=>"business", "T�cnico"=>"technical" );

    // Fields
    private $_conceptId = NULL ;
    private $_userId = NULL ;
    private $_termName = NULL ;
    private $_termType = NULL ;
    private $_termDescription = NULL ;

    function __construct($conceptId, $userId, $termName, $termType, $termDescription)
    {
        $this->_conceptId = $conceptId ;
        $this->_userId = $userId ;
        $this->_termName = $termName ;
        $this->_termType = $termType ;
        $this->_termDescription = $termDescription ;
    }

     /**
      * M�todo para recuperar o identificador do conceito.
      *
      * @return retorna identificador do conceito
      */
    public function getConceptId()
    {
        return $this->_conceptId ;
    }

     /**
      * M�todo para recuperar o identificador do usu�rio criador do conceito.
      *
      * @return retorna identificador do usu�rio
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * M�todo para recuperar o nome do termo.
      *
      * @return retorna nome do termo
      */
    public function getTermName()
    {
        return $this->_termName ;
    }

     /**
      * M�todo para setar o nome do termo.
      *
      * @param $termName
      */
    public function setTermName($termName)
    {
        $this->_termName = $termName ;
    }


    public function getTermType()
    {
        return $this->_termType ;
    }

     /**
      * M�todo para setar o tipo do termo.
      *
      * @param $termType
      */
    public function setTermType($termType)
    {
        $this->_termType = $termType ;
    }

    public function getTermDescription()
    {
        return $this->_termDescription ;
    }

     /**
      * M�todo para setar a descri��o do termo.
      *
      * @param $termDescription
      */
    public function setTermDescription($termDescription)
    {
        $this->_termDescription = $termDescription ;
    }

     /**
      * M�todo para tranformar para string os atributos do conceito.
      *
      * @return retorna o texto com os atributos do conceito
      */
    public function __toString()
    {
        return "Concept: {conceptId:".$this->_conceptId.", userId:".$this->_userId.", termName:".$this->_termName.", termType:".$this->_termType."}" ;
    }
}

?>