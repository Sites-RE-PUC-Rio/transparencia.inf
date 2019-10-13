<!--
    Pagina que permite a criação e ou alteração das politicas(tabelas auxiliares)
    dependendo do parametro mode
-->

<?php
    require_once "models/Aux_Politics.php" ;
    require_once "dal/dao/DAOAuxiliaryTables.php" ;

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
        $title = "Alterar Política" ;
        $url = "aux_politics_update.php" ;

        $politicsId = $_REQUEST["politicsId"];
        $politics = DAOAuxiliaryTables::getPolitics($politicsId) ;

        $name = $politics->getName() ;
        $description = $politics->getDescription() ;
    }
    else if ("create" == $mode)
    {
        $title = "Cadastrar Política" ;
        $url = "aux_politics_create.php" ;
        $politicsId = "";
        $name = "";
        $description = "";
    }
    else
    {
        $title = "Modo inválido" ;
        $url = "" ;
        $politicsId = "";
        $name = "";
        $description = "";
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
</style></head>

<body class="cinza12">
    <script src="js/prototype.js"></script>
    <script src="js/utils.js"></script>

    <form method="POST" action="<?php echo $url?>" onsubmit="return canSubmit('name', 'description')">
        <input type="hidden" name="politicsId" value="<?php echo $politicsId ?>">
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
                  <td align="left" valign="top"><strong>Descrição</strong></td>
                  <td>&nbsp;</td>
                  <td><TEXTAREA id="description" class="input" COLS=40 ROWS=5 NAME="description"><?php echo $description ?></TEXTAREA></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;<br/><br/><br/></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><input name="Submit" type="submit" class="submit" value="Gravar" /></td>
                </tr>
              </table></td>
          </tr>
        </table>
    </form>
</body>
</html>
