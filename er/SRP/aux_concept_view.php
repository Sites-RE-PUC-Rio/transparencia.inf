<!--
    Pagina que mostra uma visão do conceito(tabelas auxiliares)
-->
<?php
    require_once "models/Aux_Concept.php" ;
    require_once "dal/dao/DAOAuxiliaryTables.php" ;

    $conceptId = $_REQUEST["conceptId"];
    $concept = DAOAuxiliaryTables::getConcept($conceptId) ;

    $termName = $concept->getTermName() ;
    $termType = $concept->getTermType() ;
    $termDescription = $concept->getTermDescription() ;
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
        <table width="700" border="0" align="left" cellpadding="4" cellspacing="0">

          <tr class="azul14">
            <td width="386" colspan="2"><strong>Conceito</strong></td>
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
                  <td width="69%"><?php echo $termName ?></td>
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
                    <?php
                        $keys = array_keys(Aux_Concept::$TERM_TYPE) ;
                        for ($inx = 0; $inx < count($keys); $inx++)
                        {
                            $aKey = $keys[$inx] ;
                            $aValue = Aux_Concept::$TERM_TYPE[$aKey] ;
                            if ($aValue==$termType)
                            {
                                echo $aKey ;
                                 break ;
                            }
                        }
                    ?>
                  </td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="left"><strong>Descrição</strong></div></td>
                  <td>&nbsp;</td>
                  <td><?php echo $termDescription ?></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
          </tr>
        </table>
</body>
</html>
