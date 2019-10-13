<!--
    Ação que altera o conceito(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "models/Aux_Concept.php" ;
    require_once "models/Utils.php" ;

    $conceptId = Utils::getValue($_REQUEST, "conceptId") ;
    $termName =  Utils::getValue($_REQUEST, "termName") ;
    $termType =  Utils::getValue($_REQUEST, "termType") ;
    $termDescription =  Utils::getValue($_REQUEST, "termDescription") ;

    $concept = DAOAuxiliaryTables::getConcept($conceptId) ;
    $concept->setTermName($termName) ;
    $concept->setTermType($termType) ;
    $concept->setTermDescription($termDescription) ;

    DAOAuxiliaryTables::updateConcept($concept) ;
    header("Location: aux_concept_list.php?list=user") ;
?>