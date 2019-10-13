<!--
    Ação que cria o conceito(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "models/User.php" ;
    require_once "models/Utils.php" ;

    session_start() ;
    $user = $_SESSION["user"] ;
    $userId = $user->getUserId() ;

    $termName =  Utils::getValue($_REQUEST, "termName") ;
    $termType =  Utils::getValue($_REQUEST, "termType") ;
    $termDescription =  Utils::getValue($_REQUEST, "termDescription") ;

    $conceptId = DAOAuxiliaryTables::createConcept($userId, $termName, $termType, $termDescription) ;
    header("Location: aux_concept_list.php?list=user") ;
?>