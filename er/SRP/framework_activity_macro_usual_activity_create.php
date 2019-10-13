<!--
    Ação que cria a associação das atividades macro do framework c/ atividades macro usuais
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $frameworkMacroActivityId = $_REQUEST["macroActivityId"] ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ($mode == "update")
    {
         DAOProcess::deleteFrameworkMacroActivityReferences($frameworkMacroActivityId) ;
    }

    $similarMacroActivities = $_REQUEST["similarMacroActivities"] ;
    while (list($inx,$usualMacroActivityId) = each($similarMacroActivities))
    {
        $similarity = $_REQUEST["similarity_".$usualMacroActivityId] ;
        DAOProcess::associateUsualToFrameworkMacroActivity($frameworkMacroActivityId, $usualMacroActivityId, $similarity) ;
    }

    $processId = $_REQUEST["processId"] ;
    header("Location: process_activities_set.php?processId=".$processId) ;
?>
