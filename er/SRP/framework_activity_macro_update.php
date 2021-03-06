<!--
    A��o que altera a atividade macro de framework
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/FrameworkMacroActivity.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $macroActivityId = Utils::getValue($_REQUEST, "macroActivityId") ;
    $macroActivity = DAOProcess::getMacroActivity($macroActivityId) ;

    $macroActivity->setAction(Utils::getValue($_REQUEST, "action")) ;
    $macroActivity->setObject(Utils::getValue($_REQUEST, "object")) ;
    $macroActivity->setActionSynonymous(Utils::string2Array(Utils::getValue($_REQUEST, "action_synonymous"))) ;
    $macroActivity->setObjectSynonymous(Utils::string2Array(Utils::getValue($_REQUEST, "object_synonymous"))) ;
    $macroActivity->setDescription(Utils::getValue($_REQUEST, "description")) ;
    $macroActivity->setType( Utils::getValue($_REQUEST, "type")) ;
    $macroActivity->setCaracteristics(Utils::getValue($_REQUEST, "caracteristics")) ;

    DAOProcess::updateFrameworkMacroActivity($macroActivity) ;

    header("Location: framework_activity_macro_search.php?mode=update&processId=".$processId."&macroActivityId=".$macroActivityId) ;
?>