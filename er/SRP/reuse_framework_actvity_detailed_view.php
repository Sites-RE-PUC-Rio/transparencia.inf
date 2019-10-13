<!--
    Pagina que mostra uma visão do guia de reutilização das atividades macro do framework
-->

<?php

    require_once "dal/dao/DAOProcess.php" ;

    require_once "models/Utils.php" ;
    require_once "models/MacroActivity.php" ;
    require_once "models/FrameworkMacroActivity.php" ;
    require_once "models/DetailedActivity.php" ;

    $frameworkMacroActivityId = Utils::getValue($_REQUEST, "macroActivityId") ;
    $frameworkMacroActivity = DAOProcess::getMacroActivity($frameworkMacroActivityId) ;
    if (NULL != $frameworkMacroActivity)
    {
        $detailedActivities = $frameworkMacroActivity->getDetailedActivities() ;
    }
    else
    {
        $detailedActivities = NULL ;
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
            <td colspan="2"><strong>Guia de Reutilização da Atividade Macro: <?php echo $frameworkMacroActivity->getName() ?></strong></td>
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
                        <td><strong> Atividades Detalhadas<br/>Associadas </strong></td>
                        <td><strong> Grau de<br/>Adapdação </strong></td>
                    </tr>

                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

    <?php
        if (NULL != $detailedActivities)
        {
            $keysDetailed = array_keys($detailedActivities) ;
            for ($inxDetailed = 0; $inxDetailed < count($keysDetailed); $inxDetailed++)
            {
                $aKeyDetailed = $keysDetailed[$inxDetailed] ;
                $aDetailedActivity = $detailedActivities[$aKeyDetailed] ;
                $detailedAssociateds = $aDetailedActivity->getDetailedActivityReferencesAssociated() ;
    ?>

                    <tr align="center" valign="top" bgcolor="#FFFFFF">
                        <td> <?php echo $aDetailedActivity->getName() ?> </td>
                        <td>
                            <?php
                                $type = $aDetailedActivity->getType() ;
                                $keys = array_keys(FrameworkDetailedActivity::$TYPE) ;
                                for ($inx = 0; $inx < count($keys); $inx++)
                                {
                                    $aKey = $keys[$inx] ;
                                    $aValue = FrameworkDetailedActivity::$TYPE[$aKey] ;
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
                                $caracteristics = $aDetailedActivity->getCaracteristics() ;
                                $keys = array_keys(FrameworkDetailedActivity::$CARACTERISTICS) ;
                                for ($inx = 0; $inx < count($keys); $inx++)
                                {
                                    $aKey = $keys[$inx] ;
                                    $aValue = FrameworkDetailedActivity::$CARACTERISTICS[$aKey] ;
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
                                $detailedKeys = array_keys($detailedAssociateds) ;
                                for ($inx = 0; $inx < count($detailedKeys); $inx++)
                                {
                                    $aDetailedKey = $detailedKeys[$inx] ;
                                    $aDetailedAssociated = $detailedAssociateds[$aDetailedKey]->getDetailedActivity() ;

                                    echo $aDetailedAssociated->getName()."<br/>" ;
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $detailedKeys = array_keys($detailedAssociateds) ;
                                for ($inx = 0; $inx < count($detailedKeys); $inx++)
                                {
                                    $aDetailedKey = $detailedKeys[$inx] ;
                                    $aDetailedreference = $detailedAssociateds[$aDetailedKey] ;

                                    echo $aDetailedreference->getSimilarity()."<br/>" ;
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
