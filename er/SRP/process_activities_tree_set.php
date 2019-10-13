<!--
    Pagina que permite alteração da arvore de processo
-->
<?php

    require_once "dal/dao/DAOProcess.php" ;

    require_once "models/Utils.php" ;
    require_once "models/Process.php" ;
    require_once "models/MacroActivity.php" ;
    require_once "models/DetailedActivity.php" ;

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
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="3" align="left"><a href="Javascript:window.open('process_view.php?processId=<?php echo $processId ?>');void(0)" class="linkNoDec"><?php echo $process->getName() ?></a>&nbsp;&nbsp;<a href="process_set.php?mode=update&processId=<?php echo $processId ?>" class="link" target="srp_main">alterar</a></td>
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
        <?php
            if (0 == $inxMacro)
            {
        ?>
            &nbsp;&nbsp;
        <?php
            }
            else
            {
                $aKeyMacro2 = $keysMacro[$inxMacro-1] ;
                $aMacroActivity2 = $macroActivities[$aKeyMacro2] ;
        ?>
            <a href="process_activities_tree_macros_priority_exchange.php?<?php echo 'processId='.$processId.'&amp;macroActivityId1='.$aMacroActivity->getMacroActivityId().'&amp;priority1='.$aMacroActivity->getPriority().'&amp;macroActivityId2='.$aMacroActivity2->getMacroActivityId().'&amp;priority2='.$aMacroActivity2->getPriority() ?>" class="linkNoDec">&#8710</a>
        <?php
            }
        ?>
        <?php
            if ((count($keysMacro)-1) == $inxMacro)
            {
        ?>
            &nbsp;&nbsp;
        <?php
            }
            else
            {
                $aKeyMacro2 = $keysMacro[$inxMacro+1] ;
                $aMacroActivity2 = $macroActivities[$aKeyMacro2] ;
        ?>
            <a href="process_activities_tree_macros_priority_exchange.php?<?php echo 'processId='.$processId.'&amp;macroActivityId1='.$aMacroActivity->getMacroActivityId().'&amp;priority1='.$aMacroActivity->getPriority().'&amp;macroActivityId2='.$aMacroActivity2->getMacroActivityId().'&amp;priority2='.$aMacroActivity2->getPriority() ?>" class="linkNoDec">&#8711</a>
        <?php
            }
        ?>
            &nbsp;&nbsp;<a href="Javascript:window.open('<?php echo $aMacroActivity->getMacroType() ?>_activity_macro_view.php?macroActivityId=<?php echo $aMacroActivity->getMacroActivityId() ?>&processId=<?php echo $processId ?>');void(0)" class="linkNoDec"><?php echo $aMacroActivity->getName() ?></a>&nbsp;&nbsp;<a href="<?php echo $aMacroActivity->getMacroType() ?>_activity_macro_set.php?mode=update&macroActivityId=<?php echo $aMacroActivity->getMacroActivityId() ?>&processId=<?php echo $processId ?>" class="link" target="srp_main">alterar</a>
            &nbsp;&nbsp;<a href="activity_macro_delete.php?<?php echo 'processId='.$processId.'&amp;macroActivityId='.$aMacroActivity->getMacroActivityId() ?>" class="link">excluir</a>
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
        <?php
            if (0 == $inxDetailed)
            {
        ?>
            &nbsp;&nbsp;
        <?php
            }
            else
            {
                $aKeyDetailed2 = $keysDetailed[$inxDetailed-1] ;
                $aDetailedActivity2 = $detailedActivities[$aKeyDetailed2] ;
        ?>
            <a href="process_activities_tree_detaileds_priority_exchange.php?<?php echo 'processId='.$processId.'&amp;detailedActivityId1='.$aDetailedActivity->getDetailedActivityId().'&amp;priority1='.$aDetailedActivity->getPriority().'&amp;detailedActivityId2='.$aDetailedActivity2->getDetailedActivityId().'&amp;priority2='.$aDetailedActivity2->getPriority() ?>" class="linkNoDec">&#8710</a>
        <?php
            }
        ?>
        <?php
            if ((count($keysDetailed)-1) == $inxDetailed)
            {
        ?>
            &nbsp;&nbsp;
        <?php
            }
            else
            {
                $aKeyDetailed2 = $keysDetailed[$inxDetailed+1] ;
                $aDetailedActivity2 = $detailedActivities[$aKeyDetailed2] ;
        ?>
            <a href="process_activities_tree_detaileds_priority_exchange.php?<?php echo 'processId='.$processId.'&amp;detailedActivityId1='.$aDetailedActivity->getDetailedActivityId().'&amp;priority1='.$aDetailedActivity->getPriority().'&amp;detailedActivityId2='.$aDetailedActivity2->getDetailedActivityId().'&amp;priority2='.$aDetailedActivity2->getPriority() ?>" class="linkNoDec">&#8711</a>
        <?php
            }
        ?>
            &nbsp;&nbsp;<a href="Javascript:window.open('<?php echo $aDetailedActivity->getDetailedType() ?>_activity_detailed_view.php?detailedActivityId=<?php echo $aDetailedActivity->getDetailedActivityId() ?>&processId=<?php echo $processId ?>');void(0)" class="linkNoDec"><?php echo $aDetailedActivity->getName() ?></a>&nbsp;&nbsp;<a href="<?php echo $aDetailedActivity->getDetailedType() ?>_activity_detailed_set.php?mode=update&detailedActivityId=<?php echo $aDetailedActivity->getDetailedActivityId() ?>&processId=<?php echo $processId ?>" class="link" target="srp_main">alterar</a>
            &nbsp;&nbsp;<a href="activity_detailed_delete.php?<?php echo 'processId='.$processId.'&amp;detailedActivityId='.$aDetailedActivity->getDetailedActivityId() ?>" class="link">excluir</a>
            </td>
    </tr>

<?php
                }
            }
        }
    }
?>
</table>
</body>
</html>