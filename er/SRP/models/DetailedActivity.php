
<?php

abstract class DetailedActivity
{
    // Fields
    private $_detailedActivityId = NULL ;
    private $_userId = NULL ;
    private $_macroActivityId = NULL ;
    private $_action = NULL ;
    private $_object = NULL ;
    private $_description = NULL ;
    private $_action_synonymous = NULL ;
    private $_object_synonymous = NULL ;
    private $_priority = NULL ;

    function __construct($detailedActivityId, $userId, $macroActivityId, $action, $object, $description, $action_synonymous, $object_synonymous, $priority)
    {
        $this->_detailedActivityId = $detailedActivityId ;
        $this->_userId = $userId ;
        $this->_macroActivityId = $macroActivityId ;
        $this->_action = $action ;
        $this->_object = $object ;
        $this->_description = $description ;
        $this->_action_synonymous = $action_synonymous ;
        $this->_object_synonymous = $object_synonymous ;
        $this->_priority = $priority ;
    }

     /**
      * M�todo para recuperar o tipo desta atividade detalhada (usual ou framework).
      *
      * @return retorna o tipo de atividade.
      */
    public abstract function getDetailedType() ;

     /**
      * M�todo para recuperar o identificador da atividade detalhada.
      *
      * @return retorna identificador da atividade detalhada
      */
    public function getDetailedActivityId()
    {
        return $this->_detailedActivityId ;
    }

     /**
      * M�todo para recuperar o identificador do usu�rio criador da atividade detalhada.
      *
      * @return retorna identificador do usu�rio
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * M�todo para recuperar o identificador atividade macro associada.
      *
      * @return retorna identificador da atividade macro associada
      */
    public function getMacroActivityId()
    {
        return $this->_macroActivityId ;
    }

     /**
      * M�todo para recuperar o nome da atividade detalhada.
      *
      * @return retorna nome da atividade detalhada
      */
    public function getName()
    {
        return $this->_action." ".$this->_object ;
    }

     /**
      * M�todo para recuperar a A��o(verbo) do nome da atividade detalahada.
      *
      * @return retorna a a��o da atividade detalhada
      */
    public function getAction()
    {
        return $this->_action ;
    }

     /**
      * M�todo para setar a A��o(verbo) do nome da atividade detalhada.
      *
      * @param $action
      */
    public function setAction($action)
    {
        $this->_action = $action ;
    }

     /**
      * M�todo para recuperar o Objeto da a��o do nome da atividade detalhada.
      *
      * @return retorna o objeto da atividade detalhada
      */
    public function getObject()
    {
        return $this->_object ;
    }

     /**
      * M�todo para setar o Objeto da a��o do nome da atividade detalhada.
      *
      * @param $object
      */
    public function setObject($object)
    {
        $this->_object = $object ;
    }

     /**
      * M�todo para recuperar a descri��o da atividade detalhada.
      *
      * @return retorna a descri�ao da atividade detalhada
      */
    public function getDescription()
    {
        return $this->_description ;
    }

     /**
      * M�todo para setar a descri��o da atividade detalhada.
      *
      * @param $description
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

     /**
      * M�todo para recuperar o sinonimo da A��o(verbo) do nome da atividade detalahada.
      *
      * @return retorna sinonimo da a��o da atividade detalhada
      */
    public function getActionSynonymous()
    {
        return $this->_action_synonymous ;
    }

     /**
      * M�todo para setar o sinonimo da A��o(verbo) do nome da atividade detalhada.
      *
      * @param $action_synonymous
      */
    public function setActionSynonymous($action_synonymous)
    {
        $this->_action_synonymous = $action_synonymous ;
    }

     /**
      * M�todo para recuperar o sinonimo do Objeto da a��o do nome da atividade detalhada.
      *
      * @return retorna o sinonimo do objeto da atividade detalhada
      */
    public function getObjectSynonymous()
    {
        return $this->_object_synonymous ;
    }

     /**
      * M�todo para setar o sinonimo do Objeto da a��o do nome da atividade detalhada.
      *
      * @param $object_synonymous
      */
    public function setObjectSynonymous($object_synonymous)
    {
        $this->_object_synonymous = $object_synonymous ;
    }

     /**
      * M�todo para recuperar o n�vel de prioridade desta atividade detalhada em sua atividade macro.
      * Quanto menor for o valor mais cedo essa atividade ir� ocorrer dentro do macro atividade.
      *
      * @return prioridade da atividade detalhada
      */
    public function getPriority()
    {
        return $this->_priority ;
    }

     /**
      * M�todo para tranformar para string os atributos da atividade detalhada.
      *
      * @return retorna o texto com os atributos da atividade detalhada
      */
    public function __toString()
    {
        return "Atividade Detalhada: {detailedActivityId:".$this->_detailedActivityId.", userId:".$this->_userId.", macroActivityId:".$this->_macroActivityId.", name:".$this->getName()."}" ;
    }
}

?>