<!--
    Ação que deleta um processo
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;

    $processId = $_REQUEST["processId"] ;
    DAOProcess::deleteProcess($processId) ;

    header("Location: process_list.php") ;
?>