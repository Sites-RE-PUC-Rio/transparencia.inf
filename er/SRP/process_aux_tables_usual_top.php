<!--
    Pagina do topo (barra superior) c/ as tabelas auxiliares
-->
<?php

    $processId = $_REQUEST["processId"] ;

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
            <td align="center" valign="middle"><a target="process_aux_main" href="process_aux_artifact_set.php?processId=<?php echo $processId ?>" class="link">Artefatos</a></td>
            <td align="center" valign="middle"><a target="process_aux_main" href="process_aux_concept_set.php?processId=<?php echo $processId ?>" class="link">Conceitos</a></td>
            <td align="center" valign="middle"><a target="process_aux_main" href="process_aux_tool_set.php?processId=<?php echo $processId ?>" class="link">Ferramentas</a></td>
            <td align="center" valign="middle"><a target="process_aux_main" href="process_aux_form_set.php?processId=<?php echo $processId ?>" class="link">Formulários</a></td>
            <td align="center" valign="middle"><a target="process_aux_main" href="process_aux_function_set.php?processId=<?php echo $processId ?>" class="link">Funções</a></td>
            <td align="center" valign="middle"><a target="process_aux_main" href="process_aux_measurement_set.php?processId=<?php echo $processId ?>" class="link">Medições</a></td>
            <td align="center" valign="middle"><a target="process_aux_main" href="process_aux_method_set.php?processId=<?php echo $processId ?>" class="link">Métodos</a></td>
            <td align="center" valign="middle"><a target="process_aux_main" href="process_aux_politics_set.php?processId=<?php echo $processId ?>" class="link">Políticas</a></td>
            <td align="center" valign="middle"><a target="process_aux_main" href="process_aux_training_set.php?processId=<?php echo $processId ?>" class="link">Treinamentos</a></td>
            <td align="center" valign="middle"><a target="process_aux_main" href="process_aux_verification_set.php?processId=<?php echo $processId ?>" class="link">Verificações</a></td>
        </tr>
    </table>
</body>
</html>