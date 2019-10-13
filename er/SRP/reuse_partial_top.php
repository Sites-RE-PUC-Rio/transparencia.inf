<!--
    Pagina do topo (barra superior) c/ os parametros p/ busca
-->
<?php

    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Utils.php" ;

    $authors = DAOProcess::getProcessesAuthors() ;

    $processId = $_REQUEST["processId"] ;
    $processNames = DAOProcess::getOtherProcessesNames($processId) ;

    $macroActivitiesActions = DAOProcess::getMacroActivitiesActions() ;
    $detailedActivitiesActions = DAOProcess::getDetailedActivitiesActions() ;
    $actions = Utils::getArraysDistinctElements($macroActivitiesActions, $detailedActivitiesActions) ;

    $macroActivitiesObjects = DAOProcess::getMacroActivitiesObjects() ;
    $detailedActivitiesObjects = DAOProcess::getDetailedActivitiesObjects() ;
    $objects = Utils::getArraysDistinctElements($macroActivitiesObjects, $detailedActivitiesObjects) ;

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
<form method="post" action="reuse_partial_search.php" target="reuse_partial_search">
    <input type="hidden" name="processId" value="<?php echo $processId ?>"/>

    <table cellpading="0" cellspacing="0" width="100%" height="100%" class="tableborder">
        <tr>
            <td align="left" valign="middle" class="azul14">
                &nbsp;
                <input type="checkbox" class="checkbox" name="searchByAuthor" value="true"/>
                Autor:
                    <select name="author" class="input">
                        <?php
                            $authorKeys = array_keys($authors) ;
                            for ($inx = 0; $inx < count($authorKeys); $inx++)
                            {
                                $anAuthorKey = $authorKeys[$inx] ;
                                ?>
                                    <option value="<?php echo $authors[$anAuthorKey] ?>"><?php echo $authors[$anAuthorKey] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                &nbsp;
                <input type="checkbox" class="checkbox" name="searchByName" value="true"/>
                Processo:
                <select name="name" class="input">
                    <?php
                        $nameKeys = array_keys($processNames) ;
                        for ($inx = 0; $inx < count($nameKeys); $inx++)
                        {
                            $aNameKey = $nameKeys[$inx] ;
                            ?>
                                <option value="<?php echo $processNames[$aNameKey] ?>"><?php echo $processNames[$aNameKey] ?></option>
                            <?php
                        }
                    ?>
                </select>
                &nbsp;
                &nbsp;
                <input type="submit" class="submit" value="Buscar Processos"/>
                <input type="button" class="submit" value="Gravar" onClick="javascript:parent.location.href='process_activities_set.php?processId=<?php echo $processId ?>'"/>
            </td>
        </tr>
        <tr>
            <td align="left" valign="middle" class="azul14">
                &nbsp;
                <input type="checkbox" class="checkbox" name="searchByActivity" value="true"/>
                Atividade:
                <select name="action" class="input">
                    <?php
                        $actionKeys = array_keys($actions) ;
                        for ($inx = 0; $inx < count($actionKeys); $inx++)
                        {
                            $anActionKey = $actionKeys[$inx] ;
                            ?>
                                <option value="<?php echo $actions[$anActionKey] ?>"><?php echo $actions[$anActionKey] ?></option>
                            <?php
                        }
                    ?>
                </select>
                <select name="object" class="input">
                    <?php
                        $objectKeys = array_keys($objects) ;
                        for ($inx = 0; $inx < count($objectKeys); $inx++)
                        {
                            $anObjectKey = $objectKeys[$inx] ;
                            ?>
                                <option value="<?php echo $objects[$anObjectKey] ?>"><?php echo $objects[$anObjectKey] ?></option>
                            <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
    </table>
</form>
</body>
</html>