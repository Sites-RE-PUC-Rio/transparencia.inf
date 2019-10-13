<!--
    Ação que altera a atividade detalhada de framework
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/FrameworkDetailedActivity.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $detailedActivityId = Utils::getValue($_REQUEST, "detailedActivityId") ;
    $detailedActivity = DAOProcess::getDetailedActivity($detailedActivityId) ;

    $detailedActivity->setAction(Utils::getValue($_REQUEST, "action")) ;
    $detailedActivity->setObject(Utils::getValue($_REQUEST, "object")) ;
    $detailedActivity->setActionSynonymous(Utils::string2Array(Utils::getValue($_REQUEST, "action_synonymous"))) ;
    $detailedActivity->setObjectSynonymous(Utils::string2Array(Utils::getValue($_REQUEST, "object_synonymous"))) ;
    $detailedActivity->setDescription(Utils::getValue($_REQUEST, "description")) ;
    $detailedActivity->setType( Utils::getValue($_REQUEST, "type")) ;
    $detailedActivity->setCaracteristics(Utils::getValue($_REQUEST, "caracteristics")) ;

    DAOProcess::updateFrameworkDetailedActivity($detailedActivity) ;

    header("Location: framework_activity_detailed_search.php?mode=update&processId=".$processId."&detailedActivityId=".$detailedActivityId) ;
?>