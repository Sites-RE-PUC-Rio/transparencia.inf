
<?php

abstract class MacroActivity
{
    // Fields
    private $_macroActivityId = NULL ;
    private $_userId = NULL ;
    private $_processId = NULL ;
    private $_action = NULL ;
    private $_object = NULL ;
    private $_description = NULL ;
    private $_action_synonymous = NULL ;
    private $_object_synonymous = NULL ;
    private $_priority = NULL ;

    function __construct($macroActivityId, $userId, $processId, $action, $object, $description, $action_synonymous, $object_synonymous, $priority)
    {
        $this->_macroActivityId = $macroActivityId ;
        $this->_userId = $userId ;
        $this->_processId = $processId ;
        $this->_action = $action ;
        $this->_object = $object ;
        $this->_description = $description ;
        $this->_action_synonymous = $action_synonymous ;
        $this->_object_synonymous = $object_synonymous ;
        $this->_priority = $priority ;
    }

     /**
      * Método para recuperar o tipo desta macro atividade (usual ou framework).
      *
      * @return retorna o tipo de atividade.
      */
    public abstract function getMacroType() ;

     /**
      * Método para recuperar o identificador da atividade macro.
      *
      * @return retorna identificador da atividade macro
      */
    public function getMacroActivityId()
    {
        return $this->_macroActivityId ;
    }

     /**
      * Método para recuperar o identificador do usuário criador da atividade macro.
      *
      * @return retorna identificador do usuário
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * Método para recuperar o identificador do processo ao qual essa atividade macro pertence.
      *
      * @return retorna identificador do processo
      */
    public function getProcessId()
    {
        return $this->_processId ;
    }

     /**
      * Método para recuperar o nome da atividade macro.
      *
      * @return retorna nome da atividade macro
      */
    public function getName()
    {
        return $this->_action." ".$this->_object ;
    }

     /**
      * Método para recuperar a Ação(verbo) do nome da atividade macro.
      *
      * @return retorna a ação da atividade macro
      */
    public function getAction()
    {
        return $this->_action ;
    }

     /**
      * Método para setar a Ação(verbo) do nome da atividade macro.
      *
      * @param $action
      */
    public function setAction($action)
    {
        $this->_action = $action ;
    }

     /**
      * Método para recuperar o Objeto da ação do nome da atividade macro.
      *
      * @return retorna o objeto da atividade macro
      */
    public function getObject()
    {
        return $this->_object ;
    }

     /**
      * Método para setar o Objeto da ação do nome da atividade macro.
      *
      * @param $object
      */
    public function setObject($object)
    {
        $this->_object = $object ;
    }

     /**
      * Método para recuperar a descrição da atividade macro.
      *
      * @return retorna a descriçao da atividade macro
      */
    public function getDescription()
    {
        return $this->_description ;
    }

     /**
      * Método para setar a descrição da atividade macro.
      *
      * @param $description
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

     /**
      * Método para recuperar o sinonimo da Ação(verbo) do nome da atividade macro.
      *
      * @return retorna sinonimo da ação da atividade macro
      */
    public function getActionSynonymous()
    {
        return $this->_action_synonymous ;
    }

     /**
      * Método para setar o sinonimo da Ação(verbo) do nome da atividade macro.
      *
      * @param $action_synonymous
      */
    public function setActionSynonymous($action_synonymous)
    {
        $this->_action_synonymous = $action_synonymous ;
    }

     /**
      * Método para recuperar o sinonimo do Objeto da ação do nome da atividade macro.
      *
      * @return retorna o sinonimo do objeto da atividade macro
      */
    public function getObjectSynonymous()
    {
        return $this->_object_synonymous ;
    }

     /**
      * Método para setar o sinonimo do Objeto da ação do nome da atividade macro.
      *
      * @param $object_synonymous
      */
    public function setObjectSynonymous($object_synonymous)
    {
        $this->_object_synonymous = $object_synonymous ;
    }

     /**
      * Método para recuperar o nível de prioridade desta atividade macro em seu processo.
      * Quanto menor for o valor mais cedo essa atividade irá ocorrer dentro do processo.
      *
      * @return prioridade da macro atividade
      */
    public function getPriority()
    {
        return $this->_priority ;
    }

     /**
      * Método para recuperar as atividades detalhadas desta atividade macro.
      *
      * @return retorna uma lista com as atividades detalhadas deste processo.
      */
    public function getDetailedActivities()
    {
        return DAOProcess::getMacroDetailedActivities($this->_macroActivityId) ;
    }

     /**
      * Método para tranformar para string os atributos da atividade macro.
      *
      * @return retorna o texto com os atributos da atividade macro
      */
    public function __toString()
    {
        return "Macro Atividade: {macroActivityId:".$this->_macroActivityId.", userId:".$this->_userId.", name:".$this->getName()."}" ;
    }
}

?>