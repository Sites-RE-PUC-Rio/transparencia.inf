<!--
    Ação que deleta a politica(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;

    $politicsId = $_REQUEST["politicsId"] ;
    DAOAuxiliaryTables::deletePolitics($politicsId) ;

    header("Location: aux_politics_list.php") ;
?>