<!--
    Ação que associa e/ou desassocia uma função(tabelas auxilares)a uma atividade detalhada
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $detailedActivityId = Utils::getValue($_REQUEST, "detailedActivityId") ;
    $functionId = Utils::getValue($_REQUEST, "functionId") ;
    $type = Utils::getValue($_REQUEST, "type") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateFunctionToDetailedActivity($processId, $detailedActivityId, $functionId, $type) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateFunctionFromDetailedActivity($processId, $detailedActivityId, $functionId, $type) ;
    }

    header("Location: usual_activity_detailed_aux_function_set.php?processId=".$processId."&detailedActivityId=".$detailedActivityId) ;
?>