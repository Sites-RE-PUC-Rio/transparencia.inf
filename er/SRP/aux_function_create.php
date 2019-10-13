<!--
    Ação que cria a função(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "models/User.php" ;
    require_once "models/Utils.php" ;

    session_start() ;
    $user = $_SESSION["user"] ;
    $userId = $user->getUserId() ;

    $name =  Utils::getValue($_REQUEST, "name") ;
    $description =  Utils::getValue($_REQUEST, "description") ;

    DAOAuxiliaryTables::createFunction($userId, $name, $description) ;
    header("Location: aux_function_list.php?list=user") ;
?>