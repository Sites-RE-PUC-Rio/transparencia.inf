<!--
    Ação que associa e/ou desassocia e uma medição(tabelas auxilares)a um processo
-->

<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $measurementId = Utils::getValue($_REQUEST, "measurementId") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateMeasurementToProcess($processId, $measurementId) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateMeasurementFromProcess($processId, $measurementId) ;
    }

    header("Location: process_aux_measurement_set.php?processId=".$processId) ;
?>