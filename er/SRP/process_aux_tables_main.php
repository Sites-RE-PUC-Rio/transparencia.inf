<!--
    Pagina central
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
        margin-left: 0px;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
    }
    -->
    </style>
    <script language="javascript">
    function go()
    {
        parent.location.href="process_activities_set.php?processId=<?php echo $processId ?>" ;
    }
    </script>
</head>
<body>
    <table width="100%" height="100%" cellspacing="0" cellpadding="0">
        <tr valign="middle">
            <td align="center">
                <table width="450" border="0" cellpading="0" cellspacing="0" align="center">
                    <tr>
                        <td class="cinza14" align="left">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Atraves dos links acima voc� podera relacionar elementos das tabelas auxiliares ao processo. Quando tiver terminado aperte no bot�o PR�XIMO para seguir � etapa de cadastro de atividades.
                        </td>
                    </tr>
                </table>
                <br/><br/><br/><br/>
                <input name="Submit" type="submit" class="submit" value="Pr�ximo" onClick="javascript: return go() ;"/>
            </td>
        </tr>
    </table>
</body>
</html>