<!--
    A��o que deleta a medi��o(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;

    $measurementId = $_REQUEST["measurementId"] ;
    DAOAuxiliaryTables::deleteMeasurement($measurementId) ;

    header("Location: aux_measurement_list.php") ;
?>