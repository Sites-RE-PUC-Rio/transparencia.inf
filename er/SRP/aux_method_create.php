<!--
    Ação que cria o metodo(tabelas auxiliares)
-->
<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "models/User.php" ;
    require_once "models/Utils.php" ;

    session_start() ;
    $user = $_SESSION["user"] ;
    $userId = $user->getUserId() ;

    $name =  Utils::getValue($_REQUEST, "name") ;
    $what =  Utils::getValue($_REQUEST, "what") ;
    $why =  Utils::getValue($_REQUEST, "why") ;
    $appliesWhen =  Utils::getValue($_REQUEST, "appliesWhen") ;
    $how =  Utils::getValue($_REQUEST, "how") ;
    $restriction =  Utils::getValue($_REQUEST, "restriction") ;
    $generatedProduct =  Utils::getValue($_REQUEST, "generatedProduct") ;
    $reference =  Utils::getValue($_REQUEST, "reference") ;

    DAOAuxiliaryTables::createMethod($userId, $name, $what, $why, $appliesWhen, $how, $restriction, $generatedProduct, $reference) ;
    header("Location: aux_method_list.php?list=user") ;
?>