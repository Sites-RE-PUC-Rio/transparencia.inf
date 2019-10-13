<!--
    Ação que cria o processo p/ framework
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/User.php" ;
    require_once "models/Utils.php" ;

    session_start() ;
    $user = $_SESSION["user"] ;
    $userId = $user->getUserId() ;

    $name =  Utils::getValue($_REQUEST, "name") ;
    $author = $_REQUEST["author"] ;
    $objective = $_REQUEST["objective"] ;
    $description =  Utils::getValue($_REQUEST, "description") ;
    $classification = $_REQUEST["classification"] ;
    $nature =  Utils::getValue($_REQUEST, "nature") ;
    $conformity = $_REQUEST["conformity"] ;
    $area = $_REQUEST["area"] ;
    $lifeCicle = $_REQUEST["lifeCicle"] ;
    $systemType =  Utils::getValue($_REQUEST, "systemType") ;
    $organizationSize = $_REQUEST["organizationSize"] ;
    $projectDuration = $_REQUEST["projectDuration"] ;
    $teamSize = $_REQUEST["teamSize"] ;
    $requiredKnowledge = $_REQUEST["requiredKnowledge"] ;
    $teamLocation =  Utils::getValue($_REQUEST, "teamLocation") ;
    $keyWords = $_REQUEST["keyWords"] ;
    $preCondition = $_REQUEST["preCondition"] ;
    $posCondition =  Utils::getValue($_REQUEST, "posCondition") ;

    $processId = DAOProcess::createProcess($userId, $name, $author, $objective, $description, $classification, $nature, $conformity, $area, $lifeCicle, $systemType, $organizationSize, $projectDuration, $teamSize, $requiredKnowledge, $teamLocation, $keyWords, $preCondition, $posCondition) ;

    header("Location: process_aux_tables.php?processId=".$processId) ;
?>