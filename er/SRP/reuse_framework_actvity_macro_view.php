<!--
    Pagina que mostra uma visão do guia de reutilização para o framework
-->

<?php

    require_once "dal/dao/DAOProcess.php" ;

    require_once "models/Utils.php" ;
    require_once "models/Process.php" ;
    require_once "models/MacroActivity.php" ;
    require_once "models/FrameworkMacroActivity.php" ;

    $frameworkProcessId = Utils::getValue($_REQUEST, "processId") ;
    $frameworkProcess = DAOProcess::getProcess($frameworkProcessId) ;
    if (NULL != $frameworkProcess)
    {
        $macroActivities = $frameworkProcess->getMacroActivities() ;
    }
    else
    {
        $macroActivities = NULL ;
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

<body>
    <table width="700" border="0" align="left" cellpadding="4" cellspacing="0">

        <tr class="azul14">
            <td colspan="2"><strong>Guia de Reutilização do Framework</strong></td>
        </tr>

        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>

        <tr valign="top" class="cinza12">
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#CCCCCC">

                    <tr align="center" bgcolor="#FFFFFF" valign="top">
                        <td><strong> Atividade </strong></td>
                        <td><strong> Tipo </strong></td>
                        <td><strong> Caracteristicas </strong></td>
                        <td><strong> Atividades Macro<br/>Associadas </strong></td>
                        <td><strong> Grau de<br/>Adapdação </strong></td>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

    <?php
        if (NULL != $macroActivities)
        {
            $keysMacro = array_keys($macroActivities) ;
            for ($inxMacro = 0; $inxMacro < count($keysMacro); $inxMacro++)
            {
                $aKeyMacro = $keysMacro[$inxMacro] ;
                $aMacroActivity = $macroActivities[$aKeyMacro] ;
                $macroAssociateds = $aMacroActivity->getMacroActivityReferencesAssociated() ;
    ?>

                    <tr align="center" valign="top" bgcolor="#FFFFFF">
                        <td> <?php echo $aMacroActivity->getName() ?> </td>
                        <td>
                            <?php
                                $type = $aMacroActivity->getType() ;
                                $keys = array_keys(FrameworkMacroActivity::$TYPE) ;
                                for ($inx = 0; $inx < count($keys); $inx++)
                                {
                                    $aKey = $keys[$inx] ;
                                    $aValue = FrameworkMacroActivity::$TYPE[$aKey] ;
                                    if ($aValue==$type)
                                    {
                                        echo $aKey ;
                                        break ;
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $caracteristics = $aMacroActivity->getCaracteristics() ;
                                $keys = array_keys(FrameworkMacroActivity::$CARACTERISTICS) ;
                                for ($inx = 0; $inx < count($keys); $inx++)
                                {
                                    $aKey = $keys[$inx] ;
                                    $aValue = FrameworkMacroActivity::$CARACTERISTICS[$aKey] ;
                                    if ($aValue==$caracteristics)
                                    {
                                        echo $aKey ;
                                        break ;
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $macroKeys = array_keys($macroAssociateds) ;
                                for ($inx = 0; $inx < count($macroKeys); $inx++)
                                {
                                    $aMacroKey = $macroKeys[$inx] ;
                                    $aMacroAssociated = $macroAssociateds[$aMacroKey]->getMacroActivity() ;

                                    echo $aMacroAssociated->getName()."<br/>" ;
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $macroKeys = array_keys($macroAssociateds) ;
                                for ($inx = 0; $inx < count($macroKeys); $inx++)
                                {
                                    $aMacroKey = $macroKeys[$inx] ;
                                    $aMacroreference = $macroAssociateds[$aMacroKey] ;

                                    echo $aMacroreference->getSimilarity()."<br/>" ;
                                }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

    <?php
            }
        }
    ?>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>