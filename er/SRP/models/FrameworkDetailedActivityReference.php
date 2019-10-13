
<?php

 /**
  * Essa classe � utilizada para agrupar uma atividade detalhada usual e sua similaridade na lista
  * retornada pelo m�todo getDetailedActivityReferencesAssociated() da classe FrameworkDetailedActivity.
  */
class FrameworkDetaildActivityRefence
{
    // Enum
    public static $SIMILARITY = array( "+"=>"+", "="=>"=", "-"=>"-" );

    private $_detailedActivity = NULL ;
    private $_similarity = NULL ;

    function __construct($detailedActivity, $similarity)
    {
        $this->_detailedActivity = $detailedActivity ;
        $this->_similarity = $similarity ;
    }

     /**
      * M�todo para recuperar uma ativ. detalhada usual.
      *
      * @return retorna uma ativ. detalhada usual
      */
    public function getDetailedActivity()
    {
        return $this->_detailedActivity ;
    }

     /**
      * M�todo para recuperar a similaridade da ativ. detalhada usual deste objeto com a atividade detalhada de framework ao qual ele pertence.
      *
      * @return retorna a similaridade
      */
    public function getSimilarity()
    {
        return $this->_similarity ;
    }
}

?>