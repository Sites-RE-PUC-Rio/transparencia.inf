<!--
    Ação que deleta o artefato(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;

    $artifactId = $_REQUEST["artifactId"] ;
    DAOAuxiliaryTables::deleteArtifact($artifactId) ;

    header("Location: aux_artifact_list.php") ;
?>