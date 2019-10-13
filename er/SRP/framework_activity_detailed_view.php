<!--
    Pagina que mostra uma visão da atividade detalhada de framework
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;

    require_once "models/Utils.php" ;
    require_once "models/Process.php" ;
    require_once "models/MacroActivity.php" ;
    require_once "models/DetailedActivity.php" ;
    require_once "models/FrameworkDetailedActivityReference.php" ;

    $detailedActivityId = $_REQUEST["detailedActivityId"] ;
    $detailedActivity = DAOProcess::getDetailedActivity($detailedActivityId) ;
    $macroActivity = DAOProcess::getMacroActivity($detailedActivity->getMacroActivityId()) ;

    $action = $detailedActivity->getAction() ;
    $object = $detailedActivity->getObject() ;
    $action_synonymous = Utils::array2String($detailedActivity->getActionSynonymous(), ", ") ;
    $object_synonymous = Utils::array2String($detailedActivity->getObjectSynonymous(), ", ") ;
    $description = $detailedActivity->getDescription() ;
    $type = $detailedActivity->getType() ;
    $caracteristic = $detailedActivity->getCaracteristics() ;

    $detailedActivityReferences = $detailedActivity->getDetailedActivityReferencesAssociated() ;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <title>Sistema de Reutiliza&ccedil;&atilde;o de Processos</title>
    <link href="estilo.css" rel="stylesheet" type="text/css"/>
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
</head>

<body>
<table width="700" border="0" align="left" cellpadding="4" cellspacing="0">

    <tr class="azul14">
        <td width="386" colspan="2"><strong>Atividade Detalhada </strong></td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>

    <tr valign="top" class="cinza12">
        <td colspan="2"><a href="#" class="link"></a>
            <table width="100%" border="0" cellspacing="0" cellpadding="1">
                <tr>
                    <td align="left" valign="top"><strong>Atividade Macro</strong></td>
                    <td>&nbsp;</td>
                    <td>
                        <a href="Javascript:window.open('<?php echo $macroActivity->getMacroType() ?>_activity_macro_view.php?macroActivityId=<?php echo $macroActivity->getMacroActivityId() ?>');void(0)" class="linkNoDec"><?php echo $macroActivity->getName() ?></a>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td width="29%" valign="top"><div align="left"><strong>Nome</strong></div></td>
                    <td width="2%">&nbsp;</td>
                    <td width="69%">
                        Ação:&nbsp;
                        <?php echo $action ?>
                        <br/><br/>
                        Objeto:&nbsp;
                        <?php echo $object ?>
                        <br/><br/>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Sinônimos<br/>(separados por vírgula)</strong></td>
                    <td>&nbsp;</td>
                    <td>
                        Ação:&nbsp;
                        <?php echo $action_synonymous ?>
                        <br/><br/>
                        Objeto:&nbsp;
                        <?php echo $object_synonymous ?>
                        <br/><br/>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Descrição</strong></td>
                    <td>&nbsp;</td>
                    <td><?php echo $description ?></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Tipo</strong></td>
                    <td>&nbsp;</td>
                    <td>
                        <?php
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
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Características</strong></td>
                    <td>&nbsp;</td>
                    <td>
                        <?php
                            $keys = array_keys(FrameworkDetailedActivity::$CARACTERISTICS) ;
                            for ($inx = 0; $inx < count($keys); $inx++)
                            {
                                $aKey = $keys[$inx] ;
                                $aValue = FrameworkDetailedActivity::$CARACTERISTICS[$aKey] ;
                                if ($aValue==$caracteristic)
                                {
                                    echo $aKey ;
                                     break ;
                                }
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Atividades Detalhadas Possíveis</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (count($detailedActivityReferences) == 0)
    {
?>
                        <div class="vermelho12">Não há atividade associada</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($detailedActivityReferences); $inx++)
        {
            $reference = $detailedActivityReferences[$inx] ;
            $referenceDetailedActivity = $reference->getDetailedActivity() ;
            if (0 < $inx)
            {
                echo '<br/>' ;
            }
?>
                        <a href="Javascript:window.open('<?php echo $referenceDetailedActivity->getDetailedType() ?>_activity_detailed_view.php?detailedActivityId=<?php echo $referenceDetailedActivity->getDetailedActivityId() ?>');void(0)" class="linkNoDec"><?php echo $referenceDetailedActivity->getName()." ( ".$reference->getSimilarity()." )" ?></a>
<?php
        }
    }
?>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>