<!--
    Ação que associa e/ou desassocia um artefato(tabelas auxilares)a um processo
-->

<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $artifactId = Utils::getValue($_REQUEST, "artifactId") ;
    $type = Utils::getValue($_REQUEST, "type") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateArtifactToProcess($processId, $artifactId, $type) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateArtifactFromProcess($processId, $artifactId, $type) ;
    }

    header("Location: process_aux_artifact_set.php?processId=".$processId) ;
?>