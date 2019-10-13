<!--
    Pagina que mostra a visão da central(xx_main)e da topo(xx_top)
-->
<?php

    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Process.php" ;

    $processId = $_REQUEST["processId"] ;
    $process = DAOProcess::getProcess($processId) ;

?>

<html>
    <head>
        <frameset scrolling="no" frameborder="0" rows="40, *">
            <frame noresize src="process_aux_tables_<?php echo $process->getNature() ?>_top.php?processId=<?php echo $processId ?>" name="process_aux_top"/>
            <frame noresize src="process_aux_tables_main.php?processId=<?php echo $processId ?>" name="process_aux_main"/>
        </frameset>
    </head>
</html>