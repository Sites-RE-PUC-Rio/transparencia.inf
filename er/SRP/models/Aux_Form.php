<?php

 /**
  * Essa classe representa poss�veis formul�rios utilizados no processo.
  */
class Aux_Form
{
    // Fields
    private $_formId = NULL ;
    private $_userId = NULL ;
    private $_name = NULL ;
    private $_purpose = NULL ;

    function __construct($formId, $userId, $name, $purpose)
    {
        $this->_formId = $formId ;
        $this->_userId = $userId ;
        $this->_name = $name ;
        $this->_purpose = $purpose ;
    }

     /**
      * M�todo para recuperar o identificador do formulario.
      *
      * @return retorna identificador do formulario
      */
    public function getFormId()
    {
        return $this->_formId ;
    }

     /**
      * M�todo para recuperar o identificador do usu�rio criador do formulario.
      *
      * @return retorna identificador do usu�rio
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * M�todo para recuperar o nome do formulario.
      *
      * @return retorna nome do formulario
      */
    public function getName()
    {
        return $this->_name ;
    }

     /**
      * M�todo para setar o nome do formulario.
      *
      * @param $name
      */
    public function setName($name)
    {
        $this->_name = $name ;
    }

     /**
      * M�todo para recuperar o proposito do formulario.
      *
      * @return retorna proposito do formulario
      */
    public function getPurpose()
    {
        return $this->_purpose ;
    }
     /**
      * M�todo para setar o proposito do formulario.
      *
      * @param $purpose
      */
    public function setPurpose($purpose)
    {
        $this->_purpose = $purpose ;
    }

     /**
      * M�todo para dar o nome do arquivo template ser salvo.
      *
      * @return retorna o nome template do formulario
      */
    public static function getTemplateRerence($formId)
    {
        return "form_".$formId."_template" ;
    }

     /**
      * M�todo para tranformar para string os atributos do conceito.
      *
      * @return retorna o texto com os atributos do conceito
      */
    public function __toString()
    {
        return "Form: {formId:".$this->_formId.", userId:".$this->_userId.", name:".$this->_name."}" ;
    }
}

?>