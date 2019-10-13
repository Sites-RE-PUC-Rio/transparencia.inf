<!--
    Pagina que lista as verifica��es(tabelas auxiliares)
-->

<?php
    require_once "models/User.php" ;
    require_once "models/Aux_Verification.php" ;
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

    $userVerifications = DAOAuxiliaryTables::getUserVerifications($userId) ;

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
<body class="cinza12">
    <table width="100%" height="100%" cellspacing="0" cellpadding="0">
        <tr valign="middle">
            <td class="azul14">
                <table width="100%" height="100%" cellspacing="0" cellpadding="0">
                    <tr align="center">
                        <td>

<?php
    if (0 < count($userVerifications))
    {
        $elementsNotFound = false ;
?>
                            <table cellpadding="4" cellspacing="0" class="tableborder">
                            <?php
                                for ($inx = 0; $inx < count($userVerifications); $inx++)
                                {
                                    $elementsNotFound = false ;
                                    $verification = $userVerifications[$inx] ;
                                    ?>
                                        <tr bgcolor="#f5f5f5">
                                            <td width="250" nowrap align="left">&nbsp;<a class="linkNoDec12" href="aux_verification_view.php?verificationId=<?php echo $verification->getVerificationId() ?>"><strong><?php echo $verification->getName() ?></strong></a></td>
                                            <td width="20">&nbsp;</td>
                                            <td align="center"><a class="linkNoDec12" href="aux_verification_set.php?mode=update&verificationId=<?php echo $verification->getVerificationId() ?>">alterar</a></td>
                                            <td width="3">&nbsp;</td>
                                            <td align="center"><a class="linkNoDec12" href="aux_verification_delete.php?verificationId=<?php echo $verification->getVerificationId() ?>">excluir</a>&nbsp;</td>
                                        </tr>
                                    <?php
                                }
                            ?>
                            </table>
<?php
    }

    if ("all" == $list)
    {
        $othersVerifications = DAOAuxiliaryTables::getOthersVerifications($userId) ;
        if (0 < count($othersVerifications))
        {
            $elementsNotFound = false ;
    ?>
                            <br/><br/><br/>
                            <table cellpadding="4" cellspacing="0" class="tableborder">
                            <?php
                                for ($inx = 0; $inx < count($othersVerifications); $inx++)
                                {
                                    $verification = $othersVerifications[$inx] ;
                                    ?>
                                        <tr bgcolor="#f5f5f5">
                                            <td width="396" nowrap align="left">&nbsp;<a class="linkNoDec12" href="aux_verification_view.php?verificationId=<?php echo $verification->getVerificationId() ?>"><strong><?php echo $verification->getName() ?></strong></a>&nbsp;</td>
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
<div class="vermelho14"><strong>Ainda n�o existem verifica��es cadastradas</strong></div>
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