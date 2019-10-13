
<?php

 /**
  * Essa classe representa possíveis verificações utilizados no processo.
  */
class Aux_Verification
{
    // Enums
    public static $TYPE = array( "Revisão"=>"revision", "Auditoria"=>"auditorship" );

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
      * Método para recuperar o identificador da verificação.
      *
      * @return retorna identificador da verificação
      */
    public function getVerificationId()
    {
        return $this->_verificationId ;
    }

     /**
      * Método para recuperar o identificador do usuário criador da verificação.
      *
      * @return retorna identificador do usuário
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * Método para recuperar o nome da verificação.
      *
      * @return retorna nome da verificação
      */
    public function getName()
    {
        return $this->_name ;
    }

     /**
      * Método para setar o nome da verificação.
      *
      * @param $name
      */
    public function setName($name)
    {
        $this->_name = $name ;
    }

     /**
      * Método para recuperar o tipo da verificação.
      *
      * @return retorna o tipo da verificação
      */
    public function getType()
    {
        return $this->_type ;
    }

     /**
      * Método para setar o tipo da verificação.
      *
      * @param $type
      */
    public function setType($type)
    {
        $this->_type = $type ;
    }

     /**
      * Método para recuperar a descrição da verificação.
      *
      * @return retorna a descriçao da verificação
      */
    public function getDescription()
    {
        return $this->_description ;
    }

     /**
      * Método para setar a descrição da verificação.
      *
      * @param $description
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

     /**
      * Método para recuperar a frequencia da verificação.
      *
      * @return retorna a frequecia da verificação
      */
    public function getFrequency()
    {
        return $this->_frequency ;
    }

     /**
      * Método para setar a frequencia da verificação.
      *
      * @param $frequency
      */
    public function setFrequency($frequency)
    {
        $this->_frequency = $frequency ;
    }

     /**
      * Método para recuperar quem realiza a verificação.
      *
      * @return retorna quem realiza a verificação
      */
    public function getWorker()
    {
        return $this->_worker ;
    }

     /**
      * Método para setar quem realiza a verificação.
      *
      * @param $worker
      */
    public function setWorker($worker)
    {
        $this->_worker = $worker ;
    }

     /**
      * Método para tranformar para string os atributos da verificação.
      *
      * @return retorna o texto com os atributos da verificação
      */
    public function __toString()
    {
        return "Verification: {verificationId:".$this->_verificationId.", userId:".$this->_userId.", name:".$this->_name.", type:".$this->_type.", frequency:".$this->_frequency.", worker:".$this->_worker."}" ;
    }
}

?>