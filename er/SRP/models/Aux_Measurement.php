
<?php

 /**
  * Essa classe representa poss�veis medi��es utilizados no processo.
  */
class Aux_Measurement
{
    // Fields
    private $_measurementId = NULL ;
    private $_userId = NULL ;
    private $_name = NULL ;
    private $_description = NULL ;
    private $_formula = NULL ;
    private $_metric = NULL ;

    function __construct($measurementId, $userId, $name, $description, $formula, $metric)
    {
        $this->_measurementId = $measurementId ;
        $this->_userId = $userId ;
        $this->_name = $name ;
        $this->_description = $description ;
        $this->_formula = $formula ;
        $this->_metric = $metric ;
    }

     /**
      * M�todo para recuperar o identificador da medi��o.
      *
      * @return retorna identificador da medi��o
      */
    public function getMeasurementId()
    {
        return $this->_measurementId ;
    }

     /**
      * M�todo para recuperar o identificador do usu�rio da medi��o.
      *
      * @return retorna identificador do usu�rio
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * M�todo para recuperar o nome da medi��o.
      *
      * @return retorna nome da medi��o
      */
    public function getName()
    {
        return $this->_name ;
    }

     /**
      * M�todo para setar o nome da medi��o.
      *
      * @param $name
      */
    public function setName($name)
    {
        $this->_name = $name ;
    }

     /**
      * M�todo para recuperar a descri��o da medi��o.
      *
      * @return retorna a descri�ao da medi��o
      */
    public function getDescription()
    {
        return $this->_description ;
    }

     /**
      * M�todo para setar a descri��o da medi��o.
      *
      * @param $description
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

     /**
      * M�todo para recuperar a formula da medi��o.
      *
      * @return retorna a formula da medi��o
      */
    public function getFormula()
    {
        return $this->_formula ;
    }

     /**
      * M�todo para setar a formula da medi��o.
      *
      * @param $formula
      */
    public function setFormula($formula)
    {
        $this->_formula = $formula ;
    }

     /**
      * M�todo para recuperar a metrica da medi��o.
      *
      * @return retorna a metrica da medi��o
      */
    public function getMetric()
    {
        return $this->_metric ;
    }

     /**
      * M�todo para setar a metrica da medi��o.
      *
      * @param $metric
      */
    public function setMetric($metric)
    {
        $this->_metric = $metric ;
    }

     /**
      * M�todo para tranformar para string os atributos da medi��o.
      *
      * @return retorna o texto com os atributos da medi��o
      */
    public function __toString()
    {
        return "Measurement: {measurementId:".$this->_measurementId.", userId:".$this->_userId.", name:".$this->_name."}" ;
    }
}

?>