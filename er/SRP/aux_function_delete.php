<!--
    A��o que deleta a fun��o(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;

    $functionId = $_REQUEST["functionId"] ;
    DAOAuxiliaryTables::deleteFunction($functionId) ;

    header("Location: aux_function_list.php") ;
?>