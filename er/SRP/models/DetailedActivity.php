
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
      * Método para recuperar o tipo desta atividade detalhada (usual ou framework).
      *
      * @return retorna o tipo de atividade.
      */
    public abstract function getDetailedType() ;

     /**
      * Método para recuperar o identificador da atividade detalhada.
      *
      * @return retorna identificador da atividade detalhada
      */
    public function getDetailedActivityId()
    {
        return $this->_detailedActivityId ;
    }

     /**
      * Método para recuperar o identificador do usuário criador da atividade detalhada.
      *
      * @return retorna identificador do usuário
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * Método para recuperar o identificador atividade macro associada.
      *
      * @return retorna identificador da atividade macro associada
      */
    public function getMacroActivityId()
    {
        return $this->_macroActivityId ;
    }

     /**
      * Método para recuperar o nome da atividade detalhada.
      *
      * @return retorna nome da atividade detalhada
      */
    public function getName()
    {
        return $this->_action." ".$this->_object ;
    }

     /**
      * Método para recuperar a Ação(verbo) do nome da atividade detalahada.
      *
      * @return retorna a ação da atividade detalhada
      */
    public function getAction()
    {
        return $this->_action ;
    }

     /**
      * Método para setar a Ação(verbo) do nome da atividade detalhada.
      *
      * @param $action
      */
    public function setAction($action)
    {
        $this->_action = $action ;
    }

     /**
      * Método para recuperar o Objeto da ação do nome da atividade detalhada.
      *
      * @return retorna o objeto da atividade detalhada
      */
    public function getObject()
    {
        return $this->_object ;
    }

     /**
      * Método para setar o Objeto da ação do nome da atividade detalhada.
      *
      * @param $object
      */
    public function setObject($object)
    {
        $this->_object = $object ;
    }

     /**
      * Método para recuperar a descrição da atividade detalhada.
      *
      * @return retorna a descriçao da atividade detalhada
      */
    public function getDescription()
    {
        return $this->_description ;
    }

     /**
      * Método para setar a descrição da atividade detalhada.
      *
      * @param $description
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

     /**
      * Método para recuperar o sinonimo da Ação(verbo) do nome da atividade detalahada.
      *
      * @return retorna sinonimo da ação da atividade detalhada
      */
    public function getActionSynonymous()
    {
        return $this->_action_synonymous ;
    }

     /**
      * Método para setar o sinonimo da Ação(verbo) do nome da atividade detalhada.
      *
      * @param $action_synonymous
      */
    public function setActionSynonymous($action_synonymous)
    {
        $this->_action_synonymous = $action_synonymous ;
    }

     /**
      * Método para recuperar o sinonimo do Objeto da ação do nome da atividade detalhada.
      *
      * @return retorna o sinonimo do objeto da atividade detalhada
      */
    public function getObjectSynonymous()
    {
        return $this->_object_synonymous ;
    }

     /**
      * Método para setar o sinonimo do Objeto da ação do nome da atividade detalhada.
      *
      * @param $object_synonymous
      */
    public function setObjectSynonymous($object_synonymous)
    {
        $this->_object_synonymous = $object_synonymous ;
    }

     /**
      * Método para recuperar o nível de prioridade desta atividade detalhada em sua atividade macro.
      * Quanto menor for o valor mais cedo essa atividade irá ocorrer dentro do macro atividade.
      *
      * @return prioridade da atividade detalhada
      */
    public function getPriority()
    {
        return $this->_priority ;
    }

     /**
      * Método para tranformar para string os atributos da atividade detalhada.
      *
      * @return retorna o texto com os atributos da atividade detalhada
      */
    public function __toString()
    {
        return "Atividade Detalhada: {detailedActivityId:".$this->_detailedActivityId.", userId:".$this->_userId.", macroActivityId:".$this->_macroActivityId.", name:".$this->getName()."}" ;
    }
}

?>