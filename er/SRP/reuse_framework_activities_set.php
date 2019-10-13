<!--
    Pagina que permite a selecão das atividades para ser reutilizadas
-->
<?php

    require_once "dal/dao/DAOProcess.php" ;

    require_once "models/Utils.php" ;
    require_once "models/Process.php" ;
    require_once "models/MacroActivity.php" ;
    require_once "models/FrameworkMacroActivity.php" ;
    require_once "models/DetailedActivity.php" ;
    require_once "models/FrameworkDetailedActivity.php" ;

    $frameworkProcessId = Utils::getValue($_REQUEST, "parentProcessId") ;
    $frameworkProcess = DAOProcess::getProcess($frameworkProcessId) ;
    if (NULL != $frameworkProcess)
    {
        $macroActivities = $frameworkProcess->getMacroActivities() ;
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
<form method="post" action="reuse_framework_activities_create.php">
    <input type="hidden" name="parentProcessId" value="<?php echo $frameworkProcessId ?>"/>
    <input type="hidden" name="currentProcessId" value="<?php echo $_REQUEST['currentProcessId'] ?>"/>

    <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="3" align="left"><a href="Javascript:window.open('reuse_framework_actvity_macro_view.php?processId=<?php echo $frameworkProcessId ?>');void(0)" class="link"><?php echo $frameworkProcess->getName() ?></a></td>
        </tr>
    <?php
        if (NULL != $macroActivities)
        {
            $keysMacro = array_keys($macroActivities) ;
            for ($inxMacro = 0; $inxMacro < count($keysMacro); $inxMacro++)
            {
                $aKeyMacro = $keysMacro[$inxMacro] ;
                $aMacroActivity = $macroActivities[$aKeyMacro] ;
                $macroAssociateds = $aMacroActivity->getMacroActivityReferencesAssociated() ;
    ?>

        <tr>
            <td colspan="3" height='15'></td>
        </tr>
        <tr valign="middle">
            <td>&nbsp;</td>
            <td align="left">
                &nbsp;&nbsp;
                &nbsp;&nbsp;
                &nbsp;&nbsp;<a href="Javascript:window.open('reuse_framework_actvity_detailed_view.php?macroActivityId=<?php echo $aMacroActivity->getMacroActivityId() ?>');void(0)" class="link"><?php echo $aMacroActivity->getName() ?></a>
                &nbsp;
                <select name="frameworkMacroActivity_<?php echo $aMacroActivity->getMacroActivityId() ?>" class="input">
                    <?php
                        $macroKeys = array_keys($macroAssociateds) ;
                        for ($inx = 0; $inx < count($macroKeys); $inx++)
                        {
                            $aMacroKey = $macroKeys[$inx] ;
                            $aMacroAssociated = $macroAssociateds[$aMacroKey]->getMacroActivity() ;
                            ?>
                                <option value="<?php echo $aMacroAssociated->getMacroActivityId() ?>"><?php echo $aMacroAssociated->getName() ?></option>
                            <?php
                        }
                    ?>
                </select>
                <?php
                    if (FrameworkMacroActivity::$TYPE["Ponto de Flexibilização"] == $aMacroActivity->getType())
                    {
                    ?>
                        <input class="input" type="checkbox" name="useFrameworkMacroActivity_<?php echo $aMacroActivity->getMacroActivityId() ?>" value="true"/>
                    <?php
                    }
                ?>
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
                        $detailedAssociateds = $aDetailedActivity->getDetailedActivityReferencesAssociated() ;
    ?>

        <tr valign="middle">
            <td width="15">&nbsp;</td>
            <td align="left" class="azul">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;
                &nbsp;&nbsp;
                &nbsp;&nbsp;<?php echo $aDetailedActivity->getName() ?>
                &nbsp;
                <select name="frameworkDetailedActivity_<?php echo $aDetailedActivity->getDetailedActivityId() ?>" class="input">
                    <?php
                        $detailedKeys = array_keys($detailedAssociateds) ;
                        for ($inx = 0; $inx < count($detailedKeys); $inx++)
                        {
                            $aDetailedKey = $detailedKeys[$inx] ;
                            $aDetailedAssociated = $detailedAssociateds[$aDetailedKey]->getDetailedActivity() ;
                            ?>
                                <option value="<?php echo $aDetailedAssociated->getDetailedActivityId() ?>"><?php echo $aDetailedAssociated->getName() ?></option>
                            <?php
                        }
                    ?>
                </select>
                <?php
                    if (FrameworkDetailedActivity::$TYPE["Ponto de Flexibilização"] == $aDetailedActivity->getType())
                    {
                    ?>
                        <input class="input" type="checkbox" name="useFrameworkDetailedActivity_<?php echo $aDetailedActivity->getDetailedActivityId() ?>" value="true"/>
                    <?php
                    }
                ?>
            </td>
        </tr>

    <?php
                    }
                }
            }
        }
    ?>
    </table>
    <br/><br/><br/>
    <center>
        <input name="Submit" type="submit" class="submit" value="Gravar"/>
    </center>
</form>
</body>
</html>