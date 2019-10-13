<!--
    Ação que associa e/ou desassocia um artefato(tabelas auxilares)a uma atividade detalhada
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $detailedActivityId = Utils::getValue($_REQUEST, "detailedActivityId") ;
    $artifactId = Utils::getValue($_REQUEST, "artifactId") ;
    $type = Utils::getValue($_REQUEST, "type") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateArtifactToDetailedActivity($processId, $detailedActivityId, $artifactId, $type) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateArtifactFromDetailedActivity($processId, $detailedActivityId, $artifactId, $type) ;
    }

    header("Location: usual_activity_detailed_aux_artifact_set.php?processId=".$processId."&detailedActivityId=".$detailedActivityId) ;
