
<?php

require_once "models/MacroActivity.php" ;

 /**
  * Essa classe representa as atividades macro do usual process.
  */
class UsualMacroActivity extends MacroActivity
{
    // Fields
    private $_preCondition = NULL ;
    private $_posCondition = NULL ;
    private $_restriction = NULL ;
    private $_reusedFrom = NULL ;

    function __construct($macroActivityId, $userId, $processId, $action, $object, $description, $action_synonymous, $object_synonymous, $priority, $preCondition, $posCondition, $restriction, $reusedFrom)
    {
        parent::__construct($macroActivityId, $userId, $processId, $action, $object, $description, $action_synonymous, $object_synonymous, $priority) ;

        $this->_preCondition = $preCondition ;
        $this->_posCondition = $posCondition ;
        $this->_restriction = $restriction ;
        $this->_reusedFrom = $reusedFrom ;
    }

     /**
      * Método para recuperar o tipo de ativ. macro.
      *
      * @return retorna o tipo de ativ. macro
      */
    public function getMacroType()
    {
        return "usual" ;
    }

     /**
      * Método para recuperar pre condição da ativ. macro do usual process.
      *
      * @return retorna pre condição
      */
    public function getPreCondition()
    {
        return $this->_preCondition ;
    }

     /**
      * Método para setar pre condição da ativ. macro do usual process.
      *
      * @param $preCondition
      */
    public function setPreCondition($preCondition)
    {
        $this->_preCondition = $preCondition ;
    }

     /**
      * Método para recuperar pos condição da ativ. macro do usual process.
      *
      * @return retorna pos condição
      */
    public function getPosCondition()
    {
        return $this->_posCondition ;
    }

     /**
      * Método para setar pos condição da ativ. macro do usual process.
      *
      * @param $posCondition
      */
    public function setPosCondition($posCondition)
    {
        $this->_posCondition = $posCondition ;
    }

     /**
      * Método para recuperar restrição da ativ. macro do usual process.
      *
      * @return retorna restrição
      */
    public function getRestriction()
    {
        return $this->_restriction ;
    }

     /**
      * Método para setar restrição da ativ. macro do usual process.
      *
      * @param $restriction
      */
    public function setRestriction($restriction)
    {
        $this->_restriction = $restriction ;
    }

     /**
      * Método para recuperar o identificador da atividade macro da qual esta foi clonada em um processo de reuso.
      *
      * @return retorna identificador da atividade macro que gerou esta ou NULL caso esta não tenha sido criada por reuso
      */
    public function getReusedFrom()
    {
        return $this->_reusedFrom ;
    }
}

?>