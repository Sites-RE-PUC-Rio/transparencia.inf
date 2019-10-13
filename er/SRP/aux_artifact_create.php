<!--
    Ação que cria o artefato(tabelas auxiliares)
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

    $artifactId = DAOAuxiliaryTables::createArtifact($userId, $name, $description) ;
    header("Location: aux_artifact_list.php?list=user") ;
?>