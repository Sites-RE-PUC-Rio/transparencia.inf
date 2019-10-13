<!--
    Ação que associa e/ou desassocia uma politica(tabelas auxilares)a um processo
-->

<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $politicsId = Utils::getValue($_REQUEST, "politicsId") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associatePoliticsToProcess($processId, $politicsId) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociatePoliticsFromProcess($processId, $politicsId) ;
    }

    header("Location: process_aux_politics_set.php?processId=".$processId) ;
?>