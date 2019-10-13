<!--
    Ação que associa e/ou desassocia uma ferramenta(tabelas auxilares)a uma atividade detalhada
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $detailedActivityId = Utils::getValue($_REQUEST, "detailedActivityId") ;
    $toolId = Utils::getValue($_REQUEST, "toolId") ;
    $type = Utils::getValue($_REQUEST, "type") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateToolToDetailedActivity($processId, $detailedActivityId, $toolId, $type) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateToolFromDetailedActivity($processId, $detailedActivityId, $toolId, $type) ;
    }

    header("Location: usual_activity_detailed_aux_tool_set.php?processId=".$processId."&detailedActivityId=".$detailedActivityId) ;
?>