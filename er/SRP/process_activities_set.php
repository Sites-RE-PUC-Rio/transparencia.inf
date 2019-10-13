<!--
    Pagina c/o topo (barra superior) c/ as atividade macro e detalhadas e c/ a arovore das atividades do processo
    que permite a criação e alteração das atividades macro e detalhadas
-->
<?php

    $processId = $_REQUEST["processId"] ;

?>

<html>
    <head>
        <frameset scrolling="no" frameborder="0" rows="40, *">
            <frame noresize src="process_activities_top.php?processId=<?php echo $processId ?>" name="act_top"/>
            <frame noresize src="process_activities_tree_set.php?processId=<?php echo $processId ?>" name="act_main"/>
        </frameset>
    </head>
</html>