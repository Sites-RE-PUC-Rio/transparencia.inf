<!--
    Pagina que permite a criação e ou alteração dos conceitos(tabelas auxiliares)
    dependendo do parametro mode
-->

<?php
    require_once "models/Aux_Concept.php" ;
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
        $title = "Alterar Conceito" ;
        $url = "aux_concept_update.php" ;

        $conceptId = $_REQUEST["conceptId"];
        $concept = DAOAuxiliaryTables::getConcept($conceptId) ;

        $termName = $concept->getTermName() ;
        $termType = $concept->getTermType() ;
        $termDescription = $concept->getTermDescription() ;
    }
    else if ("create" == $mode)
    {
        $title = "Cadastrar Conceito" ;
        $url = "aux_concept_create.php" ;
        $conceptId = "";
        $termName = "";
        $termType = "";
        $termDescription = "";
    }
    else
    {
        $title = "Modo inválido" ;
        $url = "" ;
        $conceptId = "";
        $termName = "";
        $termType = "";
        $termDescription = "";
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

    <form method="POST" action="<?php echo $url?>" onsubmit="return canSubmit('termName', 'termDescription')">
        <input type="hidden" name="conceptId" value="<?php echo $conceptId ?>">
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
                  <td width="29%"><div align="left"><strong>Termo</strong></div></td>
                  <td width="2%">&nbsp;</td>
                  <td width="69%"><input id="termName" name="termName" type="text" class="input" size="16" value="<?php echo $termName ?>"/></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="left"><strong>Tipo Termo</strong></div></td>
                  <td>&nbsp;</td>
                  <td>
                    <select name="termType" class="input">
                        <?php
                            $keys = array_keys(Aux_Concept::$TERM_TYPE) ;
                            for ($inx = 0; $inx < count($keys); $inx++)
                            {
                                $aKey = $keys[$inx] ;
                                $aValue = Aux_Concept::$TERM_TYPE[$aKey] ;
                                ?>
                                    <option value="<?php echo $aValue ?>" <?php echo (($aValue==$termType)?"selected":"") ?>><?php echo $aKey ?></option>
                                <?php
                            }
                        ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" valign="top"><strong>Descrição</strong></td>
                  <td>&nbsp;</td>
                  <td><TEXTAREA id="termDescription" class="input" COLS=40 ROWS=5 NAME="termDescription"><?php echo $termDescription ?></TEXTAREA></td>
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
