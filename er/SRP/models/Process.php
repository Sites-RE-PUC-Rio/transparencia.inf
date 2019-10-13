
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
    public static $AREA = array( "Engenharia de Requesitos"=>"requirementsEngineering", "Design"=>"design", "Construção"=>"construction", "Teste"=>"test", "Implantação"=>"implantation", "Genérico"=>"generic" );
    public static $LIFE_CICLE = array( "Cascata"=>"waterfall", "Prototipação"=>"prototype", "Espiral"=>"spiral" );
    public static $SYSTEM_TYPE = array( "Web"=>"web", "OO"=>"oo", "BI"=>"bi", "Transacional"=>"transactional", "Misto"=>"hybrid" );
    public static $ORGANIZATION_SIZE = array( "Pequena"=>"small", "Média"=>"average", "Grande"=>"big", "Independente"=>"independent" );
    public static $PROJECT_DURATION = array( "1-60h"=>"1-60h", "61-120h"=>"61-120h", "121-180h"=>"121-180h", "181-260h"=>"181-260h", "261-350h"=>"261-350h", "Acima de 350h"=>"above 350h" );
    public static $TEAM_SIZE = array( "Pequena"=>"small", "Média"=>"average", "Grande"=>"big", "Independente"=>"independent" );
    public static $REQUIRED_KNOWLEDGE = array( "Baixo"=>"low", "Médio"=>"average", "Alto"=>"high", "Especialista"=>"specialist" );
    public static $TEAM_LOCATION = array( "Local"=>"local", "Distribuída"=>"distributed", "Independente"=>"independent" );

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
      * Método para recuperar o identificador do processo.
      *
      * @return retorna identificador do processo
      */
    public function getProcessId()
    {
        return $this->_processId ;
    }

     /**
      * Método para recuperar o nome do processo.
      *
      * @return retorna nome do processo
      */
    public function getName()
    {
        return $this->_name ;
    }
     /**
      * Método para setar o nome do processo.
      *
      * @param $name
      */
    public function setName($name)
    {
        $this->_name = $name ;
    }

     /**
      * Método para recuperar o usuário que criou o processo.
      *
      * @return retorna o usuário
      */
    public function getUserId()
    {
        return $this->_userId ;
    }

     /**
      * Método para recuperar o autor do processo.
      *
      * @return retorna autor do processo
      */
    public function getAuthor()
    {
        return $this->_author ;
    }

     /**
      * Método para setar o autor do processo.
      *
      * @param $author
      */
    public function setAuthor($author)
    {
        $this->_author = $author ;
    }

     /**
      * Método para recuperar o objetivo do processo.
      *
      * @return retorna o objetivo do processo
      */
    public function getObjective()
    {
        return $this->_objective ;
    }

     /**
      * Método para setar o objetivo do processo.
      *
      * @param $objective
      */
    public function setObjective($objective)
    {
        $this->_objective = $objective ;
    }

     /**
      * Método para recuperar a descrição do processo.
      *
      * @return retorna a descrição do processo
      */
    public function getDescription()
    {
        return $this->_description ;
    }

     /**
      * Método para setar a descrição do processo.
      *
      * @param $description
      */
    public function setDescription($description)
    {
        $this->_description = $description ;
    }

     /**
      * Método para recuperar a classificação do processo.
      *
      * @return retorna a classificação do processo
      */
    public function getClassification()
    {
        return $this->_classification ;
    }

     /**
      * Método para setar a classificação do processo.
      *
      * @param $classification
      */
    public function setClassification($classification)
    {
        $this->_classification = $classification ;
    }

     /**
      * Método para recuperar a natureza do processo.
      *
      * @return retorna a natureza do processo
      */
    public function getNature()
    {
        return $this->_nature ;
    }

     /**
      * Método para setar a natureza do processo.
      *
      * @param $nature
      */
    public function setNature($nature)
    {
        $this->_nature = $nature ;
    }

      /**
      * Método para recuperar a conformidade do processo.
      *
      * @return retorna a conformidade do processo
      */
    public function getConformity()
    {
        return $this->_conformity ;
    }

     /**
      * Método para setar a conformidade do processo.
      *
      * @param $conformity
      */
    public function setConformity($conformity)
    {
        $this->_conformity = $conformity ;
    }

     /**
      * Método para recuperar a area do processo.
      *
      * @return retorna a area do processo
      */
    public function getArea()
    {
        return $this->_area ;
    }

     /**
      * Método para setar a area do processo.
      *
      * @param $area
      */
    public function setArea($area)
    {
        $this->_area = $area ;
    }

     /**
      * Método para recuperar o ciclo de vida do processo.
      *
      * @return retorna o ciclo de vida do processo
      */
    public function getLifeCicle()
    {
        return $this->_lifeCicle ;
    }

     /**
      * Método para setar o ciclo de vida do processo.
      *
      * @param $lifeCicle
      */
    public function setLifeCicle($lifeCicle)
    {
        $this->_lifeCicle = $lifeCicle ;
    }

     /**
      * Método para recuperar o tipo de sistema do processo.
      *
      * @return retorna o tipo de sistema do processo
      */
    public function getSystemType()
    {
        return $this->_systemType ;
    }

     /**
      * Método para setar o tipo de sistema do processo.
      *
      * @param $systemType
      */
    public function setSystemType($systemType)
    {
        $this->_systemType = $systemType ;
    }

     /**
      * Método para recuperar o tamanho da organização que se adequa o processo.
      *
      * @return retorna tamanho da organização do processo
      */
    public function getOrganizationSize()
    {
        return $this->_organizationSize ;
    }

     /**
      * Método para setar o tamanho da organização que se adequa o processo.
      *
      * @param $organizationSize
      */
    public function setOrganizationSize($organizationSize)
    {
        $this->_organizationSize = $organizationSize ;
    }

     /**
      * Método para recuperar a duração do projeto que se adequa o processo.
      *
      * @return retorna duração do projeto do processo
      */
    public function getProjectDuration()
    {
        return $this->_projectDuration ;
    }

     /**
      * Método para setar a duração do projeto que se adequa o processo.
      *
      * @param $projectDuration
      */
    public function setProjectDuration($projectDuration)
    {
        $this->_projectDuration = $projectDuration ;
    }

     /**
      * Método para recuperar o tamanho da equipe que se adequa o processo.
      *
      * @return retorna tamanho da equipe do processo
      */
    public function getTeamSize()
    {
        return $this->_teamSize ;
    }

     /**
      * Método para setar o tamanho da equipe que se adequa o processo.
      *
      * @param $teamSize
      */
    public function setTeamSize($teamSize)
    {
        $this->_teamSize = $teamSize ;
    }

     /**
      * Método para recuperar o conhecimento requerido para o processo.
      *
      * @return retorna conhecimento requerido do processo
      */
    public function getRequiredKnowledge()
    {
        return $this->_requiredKnowledge ;
    }

     /**
      * Método para setar o conhecimento requerido para o processo.
      *
      * @param $requiredKnowledge
      */
    public function setRequiredKnowledge($requiredKnowledge)
    {
        $this->_requiredKnowledge = $requiredKnowledge ;
    }

     /**
      * Método para recuperar a localização do time para o processo.
      *
      * @return retorna localização do time do processo
      */
    public function getTeamLocation()
    {
        return $this->_teamLocation ;
    }

     /**
      * Método para setar a localização do time para o processo.
      *
      * @param $teamLocation
      */
    public function setTeamLocation($teamLocation)
    {
        $this->_teamLocation = $teamLocation ;
    }

     /**
      * Método para recuperar palavra chave do processo.
      *
      * @return retorna palavra chave do processo
      */
    public function getKeyWords()
    {
        return $this->_keyWords ;
    }

     /**
      * Método para setar palavra chave do processo.
      *
      * @param $keyWords
      */
    public function setKeyWords($keyWords)
    {
        $this->_keyWords = $keyWords ;
    }

     /**
      * Método para recuperar pre condição do processo.
      *
      * @return retorna pre condição do processo
      */
    public function getPreCondition()
    {
        return $this->_preCondition ;
    }

     /**
      * Método para setar pre condição do processo.
      *
      * @param $preCondition
      */
    public function setPreCondition($preCondition)
    {
        $this->_preCondition = $preCondition ;
    }

     /**
      * Método para recuperar pos condição do processo.
      *
      * @return retorna pos condição do processo
      */
    public function getPosCondition()
    {
        return $this->_posCondition ;
    }

     /**
      * Método para setar pos condição do processo.
      *
      * @param $posCondition
      */
    public function setPosCondition($posCondition)
    {
        $this->_posCondition = $posCondition ;
    }

     /**
      * Método para recuperar atividades macro do processo.
      *
      * @return retorna lista de atividades macro do processo
      */   
    public function getMacroActivities()
    {
        return DAOProcess::getProcessMacroActivities($this->_processId) ;
    }

     /**
      * Método para dar o nome da representação das atividades macro p/ ser salvo.
      *
      * @return retorna o nome da representação das atividades macro
      */
    public static function getMacroRepresentationRerence($processId)
    {
        return "process_".$processId."_macro" ;
    }

     /**
      * Método para dar o nome da representação das atividades detalhadas p/ ser salvo.
      *
      * @return retorna o nome da representação das atividades detalhadas
      */
    public static function getDetailedRepresentationRerence($processId)
    {
        return "process_".$processId."_detailed" ;
    }

     /**
      * Método para tranformar para string os atributos do processo.
      *
      * @return retorna o texto com os atributos do processo
      */
    public function __toString()
    {
        return "Process: {processId:".$this->_processId.", name:".$this->_name.", userId:".$this->_userId.", author:".$this->_author."}" ;
    }
}

?>