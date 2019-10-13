<!--
    Ação que altera a medição(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "models/Aux_Measurement.php" ;
    require_once "models/Utils.php" ;

    $measurementId = Utils::getValue($_REQUEST, "measurementId") ;
    $name =  Utils::getValue($_REQUEST, "name") ;
    $description =  Utils::getValue($_REQUEST, "description") ;
    $formula =  Utils::getValue($_REQUEST, "formula") ;
    $metric =  Utils::getValue($_REQUEST, "metric") ;

    $measurement = DAOAuxiliaryTables::getMeasurement($measurementId) ;
    $measurement->setName($name) ;
    $measurement->setDescription($description) ;
    $measurement->setFormula($formula) ;
    $measurement->setMetric($metric) ;

    DAOAuxiliaryTables::updateMeasurement($measurement) ;
    header("Location: aux_measurement_list.php?list=user") ;
?>