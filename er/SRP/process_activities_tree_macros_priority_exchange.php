<!--
    Ação que altera a ordem de prioridade na arvore do processo da atividade macro
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $macroActivityId1 = Utils::getValue($_REQUEST, "macroActivityId1") ;
    $priority1 = Utils::getValue($_REQUEST, "priority1") ;
    $macroActivityId2 = Utils::getValue($_REQUEST, "macroActivityId2") ;
    $priority2 = Utils::getValue($_REQUEST, "priority2") ;

    DAOProcess::exchangeProcessMacroActivitiesPriority($macroActivityId1, $priority1, $macroActivityId2, $priority2) ;

    header("Location: process_activities_tree_set.php?processId=".$processId) ;
?>