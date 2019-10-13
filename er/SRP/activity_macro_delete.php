<!--
    Ação que deleta a atividade macro
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;

    $processId = $_REQUEST["processId"] ;
    $macroActivityId = $_REQUEST["macroActivityId"] ;

    DAOProcess::deleteMacroActivity($macroActivityId) ;

    header("Location: process_activities_tree_set.php?processId=".$processId) ;
?>