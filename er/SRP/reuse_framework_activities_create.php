<!--
    Ação de selecionar as atividades que irao ser reutilizadas do framework
-->
<?php

    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/MacroActivity.php" ;
    require_once "models/UsualMacroActivity.php" ;
    require_once "models/FrameworkMacroActivity.php" ;
    require_once "models/DetailedActivity.php" ;
    require_once "models/UsualDetailedActivity.php" ;
    require_once "models/FrameworkDetailedActivity.php" ;
    require_once "models/User.php" ;
    require_once "models/Utils.php" ;

    session_start() ;
    $user = $_SESSION["user"] ;
    $userId = $user->getUserId() ;

    $currentProcessId = $_REQUEST["currentProcessId"] ;

    $frameworkProcessId = $_REQUEST["parentProcessId"] ;
    $frameworkProcess = DAOProcess::getProcess($frameworkProcessId) ;
    if (NULL != $frameworkProcess)
    {
        $macroActivities = $frameworkProcess->getMacroActivities() ;

        $keysMacro = array_keys($macroActivities) ;
        for ($inxMacro = 0; $inxMacro < count($keysMacro); $inxMacro++)
        {
            $aKeyMacro = $keysMacro[$inxMacro] ;
            $aMacroActivity = $macroActivities[$aKeyMacro] ;

            if (isset($_REQUEST["useFrameworkMacroActivity_".$aMacroActivity->getMacroActivityId()]) || FrameworkMacroActivity::$TYPE["Ponto Comum"] == $aMacroActivity->getType())
            {
                $usualMacroActivity = DAOProcess::getMacroActivity($_REQUEST["frameworkMacroActivity_".$aMacroActivity->getMacroActivityId()]) ;

                $m_reusedFrom = $usualMacroActivity->getMacroActivityId() ;
                $m_action = $usualMacroActivity->getAction() ;
                $m_object = $usualMacroActivity->getObject() ;
                $m_action_synonymous = $usualMacroActivity->getActionSynonymous() ;
                $m_object_synonymous = $usualMacroActivity->getObjectSynonymous() ;
                $m_description = $usualMacroActivity->getDescription() ;
                $m_preCondition = $usualMacroActivity->getPreCondition() ;
                $m_posCondition = $usualMacroActivity->getPosCondition() ;
                $m_restriction = $usualMacroActivity->getRestriction() ;

                $reusedMacroActivityId = DAOProcess::reuseUsualMacroActivity($userId, $currentProcessId, $m_action, $m_object, $m_action_synonymous, $m_object_synonymous, $m_description, $m_preCondition, $m_posCondition, $m_restriction, $m_reusedFrom) ;

                $detailedActivities = $aMacroActivity->getDetailedActivities() ;
                if (NULL != $detailedActivities)
                {
                    $keysDetailed = array_keys($detailedActivities) ;
                    for ($inxDetailed = 0; $inxDetailed < count($keysDetailed); $inxDetailed++)
                    {
                        $aKeyDetailed = $keysDetailed[$inxDetailed] ;
                        $aDetailedActivity = $detailedActivities[$aKeyDetailed] ;

                        if (isset($_REQUEST["useFrameworkDetailedActivity_".$aDetailedActivity->getDetailedActivityId()]) || FrameworkDetailedActivity::$TYPE["Ponto Comum"] == $aDetailedActivity->getType())
                        {
                            $usualDetailedActivity = DAOProcess::getDetailedActivity($_REQUEST["frameworkDetailedActivity_".$aDetailedActivity->getDetailedActivityId()]) ;

                            $d_reusedFrom = $usualDetailedActivity->getDetailedActivityId() ;
                            $d_action = $usualDetailedActivity->getAction() ;
                            $d_object = $usualDetailedActivity->getObject() ;
                            $d_action_synonymous = $usualDetailedActivity->getActionSynonymous() ;
                            $d_object_synonymous = $usualDetailedActivity->getObjectSynonymous() ;
                            $d_description = $usualDetailedActivity->getDescription() ;
                            $d_preCondition = $usualDetailedActivity->getPreCondition() ;
                            $d_posCondition = $usualDetailedActivity->getPosCondition() ;
                            $d_restriction = $usualDetailedActivity->getRestriction() ;

                            DAOProcess::reuseUsualDetailedActivity($userId, $reusedMacroActivityId, $d_action, $d_object, $d_action_synonymous, $d_object_synonymous, $d_description, $d_preCondition, $d_posCondition, $d_restriction, $d_reusedFrom) ;
                        }
                    }
                }
            }
        }
    }

    header("Location: process_activities_set.php?processId=".$currentProcessId) ;
?>