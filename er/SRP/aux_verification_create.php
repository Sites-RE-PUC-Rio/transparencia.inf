<!--
    Ação que cria a verificação(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "models/User.php" ;
    require_once "models/Utils.php" ;

    session_start() ;
    $user = $_SESSION["user"] ;
    $userId = $user->getUserId() ;

    $name = Utils::getValue($_REQUEST, "name") ;
    $type = Utils::getValue($_REQUEST, "type") ;
    $description =  Utils::getValue($_REQUEST, "description") ;
    $frequency = Utils::getValue($_REQUEST, "frequency") ;
    $worker = Utils::getValue($_REQUEST, "worker") ;

    DAOAuxiliaryTables::createVerification($userId, $name, $type, $description, $frequency, $worker) ;
    header("Location: aux_verification_list.php?list=user") ;
?>