
<?php

 /**
  * Essa classe é utilizada para agrupar uma macro atividade usual e sua similaridade na lista
  * retornada pelo método getMacroActivityReferencesAssociated() da classe FrameworkMacroActivity.
  */
class FrameworkMacroActivityRefence
{
    // Enum
    public static $SIMILARITY = array( "+"=>"+", "="=>"=", "-"=>"-" );

    private $_macroActivity = NULL ;
    private $_similarity = NULL ;

    function __construct($macroActivity, $similarity)
    {
        $this->_macroActivity = $macroActivity ;
        $this->_similarity = $similarity ;
    }

     /**
      * Método para recuperar uma macro ativ. usual.
      *
      * @return retorna uma macro ativ. usual
      */
    public function getMacroActivity()
    {
        return $this->_macroActivity ;
    }

     /**
      * Método para recuperar a similaridade da macro ativ. usual deste objeto com a macro atividade de framework ao qual ele pertence.
      *
      * @return retorna a similaridade
      */
    public function getSimilarity()
    {
        return $this->_similarity ;
    }
}

?>