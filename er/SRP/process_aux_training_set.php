<!--
    Pagina utilizada para associar treinamentos(tabelas auxiliares) a um processo
-->

<?php
    require_once "models/User.php" ;
    require_once "models/Aux_Training.php" ;
    require_once "dal/dao/DAOProcess.php" ;

    $processId = $_REQUEST["processId"] ;

    $inputProcessTrainings = DAOProcess::getProcessTrainings($processId) ;
    $inputNonProcessTrainings = DAOProcess::getNonProcessTrainings($processId) ;
    $inputElementsNotFound = ( 0 == count($inputProcessTrainings) && 0 == count($inputNonProcessTrainings) ) ;

    $elementsNotFound = $inputElementsNotFound;
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
                        <td><div class="vermelho14"><strong>Ainda não existem treinamentos cadastrados</strong></div></td>
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
    <br/>
    <table width="100%" height="100%" cellspacing="0" cellpadding="0">
        <tr valign="middle">
            <td>
                <table width="100%" height="100%" cellspacing="0" cellpadding="0">
                    <tr align="center">
                        <td>

                            <table cellspacing="0" cellpadding="15" class="tableborder">
                                <tr align="left">
                                    <td width="100%" class="azul14"><strong>Treinamentos</strong></td>
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
                                                                    if (0 == count($inputNonProcessTrainings))
                                                                    {
                                                                ?>
                                                                    <tr bgcolor="#f5f5f5"><td width="100%" align="center" class="vermelho12">Não há treinamentos disponíveis</td></tr>
                                                                <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        for ($inx = 0; $inx < count($inputNonProcessTrainings); $inx++)
                                                                        {
                                                                            $training = $inputNonProcessTrainings[$inx] ;
                                                                            ?>
                                                                                <tr bgcolor="#f5f5f5">
                                                                                        <td width="150" nowrap align="left">&nbsp;<a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_training_view.php?trainingId=<?php echo $training->getTrainingId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, toolbar=no', false) ;"><strong><?php echo $training->getName() ?></strong></a></td>
                                                                                        <td width="20">&nbsp;</td>
                                                                                        <td align="center"><a class="linkNoDec12" href="process_aux_training_update.php?mode=associate&processId=<?php echo $processId ?>&trainingId=<?php echo $training->getTrainingId() ?>">&gt;&gt;&gt;</a></td>
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
                                                            <td width="100%" class="cinza12">Processo:</td>
                                                        <tr/>
                                                        <tr align="left">
                                                            <td width="100%" >
                                                                <table cellpadding="4" cellspacing="0" class="tableborder" width="250">
                                                                <?php
                                                                    if (0 == count($inputProcessTrainings))
                                                                    {
                                                                ?>
                                                                    <tr bgcolor="#f5f5f5"><td width="100%" align="center" class="vermelho12">Não há treinamentos disponíveis</td></tr>
                                                                <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        for ($inx = 0; $inx < count($inputProcessTrainings); $inx++)
                                                                        {
                                                                            $training = $inputProcessTrainings[$inx] ;
                                                                            ?>
                                                                                <tr bgcolor="#f5f5f5">
                                                                                        <td align="center"><a class="linkNoDec12" href="process_aux_training_update.php?mode=dissociate&processId=<?php echo $processId ?>&trainingId=<?php echo $training->getTrainingId() ?>">&lt;&lt;&lt;</a></td>
                                                                                        <td width="150" nowrap align="right">&nbsp;<a class="linkNoDec12" href="#"  onClick="javascript: window.open('aux_training_view.php?trainingId=<?php echo $training->getTrainingId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, toolbar=no', false) ;"><strong><?php echo $training->getName() ?></strong></a></td>
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
    <center><input name="Submit" type="submit" class="submit" value="Próximo" onClick="javascript: return go() ;"/></center>
</body>
</html>