<!--
    Pagina que mostra uma visão da medição(tabelas auxiliares)
-->

<?php
    require_once "models/Aux_Measurement.php" ;
    require_once "dal/dao/DAOAuxiliaryTables.php" ;

    $measurementId = $_REQUEST["measurementId"];
    $measurement = DAOAuxiliaryTables::getMeasurement($measurementId) ;

    $name = $measurement->getName() ;
    $description = $measurement->getDescription() ;
    $formula = $measurement->getFormula() ;
    $metric = $measurement->getMetric() ;
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
            <td width="386" colspan="2"><strong>Medição</strong></td>
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
                  <td width="69%"><?php echo $name ?></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="left"><strong>Descrição</strong></div></td>
                  <td>&nbsp;</td>
                  <td><?php echo $description ?></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="left"><strong>Formula</strong></div></td>
                  <td>&nbsp;</td>
                  <td><?php echo $formula ?></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
            <tr>
                  <td><div align="left"><strong>Metrica</strong></div></td>
                  <td>&nbsp;</td>
                  <td><?php echo $metric ?></td>
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
