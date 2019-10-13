<!--
    Pagina que mostra a visão da central(xx_main)e da topo(xx_top)
-->
<?php

    $processId = $_REQUEST["processId"] ;
    $macroActivityId = $_REQUEST["macroActivityId"] ;

?>

<html>
    <head>
        <frameset scrolling="no" frameborder="0" rows="40, *">
            <frame noresize src="usual_activity_macro_aux_tables_top.php?processId=<?php echo $processId ?>&macroActivityId=<?php echo $macroActivityId ?>" name="usual_macro_aux_top"/>
            <frame noresize src="usual_activity_macro_aux_tables_main.php?processId=<?php echo $processId ?>&macroActivityId=<?php echo $macroActivityId ?>" name="usual_macro_aux_main"/>
        </frameset>
    </head>
</html>



