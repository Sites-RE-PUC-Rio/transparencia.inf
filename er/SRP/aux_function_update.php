<!--
    Ação que altera a função(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "models/Aux_Function.php" ;
    require_once "models/Utils.php" ;

    $functionId = Utils::getValue($_REQUEST, "functionId") ;
    $name = Utils::getValue($_REQUEST, "name") ;
    $description = Utils::getValue($_REQUEST, "description") ;

    $function = DAOAuxiliaryTables::getFunction($functionId) ;
    $function->setName($name) ;
    $function->setDescription($description) ;

    DAOAuxiliaryTables::updateFunction($function) ;
    header("Location: aux_function_list.php?list=user") ;
?>