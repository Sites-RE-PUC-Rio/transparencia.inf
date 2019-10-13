<!--
    Ação que cria a associação das atividades detalhadas do framework c/ atividades detalhadas usuais
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $frameworkDetailedActivityId = $_REQUEST["detailedActivityId"] ;
    $mode = Utils::getValue($_REQUEST, "mode") ;

    if ($mode == "update")
    {
         DAOProcess::deleteFrameworkDetailedActivityReferences($frameworkDetailedActivityId) ;
    }

    $similarDetailedActivities = $_REQUEST["similarDetailedActivities"] ;
    while (list($inx,$usualDetailedActivityId) = each($similarDetailedActivities))
    {
        $similarity = $_REQUEST["similarity_".$usualDetailedActivityId] ;
        DAOProcess::associateUsualToFrameworkDetailedActivity($frameworkDetailedActivityId, $usualDetailedActivityId, $similarity) ;
    }

    $processId = $_REQUEST["processId"] ;
    header("Location: process_activities_set.php?processId=".$processId) ;
?>