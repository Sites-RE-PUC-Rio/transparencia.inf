<!--
    Ação que associa e/ou desassocia uma verificação(tabelas auxilares)a um processo
-->

<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $verificationId = Utils::getValue($_REQUEST, "verificationId") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateVerificationToProcess($processId, $verificationId) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateVerificationFromProcess($processId, $verificationId) ;
    }

    header("Location: process_aux_verification_set.php?processId=".$processId) ;
?>