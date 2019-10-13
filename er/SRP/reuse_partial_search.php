<!--
    Ação p/ buscar os processo que atendem aos parametros da busca
-->
<?php

    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Process.php" ;
    require_once "models/Utils.php" ;

    $currentProcessId = $_REQUEST["processId"] ;

    $noSearch = true ;
    $processesMap = NULL ;
    $processes = NULL ;

    if (isset($_REQUEST["searchByAuthor"]))
    {
        $processesMap = DAOProcess::getProcessesMapByAuthor($_REQUEST["author"]) ;
        $noSearch = false ;
    }

    if (isset($_REQUEST["searchByName"]))
    {
        if ($noSearch)
        {
            $processesMap = DAOProcess::getProcessesMapByName($_REQUEST["name"]) ;
        }
        else
        {
            $processesMap = array_intersect_key($processesMap, DAOProcess::getProcessesMapByName($_REQUEST["name"])) ;
        }
        $noSearch = false ;
    }

    if (isset($_REQUEST["searchByActivity"]))
    {
        if ($noSearch)
        {
            $processesMap = Utils::getKArraysDistinctElements(DAOProcess::getProcessesMapByMacroActivity($_REQUEST["action"], $_REQUEST["object"]), DAOProcess::getProcessesMapByDetailedActivity($_REQUEST["action"], $_REQUEST["object"])) ; ;
        }
        else
        {
            $activities = Utils::getKArraysDistinctElements(DAOProcess::getProcessesMapByMacroActivity($_REQUEST["action"], $_REQUEST["object"]), DAOProcess::getProcessesMapByDetailedActivity($_REQUEST["action"], $_REQUEST["object"])) ;
            $processesMap = array_intersect_key($processesMap, $activities) ;
        }
    }


    if (NULL == $processesMap)
    {
        $processes = array() ;
    }
    else
    {
        ksort($processesMap) ;
        $processes = array_values($processesMap) ;
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
            margin-left:   10px;
            margin-top:    10px;
            margin-right:  10px;
            margin-bottom: 10px;
        }

        -->
    </style>
</head>

<body class="azul14">

<?php
    if (NULL != $processes)
    {
        for ($inxProc = 0; $inxProc < count($processes); $inxProc++)
        {
            $aProcess = $processes[$inxProc] ;

            if ( $currentProcessId == $aProcess->getProcessId() || Process::$NATURE["Usual"]!=$aProcess->getNature() )
            {
                continue ;
            }

            $macroActivities = $aProcess->getMacroActivities() ;
?>

<table width="100%" height="100%" cellpadding="0" cellspacing="0" class="tableborder">
    <tr valign="top">
        <td>&nbsp;</td>
        <td>
            <table cellpadding="0" cellspacing="0" border="0">

                <tr>
                    <td colspan="3"><br/></td>
                </tr>

                <tr>
                    <td colspan="3" align="left"><a href="Javascript:window.open('process_view.php?processId=<?php echo $aProcess->getProcessId() ?>');void(0)" class="linkNoDec"><?php echo $aProcess->getName() ?></a></td>
                </tr>
            <?php
                if (NULL != $macroActivities)
                {
                    $keysMacro = array_keys($macroActivities) ;
                    for ($inxMacro = 0; $inxMacro < count($keysMacro); $inxMacro++)
                    {
                        $aKeyMacro = $keysMacro[$inxMacro] ;
                        $aMacroActivity = $macroActivities[$aKeyMacro] ;
            ?>

                <tr>
                    <td colspan="3" height='15'></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td align="left">
                        <a href="reuse_partial_activity_macro_create.php?<?php echo 'processId='.$currentProcessId.'&amp;macroActivityId='.$aMacroActivity->getMacroActivityId()?>" target="reuse_partial_tree" class="linkNoDec">&lt;</a>
                        &nbsp;&nbsp;
                        <a href="Javascript:window.open('<?php echo $aMacroActivity->getMacroType() ?>_activity_macro_view.php?macroActivityId=<?php echo $aMacroActivity->getMacroActivityId() ?>&processId=<?php echo $currentProcessId ?>');void(0)" class="linkNoDec"><?php echo $aMacroActivity->getName() ?></a>
                    </td>
                </tr>

            <?php
                        $detailedActivities = $aMacroActivity->getDetailedActivities() ;
                        if (NULL != $detailedActivities)
                        {
                            $keysDetailed = array_keys($detailedActivities) ;
                            for ($inxDetailed = 0; $inxDetailed < count($keysDetailed); $inxDetailed++)
                            {
                                $aKeyDetailed = $keysDetailed[$inxDetailed] ;
                                $aDetailedActivity = $detailedActivities[$aKeyDetailed] ;
            ?>

                <tr>
                    <td width="15">&nbsp;</td>
                    <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="reuse_partial_activity_detailed_create.php?<?php echo 'processId='.$currentProcessId.'&amp;detailedActivityId='.$aDetailedActivity->getDetailedActivityId()?>" target="reuse_partial_tree" class="linkNoDec">&lt;</a>
                        &nbsp;&nbsp;
                        <a href="Javascript:window.open('<?php echo $aDetailedActivity->getDetailedType() ?>_activity_detailed_view.php?detailedActivityId=<?php echo $aDetailedActivity->getDetailedActivityId() ?>&processId=<?php echo $currentProcessId ?>');void(0)" class="linkNoDec"><?php echo $aDetailedActivity->getName() ?></a></td>
                </tr>

            <?php
                            }
                        }
                    }
                }
            ?>

            <tr>
                <td colspan="3"><br/></td>
            </tr>

            </table>
        </td>
    </tr>
</table>
<hr width="100%"/>
<?php
        }
    }
?>
</body>
</html>
