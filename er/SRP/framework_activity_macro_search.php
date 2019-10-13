<!--
    Ação que busca atividades macro semelhantes a atividade macro do framework
-->
<?php

    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Process.php" ;
    require_once "models/MacroActivity.php" ;
    require_once "models/FrameworkMacroActivityReference.php" ;

    $processId = $_REQUEST["processId"] ;
    $macroActivityId = $_REQUEST["macroActivityId"] ;

    $similarMacroActivities = DAOProcess::getSimilarMacroActivities($macroActivityId) ;

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
        $macroActivity = DAOProcess::getMacroActivity($macroActivityId) ;
        $associatedMacroActivitiesReference = $macroActivity->getMacroActivityReferencesAssociated() ;
    }
    else if ("create" == $mode)
    {
        $associatedMacroActivitiesReference = array() ;
    }

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
        self.location.href="process_activities_set.php?processId=<?php echo $processId ?>" ;
    }
    </script>
</head>

<?php
    if (0 == count($similarMacroActivities) && 0 == count($associatedMacroActivitiesReference))
    {
?>

<body>
    <table width="100%" height="100%" cellspacing="0" cellpadding="0">
        <tr valign="middle">
            <td class="azul14">
                <table width="100%" height="100%" cellspacing="0" cellpadding="0">
                    <tr align="center">
                        <td>
                            <div class="vermelho14"><strong>Ainda não existem macro atividades similares</strong></div>
                            <br/><br/>
                            <input name="Submit" type="submit" class="submit" value="Próximo" onClick="javascript: return go() ;"/>
                        </td>
                    </tr>
                </table>
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
    <form method="POST" action="framework_activity_macro_usual_activity_create.php">
    <input type="hidden" name="mode" value="<?php echo $mode ?>"/>
    <input type="hidden" name="processId" value="<?php echo $processId ?>"/>
    <input type="hidden" name="macroActivityId" value="<?php echo $macroActivityId ?>"/>
    
    <table width="100%" height="100%" cellspacing="0" cellpadding="0">
        <tr valign="middle">
            <td class="azul14">
                <table width="100%" height="100%" cellspacing="0" cellpadding="0">
                    <tr align="center">
                        <td>
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr align="left">
                                    <td width="100%" class="cinza12">Macro Atividades Similares:</td>
                                <tr/>
                                <tr align="left">
                                    <td width="100%" >
                                        <table cellpadding="4" cellspacing="0" class="tableborder">
                                        <?php
                                            $inx = 0 ;

                                            $associatedKeys = array_keys($associatedMacroActivitiesReference) ;
                                            for ($inxAssociated = 0; $inxAssociated < count($associatedKeys); $inxAssociated++)
                                            {
                                                $aKeyAssociated = $associatedKeys[$inxAssociated] ;
                                                $anAssociatedMacroActivityReference = $associatedMacroActivitiesReference[$aKeyAssociated] ;
                                                $anAssociatedMacroActivity = $anAssociatedMacroActivityReference->getMacroActivity() ;
                                                $similarity = $anAssociatedMacroActivityReference->getSimilarity()
                                        ?>
                                            <tr bgcolor="#f5f5f5">
                                                <td nowrap align="left">
                                                    &nbsp;
                                                    <input type="checkbox" name="similarMacroActivities[<?php echo $inx++ ?>]" value="<?php echo $anAssociatedMacroActivity->getMacroActivityId() ?>" checked>
                                                    <a class="linkNoDec12" href="#" onClick="javascript: window.open('<?php echo $anAssociatedMacroActivity->getMacroType() ?>_activity_macro_view.php?macroActivityId=<?php echo $anAssociatedMacroActivity->getMacroActivityId() ?>') ;">
                                                        <strong><?php echo $anAssociatedMacroActivity->getName() ?></strong>
                                                    </a>
                                                </td>
                                                <td class="azul16">
                                                    &nbsp;
                                                    <strong>
                                                        <input type="radio" name="similarity_<?php echo $anAssociatedMacroActivity->getMacroActivityId() ?>" value="+" <?php echo "+"==$similarity?"checked":"" ?>>+&nbsp;
                                                        <input type="radio" name="similarity_<?php echo $anAssociatedMacroActivity->getMacroActivityId() ?>" value="=" <?php echo "="==$similarity?"checked":"" ?>>=&nbsp;
                                                        <input type="radio" name="similarity_<?php echo $anAssociatedMacroActivity->getMacroActivityId() ?>" value="-" <?php echo "-"==$similarity?"checked":"" ?>>-&nbsp;
                                                    </strong>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>

                                        <?php
                                            $similarKeys = array_keys($similarMacroActivities) ;
                                            for ($inxSimilar = 0; $inxSimilar < count($similarKeys); $inxSimilar++)
                                            {
                                                $show = true ;

                                                $aKeySimilar = $similarKeys[$inxSimilar] ;
                                                $aSimilarMacroActivity = $similarMacroActivities[$aKeySimilar] ;

                                                $associatedKeys = array_keys($associatedMacroActivitiesReference) ;
                                                for ($inxAssociated = 0; $inxAssociated < count($associatedKeys); $inxAssociated++)
                                                {
                                                    $aKeyAssociated = $associatedKeys[$inxAssociated] ;
                                                    $anAssociatedMacroActivityReference = $associatedMacroActivitiesReference[$aKeyAssociated] ;
                                                    $anAssociatedMacroActivity = $anAssociatedMacroActivityReference->getMacroActivity() ;

                                                    if ($aSimilarMacroActivity->getMacroActivityId() == $anAssociatedMacroActivity->getMacroActivityId())
                                                    {
                                                        $show = false ;
                                                        break ;
                                                    }
                                                }

                                                if ($show)
                                                {
                                        ?>
                                            <tr bgcolor="#f5f5f5">
                                                <td nowrap align="left">
                                                    &nbsp;
                                                    <input type="checkbox" name="similarMacroActivities[<?php echo $inx++ ?>]" value="<?php echo $aSimilarMacroActivity->getMacroActivityId() ?>">
                                                    <a class="linkNoDec12" href="#" onClick="javascript: window.open('<?php echo $aSimilarMacroActivity->getMacroType() ?>_activity_macro_view.php?macroActivityId=<?php echo $aSimilarMacroActivity->getMacroActivityId() ?>') ;">
                                                        <strong><?php echo $aSimilarMacroActivity->getName() ?></strong>
                                                    </a>
                                                </td>
                                                <td class="azul16">
                                                    &nbsp;
                                                    <strong>
                                                        <input type="radio" name="similarity_<?php echo $aSimilarMacroActivity->getMacroActivityId() ?>" value="+"        >+&nbsp;
                                                        <input type="radio" name="similarity_<?php echo $aSimilarMacroActivity->getMacroActivityId() ?>" value="=" checked>=&nbsp;
                                                        <input type="radio" name="similarity_<?php echo $aSimilarMacroActivity->getMacroActivityId() ?>" value="-"        >-&nbsp;
                                                    </strong>
                                                </td>
                                            </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <br/><br/><input name="Submit" type="submit" class="submit" value="Gravar"/>
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