<!--
    Pagina que permite uma visualização da arvore de processo
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
        <td colspan="3" align="left"><a href="Javascript:window.open('process_view.php?processId=<?php echo $processId ?>');void(0)" class="linkNoDec"><?php echo $process->getName() ?></a></td>
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
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            &nbsp;&nbsp;<a href="Javascript:window.open('<?php echo $aMacroActivity->getMacroType() ?>_activity_macro_view.php?macroActivityId=<?php echo $aMacroActivity->getMacroActivityId() ?>&processId=<?php echo $processId ?>');void(0)" class="linkNoDec"><?php echo $aMacroActivity->getName() ?></a></td>
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
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            &nbsp;&nbsp;<a href="Javascript:window.open('<?php echo $aDetailedActivity->getDetailedType() ?>_activity_detailed_view.php?detailedActivityId=<?php echo $aDetailedActivity->getDetailedActivityId() ?>&processId=<?php echo $processId ?>');void(0)" class="linkNoDec"><?php echo $aDetailedActivity->getName() ?></a></td>
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