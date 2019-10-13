<!--
    Pagina que permite a criação e ou alteração dos metodos(tabelas auxiliares)
    dependendo do parametro mode
-->

<?php
    require_once "models/Aux_Method.php" ;
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
        $title = "Alterar Método" ;
        $url = "aux_method_update.php" ;

        $methodId = $_REQUEST["methodId"];
        $method = DAOAuxiliaryTables::getMethod($methodId) ;

        $name = $method->getName() ;
        $what = $method->getWhat() ;
        $why = $method->getWhy() ;
        $appliesWhen = $method->getAppliesWhen() ;
        $how = $method->getHow() ;
        $restriction = $method->getRestriction() ;
        $generatedProduct = $method->getGeneratedProduct() ;
        $reference = $method->getReference() ;
    }
    else if ("create" == $mode)
    {
        $title = "Cadastrar Método" ;
        $url = "aux_method_create.php" ;
        $methodId = "";
        $name = "";
        $what = "" ;
        $why = "" ;
        $appliesWhen = "" ;
        $how = "" ;
        $restriction = "" ;
        $generatedProduct = "" ;
        $reference = "" ;
    }
    else
    {
        $title = "Modo inválido" ;
        $url = "" ;
        $methodId = "";
        $name = "";
        $what = "" ;
        $why = "" ;
        $appliesWhen = "" ;
        $how = "" ;
        $restriction = "" ;
        $generatedProduct = "" ;
        $reference = "" ;
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

    <form method="POST" action="<?php echo $url?>" onsubmit="return canSubmit('name', 'what', 'why', 'appliesWhen', 'how', 'restriction', 'generatedProduct', 'reference')">
        <input type="hidden" name="methodId" value="<?php echo $methodId ?>">
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
                  <td align="left" valign="top"><strong>O que é</strong></td>
                  <td>&nbsp;</td>
                  <td><TEXTAREA id="what" class="input" COLS=40 ROWS=5 NAME="what"><?php echo $what ?></TEXTAREA></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
            <tr>
                  <td align="left" valign="top"><strong>Porque utilizar</strong></td>
                  <td>&nbsp;</td>
                  <td><TEXTAREA id="why" class="input" COLS=40 ROWS=5 NAME="why"><?php echo $why ?></TEXTAREA></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
            <tr>
                  <td align="left" valign="top"><strong>Quando se aplica</strong></td>
                  <td>&nbsp;</td>
                  <td><TEXTAREA id="appliesWhen" class="input" COLS=40 ROWS=5 NAME="appliesWhen"><?php echo $appliesWhen ?></TEXTAREA></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
            <tr>
                  <td align="left" valign="top"><strong>Como se usa</strong></td>
                  <td>&nbsp;</td>
                  <td><TEXTAREA id="how" class="input" COLS=40 ROWS=5 NAME="how"><?php echo $how ?></TEXTAREA></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
            <tr>
                  <td align="left" valign="top"><strong>Restrição</strong></td>
                  <td>&nbsp;</td>
                  <td><TEXTAREA id="restriction" class="input" COLS=40 ROWS=5 NAME="restriction"><?php echo $restriction ?></TEXTAREA></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="29%"><div align="left"><strong>Produto gerado</strong></div></td>
                  <td width="2%">&nbsp;</td>
                  <td width="69%"><input id="generatedProduct" name="generatedProduct" type="text" class="input" size="16" value="<?php echo $generatedProduct ?>"/></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
            <tr>
                  <td width="29%"><div align="left"><strong>Referência</strong></div></td>
                  <td width="2%">&nbsp;</td>
                  <td width="69%"><input id="reference" name="reference" type="text" class="input" size="16" value="<?php echo $reference ?>"/></td>
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
