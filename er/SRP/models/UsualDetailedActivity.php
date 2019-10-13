
<?php

require_once "models/DetailedActivity.php" ;

 /**
  * Essa classe representa as atividades detalhadas do usual process.
  */
class UsualDetailedActivity extends DetailedActivity
{
    // Fields
    private $_preCondition = NULL ;
    private $_posCondition = NULL ;
    private $_restriction = NULL ;
    private $_reusedFrom = NULL ;

    function __construct($detailedActivityId, $userId, $macroActivityId, $action, $object, $description, $action_synonymous, $object_synonymous, $priority, $preCondition, $posCondition, $restriction, $reusedFrom)
    {
        parent::__construct($detailedActivityId, $userId, $macroActivityId, $action, $object, $description, $action_synonymous, $object_synonymous, $priority) ;

        $this->_preCondition = $preCondition ;
        $this->_posCondition = $posCondition ;
        $this->_restriction = $restriction ;
        $this->_reusedFrom = $reusedFrom ;
    }

     /**
      * M�todo para recuperar o tipo de ativ. detalhada.
      *
      * @return retorna o tipo de ativ. detalhada
      */
    public function getDetailedType()
    {
        return "usual" ;
    }

     /**
      * M�todo para recuperar pre condi��o da ativ. detalhada do usual process.
      *
      * @return retorna pre condi��o
      */
    public function getPreCondition()
    {
        return $this->_preCondition ;
    }

     /**
      * M�todo para setar pre condi��o da ativ. detalhada do usual process.
      *
      * @param $preCondition
      */
    public function setPreCondition($preCondition)
    {
        $this->_preCondition = $preCondition ;
    }

     /**
      * M�todo para recuperar pos condi��o da ativ. detalhada do usual process.
      *
      * @return retorna pos condi��o
      */
    public function getPosCondition()
    {
        return $this->_posCondition ;
    }

     /**
      * M�todo para setar pos condi��o da ativ. detalhada do usual process.
      *
      * @param $posCondition
      */
    public function setPosCondition($posCondition)
    {
        $this->_posCondition = $posCondition ;
    }

     /**
      * M�todo para recuperar restri��o da ativ. detalhada do usual process.
      *
      * @return retorna restri��o
      */
    public function getRestriction()
    {
        return $this->_restriction ;
    }

     /**
      * M�todo para setar restri��o da ativ. detalhada do usual process.
      *
      * @param $restriction
      */
    public function setRestriction($restriction)
    {
        $this->_restriction = $restriction ;
    }

     /**
      * M�todo para recuperar o identificador da atividade detalhada da qual esta foi clonada em um processo de reuso.
      *
      * @return retorna identificador da atividade detalhada que gerou esta ou NULL caso esta n�o tenha sido criada por reuso
      */
    public function getReusedFrom()
    {
        return $this->_reusedFrom ;
    }
}

?>