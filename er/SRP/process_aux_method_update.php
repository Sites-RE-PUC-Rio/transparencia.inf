<!--
    Ação que associa e/ou desassocia um metodo(tabelas auxilares)a um processo
-->

<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $methodId = Utils::getValue($_REQUEST, "methodId") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateMethodToProcess($processId, $methodId) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateMethodFromProcess($processId, $methodId) ;
    }

    header("Location: process_aux_method_set.php?processId=".$processId) ;
?>