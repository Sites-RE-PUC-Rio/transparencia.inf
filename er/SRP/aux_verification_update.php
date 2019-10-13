<!--
    Ação que altera a verificação(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "models/Aux_Verification.php" ;
    require_once "models/Utils.php" ;

    $verificationId = Utils::getValue($_REQUEST, "verificationId") ;
    $name = Utils::getValue($_REQUEST, "name") ;
    $type = Utils::getValue($_REQUEST, "type") ;
    $description =  Utils::getValue($_REQUEST, "description") ;
    $frequency = Utils::getValue($_REQUEST, "frequency") ;
    $worker = Utils::getValue($_REQUEST, "worker") ;

    $verification = DAOAuxiliaryTables::getVerification($verificationId) ;
    $verification->setName($name) ;
    $verification->setType($type) ;
    $verification->setDescription($description) ;
    $verification->setFrequency($frequency) ;
    $verification->setWorker($worker) ;

    DAOAuxiliaryTables::updateVerification($verification) ;
    header("Location: aux_verification_list.php?list=user") ;
?>