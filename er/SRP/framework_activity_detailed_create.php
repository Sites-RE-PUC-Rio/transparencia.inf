<!--
    Ação que cria a atividade detalhada de framework
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/User.php" ;
    require_once "models/Utils.php" ;

    session_start() ;
    $user = $_SESSION["user"] ;
    $userId = $user->getUserId() ;

    $processId = Utils::getValue($_REQUEST, "processId") ;

    $macroActivityId = Utils::getValue($_REQUEST, "macroActivityId") ;
    $action = Utils::getValue($_REQUEST, "action") ;
    $object = Utils::getValue($_REQUEST, "object") ;
    $action_synonymous = Utils::getValue($_REQUEST, "action_synonymous") ;
    $object_synonymous = Utils::getValue($_REQUEST, "object_synonymous") ;
    $description =  Utils::getValue($_REQUEST, "description") ;
    $type =  Utils::getValue($_REQUEST, "type") ;
    $caracteristics = Utils::getValue($_REQUEST, "caracteristics") ;

    $detailedActivityId = DAOProcess::createFrameworkDetailedActivity($userId, $macroActivityId, $action, $object, Utils::string2Array($action_synonymous), Utils::string2Array($object_synonymous), $description, $type, $caracteristics) ;

    header("Location: framework_activity_detailed_search.php?mode=create&processId=".$processId."&detailedActivityId=".$detailedActivityId) ;
?>