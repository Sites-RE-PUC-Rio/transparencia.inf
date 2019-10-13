<!--
    Ação para criar o processo que foi reutilizado
-->v
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Process.php" ;
    require_once "models/MacroActivity.php" ;
    require_once "models/DetailedActivity.php" ;
    require_once "models/User.php" ;
    require_once "models/Utils.php" ;

    session_start() ;
    $user = $_SESSION["user"] ;
    $userId = $user->getUserId() ;

    $currentProcessId = $_REQUEST["currentProcessId"] ;
    $parentProcessId = $_REQUEST["parentProcessId"] ;

    $parentProcess = DAOProcess::getProcess($parentProcessId) ;
    $macroActivities = $parentProcess->getMacroActivities() ;
    if (NULL != $macroActivities)
    {
        $keysMacro = array_keys($macroActivities) ;
        for ($inxMacro = 0; $inxMacro < count($keysMacro); $inxMacro++)
        {
            $aKeyMacro = $keysMacro[$inxMacro] ;
            $aMacroActivity = $macroActivities[$aKeyMacro] ;

            $m_reusedFrom = $aMacroActivity->getMacroActivityId() ;
            $m_action = $aMacroActivity->getAction() ;
            $m_object = $aMacroActivity->getObject() ;
            $m_action_synonymous = $aMacroActivity->getActionSynonymous() ;
            $m_object_synonymous = $aMacroActivity->getObjectSynonymous() ;
            $m_description = $aMacroActivity->getDescription() ;
            $m_preCondition = $aMacroActivity->getPreCondition() ;
            $m_posCondition = $aMacroActivity->getPosCondition() ;
            $m_restriction = $aMacroActivity->getRestriction() ;

            $macroActivityId = DAOProcess::reuseUsualMacroActivity($userId, $currentProcessId, $m_action, $m_object, $m_action_synonymous, $m_object_synonymous, $m_description, $m_preCondition, $m_posCondition, $m_restriction, $m_reusedFrom) ;

            $detailedActivities = $aMacroActivity->getDetailedActivities() ;
            if (NULL != $detailedActivities)
            {
                $keysDetailed = array_keys($detailedActivities) ;
                for ($inxDetailed = 0; $inxDetailed < count($keysDetailed); $inxDetailed++)
                {
                    $aKeyDetailed = $keysDetailed[$inxDetailed] ;
                    $aDetailedActivity = $detailedActivities[$aKeyDetailed] ;

                    $d_reusedFrom = $aDetailedActivity->getDetailedActivityId() ;
                    $d_action = $aDetailedActivity->getAction() ;
                    $d_object = $aDetailedActivity->getObject() ;
                    $d_action_synonymous = $aDetailedActivity->getActionSynonymous() ;
                    $d_object_synonymous = $aDetailedActivity->getObjectSynonymous() ;
                    $d_description = $aDetailedActivity->getDescription() ;
                    $d_preCondition = $aDetailedActivity->getPreCondition() ;
                    $d_posCondition = $aDetailedActivity->getPosCondition() ;
                    $d_restriction = $aDetailedActivity->getRestriction() ;

                    DAOProcess::reuseUsualDetailedActivity($userId, $macroActivityId, $d_action, $d_object, $d_action_synonymous, $d_object_synonymous, $d_description, $d_preCondition, $d_posCondition, $d_restriction, $d_reusedFrom) ;
                }
            }
        }
    }

    header("Location: process_activities_set.php?processId=".$currentProcessId) ;
?>