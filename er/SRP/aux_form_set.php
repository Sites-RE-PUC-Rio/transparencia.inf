<!--
    Pagina que permite a criação e ou alteração dos formularios(tabelas auxiliares)
    dependendo do parametro mode
-->

<?php
    require_once "models/Aux_Form.php" ;
    require_once "dal/dao/DAOAuxiliaryTables.php" ;
    require_once "dal/dao/DAOFile.php" ;
    require_once "models/File.php" ;
    require_once "models/Aux_Form.php" ;

    if (isset($_REQUEST["mode"]))
    {
        $mode = $_REQUEST["mode"] ;
    }
    else
    {
        $mode = "" ;
    }

    if ("update" == $mode)
    {
        $title = "Alterar Formulário" ;
        $url = "aux_form_update.php" ;

        $formId = $_REQUEST["formId"];
        $form = DAOAuxiliaryTables::getForm($formId) ;

        $name = $form->getName() ;
        $purpose = $form->getPurpose() ;
        $file = DAOFile::getFile(Aux_Form::getTemplateRerence($formId)) ;
    }
    else if ("create" == $mode)
    {
        $title = "Cadastrar Formulário" ;
        $url = "aux_form_create.php" ;
        $formId = "";
        $name = "";
        $purpose = "";
    }
    else
    {
        $title = "Modo inválido" ;
        $url = "" ;
        $formId = "";
        $name = "";
        $purpose = "";
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Sistema de Reutiliza&ccedil;&atilde;o de Processos</title>
    <link href="estilo.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
    <!--
    body {
        margin-left: 10px;
        margin-top: 10px;
        margin-right: 0px;
        margin-bottom: 0px;
    }
    -->
    </style>
    <script language="javascript">
    function enableTamplate(enable)
    {
        var template = document.getElementsByName("template")[0] ;
        template.disabled = !enable ;

        return true ;
    }
    </script>
</head>

<body class="cinza12">
    <script src="js/prototype.js"></script>
    <script src="js/utils.js"></script>

    <form enctype="multipart/form-data" action="<?php echo $url?>" method="POST" onsubmit="return canSubmit('name', 'purpose')">
        <input type="hidden" name="formId" value="<?php echo $formId ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo 1048576 * ini_get('upload_max_filesize') ?>"/>

        <table width="700" border="0" align="left" cellpadding="4" cellspacing="0">
          <tr class="azul14">
            <td width="386" colspan="2"><strong><?php echo $title ?></strong><div id="error" style="display:none" class="vermelho12"><br/>Preencha abaixo os campos o brigatórios marcados em vermelho.</div></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>

          <tr valign="top" class="cinza12">
            <td colspan="2"><a href="#" class="link"></a>
              <table width="100%" border="0" cellspacing="0" cellpadding="1">
                <tr>
                  <td width="29%"><div align="left"><strong>Nome</strong></div></td>
                  <td width="2%">&nbsp;</td>
                  <td width="69%"><input id="name" name="name" type="text" class="input" size="16" value="<?php echo $name ?>"/></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" valign="top"><strong>Finalidade</strong></td>
                  <td>&nbsp;</td>
                  <td><TEXTAREA id="purpose" class="input" COLS=40 ROWS=5 NAME="purpose"><?php echo $purpose ?></TEXTAREA></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <?php
                    if ("update" == $mode && NULL != $file)
                    {
                ?>
                    <tr>
                        <td align="left" valign="top"><strong>Template (<=<?php echo ini_get('upload_max_filesize') ?>)</strong></td>
                        <td>&nbsp;</td>
                        <td>
                            <a href='getFile.php?reference=<?php echo $file->getReference() ?>' class='link'><?php echo $file->getName() ?></a>
                            <br/><br/>
                            <input type='radio' name='templateAction' value='keep'  onClick="javascript:return enableTamplate(false);" checked/> Manter &nbsp;&nbsp;&nbsp;
                            <input type='radio' name='templateAction' value='delete' onClick="javascript:return enableTamplate(false);"/> Deletar &nbsp;&nbsp;&nbsp;
                            <br/><br/>
                            <input type='radio' name='templateAction' value='overwrite' onClick="javascript:return enableTamplate(true);"/> Substituir&nbsp;&nbsp;
                            <input name="template" type="file" size="25" disabled="true"/>
                        </td>
                    </tr>
                <?php
                    }
                    else if ("create" == $mode || ("update" == $mode && NULL == $file))
                    {
                ?>
                    <tr>
                        <td><div align="left"><strong>Template (<=<?php echo ini_get('upload_max_filesize') ?>)</strong></div></td>
                        <td>&nbsp;</td>
                        <td>
                            <input type="hidden" name="templateAction" value="create"/>
                            <input name="template" type="file" size="40"/>
                        </td>

                    </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan="3">&nbsp;<br/><br/><br/></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><input name="Submit" type="submit" class="submit" value="Gravar" /></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
    </form>
</body>
</html>
