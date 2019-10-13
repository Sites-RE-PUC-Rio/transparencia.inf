
<?php

 /**
  * Essa classe representa poss�veis verifica��es utilizados no processo.
  */
class Aux_Verification
{
    // Enums
    public static $TYPE = array( "Revis�o"=>"revision", "Auditoria"=>"auditorship" );

    // Fields
    private $_verificationId = NULL ;
    private $_userId = NULL ;
    private $_name = NULL ;
    private $_type = NULL ;
    private $_description = NULL ;
    private $_frequency = NULL ;
    private $_worker = NULL ;

    function __construct($verificationId, $userId, $name, $type, $description, $frequency, $worker)
    {
        $this->_verificationId = $verificationId ;
        $this->_userId = $userId ;
        $this->_name = $name ;
        $this->_type = $type ;
        $this->_description = $description ;
        $this->_frequency = $frequency ;
        $this->_worker = $worker ;
    }

     /**
      * M�todo para recuperar o identificador da verifica��o.
      *
      * @return retorna identificador da verifica��o
      */
    public function getVerificationId()
    {
        return $this->_verificationId ;
    }

     /**
      * M�todo para recuperar o identificador do usu�rio criador da verifica��o.
      *
      * @return retorna identificador do usu�rio
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * M�todo para recuperar o nome da verifica��o.
      *
      * @return retorna nome da verifica��o
      */
    public function getName()
    {
        return $this->_name ;
    }

     /**
      * M�todo para setar o nome da verifica��o.
      *
      * @param $name
      */
    public function setName($name)
    {
        $this->_name = $name ;
    }

     /**
      * M�todo para recuperar o tipo da verifica��o.
      *
      * @return retorna o tipo da verifica��o
      */
    public function getType()
    {
        return $this->_type ;
    }

     /**
      * M�todo para setar o tipo da verifica��o.
      *
      * @param $type
      */
    public function setType($type)
    {
        $this->_type = $type ;
    }

     /**
      * M�todo para recuperar a descri��o da verifica��o.
      *
      * @return retorna a descri�ao da verifica��o
      */
    public function getDescription()
    {
        return $this->_description ;
    }

     /**
      * M�todo para setar a descri��o da verifica��o.
      *
      * @param $description
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

     /**
      * M�todo para recuperar a frequencia da verifica��o.
      *
      * @return retorna a frequecia da verifica��o
      */
    public function getFrequency()
    {
        return $this->_frequency ;
    }

     /**
      * M�todo para setar a frequencia da verifica��o.
      *
      * @param $frequency
      */
    public function setFrequency($frequency)
    {
        $this->_frequency = $frequency ;
    }

     /**
      * M�todo para recuperar quem realiza a verifica��o.
      *
      * @return retorna quem realiza a verifica��o
      */
    public function getWorker()
    {
        return $this->_worker ;
    }

     /**
      * M�todo para setar quem realiza a verifica��o.
      *
      * @param $worker
      */
    public function setWorker($worker)
    {
        $this->_worker = $worker ;
    }

     /**
      * M�todo para tranformar para string os atributos da verifica��o.
      *
      * @return retorna o texto com os atributos da verifica��o
      */
    public function __toString()
    {
        return "Verification: {verificationId:".$this->_verificationId.", userId:".$this->_userId.", name:".$this->_name.", type:".$this->_type.", frequency:".$this->_frequency.", worker:".$this->_worker."}" ;
    }
}

?>