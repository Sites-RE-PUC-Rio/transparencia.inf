<!--
    Ação que altera a ordem de prioridade na arvore do processo da atividade detalhada
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $detailedActivityId1 = Utils::getValue($_REQUEST, "detailedActivityId1") ;
    $priority1 = Utils::getValue($_REQUEST, "priority1") ;
    $detailedActivityId2 = Utils::getValue($_REQUEST, "detailedActivityId2") ;
    $priority2 = Utils::getValue($_REQUEST, "priority2") ;

    DAOProcess::exchangeMacroDetailedActivitiesPriority($detailedActivityId1, $priority1, $detailedActivityId2, $priority2) ;

    header("Location: process_activities_tree_set.php?processId=".$processId) ;
?>