<!--
    Pagina que lista os artefatos(tabelas auxiliares)
-->

<?php
    require_once "models/User.php" ;
    require_once "models/Aux_Artifact.php" ;
    require_once "dal/dao/DAOAuxiliaryTables.php" ;

    session_start() ;
    $user = $_SESSION["user"] ;
    $userId = $user->getUserId() ;

    if (isset($_REQUEST["list"]))
    {
        $list = $_REQUEST["list"] ;
    }
    else
    {
        $list = "all" ;
    }

    $userArtifacts = DAOAuxiliaryTables::getUserArtifacts($userId) ;

    $elementsNotFound = true ;
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
</head>
<body>
    <table width="100%" height="100%" cellspacing="0" cellpadding="0">
        <tr valign="middle">
            <td class="azul14">
                <table width="100%" height="100%" cellspacing="0" cellpadding="0">
                    <tr align="center">
                        <td>

<?php
    if (0 < count($userArtifacts))
    {
        $elementsNotFound = false ;
?>
                            <table cellpadding="4" cellspacing="0" class="tableborder">
                            <?php
                                for ($inx = 0; $inx < count($userArtifacts); $inx++)
                                {
                                    $artifact = $userArtifacts[$inx] ;
                                    ?>
                                        <tr bgcolor="#f5f5f5">
                                            <td width="250" nowrap align="left">&nbsp;<a class="linkNoDec12" href="aux_artifact_view.php?artifactId=<?php echo $artifact->getArtifactId() ?>"><strong><?php echo $artifact->getName() ?></strong></a></td>
                                            <td width="20">&nbsp;</td>
                                            <td align="center"><a class="linkNoDec12" href="aux_artifact_set.php?mode=update&artifactId=<?php echo $artifact->getArtifactId() ?>">alterar</a></td>
                                            <td width="3">&nbsp;</td>
                                            <td align="center"><a class="linkNoDec12" href="aux_artifact_delete.php?artifactId=<?php echo $artifact->getArtifactId() ?>">excluir</a>&nbsp;</td>
                                        </tr>
                                    <?php
                                }
                            ?>
                            </table>
<?php
    }

    if ("all" == $list)
    {
        $othersArtifacts = DAOAuxiliaryTables::getOthersArtifacts($userId) ;
        if (0 < count($othersArtifacts))
        {
            $elementsNotFound = false ;
    ?>
                            <br/><br/><br/>
                            <table cellpadding="4" cellspacing="0" class="tableborder">
                            <?php
                                for ($inx = 0; $inx < count($othersArtifacts); $inx++)
                                {
                                    $artifact = $othersArtifacts[$inx] ;
                                    ?>
                                        <tr bgcolor="#f5f5f5">
                                            <td width="396" nowrap align="left">&nbsp;<a class="linkNoDec12" href="aux_artifact_view.php?artifactId=<?php echo $artifact->getArtifactId() ?>"><strong><?php echo $artifact->getName() ?></strong></a>&nbsp;</td>
                                        </tr>
                                    <?php
                                }
                            ?>
                            </table>
    <?php
        }
    }
    if ($elementsNotFound)
    {
?>
<div class="vermelho14"><strong>Ainda não existem artefatos cadastrados</strong></div>
<?php
    }
?>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>