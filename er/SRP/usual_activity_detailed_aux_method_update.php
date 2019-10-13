<!--
    Ação que associa e/ou desassocia um metodo(tabelas auxilares)a uma atividade detalhada
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $detailedActivityId = Utils::getValue($_REQUEST, "detailedActivityId") ;
    $methodId = Utils::getValue($_REQUEST, "methodId") ;
    $type = Utils::getValue($_REQUEST, "type") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateMethodToDetailedActivity($processId, $detailedActivityId, $methodId, $type) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateMethodFromDetailedActivity($processId, $detailedActivityId, $methodId, $type) ;
    }

    header("Location: usual_activity_detailed_aux_method_set.php?processId=".$processId."&detailedActivityId=".$detailedActivityId) ;
?>