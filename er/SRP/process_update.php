<!--
    Ação que altera o processo
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Process.php" ;
    require_once "models/User.php" ;
    require_once "models/Utils.php" ;

    $processId = $_REQUEST["processId"] ;
    $process = DAOProcess::getProcess($processId) ;

    $process->setName(Utils::getValue($_REQUEST, "name")) ;
    $process->setAuthor($_REQUEST["author"]) ;
    $process->setObjective($_REQUEST["objective"]) ;
    $process->setDescription( Utils::getValue($_REQUEST, "description")) ;
    $process->setClassification($_REQUEST["classification"]) ;
    $process->setNature( Utils::getValue($_REQUEST, "nature") ) ;
    $process->setConformity($_REQUEST["conformity"]) ;
    $process->setArea($_REQUEST["area"]) ;
    $process->setLifeCicle($_REQUEST["lifeCicle"]) ;
    $process->setSystemType( Utils::getValue($_REQUEST, "systemType")) ;
    $process->setOrganizationSize($_REQUEST["organizationSize"]) ;
    $process->setProjectDuration($_REQUEST["projectDuration"]) ;
    $process->setTeamSize($_REQUEST["teamSize"]) ;
    $process->setRequiredKnowledge($_REQUEST["requiredKnowledge"]) ;
    $process->setTeamLocation( Utils::getValue($_REQUEST, "teamLocation")) ;
    $process->setKeyWords($_REQUEST["keyWords"]) ;
    $process->setPreCondition($_REQUEST["preCondition"]) ;
    $process->setPosCondition(Utils::getValue($_REQUEST, "posCondition")) ;

    DAOProcess::updateProcess($process) ;

    $nature = Utils::getValue($_REQUEST, "nature") ;
    if (Process::$NATURE["Usual"] == $nature || Process::$NATURE["Projeto"] == $nature)
    {
        header("Location: process_representation_macro_set.php?mode=update&processId=".$processId) ;
    }
    else if (Process::$NATURE["Framework"] == $nature)
    {
        header("Location: process_aux_tables.php?processId=".$processId) ;
    }
?>