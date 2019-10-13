<!--
    Ação que cria uma atividade macro usual
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/User.php" ;
    require_once "models/Utils.php" ;

    session_start() ;
    $user = $_SESSION["user"] ;
    $userId = $user->getUserId() ;

    $processId = Utils::getValue($_REQUEST, "processId") ;

    $action = Utils::getValue($_REQUEST, "action") ;
    $object = Utils::getValue($_REQUEST, "object") ;
    $action_synonymous = Utils::getValue($_REQUEST, "action_synonymous") ;
    $object_synonymous = Utils::getValue($_REQUEST, "object_synonymous") ;
    $description =  Utils::getValue($_REQUEST, "description") ;
    $preCondition = Utils::getValue($_REQUEST, "preCondition") ;
    $posCondition = Utils::getValue($_REQUEST, "posCondition") ;
    $restriction = Utils::getValue($_REQUEST, "restriction") ;

    $macroActivityId = DAOProcess::createUsualMacroActivity($userId, $processId, $action, $object, Utils::string2Array($action_synonymous), Utils::string2Array($object_synonymous), $description, $preCondition, $posCondition, $restriction) ;

    header("Location: usual_activity_macro_aux_tables.php?processId=".$processId."&macroActivityId=".$macroActivityId) ;
?>