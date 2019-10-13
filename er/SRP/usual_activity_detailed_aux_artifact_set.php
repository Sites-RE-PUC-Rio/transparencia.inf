<!--
    Página utilizada para associar artefatos(tabelas auxiliares) a uma atividade detalhada
-->

<?php
    require_once "models/User.php" ;
    require_once "models/Aux_Artifact.php" ;
    require_once "dal/dao/DAOProcess.php" ;

    $processId = $_REQUEST["processId"] ;
    $detailedActivityId = $_REQUEST["detailedActivityId"] ;

    $inputDetailedActivityArtifacts = DAOProcess::getDetailedActivityArtifacts($processId, $detailedActivityId, 'input') ;
    $inputNonDetailedActivityArtifacts = DAOProcess::getNonDetailedActivityArtifacts($processId, $detailedActivityId, 'input') ;
    $inputElementsNotFound = ( 0 == count($inputDetailedActivityArtifacts) && 0 == count($inputNonDetailedActivityArtifacts) ) ;

    $outputDetailedActivityArtifacts = DAOProcess::getDetailedActivityArtifacts($processId, $detailedActivityId, 'output') ;
    $outputNonDetailedActivityArtifacts = DAOProcess::getNonDetailedActivityArtifacts($processId, $detailedActivityId, 'output') ;
    $outputElementsNotFound = ( 0 == count($outputDetailedActivityArtifacts) && 0 == count($outputNonDetailedActivityArtifacts) ) ;

    $elementsNotFound = $inputElementsNotFound && $outputElementsNotFound ;
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
                        <td><div class="vermelho14"><strong>Ainda não existem artefatos cadastrados</strong></div></td>
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
                                    <td width="100%" class="azul14"><strong>Artefatos de Entrada</strong></td>
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
                                                                    if (0 == count($inputNonDetailedActivityArtifacts))
                                                                    {
                                                                ?>
                                                                    <tr bgcolor="#f5f5f5"><td width="100%" align="center" class="vermelho12">Não há artefatos disponíveis</td></tr>
                                                                <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        for ($inx = 0; $inx < count($inputNonDetailedActivityArtifacts); $inx++)
                                                                        {
                                                                            $artifact = $inputNonDetailedActivityArtifacts[$inx] ;
                                                                            ?>
                                                                                <tr bgcolor="#f5f5f5">
                                                                                        <td width="150" nowrap align="left">&nbsp;<a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_artifact_view.php?artifactId=<?php echo $artifact->getArtifactId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, toolbar=no', false) ;"><strong><?php echo $artifact->getName() ?></strong></a></td>
                                                                                        <td width="20">&nbsp;</td>
                                                                                        <td align="center"><a class="linkNoDec12" href="usual_activity_detailed_aux_artifact_update.php?mode=associate&type=input&processId=<?php echo $processId ?>&detailedActivityId=<?php echo $detailedActivityId ?>&artifactId=<?php echo $artifact->getArtifactId() ?>">&gt;&gt;&gt;</a></td>
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
                                                            <td width="100%" class="cinza12">Atividade Detalhada:</td>
                                                        <tr/>
                                                        <tr align="left">
                                                            <td width="100%" >
                                                                <table cellpadding="4" cellspacing="0" class="tableborder" width="250">
                                                                <?php
                                                                    if (0 == count($inputDetailedActivityArtifacts))
                                                                    {
                                                                ?>
                                                                    <tr bgcolor="#f5f5f5"><td width="100%" align="center" class="vermelho12">Não há artefatos disponíveis</td></tr>
                                                                <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        for ($inx = 0; $inx < count($inputDetailedActivityArtifacts); $inx++)
                                                                        {
                                                                            $artifact = $inputDetailedActivityArtifacts[$inx] ;
                                                                            ?>
                                                                                <tr bgcolor="#f5f5f5">
                                                                                        <td align="center"><a class="linkNoDec12" href="usual_activity_detailed_aux_artifact_update.php?mode=dissociate&type=input&processId=<?php echo $processId ?>&detailedActivityId=<?php echo $detailedActivityId ?>&artifactId=<?php echo $artifact->getArtifactId() ?>">&lt;&lt;&lt;</a></td>
                                                                                        <td width="150" nowrap align="right">&nbsp;<a class="linkNoDec12" href="#"  onClick="javascript: window.open('aux_artifact_view.php?artifactId=<?php echo $artifact->getArtifactId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, toolbar=no', false) ;"><strong><?php echo $artifact->getName() ?></strong></a></td>
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

                            <br/><br/>
                            <table cellspacing="0" cellpadding="15" class="tableborder">
                                <tr align="left">
                                    <td width="100%" class="azul14"><strong>Artefatos de Saída</strong></td>
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
                                                                    if (0 == count($outputNonDetailedActivityArtifacts))
                                                                    {
                                                                ?>
                                                                    <tr bgcolor="#f5f5f5"><td width="100%" align="center" class="vermelho12">Não há artefatos disponíveis</td></tr>
                                                                <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        for ($inx = 0; $inx < count($outputNonDetailedActivityArtifacts); $inx++)
                                                                        {
                                                                            $artifact = $outputNonDetailedActivityArtifacts[$inx] ;
                                                                            ?>
                                                                                <tr bgcolor="#f5f5f5">
                                                                                        <td width="150" nowrap align="left">&nbsp;<a class="linkNoDec12" href="#"  onClick="javascript: window.open('aux_artifact_view.php?artifactId=<?php echo $artifact->getArtifactId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, toolbar=no', false) ;"><strong><?php echo $artifact->getName() ?></strong></a></td>
                                                                                        <td width="20">&nbsp;</td>
                                                                                        <td align="center"><a class="linkNoDec12" href="usual_activity_detailed_aux_artifact_update.php?mode=associate&type=output&processId=<?php echo $processId ?>&detailedActivityId=<?php echo $detailedActivityId ?>&artifactId=<?php echo $artifact->getArtifactId() ?>">&gt;&gt;&gt;</a></td>
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
                                                            <td width="100%" class="cinza12">Atividade Detalhada:</td>
                                                        <tr/>
                                                        <tr align="left">
                                                            <td width="100%" >
                                                                <table cellpadding="4" cellspacing="0" class="tableborder" width="250">
                                                                <?php
                                                                    if (0 == count($outputDetailedActivityArtifacts))
                                                                    {
                                                                ?>
                                                                    <tr bgcolor="#f5f5f5"><td width="100%" align="center" class="vermelho12">Não há artefatos disponíveis</td></tr>
                                                                <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        for ($inx = 0; $inx < count($outputDetailedActivityArtifacts); $inx++)
                                                                        {
                                                                            $artifact = $outputDetailedActivityArtifacts[$inx] ;
                                                                            ?>
                                                                                <tr bgcolor="#f5f5f5">
                                                                                        <td align="center"><a class="linkNoDec12" href="usual_activity_detailed_aux_artifact_update.php?mode=dissociate&type=output&processId=<?php echo $processId ?>&detailedActivityId=<?php echo $detailedActivityId ?>&artifactId=<?php echo $artifact->getArtifactId() ?>">&lt;&lt;&lt;</a></td>
                                                                                        <td width="150" nowrap align="right">&nbsp;<a class="linkNoDec12" href="#"  onClick="javascript: window.open('aux_artifact_view.php?artifactId=<?php echo $artifact->getArtifactId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, toolbar=no', false) ;"><strong><?php echo $artifact->getName() ?></strong></a></td>
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