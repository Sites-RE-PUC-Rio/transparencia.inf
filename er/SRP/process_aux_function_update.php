<!--
    Ação que associa e/ou desassocia uma função(tabelas auxilares)a um processo
-->

<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $functionId = Utils::getValue($_REQUEST, "functionId") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateFunctionToProcess($processId, $functionId) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateFunctionFromProcess($processId, $functionId) ;
    }

    header("Location: process_aux_function_set.php?processId=".$processId) ;
?>