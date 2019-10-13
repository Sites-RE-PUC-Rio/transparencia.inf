<!--
    Pagina do topo (barra superior) c/ as tabelas auxiliares
-->
<?php
    $processId = $_REQUEST["processId"] ;
    $detailedActivityId = $_REQUEST["detailedActivityId"] ;
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="estilo.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
    <!--
    body {
        margin-left: 4px;
        margin-top: 3px;
        margin-right: 7px;
        margin-bottom: 3px;
    }
    -->
    </style>
</head>
<body>
    <table cellpading="0" cellspacing="0" width="100%" height="100%" class="tableborder">
        <tr>
            <td align="center" valign="middle"><a target="usual_detailed_aux_main" href="usual_activity_detailed_aux_tool_set.php?processId=<?php echo $processId ?>&detailedActivityId=<?php echo $detailedActivityId ?>" class="link">Ferramentas</a></td>
            <td align="center" valign="middle"><a target="usual_detailed_aux_main" href="usual_activity_detailed_aux_artifact_set.php?processId=<?php echo $processId ?>&detailedActivityId=<?php echo $detailedActivityId ?>" class="link">Artefatos</a></td>
            <td align="center" valign="middle"><a target="usual_detailed_aux_main" href="usual_activity_detailed_aux_function_set.php?processId=<?php echo $processId ?>&detailedActivityId=<?php echo $detailedActivityId ?>" class="link">Funções</a></td>
            <td align="center" valign="middle"><a target="usual_detailed_aux_main" href="usual_activity_detailed_aux_method_set.php?processId=<?php echo $processId ?>&detailedActivityId=<?php echo $detailedActivityId ?>" class="link">Métodos</a></td>
        </tr>
    </table>
</body>
</html>