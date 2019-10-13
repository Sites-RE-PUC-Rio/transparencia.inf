<!--
    Pagina que permite a selecão das atividades para serem reutilizadas
-->
<?php
    $processId = $_REQUEST["processId"] ;
?>


<html>
    <head>
        <frameset scrolling="no" frameborder="0" rows="80, *">
            <frame noresize src="reuse_partial_top.php?processId=<?php echo $processId ?>" name="reuse_partial_top"/>
            <frameset scrolling="no" frameborder="0" cols="*, *">
                <frame noresize src="process_activities_tree_set.php?processId=<?php echo $processId ?>" name="reuse_partial_tree"/>
                <frame noresize src="" name="reuse_partial_search" scrolling="auto"/>
            </frameset>
        </frameset>
    </head>
</html>