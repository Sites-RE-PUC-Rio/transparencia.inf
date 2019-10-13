
<?php

    require_once "dal/dao/DAOProcess.php" ;

    require_once "models/Utils.php" ;
    require_once "models/Process.php" ;
    require_once "models/MacroActivity.php" ;

    $processId = Utils::getValue($_REQUEST, "processId") ;
    $process = DAOProcess::getProcess($processId) ;
    if (NULL != $process)
    {
        $macroActivities = $process->getMacroActivities() ;
    }
    else
    {
        $macroActivities = NULL ;
    }

    $macroActivityId="";

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
    <script language="javascript">
    function go()
    {
        self.location.href="process_activities_set.php?processId=<?php echo $processId ?>" ;
    }
    </script>
</head>

<?php
    if ( NULL == $macroActivities || 0 == count($macroActivities) )
    {
?>

<body>
    <table width="100%" height="100%" cellspacing="0" cellpadding="0">
        <tr valign="middle">
            <td align="center">
                <table width="450" border="0" cellpading="0" cellspacing="0" align="center">
                    <tr>
                        <td class="cinza14" align="left">
                            <br/><br/><br/><br/><br/><br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Você tem que cadastrar pelo menos uma atividade macro antes que possa cadastrar uma detalhada.
                        </td>
                    </tr>
                </table>
                <br/><br/><br/><br/>
                <input name="Submit" type="submit" class="submit" value="&nbsp;&nbsp;VOLTAR&nbsp;&nbsp;" onClick="javascript: return go() ;"/>
            </td>
        </tr>
    </table>
</body>

<?php
    }
    else
    {
?>

<body>
<form method="POST" action="usual_activity_detailed_create.php"/>
<input type='hidden' name='processId' value='<?php echo $processId ?>'/>
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
                        <select name="macroActivityId" class="input">
                            <?php
                                $keys = array_keys($macroActivities) ;
                                for ($inx = 0; $inx < count($keys); $inx++)
                                {
                                    $aKey = $keys[$inx] ;
                                    $aMacroActivity = $macroActivities[$aKey] ;
                                    $aValue = $aMacroActivity->getMacroActivityId() ;
                                    ?>
                                        <option value="<?php echo $aValue ?>" <?php echo (($aValue==$macroActivityId)?"selected":"") ?>><?php echo $aMacroActivity->getName() ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td width="29%" valign="top"><div align="left"><strong>Nome</strong></div></td>
                    <td width="2%">&nbsp;</td>
                    <td width="69%">
                        Ação:
                        <br/>
                        <input name="action" type="text" class="input" size="16"/>
                        <br/>
                        Objeto:<br/>
                        <input name="object" type="text" class="input" size="16"/>
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
                        <TEXTAREA class="input" COLS=40 ROWS=5 NAME="action_synonymous"></TEXTAREA>
                        <br/>
                        Objeto:<br/>
                        <TEXTAREA class="input" COLS=40 ROWS=5 NAME="object_synonymous"></TEXTAREA>
                        <br/>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Descrição</strong></td>
                    <td>&nbsp;</td>
                    <td><TEXTAREA class="input" COLS=40 ROWS=5 NAME="description"></TEXTAREA></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Restrições</strong></td>
                    <td>&nbsp;</td>
                    <td><TEXTAREA class="input" COLS=40 ROWS=5 NAME="restriction"></TEXTAREA></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Pre-condição</strong></td>
                    <td>&nbsp;</td>
                    <td><TEXTAREA class="input" COLS=40 ROWS=5 NAME="preCondition"></TEXTAREA></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Pos-Condição</strong></td>
                    <td>&nbsp;</td>
                    <td><TEXTAREA class="input" COLS=40 ROWS=5 NAME="posCondition"></TEXTAREA></td>
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

<?php
    }
?>

</html>
