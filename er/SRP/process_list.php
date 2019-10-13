<!--
    Ação que lista os processos
-->
<?php
    require_once "models/User.php" ;
    require_once "models/Process.php" ;
    require_once "dal/dao/DAOProcess.php" ;

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

    $userProcesses = DAOProcess::getUserProcesses($userId) ;

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
    if (0 < count($userProcesses))
    {
        $elementsNotFound = false ;
?>
                            <table width="396" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td align="left" class="azul12">&nbsp;<strong>Seus Processos:</strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" cellpadding="4" cellspacing="0" class="tableborder">
                                        <?php
                                            for ($inx = 0; $inx < count($userProcesses); $inx++)
                                            {
                                                $process = $userProcesses[$inx] ;
                                                ?>
                                                    <tr bgcolor="#f5f5f5">
                                                        <td width="250" nowrap align="left">&nbsp;<a class="linkNoDec12" href="process_activities_tree_view.php?processId=<?php echo $process->getProcessId() ?>"><strong><?php echo $process->getName() ?></strong></a></td>
                                                        <td align="right">
                                                            <a class="linkNoDec12" href="process_activities_set.php?processId=<?php echo $process->getProcessId() ?>">alterar</a>&nbsp;
                                                            &nbsp;
                                                            <a class="linkNoDec12" href="process_delete.php?processId=<?php echo $process->getProcessId() ?>">excluir</a>&nbsp;
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                        </table>
                                    </td>
                                </tr>
                            </table>
<?php
    }

    if ("all" == $list)
    {
        $othersProcesses = DAOProcess::getOthersProcesses($userId) ;
        if (0 < count($othersProcesses))
        {
            $elementsNotFound = false ;
?>
                            <br/><br/><br/>
                            <table width="396" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td align="left" class="azul12">&nbsp;<strong>Outros Processos:</strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" cellpadding="4" cellspacing="0" class="tableborder">
                                        <?php
                                            for ($inx = 0; $inx < count($othersProcesses); $inx++)
                                            {
                                                $process = $othersProcesses[$inx] ;
                                                ?>
                                                    <tr bgcolor="#f5f5f5">
                                                        <td nowrap align="left">&nbsp;<a class="linkNoDec12" href="process_activities_tree_view.php?processId=<?php echo $process->getProcessId() ?>"><strong><?php echo $process->getName() ?></strong></a>&nbsp;</td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                        </table>
                                    </td>
                                </tr>
                            </table>
<?php
        }
    }
    if ($elementsNotFound)
    {
?>
<div class="vermelho14"><strong>Ainda não existem processos cadastrados</strong></div>
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