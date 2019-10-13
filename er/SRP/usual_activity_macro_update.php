<!--
    Ação que altera a atividade macro usualç
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/UsualMacroActivity.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $macroActivityId = Utils::getValue($_REQUEST, "macroActivityId") ;
    $macroActivity = DAOProcess::getMacroActivity($macroActivityId) ;

    $macroActivity->setAction(Utils::getValue($_REQUEST, "action")) ;
    $macroActivity->setObject(Utils::getValue($_REQUEST, "object")) ;
    $macroActivity->setActionSynonymous(Utils::string2Array(Utils::getValue($_REQUEST, "action_synonymous"))) ;
    $macroActivity->setObjectSynonymous(Utils::string2Array(Utils::getValue($_REQUEST, "object_synonymous"))) ;
    $macroActivity->setDescription( Utils::getValue($_REQUEST, "description")) ;
    $macroActivity->setPreCondition(Utils::getValue($_REQUEST, "preCondition")) ;
    $macroActivity->setPosCondition(Utils::getValue($_REQUEST, "posCondition")) ;
    $macroActivity->setRestriction(Utils::getValue($_REQUEST, "restriction")) ;

    DAOProcess::updateUsualMacroActivity($macroActivity) ;

    header("Location: usual_activity_macro_aux_tables.php?processId=".$processId."&macroActivityId=".$macroActivityId) ;
?>