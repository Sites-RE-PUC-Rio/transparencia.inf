
<?php

 /**
  * Essa classe representa os processos.
  */
class Process
{
    // Enums
    public static $CLASSIFICATION = array( "Fundamental"=>"fundamental", "Suporte"=>"support", "Organizacional"=>"organizational" );
    public static $NATURE = array( "Framework"=>"framework", "Projeto"=>"project", "Usual"=>"usual" );
    public static $CONFORMITY = array( "CMM"=>"cmm", "CMMI"=>"cmmi", "ISO9000-3"=>"iso9000-3", "ISO12207"=>"iso12207" );
    public static $AREA = array( "Engenharia de Requesitos"=>"requirementsEngineering", "Design"=>"design", "Constru��o"=>"construction", "Teste"=>"test", "Implanta��o"=>"implantation", "Gen�rico"=>"generic" );
    public static $LIFE_CICLE = array( "Cascata"=>"waterfall", "Prototipa��o"=>"prototype", "Espiral"=>"spiral" );
    public static $SYSTEM_TYPE = array( "Web"=>"web", "OO"=>"oo", "BI"=>"bi", "Transacional"=>"transactional", "Misto"=>"hybrid" );
    public static $ORGANIZATION_SIZE = array( "Pequena"=>"small", "M�dia"=>"average", "Grande"=>"big", "Independente"=>"independent" );
    public static $PROJECT_DURATION = array( "1-60h"=>"1-60h", "61-120h"=>"61-120h", "121-180h"=>"121-180h", "181-260h"=>"181-260h", "261-350h"=>"261-350h", "Acima de 350h"=>"above 350h" );
    public static $TEAM_SIZE = array( "Pequena"=>"small", "M�dia"=>"average", "Grande"=>"big", "Independente"=>"independent" );
    public static $REQUIRED_KNOWLEDGE = array( "Baixo"=>"low", "M�dio"=>"average", "Alto"=>"high", "Especialista"=>"specialist" );
    public static $TEAM_LOCATION = array( "Local"=>"local", "Distribu�da"=>"distributed", "Independente"=>"independent" );

    // Fields
    private $_processId = NULL ;
    private $_name = NULL ;
    private $_userId = NULL ;
    private $_author = NULL ;
    private $_objective = NULL ;
    private $_description = NULL ;
    private $_classification = NULL ;
    private $_nature = NULL ;
    private $_conformity = NULL ;
    private $_area = NULL ;
    private $_lifeCicle = NULL ;
    private $_systemType = NULL ;
    private $_organizationSize = NULL ;
    private $_projectDuration = NULL ;
    private $_teamSize = NULL ;
    private $_requiredKnowledge = NULL ;
    private $_teamLocation = NULL ;
    private $_keyWords = NULL ;
    private $_preCondition = NULL ;
    private $_posCondition = NULL ;

    function __construct($processId, $name, $userId, $author, $objective, $description, $classification, $nature, $conformity, $area, $lifeCicle, $systemType, $organizationSize, $projectDuration, $teamSize, $requiredKnowledge, $teamLocation, $keyWords=NULL, $preCondition=NULL, $posCondition=NULL)
    {
        $this->_processId = $processId ;
        $this->_name = $name ;
        $this->_userId = $userId ;
        $this->_author = $author ;
        $this->_objective = $objective ;
        $this->_description = $description ;
        $this->_classification = $classification ;
        $this->_nature = $nature ;
        $this->_conformity = $conformity ;
        $this->_area = $area ;
        $this->_lifeCicle = $lifeCicle ;
        $this->_systemType = $systemType ;
        $this->_organizationSize = $organizationSize ;
        $this->_projectDuration = $projectDuration ;
        $this->_teamSize = $teamSize ;
        $this->_requiredKnowledge = $requiredKnowledge ;
        $this->_teamLocation = $teamLocation ;
        $this->_keyWords = $keyWords ;
        $this->_preCondition = $preCondition ;
        $this->_posCondition = $posCondition ;
    }

     /**
      * M�todo para recuperar o identificador do processo.
      *
      * @return retorna identificador do processo
      */
    public function getProcessId()
    {
        return $this->_processId ;
    }

     /**
      * M�todo para recuperar o nome do processo.
      *
      * @return retorna nome do processo
      */
    public function getName()
    {
        return $this->_name ;
    }
     /**
      * M�todo para setar o nome do processo.
      *
      * @param $name
      */
    public function setName($name)
    {
        $this->_name = $name ;
    }

     /**
      * M�todo para recuperar o usu�rio que criou o processo.
      *
      * @return retorna o usu�rio
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * M�todo para recuperar o autor do processo.
      *
      * @return retorna autor do processo
      */
    public function getAuthor()
    {
        return $this->_author ;
    }

     /**
      * M�todo para setar o autor do processo.
      *
      * @param $author
      */
    public function setAuthor($author)
    {
        $this->_author = $author ;
    }

     /**
      * M�todo para recuperar o objetivo do processo.
      *
      * @return retorna o objetivo do processo
      */
    public function getObjective()
    {
        return $this->_objective ;
    }

     /**
      * M�todo para setar o objetivo do processo.
      *
      * @param $objective
      */
    public function setObjective($objective)
    {
        $this->_objective = $objective ;
    }

     /**
      * M�todo para recuperar a descri��o do processo.
      *
      * @return retorna a descri��o do processo
      */
    public function getDescription()
    {
        return $this->_description ;
    }

     /**
      * M�todo para setar a descri��o do processo.
      *
      * @param $description
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

     /**
      * M�todo para recuperar a classifica��o do processo.
      *
      * @return retorna a classifica��o do processo
      */
    public function getClassification()
    {
        return $this->_classification ;
    }

     /**
      * M�todo para setar a classifica��o do processo.
      *
      * @param $classification
      */
    public function setClassification($classification)
    {
        $this->_classification = $classification ;
    }

     /**
      * M�todo para recuperar a natureza do processo.
      *
      * @return retorna a natureza do processo
      */
    public function getNature()
    {
        return $this->_nature ;
    }

     /**
      * M�todo para setar a natureza do processo.
      *
      * @param $nature
      */
    public function setNature($nature)
    {
        $this->_nature = $nature ;
    }

      /**
      * M�todo para recuperar a conformidade do processo.
      *
      * @return retorna a conformidade do processo
      */
    public function getConformity()
    {
        return $this->_conformity ;
    }

     /**
      * M�todo para setar a conformidade do processo.
      *
      * @param $conformity
      */
    public function setConformity($conformity)
    {
        $this->_conformity = $conformity ;
    }

     /**
      * M�todo para recuperar a area do processo.
      *
      * @return retorna a area do processo
      */
    public function getArea()
    {
        return $this->_area ;
    }

     /**
      * M�todo para setar a area do processo.
      *
      * @param $area
      */
    public function setArea($area)
    {
        $this->_area = $area ;
    }

     /**
      * M�todo para recuperar o ciclo de vida do processo.
      *
      * @return retorna o ciclo de vida do processo
      */
    public function getLifeCicle()
    {
        return $this->_lifeCicle ;
    }

     /**
      * M�todo para setar o ciclo de vida do processo.
      *
      * @param $lifeCicle
      */
    public function setLifeCicle($lifeCicle)
    {
        $this->_lifeCicle = $lifeCicle ;
    }

     /**
      * M�todo para recuperar o tipo de sistema do processo.
      *
      * @return retorna o tipo de sistema do processo
      */
    public function getSystemType()
    {
        return $this->_systemType ;
    }

     /**
      * M�todo para setar o tipo de sistema do processo.
      *
      * @param $systemType
      */
    public function setSystemType($systemType)
    {
        $this->_systemType = $systemType ;
    }

     /**
      * M�todo para recuperar o tamanho da organiza��o que se adequa o processo.
      *
      * @return retorna tamanho da organiza��o do processo
      */
    public function getOrganizationSize()
    {
        return $this->_organizationSize ;
    }

     /**
      * M�todo para setar o tamanho da organiza��o que se adequa o processo.
      *
      * @param $organizationSize
      */
    public function setOrganizationSize($organizationSize)
    {
        $this->_organizationSize = $organizationSize ;
    }

     /**
      * M�todo para recuperar a dura��o do projeto que se adequa o processo.
      *
      * @return retorna dura��o do projeto do processo
      */
    public function getProjectDuration()
    {
        return $this->_projectDuration ;
    }

     /**
      * M�todo para setar a dura��o do projeto que se adequa o processo.
      *
      * @param $projectDuration
      */
    public function setProjectDuration($projectDuration)
    {
        $this->_projectDuration = $projectDuration ;
    }

     /**
      * M�todo para recuperar o tamanho da equipe que se adequa o processo.
      *
      * @return retorna tamanho da equipe do processo
      */
    public function getTeamSize()
    {
        return $this->_teamSize ;
    }

     /**
      * M�todo para setar o tamanho da equipe que se adequa o processo.
      *
      * @param $teamSize
      */
    public function setTeamSize($teamSize)
    {
        $this->_teamSize = $teamSize ;
    }

     /**
      * M�todo para recuperar o conhecimento requerido para o processo.
      *
      * @return retorna conhecimento requerido do processo
      */
    public function getRequiredKnowledge()
    {
        return $this->_requiredKnowledge ;
    }

     /**
      * M�todo para setar o conhecimento requerido para o processo.
      *
      * @param $requiredKnowledge
      */
    public function setRequiredKnowledge($requiredKnowledge)
    {
        $this->_requiredKnowledge = $requiredKnowledge ;
    }

     /**
      * M�todo para recuperar a localiza��o do time para o processo.
      *
      * @return retorna localiza��o do time do processo
      */
    public function getTeamLocation()
    {
        return $this->_teamLocation ;
    }

     /**
      * M�todo para setar a localiza��o do time para o processo.
      *
      * @param $teamLocation
      */
    public function setTeamLocation($teamLocation)
    {
        $this->_teamLocation = $teamLocation ;
    }

     /**
      * M�todo para recuperar palavra chave do processo.
      *
      * @return retorna palavra chave do processo
      */
    public function getKeyWords()
    {
        return $this->_keyWords ;
    }

     /**
      * M�todo para setar palavra chave do processo.
      *
      * @param $keyWords
      */
    public function setKeyWords($keyWords)
    {
        $this->_keyWords = $keyWords ;
    }

     /**
      * M�todo para recuperar pre condi��o do processo.
      *
      * @return retorna pre condi��o do processo
      */
    public function getPreCondition()
    {
        return $this->_preCondition ;
    }

     /**
      * M�todo para setar pre condi��o do processo.
      *
      * @param $preCondition
      */
    public function setPreCondition($preCondition)
    {
        $this->_preCondition = $preCondition ;
    }

     /**
      * M�todo para recuperar pos condi��o do processo.
      *
      * @return retorna pos condi��o do processo
      */
    public function getPosCondition()
    {
        return $this->_posCondition ;
    }

     /**
      * M�todo para setar pos condi��o do processo.
      *
      * @param $posCondition
      */
    public function setPosCondition($posCondition)
    {
        $this->_posCondition = $posCondition ;
    }

     /**
      * M�todo para recuperar atividades macro do processo.
      *
      * @return retorna lista de atividades macro do processo
      */   
    public function getMacroActivities()
    {
        return DAOProcess::getProcessMacroActivities($this->_processId) ;
    }

     /**
      * M�todo para dar o nome da representa��o das atividades macro p/ ser salvo.
      *
      * @return retorna o nome da representa��o das atividades macro
      */
    public static function getMacroRepresentationRerence($processId)
    {
        return "process_".$processId."_macro" ;
    }

     /**
      * M�todo para dar o nome da representa��o das atividades detalhadas p/ ser salvo.
      *
      * @return retorna o nome da representa��o das atividades detalhadas
      */
    public static function getDetailedRepresentationRerence($processId)
    {
        return "process_".$processId."_detailed" ;
    }

     /**
      * M�todo para tranformar para string os atributos do processo.
      *
      * @return retorna o texto com os atributos do processo
      */
    public function __toString()
    {
        return "Process: {processId:".$this->_processId.", name:".$this->_name.", userId:".$this->_userId.", author:".$this->_author."}" ;
    }
}

?>