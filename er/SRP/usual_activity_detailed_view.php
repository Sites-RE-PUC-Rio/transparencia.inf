<!--
    Pagina que mostra uma visão da atividade detalhada usual
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;

    require_once "models/Utils.php" ;
    require_once "models/Process.php" ;
    require_once "models/MacroActivity.php" ;
    require_once "models/DetailedActivity.php" ;
    require_once "models/Aux_Artifact.php" ;
    require_once "models/Aux_Tool.php" ;
    require_once "models/Aux_Function.php" ;
    require_once "models/Aux_Method.php" ;

    $detailedActivityId = $_REQUEST["detailedActivityId"] ;
    $detailedActivity = DAOProcess::getDetailedActivity($detailedActivityId) ;
    $macroActivity = DAOProcess::getMacroActivity($detailedActivity->getMacroActivityId()) ;

    $action = $detailedActivity->getAction() ;
    $object = $detailedActivity->getObject() ;
    $action_synonymous = Utils::array2String($detailedActivity->getActionSynonymous(), ", ") ;
    $object_synonymous = Utils::array2String($detailedActivity->getObjectSynonymous(), ", ") ;
    $description = $detailedActivity->getDescription() ;
    $restriction = $detailedActivity->getRestriction() ;
    $preCondition = $detailedActivity->getPreCondition() ;
    $posCondition = $detailedActivity->getPosCondition() ;

    if ( isset($_REQUEST["processId"]) )
    {
        $processId = $_REQUEST["processId"] ;

        $artifacts_in = DAOProcess::getDetailedActivityArtifacts($processId, $detailedActivityId, 'input') ;
        $artifacts_out = DAOProcess::getDetailedActivityArtifacts($processId, $detailedActivityId, 'output') ;
        $functions = DAOProcess::getDetailedActivityFunctions($processId, $detailedActivityId) ;
        $methods = DAOProcess::getDetailedActivityMethods($processId, $detailedActivityId) ;
        $tools = DAOProcess::getDetailedActivityTools($processId, $detailedActivityId) ;
    }
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
                    <td align="left" valign="top"><strong>Restrições</strong></td>
                    <td>&nbsp;</td>
                    <td><?php echo $restriction ?></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Pre-condição</strong></td>
                    <td>&nbsp;</td>
                    <td><?php echo $preCondition ?></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Pos-Condição</strong></td>
                    <td>&nbsp;</td>
                    <td><?php echo $posCondition ?></td>
                </tr>

<?php
    if ( isset($_REQUEST["processId"]) )
    {
?>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr class="azul12">
                    <td width="386" colspan="3"><strong>Tabelas Auxiliares</strong></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Ferramentas:</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($tools))
    {
?>
                        <div class="vermelho12">Não há ferramenta associada</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($tools); $inx++)
        {
            $tool = $tools[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_tool_view.php?toolId=<?php echo $tool->getToolId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, toolbar=no', false) ;"><strong><?php echo $tool->getName() ?></strong></a>
                        <br/>
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
                    <td align="left" valign="top"><strong>Artefatos de Entrada:</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($artifacts_in))
    {
?>
                        <div class="vermelho12">Não há artefato associado</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($artifacts_in); $inx++)
        {
            $artifact = $artifacts_in[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_artifact_view.php?artifactId=<?php echo $artifact->getArtifactId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, toolbar=no', false) ;"><strong><?php echo $artifact->getName() ?></strong></a>
                        <br/>
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
                    <td align="left" valign="top"><strong>Artefatos de Saída:</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($artifacts_out))
    {
?>
                        <div class="vermelho12">Não há artefato associado</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($artifacts_out); $inx++)
        {
            $artifact = $artifacts_out[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_artifact_view.php?artifactId=<?php echo $artifact->getArtifactId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, toolbar=no', false) ;"><strong><?php echo $artifact->getName() ?></strong></a>
                        <br/>
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
                    <td align="left" valign="top"><strong>Funções:</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($functions))
    {
?>
                        <div class="vermelho12">Não há função associada</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($functions); $inx++)
        {
            $function = $functions[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_function_view.php?functionId=<?php echo $function->getFunctionId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, functionbar=no', false) ;"><strong><?php echo $function->getName() ?></strong></a>
                        <br/>
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
                    <td align="left" valign="top"><strong>Métodos:</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($methods))
    {
?>
                        <div class="vermelho12">Não há método associado</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($methods); $inx++)
        {
            $method = $methods[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_method_view.php?methodId=<?php echo $method->getMethodId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, methodbar=no', false) ;"><strong><?php echo $method->getName() ?></strong></a>
                        <br/>
<?php
        }
    }
?>
                    </td>
                </tr>

<?php
    }
?>

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