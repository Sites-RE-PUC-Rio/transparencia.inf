<!--
    Ação que altera o treinamento(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "models/Aux_Training.php" ;
    require_once "models/Utils.php" ;

    $trainingId = Utils::getValue($_REQUEST, "trainingId") ;
    $name = Utils::getValue($_REQUEST, "name") ;
    $description = Utils::getValue($_REQUEST, "description") ;
    $public = Utils::getValue($_REQUEST, "public") ;

    $training = DAOAuxiliaryTables::getTraining($trainingId) ;
    $training->setName($name) ;
    $training->setDescription($description) ;
    $training->setPublic($public) ;

    DAOAuxiliaryTables::updateTraining($training) ;
    header("Location: aux_training_list.php?list=user") ;
?>