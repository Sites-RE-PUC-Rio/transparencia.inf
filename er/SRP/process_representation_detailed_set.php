<!--
    Pagina que permite a criação e ou alteração da representação das atividades detalhadas do processo
    dependendo do parametro mode
-->
<?php

    require_once "dal/dao/DAOFile.php" ;
    require_once "models/File.php" ;
    require_once "models/Process.php" ;

    $processId = $_REQUEST["processId"] ;
    $reference = Process::getDetailedRepresentationRerence($processId) ;

    if (isset($_REQUEST["mode"]))
    {
        $mode = $_REQUEST["mode"] ;
    }
    else
    {
        $mode = "" ;
    }

    $next_page = "process_aux_tables.php?processId=".$processId."&mode=".$mode ;
    if ("update" == $mode)
    {
        $file = DAOFile::getFile($reference) ;
        if (null == $file)
        {
            $description = "";
        }
        else
        {
            $description = $file->getDescription() ;
        }
    }
    else if ("create" == $mode)
    {
        $description = "";
    }
    else
    {
        $description = "";
    }


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <link href="estilo.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        <!--

        body {
            margin-left: 3;
            margin-top: 3px;
            margin-right: 7px;
            margin-bottom: 3px;
        }

        -->
    </style>
    <script language="javascript">
    function enableRepresentation(enable)
    {
        var representation = document.getElementsByName("representation")[0] ;
        representation.disabled = !enable ;

        return true ;
    }
    </script>
</head>

<body>
    <form enctype="multipart/form-data" action="process_representation_update.php" method="POST">

        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo 1048576 * ini_get('upload_max_filesize') ?>"/>
        <input type="hidden" name="reference" value="<?php echo $reference ?>"/>
        <input type="hidden" name="next_page" value="<?php echo $next_page ?>" />
        <input type="hidden" name="mode" value="<?php echo $mode ?>"/>

        <table width="700" border="0" align="left" cellpadding="4" cellspacing="0">

            <tr valign="top" class="cinza12">
                <td colspan="2"><a href="#" class="link"></a>
                    <table width="100%" border="0" cellspacing="0" cellpadding="1">
                        <tr class="azul13">
                            <td colspan="3"><strong>Caracter&iacute;sticas das Atividades Detalhadas</strong></td>
                        </tr>

                        <tr>
                            <td colspan="3">&nbsp;<br/><br/></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><strong>Descrição Fluxo de Controle</strong></td>
                            <td>&nbsp;</td>
                            <td><TEXTAREA class="input" COLS=40 ROWS=5 NAME="description"><?php echo $description ?></TEXTAREA></td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                    <?php
                        if ("update" == $mode && NULL != $file)
                        {
                    ?>
                        <tr>
                            <td align="left" valign="top"><strong>Representação Gráfica (<=<?php echo ini_get('upload_max_filesize') ?>)</strong></td>
                            <td>&nbsp;</td>
                            <td>
                                <a href='getFile.php?reference=<?php echo $file->getReference() ?>' class='link'><?php echo $file->getName() ?></a>
                                <br/><br/>
                                <input type='radio' name='action' value='keep'  onClick="javascript:return enableRepresentation(false);" checked/> Manter &nbsp;&nbsp;&nbsp;
                                <input type='radio' name='action' value='delete' onClick="javascript:return enableRepresentation(false);"/> Deletar &nbsp;&nbsp;&nbsp;
                                <br/><br/>
                                <input type='radio' name='action' value='overwrite' onClick="javascript:return enableRepresentation(true);"/> Substituir&nbsp;&nbsp;
                                <input name="representation" type="file" size="25" disabled="true"/>
                            </td>
                        </tr>
                    <?php
                        }
                        else if ("create" == $mode || ("update" == $mode && NULL == $file))
                        {
                    ?>
                        <tr>
                            <td><div align="left"><strong>Representação Gráfica (<=<?php echo ini_get('upload_max_filesize') ?>)</strong></div></td>
                            <td>&nbsp;</td>
                            <td>
                                <input type="hidden" name="action" value="create"/>
                                <input name="representation" type="file" size="40"/>
                            </td>

                        </tr>
                    <?php
                        }
                    ?>

                        <tr>
                            <td colspan="3">&nbsp;<br/><br/><br/><br/></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input name="Submit" type="submit" class="submit" value="Próximo"/></td>
                        </tr>
                            <td colspan="3">&nbsp;</td>
                    </table>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

