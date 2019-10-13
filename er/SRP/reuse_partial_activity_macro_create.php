<!--
    Ação de selecionar as atividades macro que irao ser reutilizadas dos processos
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/UsualMacroActivity.php" ;
    require_once "models/UsualDetailedActivity.php" ;
    require_once "models/User.php" ;
    require_once "models/Utils.php" ;

    session_start() ;
    $user = $_SESSION["user"] ;
    $userId = $user->getUserId() ;

    $currentProcessId = $_REQUEST["processId"] ;
    $macroActivityId = $_REQUEST["macroActivityId"] ;
    $macroActivity = DAOProcess::getMacroActivity($macroActivityId) ;

    $reusedMacroActivity = DAOProcess::getReusedMacroActivity($currentProcessId, $macroActivityId) ;
    if (NULL == $reusedMacroActivity)
    {
        $m_reusedFrom = $macroActivity->getMacroActivityId() ;
        $m_action = $macroActivity->getAction() ;
        $m_object = $macroActivity->getObject() ;
        $m_action_synonymous = $macroActivity->getActionSynonymous() ;
        $m_object_synonymous = $macroActivity->getObjectSynonymous() ;
        $m_description = $macroActivity->getDescription() ;
        $m_preCondition = $macroActivity->getPreCondition() ;
        $m_posCondition = $macroActivity->getPosCondition() ;
        $m_restriction = $macroActivity->getRestriction() ;

        $reusedMacroActivityId = DAOProcess::reuseUsualMacroActivity($userId, $currentProcessId, $m_action, $m_object, $m_action_synonymous, $m_object_synonymous, $m_description, $m_preCondition, $m_posCondition, $m_restriction, $m_reusedFrom) ;
    }
    else
    {
        $reusedMacroActivityId = $reusedMacroActivity->getMacroActivityId() ;
    }

    $detailedActivities = $macroActivity->getDetailedActivities() ;
    if (NULL != $detailedActivities)
    {
        $keysDetailed = array_keys($detailedActivities) ;
        for ($inxDetailed = 0; $inxDetailed < count($keysDetailed); $inxDetailed++)
        {
            $reuse = true ;

            $aKeyDetailed = $keysDetailed[$inxDetailed] ;
            $aDetailedActivity = $detailedActivities[$aKeyDetailed] ;

            // Checa se essa atividade detalhada já não foi reutilizada p/ não reutiliza-la mais de uma vez.
            $reuse = NULL == DAOProcess::getReusedDetailedActivity($reusedMacroActivityId, $aDetailedActivity->getDetailedActivityId()) ;

            if ($reuse)
            {
                $d_reusedFrom = $aDetailedActivity->getDetailedActivityId() ;
                $d_action = $aDetailedActivity->getAction() ;
                $d_object = $aDetailedActivity->getObject() ;
                $d_action_synonymous = $aDetailedActivity->getActionSynonymous() ;
                $d_object_synonymous = $aDetailedActivity->getObjectSynonymous() ;
                $d_description = $aDetailedActivity->getDescription() ;
                $d_preCondition = $aDetailedActivity->getPreCondition() ;
                $d_posCondition = $aDetailedActivity->getPosCondition() ;
                $d_restriction = $aDetailedActivity->getRestriction() ;

                DAOProcess::reuseUsualDetailedActivity($userId, $reusedMacroActivityId, $d_action, $d_object, $d_action_synonymous, $d_object_synonymous, $d_description, $d_preCondition, $d_posCondition, $d_restriction, $d_reusedFrom) ;
            }
        }
    }

    header("Location: process_activities_tree_set.php?processId=".$currentProcessId) ;
?>