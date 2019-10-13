<!--
    Ação que cria a politica(tabelas auxiliares)
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

    DAOAuxiliaryTables::createPolitics($userId, $name, $description) ;
    header("Location: aux_politics_list.php?list=user") ;
?>