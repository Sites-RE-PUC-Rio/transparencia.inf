<!--
    Ação que cria o treinamento(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "models/User.php" ;
    require_once "models/Utils.php" ;

    session_start() ;
    $user = $_SESSION["user"] ;
    $userId = $user->getUserId() ;

    $name = Utils::getValue($_REQUEST, "name") ;
    $description = Utils::getValue($_REQUEST, "description") ;
    $public = Utils::getValue($_REQUEST, "public") ;

    DAOAuxiliaryTables::createTraining($userId, $name, $description, $public) ;
    header("Location: aux_training_list.php?list=user") ;
?>