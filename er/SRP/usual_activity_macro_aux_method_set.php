<!--
    Página utilizada para associar métodos(tabelas auxiliares) a uma macro atividade
-->

<?php
    require_once "models/User.php" ;
    require_once "models/Aux_Method.php" ;
    require_once "dal/dao/DAOProcess.php" ;

    $processId = $_REQUEST["processId"] ;
    $macroActivityId = $_REQUEST["macroActivityId"] ;

    $macroActivityMethods = DAOProcess::getMacroActivityMethods($processId, $macroActivityId) ;
    $nonMacroActivityMethods = DAOProcess::getNonMacroActivityMethods($processId, $macroActivityId) ;
    $elementsNotFound = ( 0 == count($macroActivityMethods) && 0 == count($nonMacroActivityMethods) ) ;
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="estilo.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
    <!--
    body {
        margin-left: 0px;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
    }
    -->
    </style>
    <script language="javascript">
    function go()
    {
        parent.location.href="process_activities_set.php?processId=<?php echo $processId ?>" ;
    }
    </script>
</head>
<body>

<?php

    if ($elementsNotFound)
    {
?>
    <table width="100%" height="100%" cellspacing="0" cellpadding="0">
        <tr valign="middle">
            <td class="azul14">
                <table width="100%" height="100%" cellspacing="0" cellpadding="0">
                    <tr align="center">
                        <td><div class="vermelho14"><strong>Ainda não existem métodos cadastrados</strong></div></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
<?php
    }
    else
    {
?>
    <table width="100%" height="100%" cellspacing="0" cellpadding="0">
        <tr valign="middle">
            <td>
                <table width="100%" height="100%" cellspacing="0" cellpadding="0">
                    <tr align="center">
                        <td>
                            <table cellspacing="0" cellpadding="15" class="tableborder">
                                <tr align="left">
                                    <td width="100%" class="azul14"><strong>Funções</strong></td>
                                <tr/>
                                <tr>
                                    <td>
                                        <table width="100%" height="100%" cellspacing="0" cellpadding="0">
                                            <tr align="center" valign="top">
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tr align="left">
                                                            <td width="100%" class="cinza12">Outros:</td>
                                                        <tr/>
                                                        <tr align="left">
                                                            <td width="100%">
                                                                <table cellpadding="4" cellspacing="0" class="tableborder" width="250" >
                                                                <?php
                                                                    if (0 == count($nonMacroActivityMethods))
                                                                    {
                                                                ?>
                                                                    <tr bgcolor="#f5f5f5"><td width="100%" align="center" class="vermelho12">Não há artefatos disponíveis</td></tr>
                                                                <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        for ($inx = 0; $inx < count($nonMacroActivityMethods); $inx++)
                                                                        {
                                                                            $method = $nonMacroActivityMethods[$inx] ;
                                                                            ?>
                                                                                <tr bgcolor="#f5f5f5">
                                                                                        <td width="150" nowrap align="left">&nbsp;<a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_method_view.php?methodId=<?php echo $method->getMethodId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, toolbar=no', false) ;"><strong><?php echo $method->getName() ?></strong></a></td>
                                                                                        <td width="20">&nbsp;</td>
                                                                                        <td align="center"><a class="linkNoDec12" href="usual_activity_macro_aux_method_update.php?mode=associate&type=input&processId=<?php echo $processId ?>&macroActivityId=<?php echo $macroActivityId ?>&methodId=<?php echo $method->getMethodId() ?>">&gt;&gt;&gt;</a></td>
                                                                                </tr>
                                                                            <?php
                                                                        }
                                                                    }
                                                                ?>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="50">
                                                </td>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tr align="left">
                                                            <td width="100%" class="cinza12">Macro Atividade:</td>
                                                        <tr/>
                                                        <tr align="left">
                                                            <td width="100%" >
                                                                <table cellpadding="4" cellspacing="0" class="tableborder" width="250">
                                                                <?php
                                                                    if (0 == count($macroActivityMethods))
                                                                    {
                                                                ?>
                                                                    <tr bgcolor="#f5f5f5"><td width="100%" align="center" class="vermelho12">Não há artefatos disponíveis</td></tr>
                                                                <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        for ($inx = 0; $inx < count($macroActivityMethods); $inx++)
                                                                        {
                                                                            $method = $macroActivityMethods[$inx] ;
                                                                            ?>
                                                                                <tr bgcolor="#f5f5f5">
                                                                                        <td align="center"><a class="linkNoDec12" href="usual_activity_macro_aux_method_update.php?mode=dissociate&type=input&processId=<?php echo $processId ?>&macroActivityId=<?php echo $macroActivityId ?>&methodId=<?php echo $method->getMethodId() ?>">&lt;&lt;&lt;</a></td>
                                                                                        <td width="150" nowrap align="right">&nbsp;<a class="linkNoDec12" href="#"  onClick="javascript: window.open('aux_method_view.php?methodId=<?php echo $method->getMethodId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, toolbar=no', false) ;"><strong><?php echo $method->getName() ?></strong></a></td>
                                                                                        <td width="20">&nbsp;</td>
                                                                                </tr>
                                                                            <?php
                                                                        }
                                                                    }
                                                                ?>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                       </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

<?php
    }
?>
    <center><input name="Submit" type="submit" class="submit" value="&nbsp;&nbsp;OK&nbsp;&nbsp;" onClick="javascript: return go() ;"/></center>
</body>
</html>