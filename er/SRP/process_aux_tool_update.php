<!--
    Ação que associa e/ou desassocia uma ferramenta(tabelas auxilares)a um processo
-->

<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $toolId = Utils::getValue($_REQUEST, "toolId") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateToolToProcess($processId, $toolId) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateToolFromProcess($processId, $toolId) ;
    }

    header("Location: process_aux_tool_set.php?processId=".$processId) ;
?>