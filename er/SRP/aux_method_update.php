<!--
    Ação que altera o metodo(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "models/Aux_Method.php" ;
    require_once "models/Utils.php" ;

    $methodId = Utils::getValue($_REQUEST, "methodId") ;
    $name =  Utils::getValue($_REQUEST, "name") ;
    $what =  Utils::getValue($_REQUEST, "what") ;
    $why =  Utils::getValue($_REQUEST, "why") ;
    $appliesWhen =  Utils::getValue($_REQUEST, "appliesWhen") ;
    $how =  Utils::getValue($_REQUEST, "how") ;
    $restriction =  Utils::getValue($_REQUEST, "restriction") ;
    $generatedProduct =  Utils::getValue($_REQUEST, "generatedProduct") ;
    $reference =  Utils::getValue($_REQUEST, "reference") ;

    $method = DAOAuxiliaryTables::getMethod($methodId) ;
    $method->setName($name) ;
    $method->setWhat($what) ;
    $method->setWhy($why) ;
    $method->setAppliesWhen($appliesWhen) ;
    $method->setHow($how) ;
    $method->setRestriction($restriction) ;
    $method->setGeneratedProduct($generatedProduct) ;
    $method->setReference($reference) ;

    DAOAuxiliaryTables::updateMethod($method) ;
    header("Location: aux_method_list.php?list=user") ;
?>