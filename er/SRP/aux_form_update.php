<!--
    Ação que altera o formulario(tabelas auxiliares)
-->

<?php
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "dal/dao/DAOFile.php" ;
    require_once "models/Aux_Form.php" ;
    require_once "models/Utils.php" ;

    $formId = Utils::getValue($_REQUEST, "formId") ;
    $name = Utils::getValue($_REQUEST, "name") ;
    $purpose = Utils::getValue($_REQUEST, "purpose") ;

    $form = DAOAuxiliaryTables::getForm($formId) ;
    $form->setName($name) ;
    $form->setPurpose($purpose) ;

    DAOAuxiliaryTables::updateForm($form) ;

    $templateAction = Utils::getValue($_REQUEST, "templateAction") ;
    if ("delete" == $templateAction)
    {
        DAOFile::deleteFile(Aux_Form::getTemplateRerence($formId)) ;
    }
    else if ("overwrite" == $templateAction)
    {
        DAOFile::updateFile("template", Aux_Form::getTemplateRerence($formId), "");
    }
    else if ("create" == $templateAction)
    {
        DAOFile::createFile("template", Aux_Form::getTemplateRerence($formId), "");
    }

    header("Location: aux_form_list.php?list=user") ;
?>