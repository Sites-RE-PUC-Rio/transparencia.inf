<!--
    A��o que deleta a verifica��o(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;

    $verificationId = $_REQUEST["verificationId"] ;
    DAOAuxiliaryTables::deleteVerification($verificationId) ;

    header("Location: aux_verification_list.php") ;
?>