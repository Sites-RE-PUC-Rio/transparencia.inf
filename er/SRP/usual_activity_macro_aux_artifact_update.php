<!--
    Ação que associa e/ou desassocia um artefato(tabelas auxilares)a uma atividade macro
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $macroActivityId = Utils::getValue($_REQUEST, "macroActivityId") ;
    $artifactId = Utils::getValue($_REQUEST, "artifactId") ;
    $type = Utils::getValue($_REQUEST, "type") ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ("associate" == $mode)
    {
        DAOProcess::associateArtifactToMacroActivity($processId, $macroActivityId, $artifactId, $type) ;
    }
    else if ("dissociate" == $mode)
    {
        DAOProcess::dissociateArtifactFromMacroActivity($processId, $macroActivityId, $artifactId, $type) ;
    }

    header("Location: usual_activity_macro_aux_artifact_set.php?processId=".$processId."&macroActivityId=".$macroActivityId) ;
?>