<!--
    Ação que associa e/ou desassocia um treinamento(tabelas auxilares)a um processo
-->

<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $trainingId = Utils::getValue($_REQUEST, "trainingId") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateTrainingToProcess($processId, $trainingId) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateTrainingFromProcess($processId, $trainingId) ;
    }

    header("Location: process_aux_training_set.php?processId=".$processId) ;
?>