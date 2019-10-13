<!--
    Ação que cria a medição(tabelas auxiliares)
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
    $formula =  Utils::getValue($_REQUEST, "formula") ;
    $metric =  Utils::getValue($_REQUEST, "metric") ;

    DAOAuxiliaryTables::createMeasurement($userId, $name, $description, $formula, $metric) ;
    header("Location: aux_measurement_list.php?list=user") ;
?>