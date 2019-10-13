
<?php

 /**
  * Essa classe representa possíveis medições utilizados no processo.
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
      * Método para recuperar o identificador da medição.
      *
      * @return retorna identificador da medição
      */
    public function getMeasurementId()
    {
        return $this->_measurementId ;
    }

     /**
      * Método para recuperar o identificador do usuário da medição.
      *
      * @return retorna identificador do usuário
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * Método para recuperar o nome da medição.
      *
      * @return retorna nome da medição
      */
    public function getName()
    {
        return $this->_name ;
    }

     /**
      * Método para setar o nome da medição.
      *
      * @param $name
      */
    public function setName($name)
    {
        $this->_name = $name ;
    }

     /**
      * Método para recuperar a descrição da medição.
      *
      * @return retorna a descriçao da medição
      */
    public function getDescription()
    {
        return $this->_description ;
    }

     /**
      * Método para setar a descrição da medição.
      *
      * @param $description
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

     /**
      * Método para recuperar a formula da medição.
      *
      * @return retorna a formula da medição
      */
    public function getFormula()
    {
        return $this->_formula ;
    }

     /**
      * Método para setar a formula da medição.
      *
      * @param $formula
      */
    public function setFormula($formula)
    {
        $this->_formula = $formula ;
    }

     /**
      * Método para recuperar a metrica da medição.
      *
      * @return retorna a metrica da medição
      */
    public function getMetric()
    {
        return $this->_metric ;
    }

     /**
      * Método para setar a metrica da medição.
      *
      * @param $metric
      */
    public function setMetric($metric)
    {
        $this->_metric = $metric ;
    }

     /**
      * Método para tranformar para string os atributos da medição.
      *
      * @return retorna o texto com os atributos da medição
      */
    public function __toString()
    {
        return "Measurement: {measurementId:".$this->_measurementId.", userId:".$this->_userId.", name:".$this->_name."}" ;
    }
}

?>