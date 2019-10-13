<!--
    Ação que cria o formulário(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "dal/dao/DAOFile.php" ;
    require_once "models/Aux_Form.php" ;
    require_once "models/User.php" ;
    require_once "models/Utils.php" ;

    session_start() ;
    $user = $_SESSION["user"] ;
    $userId = $user->getUserId() ;

    $name = Utils::getValue($_REQUEST, "name") ;
    $purpose = Utils::getValue($_REQUEST, "purpose") ;

    $formId = DAOAuxiliaryTables::createForm($userId, $name, $purpose) ;
    DAOFile::createFile("template", Aux_Form::getTemplateRerence($formId), "");

    header("Location: aux_form_list.php?list=user") ;
?>