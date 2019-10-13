<!--
    Ação que deleta a medição(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;

    $measurementId = $_REQUEST["measurementId"] ;
    DAOAuxiliaryTables::deleteMeasurement($measurementId) ;

    header("Location: aux_measurement_list.php") ;
?>