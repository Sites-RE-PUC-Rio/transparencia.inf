
<?php

 /**
  * Essa classe representa possíveis metodos utilizados no processo,
  * macro atividades ou atividades detalhadas.
  */
class Aux_Method
{
    // Fields
    private $_methodId = NULL ;
    private $_userId = NULL ;
    private $_name = NULL ;
    private $_what = NULL ;
    private $_why = NULL ;
    private $_appliesWhen = NULL ;
    private $_how = NULL ;
    private $_restriction = NULL ;
    private $_generatedProduct = NULL ;
    private $_reference = NULL ;

    function __construct($methodId, $userId, $name, $what, $why, $appliesWhen, $how, $restriction, $generatedProduct, $reference)
    {
        $this->_methodId = $methodId ;
        $this->_userId = $userId ;
        $this->_name = $name ;
        $this->_what = $what ;
        $this->_why = $why ;
        $this->_appliesWhen = $appliesWhen ;
        $this->_how = $how ;
        $this->_restriction = $restriction ;
        $this->_generatedProduct = $generatedProduct ;
        $this->_reference = $reference ;
    }

     /**
      * Método para recuperar o identificador do metodo.
      *
      * @return retorna identificador do metodo
      */
    public function getMethodId()
    {
        return $this->_methodId ;
    }

     /**
      * Método para recuperar o identificador do usuário criador do metodo.
      *
      * @return retorna identificador do usuário
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * Método para recuperar o nome do metodo.
      *
      * @return retorna nome do metodo
      */
    public function getName()
    {
        return $this->_name ;
    }

     /**
      * Método para setar o nome do metodo.
      *
      * @param $name
      */
    public function setName($name)
    {
        $this->_name = $name ;
    }

     /**
      * Método para recuperar "o que" é o metodo.
      *
      * @return retorna "o que" é o metodo
      */
    public function getWhat()
    {
        return $this->_what ;
    }

     /**
      * Método para setar "o que" é o metodo.
      *
      * @param $what
      */
    public function setWhat($what)
    {
        $this->_what = $what ;
    }

     /**
      * Método para recuperar "o porque" do metodo.
      *
      * @return retorna "o porque" do metodo
      */
    public function getWhy()
    {
        return $this->_why ;
    }

     /**
      * Método para setar "o porque" do metodo.
      *
      * @param $why
      */
    public function setWhy($why)
    {
        $this->_why = $whyn ;
    }

     /**
      * Método para recuperar "quando utilizar" o metodo.
      *
      * @return retorna "quando utilizar" o metodo
      */
    public function getAppliesWhen()
    {
        return $this->_appliesWhen ;
    }

     /**
      * Método para setar "quando utilizar" o metodo.
      *
      * @param $appliesWhen
      */
    public function setAppliesWhen($appliesWhen)
    {
        $this->_appliesWhen = $appliesWhen ;
    }

     /**
      * Método para recuperar "como" é o metodo.
      *
      * @return retorna "como" é o metodo
      */
    public function getHow()
    {
        return $this->_how ;
    }

     /**
      * Método para setar "como" é o metodo.
      *
      * @param $how
      */
    public function setHow($how)
    {
        $this->_how = $how ;
    }

     /**
      * Método para recuperar as retrições do metodo.
      *
      * @return retorna restrições do metodo
      */

    public function getRestriction()
    {
        return $this->_restriction ;
    }

     /**
      * Método para setar as retrições do metod.
      *
      * @param $restriction
      */
    public function setRestriction($restriction)
    {
        $this->_restriction = $restriction ;
    }

     /**
      * Método para recuperar produtos gerados pelo metodo.
      *
      * @return retorna produtos gerados pelo metodo
      */

    public function getGeneratedProduct()
    {
        return $this->_generatedProduct ;
    }

     /**
      * Método para setar oprodutos gerados pelo metodo.
      *
      * @param $generatedProduct
      */
    public function setGeneratedProduct($generatedProduct)
    {
        $this->_generatedProduct = $generatedProduct ;
    }

     /**
      * Método para recuperar referencias do metodo.
      *
      * @return retorna referencias do metodo
      */

    public function getReference()
    {
        return $this->_reference ;
    }

     /**
      * Método para setar referencias do metodo.
      *
      * @param $reference
      */
    public function setReference($reference)
    {
        $this->_reference = $reference ;
    }

     /**
      * Método para tranformar para string os atributos do metodo.
      *
      * @return retorna o texto com os atributos do metodo
      */
    public function __toString()
    {
        return "Method: {methodId:".$this->_methodId.", userId:".$this->_userId.", name:".$this->_name."}" ;
    }
}

?>