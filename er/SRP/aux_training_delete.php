<!--
    Ação que deleta o treinamento(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;

    $trainingId = $_REQUEST["trainingId"] ;
    DAOAuxiliaryTables::deleteTraining($trainingId) ;

    header("Location: aux_training_list.php") ;
?>