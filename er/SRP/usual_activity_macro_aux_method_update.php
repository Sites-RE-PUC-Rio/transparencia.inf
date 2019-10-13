<!--
    Ação que associa e/ou desassocia um metodo(tabelas auxilares)a uma atividade macro
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $macroActivityId = Utils::getValue($_REQUEST, "macroActivityId") ;
    $methodId = Utils::getValue($_REQUEST, "methodId") ;
    $type = Utils::getValue($_REQUEST, "type") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateMethodToMacroActivity($processId, $macroActivityId, $methodId, $type) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateMethodFromMacroActivity($processId, $macroActivityId, $methodId, $type) ;
    }

    header("Location: usual_activity_macro_aux_method_set.php?processId=".$processId."&macroActivityId=".$macroActivityId) ;
?>