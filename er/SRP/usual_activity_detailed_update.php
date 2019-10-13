<!--
    Ação que altera a atividade detalhada usual
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/UsualDetailedActivity.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $detailedActivityId = Utils::getValue($_REQUEST, "detailedActivityId") ;
    $detailedActivity = DAOProcess::getDetailedActivity($detailedActivityId) ;

    $detailedActivity->setAction(Utils::getValue($_REQUEST, "action")) ;
    $detailedActivity->setObject(Utils::getValue($_REQUEST, "object")) ;
    $detailedActivity->setActionSynonymous(Utils::string2Array(Utils::getValue($_REQUEST, "action_synonymous"))) ;
    $detailedActivity->setObjectSynonymous(Utils::string2Array(Utils::getValue($_REQUEST, "object_synonymous"))) ;
    $detailedActivity->setDescription( Utils::getValue($_REQUEST, "description")) ;
    $detailedActivity->setPreCondition(Utils::getValue($_REQUEST, "preCondition")) ;
    $detailedActivity->setPosCondition(Utils::getValue($_REQUEST, "posCondition")) ;
    $detailedActivity->setRestriction(Utils::getValue($_REQUEST, "restriction")) ;

    DAOProcess::updateUsualDetailedActivity($detailedActivity) ;

    header("Location: usual_activity_detailed_aux_tables.php?processId=".$processId."&detailedActivityId=".$detailedActivityId) ;
?>