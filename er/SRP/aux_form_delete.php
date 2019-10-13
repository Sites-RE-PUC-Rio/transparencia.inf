<!--
    Ação que deleta o formulario(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;

    $formId = $_REQUEST["formId"] ;
    DAOAuxiliaryTables::deleteForm($formId) ;

    header("Location: aux_form_list.php") ;
?>