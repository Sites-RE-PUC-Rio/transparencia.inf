<!--
    Ação que deleta a atividade detalhada
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;

    echo $_REQUEST["processId"] ;
    $processId = $_REQUEST["processId"] ;
    $detailedActivityId = $_REQUEST["detailedActivityId"] ;

    DAOProcess::deleteDetailedActivity($detailedActivityId) ;

    header("Location: process_activities_tree_set.php?processId=".$processId) ;
?>