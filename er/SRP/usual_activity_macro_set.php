<!--
    Pagina que permite a criação e ou alteração das atividades macro usuais
    dependendo do parametro mode
-->
<?php

    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/UsualMacroActivity.php" ;
    require_once "models/Utils.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;

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
        $url = "usual_activity_macro_update.php" ;

        $macroActivityId = $_REQUEST["macroActivityId"] ;
        $macroActivity = DAOProcess::getMacroActivity($macroActivityId) ;

        $action = $macroActivity->getAction() ;
        $object = $macroActivity->getObject() ;
        $action_synonymous = Utils::array2String($macroActivity->getActionSynonymous(), ", ") ;
        $object_synonymous = Utils::array2String($macroActivity->getObjectSynonymous(), ", ") ;
        $description = $macroActivity->getDescription() ;
        $restriction = $macroActivity->getRestriction() ;
        $preCondition = $macroActivity->getPreCondition() ;
        $posCondition = $macroActivity->getPosCondition() ;
    }
    else if ("create" == $mode)
    {
        $url = "usual_activity_macro_create.php" ;

        $macroActivityId = "" ;
        $action = "" ;
        $object = "" ;
        $action_synonymous = "" ;
        $object_synonymous = "" ;
        $description = "" ;
        $restriction = "" ;
        $preCondition = "" ;
        $posCondition = "" ;
    }
    else
    {
        $url = "" ;

        $macroActivityId = "" ;
        $action = "" ;
        $object = "" ;
        $action_synonymous = "" ;
        $object_synonymous = "" ;
        $description = "" ;
        $restriction = "" ;
        $preCondition = "" ;
        $posCondition = "" ;
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
    <script src="js/prototype.js"></script>
    <script src="js/utils.js"></script>

<form method="POST" action="<?php echo $url ?>" onsubmit="return canSubmit('action', 'object', 'description')"/>
    <input type='hidden' name='processId' value='<?php echo $processId ?>'/>
    <input type='hidden' name='macroActivityId' value='<?php echo $macroActivityId ?>'/>

    <table width="700" border="0" align="left" cellpadding="4" cellspacing="0">

        <tr class="azul14">
            <td width="386" colspan="2"><strong>Atividade Macro </strong><div id="error" style="display:none" class="vermelho12"><br/>Preencha abaixo os campos o brigatórios marcados em vermelho.</div></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>

        <tr valign="top" class="cinza12">
            <td colspan="2"><a href="#" class="link"></a>
                <table width="100%" border="0" cellspacing="0" cellpadding="1">
                    <tr>
                        <td width="29%" valign="top"><div align="left"><strong>Nome</strong></div></td>
                        <td width="2%">&nbsp;</td>
                        <td width="69%">
                            Ação:
                            <br/>
                            <input id="action" name="action" type="text" class="input" size="16" value="<?php echo $action ?>">
                            <br/>
                            Objeto:<br/>
                            <input id="object" name="object" type="text" class="input" size="16" value="<?php echo $object ?>"/>
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left" valign="top"><strong>Sinônimos<br/>(separados por vírgula)</strong></td>
                        <td>&nbsp;</td>
                        <td>
                            Ação:
                            <br/>
                            <TEXTAREA class="input" COLS=40 ROWS=5 NAME="action_synonymous"><?php echo $action_synonymous ?></TEXTAREA>
                            <br/>
                            Objeto:<br/>
                            <TEXTAREA class="input" COLS=40 ROWS=5 NAME="object_synonymous"><?php echo $object_synonymous ?></TEXTAREA>
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left" valign="top"><strong>Descrição</strong></td>
                        <td>&nbsp;</td>
                        <td><TEXTAREA id="description" class="input" COLS=40 ROWS=5 NAME="description"><?php echo $description ?></TEXTAREA></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left" valign="top"><strong>Restrições</strong></td>
                        <td>&nbsp;</td>
                        <td><TEXTAREA class="input" COLS=40 ROWS=5 NAME="restriction"><?php echo $restriction ?></TEXTAREA></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left" valign="top"><strong>Pre-condição</strong></td>
                        <td>&nbsp;</td>
                        <td><TEXTAREA class="input" COLS=40 ROWS=5 NAME="preCondition"><?php echo $preCondition ?></TEXTAREA></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left" valign="top"><strong>Pos-Condição</strong></td>
                        <td>&nbsp;</td>
                        <td><TEXTAREA class="input" COLS=40 ROWS=5 NAME="posCondition"><?php echo $posCondition ?></TEXTAREA></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;<br/><br/><br/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                            <input name="Submit" type="button" class="submit" value="Cancelar" onClick="javascript: self.location.href='process_activities_set.php?processId=<?php echo $processId ?>'"/>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="Submit" type="submit" class="submit" value="Gravar"/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
