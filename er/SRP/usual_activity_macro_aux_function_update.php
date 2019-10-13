<!--
    Ação que associa e/ou desassocia uma função(tabelas auxilares)a uma atividade macro
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $macroActivityId = Utils::getValue($_REQUEST, "macroActivityId") ;
    $functionId = Utils::getValue($_REQUEST, "functionId") ;
    $type = Utils::getValue($_REQUEST, "type") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateFunctionToMacroActivity($processId, $macroActivityId, $functionId, $type) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateFunctionFromMacroActivity($processId, $macroActivityId, $functionId, $type) ;
    }

    header("Location: usual_activity_macro_aux_function_set.php?processId=".$processId."&macroActivityId=".$macroActivityId) ;
?>