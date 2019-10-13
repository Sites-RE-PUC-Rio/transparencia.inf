<!--
    Ação que deleta o conceito(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;

    $conceptId = $_REQUEST["conceptId"] ;
    DAOAuxiliaryTables::deleteConcept($conceptId) ;

    header("Location: aux_concept_list.php") ;
?>