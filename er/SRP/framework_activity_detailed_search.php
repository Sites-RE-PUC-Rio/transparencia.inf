<!--
    Ação que busca atividades detalhadas semelhantes a atividade detalhada do framework
-->
<?php

    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Process.php" ;
    require_once "models/DetailedActivity.php" ;
    require_once "models/FrameworkDetailedActivityReference.php" ;

    $processId = $_REQUEST["processId"] ;
    $detailedActivityId = $_REQUEST["detailedActivityId"] ;

    $similarDetailedActivities = DAOProcess::getSimilarDetailedActivities($detailedActivityId) ;

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
        $detailedActivity = DAOProcess::getDetailedActivity($detailedActivityId) ;
        $associatedDetailedActivitiesReference = $detailedActivity->getDetailedActivityReferencesAssociated() ;
    }
    else if ("create" == $mode)
    {
        $associatedDetailedActivitiesReference = array() ;
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
    if (0 == count($similarDetailedActivities) && 0 == count($associatedDetailedActivitiesReference))
    {
?>

<body>
    <table width="100%" height="100%" cellspacing="0" cellpadding="0">
        <tr valign="middle">
            <td class="azul14">
                <table width="100%" height="100%" cellspacing="0" cellpadding="0">
                    <tr align="center">
                        <td>
                            <div class="vermelho14"><strong>Ainda não existem detailed atividades similares</strong></div>
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
    <form method="POST" action="framework_activity_detailed_usual_activity_create.php">
    <input type="hidden" name="mode" value="<?php echo $mode ?>"/>
    <input type="hidden" name="processId" value="<?php echo $processId ?>"/>
    <input type="hidden" name="detailedActivityId" value="<?php echo $detailedActivityId ?>"/>

    <table width="100%" height="100%" cellspacing="0" cellpadding="0">
        <tr valign="middle">
            <td class="azul14">
                <table width="100%" height="100%" cellspacing="0" cellpadding="0">
                    <tr align="center">
                        <td>
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr align="left">
                                    <td width="100%" class="cinza12">Detailed Atividades Similares:</td>
                                <tr/>
                                <tr align="left">
                                    <td width="100%" >
                                        <table cellpadding="4" cellspacing="0" class="tableborder">
                                        <?php
                                            $inx = 0 ;

                                            $associatedKeys = array_keys($associatedDetailedActivitiesReference) ;
                                            for ($inxAssociated = 0; $inxAssociated < count($associatedKeys); $inxAssociated++)
                                            {
                                                $aKeyAssociated = $associatedKeys[$inxAssociated] ;
                                                $anAssociatedDetailedActivityReference = $associatedDetailedActivitiesReference[$aKeyAssociated] ;
                                                $anAssociatedDetailedActivity = $anAssociatedDetailedActivityReference->getDetailedActivity() ;
                                                $similarity = $anAssociatedDetailedActivityReference->getSimilarity()
                                        ?>
                                            <tr bgcolor="#f5f5f5">
                                                <td nowrap align="left">
                                                    &nbsp;
                                                    <input type="checkbox" name="similarDetailedActivities[<?php echo $inx++ ?>]" value="<?php echo $anAssociatedDetailedActivity->getDetailedActivityId() ?>" checked>
                                                    <a class="linkNoDec12" href="#" onClick="javascript: window.open('<?php echo $anAssociatedDetailedActivity->getDetailedType() ?>_activity_detailed_view.php?detailedActivityId=<?php echo $anAssociatedDetailedActivity->getDetailedActivityId() ?>') ;">
                                                        <strong><?php echo $anAssociatedDetailedActivity->getName() ?></strong>
                                                    </a>
                                                </td>
                                                <td class="azul16">
                                                    &nbsp;
                                                    <strong>
                                                        <input type="radio" name="similarity_<?php echo $anAssociatedDetailedActivity->getDetailedActivityId() ?>" value="+" <?php echo "+"==$similarity?"checked":"" ?>>+&nbsp;
                                                        <input type="radio" name="similarity_<?php echo $anAssociatedDetailedActivity->getDetailedActivityId() ?>" value="=" <?php echo "="==$similarity?"checked":"" ?>>=&nbsp;
                                                        <input type="radio" name="similarity_<?php echo $anAssociatedDetailedActivity->getDetailedActivityId() ?>" value="-" <?php echo "-"==$similarity?"checked":"" ?>>-&nbsp;
                                                    </strong>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>

                                        <?php
                                            $similarKeys = array_keys($similarDetailedActivities) ;
                                            for ($inxSimilar = 0; $inxSimilar < count($similarKeys); $inxSimilar++)
                                            {
                                                $show = true ;

                                                $aKeySimilar = $similarKeys[$inxSimilar] ;
                                                $aSimilarDetailedActivity = $similarDetailedActivities[$aKeySimilar] ;

                                                $associatedKeys = array_keys($associatedDetailedActivitiesReference) ;
                                                for ($inxAssociated = 0; $inxAssociated < count($associatedKeys); $inxAssociated++)
                                                {
                                                    $aKeyAssociated = $associatedKeys[$inxAssociated] ;
                                                    $anAssociatedDetailedActivityReference = $associatedDetailedActivitiesReference[$aKeyAssociated] ;
                                                    $anAssociatedDetailedActivity = $anAssociatedDetailedActivityReference->getDetailedActivity() ;

                                                    if ($aSimilarDetailedActivity->getDetailedActivityId() == $anAssociatedDetailedActivity->getDetailedActivityId())
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
                                                    <input type="checkbox" name="similarDetailedActivities[<?php echo $inx++ ?>]" value="<?php echo $aSimilarDetailedActivity->getDetailedActivityId() ?>">
                                                    <a class="linkNoDec12" href="#" onClick="javascript: window.open('<?php echo $aSimilarDetailedActivity->getDetailedType() ?>_activity_detailed_view.php?detailedActivityId=<?php echo $aSimilarDetailedActivity->getDetailedActivityId() ?>') ;">
                                                        <strong><?php echo $aSimilarDetailedActivity->getName() ?></strong>
                                                    </a>
                                                </td>
                                                <td class="azul16">
                                                    &nbsp;
                                                    <strong>
                                                        <input type="radio" name="similarity_<?php echo $aSimilarDetailedActivity->getDetailedActivityId() ?>" value="+"        >+&nbsp;
                                                        <input type="radio" name="similarity_<?php echo $aSimilarDetailedActivity->getDetailedActivityId() ?>" value="=" checked>=&nbsp;
                                                        <input type="radio" name="similarity_<?php echo $aSimilarDetailedActivity->getDetailedActivityId() ?>" value="-"        >-&nbsp;
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