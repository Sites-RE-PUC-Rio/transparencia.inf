<!--
    Ação que deleta a ferramenta(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;

    $toolId = $_REQUEST["toolId"] ;
    DAOAuxiliaryTables::deleteTool($toolId) ;

    header("Location: aux_tool_list.php") ;
?>