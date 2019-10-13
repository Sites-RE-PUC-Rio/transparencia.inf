<!--
    Ação que altera a ferramenta(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "models/Aux_Tool.php" ;
    require_once "models/Utils.php" ;

    $toolId = Utils::getValue($_REQUEST, "toolId") ;
    $name = Utils::getValue($_REQUEST, "name") ;
    $description = Utils::getValue($_REQUEST, "description") ;

    $tool = DAOAuxiliaryTables::getTool($toolId) ;
    $tool->setName($name) ;
    $tool->setDescription($description) ;

    DAOAuxiliaryTables::updateTool($tool) ;
    header("Location: aux_tool_list.php?list=user") ;
?>