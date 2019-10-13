<!--
    Ação que altera o artefato(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "models/Aux_Artifact.php" ;
    require_once "models/Utils.php" ;

    $artifactId = Utils::getValue($_REQUEST, "artifactId") ;
    $name = Utils::getValue($_REQUEST, "name") ;
    $description = Utils::getValue($_REQUEST, "description") ;

    $artifact = DAOAuxiliaryTables::getArtifact($artifactId) ;
    $artifact->setName($name) ;
    $artifact->setDescription($description) ;

    DAOAuxiliaryTables::updateArtifact($artifact) ;
    header("Location: aux_artifact_list.php?list=user") ;
?>