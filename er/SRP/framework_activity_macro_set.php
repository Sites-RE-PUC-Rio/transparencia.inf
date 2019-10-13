<!--
    Pagina que permite a criação e ou alteração das atividades macro do framework
    dependendo do parametro mode
-->
<?php

    require_once "models/Utils.php" ;
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/FrameworkMacroActivity.php" ;

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
        $url = "framework_activity_macro_update.php" ;

        $macroActivityId = $_REQUEST["macroActivityId"] ;
        $macroActivity = DAOProcess::getMacroActivity($macroActivityId) ;

        $action = $macroActivity->getAction() ;
        $object = $macroActivity->getObject() ;
        $action_synonymous = Utils::array2String($macroActivity->getActionSynonymous(), ", ") ;
        $object_synonymous = Utils::array2String($macroActivity->getObjectSynonymous(), ", ") ;
        $description = $macroActivity->getDescription() ;
        $type = $macroActivity->getType() ;
        $caracteristics = $macroActivity->getCaracteristics() ;
    }
    else if ("create" == $mode)
    {
        $url = "framework_activity_macro_create.php" ;

        $macroActivityId = "" ;
        $action = "" ;
        $object = "" ;
        $action_synonymous = "" ;
        $object_synonymous = "" ;
        $description = "" ;
        $type = "" ;
        $caracteristics = "" ;
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
        $type = "" ;
        $caracteristics = "" ;
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
    <input type='hidden' name='mode' value='<?php echo $mode ?>'/>

    <table width="700" border="0" align="left" cellpadding="4" cellspacing="0">

        <tr class="azul14">
            <td width="386" colspan="2"><strong>Atividade Macro</strong></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>

        <tr valign="top" class="cinza12">
            <td colspan="2"><a href="#" class="link"></a>
                <table width="100%" border="0" cellspacing="0" cellpadding="1">

                    <tr>
                        <td><div align="left"><strong>Tipo </strong></div></td>
                        <td>&nbsp;</td>
                        <td>
                            <?php
                                $keys = array_keys(FrameworkMacroActivity::$TYPE) ;
                                for ($inx = 0; $inx < count($keys); $inx++)
                                {
                                    $aKey = $keys[$inx] ;
                                    ?>
                                        <input type="radio" name="type" value="<?php echo FrameworkMacroActivity::$TYPE[$aKey] ?>" <?php echo ((0==$inx && "create"==$mode)||(FrameworkMacroActivity::$TYPE[$aKey]==$type && "update"==$mode))?"checked":"" ?>> <?php echo $aKey ?>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php
                                }
                            ?>
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
                            <input id="action" name="action" type="text" class="input" size="16" value="<?php echo $action ?>"/>
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
                        <td><div align="left"><strong>Caracteristicas</strong></div></td>
                        <td>&nbsp;</td>
                        <td>
                            <select name="caracteristics" class="input">
                                <?php
                                    $keys = array_keys(FrameworkMacroActivity::$CARACTERISTICS) ;
                                    for ($inx = 0; $inx < count($keys); $inx++)
                                    {
                                        $aKey = $keys[$inx] ;
                                        ?>
                                            <option value="<?php echo FrameworkMacroActivity::$CARACTERISTICS[$aKey] ?>" <?php echo (FrameworkMacroActivity::$CARACTERISTICS[$aKey]==$caracteristics)?"selected":"" ?>><?php echo $aKey ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </td>
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
