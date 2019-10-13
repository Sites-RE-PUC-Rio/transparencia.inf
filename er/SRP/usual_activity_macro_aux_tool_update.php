<!--
    Ação que associa e/ou desassocia uma ferramenta(tabelas auxilares)a uma atividade macro
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $macroActivityId = Utils::getValue($_REQUEST, "macroActivityId") ;
    $toolId = Utils::getValue($_REQUEST, "toolId") ;
    $type = Utils::getValue($_REQUEST, "type") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateToolToMacroActivity($processId, $macroActivityId, $toolId, $type) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateToolFromMacroActivity($processId, $macroActivityId, $toolId, $type) ;
    }

    header("Location: usual_activity_macro_aux_tool_set.php?processId=".$processId."&macroActivityId=".$macroActivityId) ;
?>