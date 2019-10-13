<!--
    Ação que altera a politica(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "models/Aux_Politics.php" ;
    require_once "models/Utils.php" ;

    $politicsId = Utils::getValue($_REQUEST, "politicsId") ;
    $name = Utils::getValue($_REQUEST, "name") ;
    $description = Utils::getValue($_REQUEST, "description") ;

    $politics = DAOAuxiliaryTables::getPolitics($politicsId) ;
    $politics->setName($name) ;
    $politics->setDescription($description) ;

    DAOAuxiliaryTables::updatePolitics($politics) ;
    header("Location: aux_politics_list.php?list=user") ;
?>