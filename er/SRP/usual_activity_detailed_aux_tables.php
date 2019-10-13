<!--
    Pagina do topo (barra superior) c/ as tabelas auxiliares
-->
<?php

    $processId = $_REQUEST["processId"] ;
    $detailedActivityId = $_REQUEST["detailedActivityId"] ;

?>

<html>
    <head>
        <frameset scrolling="no" frameborder="0" rows="40, *">
            <frame noresize src="usual_activity_detailed_aux_tables_top.php?processId=<?php echo $processId ?>&detailedActivityId=<?php echo $detailedActivityId ?>" name="usual_detailed_aux_top"/>
            <frame noresize src="usual_activity_detailed_aux_tables_main.php?processId=<?php echo $processId ?>&detailedActivityId=<?php echo $detailedActivityId ?>" name="usual_detailed_aux_main"/>
        </frameset>
    </head>
</html>