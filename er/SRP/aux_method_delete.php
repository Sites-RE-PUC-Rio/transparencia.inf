<!--
    Ação que deleta o metodo(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;

    $methodId = $_REQUEST["methodId"] ;
    DAOAuxiliaryTables::deleteMethod($methodId) ;

    header("Location: aux_method_list.php") ;
?>