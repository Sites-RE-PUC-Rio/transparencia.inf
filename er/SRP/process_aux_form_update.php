<!--
    Ação que associa e/ou desassocia um formulario(tabelas auxilares)a um processo
-->

<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $formId = Utils::getValue($_REQUEST, "formId") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateFormToProcess($processId, $formId) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateFormFromProcess($processId, $formId) ;
    }

    header("Location: process_aux_form_set.php?processId=".$processId) ;
?>