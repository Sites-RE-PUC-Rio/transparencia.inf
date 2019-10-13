<!--
    Ação que associa e/ou desassocia um conceito(tabelas auxilares)a um processo
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $conceptId = Utils::getValue($_REQUEST, "conceptId") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateConceptToProcess($processId, $conceptId) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateConceptFromProcess($processId, $conceptId) ;
    }

    header("Location: process_aux_concept_set.php?processId=".$processId) ;
?>