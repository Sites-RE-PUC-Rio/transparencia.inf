
<?php

require_once "models/DetailedActivity.php" ;

 /**
  * Essa classe representa as atividades detalhadas associadas ao framework.
  */
class FrameworkDetailedActivity extends DetailedActivity
{
    // Enums
    public static $TYPE = array( "Ponto Comum"=>"common", "Ponto de Flexibiliza��o"=>"hot spot" );
    public static $CARACTERISTICS = array( "Essencial"=>"essencial", "Recomendado"=>"recomended", "Analizado"=>"analized", "Espec�fico"=>"specific", "Comum"=>"commons", "Opcional"=>"optional" );

    // Fields
    private $_type = NULL ;
    private $_caracteristics = NULL ;

    function __construct($detailedActivityId, $userId, $macroActivityId, $action, $object, $description, $action_synonymous, $object_synonymous, $priority, $type, $caracteristics)
    {
        parent::__construct($detailedActivityId, $userId, $macroActivityId, $action, $object, $description, $action_synonymous, $object_synonymous, $priority) ;

        $this->_type = $type ;
        $this->_caracteristics = $caracteristics ;
    }

     /**
      * M�todo para recuperar o tipo de ativ. detalhada.
      *
      * @return retorna o tipo de ativ. detalhada
      */
    public function getDetailedType()
    {
        return "framework" ;
    }

     /**
      * M�todo para recuperar o tipo de ativ. detalhada do framework.
      *
      * @return retorna o tipo de ativ. detalhada do framework
      */
    public function getType()
    {
        return $this->_type ;
    }

     /**
      * M�todo para setar o tipo de ativ. detalhada do framework.
      *
      * @param $type
      */
    public function setType($type)
    {
        $this->_type = $type ;
    }

     /**
      * M�todo para recuperar as caracteristicas de ativ. detalhada do framework.
      *
      * @return retorna as caracteristicas de ativ. detalhada do framework
      */
    public function getCaracteristics()
    {
        return $this->_caracteristics ;
    }

     /**
      * M�todo para setar as carcteristicas de ativ. detalhada do framework.
      *
      * @param $caracteristics
      */
    public function setCaracteristics($caracteristics)
    {
        $this->_caracteristics = $caracteristics ;
    }

     /**
      * M�todo para recuperar uma lista das ativ. detalhadas usuais que podem representar esta ativ. detalhada de framework.
      *
      * @return retorna uma lista com ativ. detalhadas usuais
      */
    public function getDetailedActivityReferencesAssociated()
    {
        return DAOProcess::getFrameworkDetailedActivityReferences($this->getDetailedActivityId()) ;
    }
}

?>