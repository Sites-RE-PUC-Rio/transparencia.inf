<!--
    Ação de selecionar as atividades detalhadas que irao ser reutilizadas dos processos
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/UsualMacroActivity.php" ;
    require_once "models/UsualDetailedActivity.php" ;
    require_once "models/User.php" ;
    require_once "models/Utils.php" ;

    $reuse = true ;

    session_start() ;
    $user = $_SESSION["user"] ;
    $userId = $user->getUserId() ;

    $currentProcessId = $_REQUEST["processId"] ;
    $detailedActivityId = $_REQUEST["detailedActivityId"] ;
    $detailedActivity = DAOProcess::getDetailedActivity($detailedActivityId) ;

    $reusedMacroActivity = DAOProcess::getReusedMacroActivity($currentProcessId, $detailedActivity->getMacroActivityId()) ;
    // Checa se essa atividade macro já não foi reutilizada p/ não reutiliza-la mais de uma vez.
    // Caso já tenha sido, pegamos a reutilizada e adicionmos as detalhadas que faltam. 
    if (NULL == $reusedMacroActivity)
     {
        $macroActivity = DAOProcess::getMacroActivity($detailedActivity->getMacroActivityId()) ;

        $m_reusedFrom = $macroActivity->getMacroActivityId() ;
        $m_action = $macroActivity->getAction() ;
        $m_object = $macroActivity->getObject() ;
        $m_action_synonymous = $macroActivity->getActionSynonymous() ;
        $m_object_synonymous = $macroActivity->getObjectSynonymous() ;
        $m_description = $macroActivity->getDescription() ;
        $m_preCondition = $macroActivity->getPreCondition() ;
        $m_posCondition = $macroActivity->getPosCondition() ;
        $m_restriction = $macroActivity->getRestriction() ;

        $macroActivityId = DAOProcess::reuseUsualMacroActivity($userId, $currentProcessId, $m_action, $m_object, $m_action_synonymous, $m_object_synonymous, $m_description, $m_preCondition, $m_posCondition, $m_restriction, $m_reusedFrom) ;
    }
    else
    {
        $macroActivityId = $reusedMacroActivity->getMacroActivityId() ;
        // Checa se essa atividade detalhada já não foi reutilizada p/ não reutiliza-la mais de uma vez.
        $reuse = NULL == DAOProcess::getReusedDetailedActivity($macroActivityId, $detailedActivityId) ;
    }

    if($reuse)
    {
        $d_reusedFrom = $detailedActivity->getDetailedActivityId() ;
        $d_action = $detailedActivity->getAction() ;
        $d_object = $detailedActivity->getObject() ;
        $d_action_synonymous = $detailedActivity->getActionSynonymous() ;
        $d_object_synonymous = $detailedActivity->getObjectSynonymous() ;
        $d_description = $detailedActivity->getDescription() ;
        $d_preCondition = $detailedActivity->getPreCondition() ;
        $d_posCondition = $detailedActivity->getPosCondition() ;
        $d_restriction = $detailedActivity->getRestriction() ;

        DAOProcess::reuseUsualDetailedActivity($userId, $macroActivityId, $d_action, $d_object, $d_action_synonymous, $d_object_synonymous, $d_description, $d_preCondition, $d_posCondition, $d_restriction, $d_reusedFrom) ;
    }

    header("Location: process_activities_tree_set.php?processId=".$currentProcessId) ;
?>