<!--
    Pagina c/ os frameworks que podem ser reutilizados
-->
<?php
    require_once "models/User.php" ;
    require_once "models/Process.php" ;
    require_once "dal/dao/DAOProcess.php" ;

    session_start() ;
    $user = $_SESSION["user"] ;
    $userId = $user->getUserId() ;

    $currentProcessId = $_REQUEST["processId"] ;

    $userProcesses = DAOProcess::getUserProcesses($userId) ;
    $othersProcesses = DAOProcess::getOthersProcesses($userId) ;

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
<form method="post" action="reuse_framework_activities_set.php">
    <input type="hidden" name="currentProcessId" value="<?php echo $currentProcessId ?>"/>
    <table width="100%" height="100%" cellspacing="0" cellpadding="0">
        <tr valign="middle">
            <td class="azul14">
                <table width="100%" height="100%" cellspacing="0" cellpadding="0">
                    <tr align="center">
                        <td>

                            <table width="396" cellpadding="4" cellspacing="0" class="tableborder">
<?php
        if (0 < count($userProcesses))
        {
?>
                            <?php
                                for ($inx = 0; $inx < count($userProcesses); $inx++)
                                {
                                    $process = $userProcesses[$inx] ;
                                    if (Process::$NATURE["Framework"] != $process->getNature())
                                    {
                                        continue ;
                                    }

                                    ?>
                                        <tr bgcolor="#f5f5f5">
                                            <td width="250" nowrap align="left">
                                                <input type="radio" name="parentProcessId" value="<?php echo $process->getProcessId() ?>" <?php echo ($elementsNotFound?"checked":"") ?>/>
                                                <a class="linkNoDec12" href="Javascript:window.open('process_activities_tree_view.php?processId=<?php echo $process->getProcessId() ?>');void(0)"><strong><?php echo $process->getName() ?></strong></a>
                                            </td>
                                            <td align="right">
                                                <a class="linkNoDec12" href="Javascript:window.open('process_activities_tree_view.php?processId=<?php echo $process->getProcessId() ?>');void(0)"><strong><?php echo $process->getAuthor() ?></strong></a>&nbsp;
                                            </td>
                                        </tr>
                                    <?php
                                    $elementsNotFound = false ;
                                }
                            ?>
<?php
        }

        if (0 < count($othersProcesses))
        {
?>
                            <?php
                                for ($inx = 0; $inx < count($othersProcesses); $inx++)
                                {
                                    $process = $othersProcesses[$inx] ;
                                    if (Process::$NATURE["Framework"] != $process->getNature())
                                    {
                                        continue ;
                                    }
                                    
                                    ?>
                                        <tr bgcolor="#f5f5f5">
                                            <td width="150" nowrap align="left">
                                                <input type="radio" name="parentProcessId" value="<?php echo $process->getProcessId() ?>" <?php echo ($elementsNotFound?"checked":"") ?>/>
                                                <a class="linkNoDec12" href="Javascript:window.open('process_activities_tree_view.php?processId=<?php echo $process->getProcessId() ?>');void(0)"><strong><?php echo $process->getName() ?></strong></a>
                                            </td>
                                            <td align="right">
                                                <a class="linkNoDec12" href="Javascript:window.open('process_activities_tree_view.php?processId=<?php echo $process->getProcessId() ?>');void(0)"><strong><?php echo $process->getAuthor() ?></strong></a>&nbsp;
                                            </td>
                                        </tr>
                                    <?php
                                    $elementsNotFound = false ;
                                }
                            ?>
<?php
        }
?>
                            </table>
                            <br/>

<?php
    if ( $elementsNotFound )
    {
?>
<div class="vermelho14"><strong>Ainda não existem processos cadastrados</strong></div>
<?php
    }
    else
    {
?>
                            <br/>
                            <input name="Submit" type="submit" class="submit" value="Reutilizar"/>
<?php
    }
?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</form>
</body>
</html>