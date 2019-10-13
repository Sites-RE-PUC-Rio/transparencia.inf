<!--
    Pagina que permite a criação e ou alteração do processo
    dependendo do parametro mode
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "models/Process.php" ;

    if (isset($_REQUEST["mode"]))
    {
        $mode = $_REQUEST["mode"] ;
    }
    else
    {
        $mode = "" ;
    }

    if ("update" == $mode)
    {
        $title = "Alterar" ;
        $url = "process_update.php" ;

        $processId = $_REQUEST["processId"] ;
        $process = DAOProcess::getProcess($processId) ;

        $name = $process->getName() ;
        $author = $process->getAuthor() ;
        $nature = $process->getNature() ;
        $classification = $process->getClassification() ;
        $conformity = $process->getConformity() ;
        $objective = $process->getObjective() ;
        $description = $process->getDescription() ;
        $preCondition = $process->getPreCondition() ;
        $posCondition = $process->getPosCondition() ;
        $keyWords = $process->getKeyWords() ;
        $requiredKnowledge = $process->getRequiredKnowledge() ;
        $organizationSize = $process->getOrganizationSize() ;
        $projectDuration = $process->getProjectDuration() ;
        $teamLocation = $process->getTeamLocation() ;
        $area = $process->getArea() ;
        $lifeCicle = $process->getLifeCicle() ;
        $systemType = $process->getSystemType() ;
        $teamSize = $process->getTeamSize() ;
    }
    else if ("create" == $mode)
    {
        $title = "Cadastrar" ;
        $url = "process_create.php" ;

        $processId = "" ;
        $name = "" ;
        $author = "" ;
        $nature = "" ;
        $classification = "" ;
        $conformity = "" ;
        $objective = "" ;
        $description = "" ;
        $preCondition = "" ;
        $posCondition = "" ;
        $keyWords = "" ;
        $requiredKnowledge = "" ;
        $organizationSize = "" ;
        $projectDuration = "" ;
        $teamLocation = "" ;
        $area = "" ;
        $lifeCicle = "" ;
        $systemType = "" ;
        $teamSize = "" ;
    }
    else
    {
        $title = "Modo inválido" ;
        $url = "" ;

        $processId = "" ;
        $name = "" ;
        $author = "" ;
        $nature = "" ;
        $classification = "" ;
        $conformity = "" ;
        $objective = "" ;
        $description = "" ;
        $preCondition = "" ;
        $posCondition = "" ;
        $keyWords = "" ;
        $requiredKnowledge = "" ;
        $organizationSize = "" ;
        $projectDuration = "" ;
        $teamLocation = "" ;
        $area = "" ;
        $lifeCicle = "" ;
        $systemType = "" ;
        $teamSize = "" ;
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <link href="estilo.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        <!--
        body {
            margin-left: 10px;
            margin-top: 10px;
            margin-right: 0px;
            margin-bottom: 0px;
        }
        -->
    </style>
</head>

<body>
    <script src="js/prototype.js"></script>
    <script src="js/utils.js"></script>

    <form name="form" method="POST" action="<?php echo $url ?>" onsubmit="return canSubmit('name', 'author', 'objective', 'description')">
        <input type="hidden" name="processId" value="<?php echo $processId ?>"/>
        <input type="hidden" name="mode" value="<?php echo $mode ?>"/>

        <table width="700" border="0" align="left" cellpadding="4" cellspacing="0">

          <tr class="azul14">
            <td width="386" colspan="2"><strong><?php echo $title ?></strong><div id="error" style="display:none" class="vermelho12"><br/>Preencha abaixo os campos o brigatórios marcados em vermelho.</div></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>

          <tr valign="top" class="cinza12">
            <td colspan="2"><a href="#" class="link"></a>
              <table width="100%" border="0" cellspacing="0" cellpadding="1">
                <tr>
                  <td width="29%"><div align="left"><strong>Nome</strong></div></td>
                  <td width="2%">&nbsp;</td>
                  <td width="69%"><input id="name" name="name" type="text" class="input" size="16" value="<?php echo $name ?>"/></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="left"><strong>Autor</strong></div></td>
                  <td>&nbsp;</td>
                  <td><input id="author" name="author" type="text" class="input" size="16" value="<?php echo $author ?>"/></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="left"><strong>Natureza</strong></div></td>
                  <td>&nbsp;</td>
                  <td>
<?php
    if ($mode=="create")
    {
?>
                    <select name="nature" class="input">
                        <option value="usual">Usual</option>
                        <option value="framework">Framework</option>
                    </select>
<?php
    }
    else
    {
        if ($nature=="usual" || $nature=="project")
        {
?>
                    <select name="nature" class="input">
                        <option value="usual" <?php echo ('usual'==$nature)?"selected":"" ?>>Usual</option>
                        <option value="project" <?php echo ('project'==$nature)?"selected":"" ?>>Projeto</option>
                    </select>
<?php
        }
        else
        {
?>
        Framework
        <input type="hidden" name="nature" value="framework"/>
<?php
        }
    }
?>
                  </td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="left"><strong>Classifica&ccedil;&atilde;o</strong></div></td>
                  <td>&nbsp;</td>
                  <td>
                    <select name="classification" class="input">
                        <?php
                            $keys = array_keys(Process::$CLASSIFICATION) ;
                            for ($inx = 0; $inx < count($keys); $inx++)
                            {
                                $aKey = $keys[$inx] ;
                                ?>
                                    <option value="<?php echo Process::$CLASSIFICATION[$aKey] ?>" <?php echo (Process::$CLASSIFICATION[$aKey]==$classification)?"selected":"" ?>><?php echo $aKey ?></option>
                                <?php
                            }
                        ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="left"><strong>Conformidade</strong></div></td>
                  <td>&nbsp;</td>
                  <td>
                    <select name="conformity" class="input">
                        <?php
                            $keys = array_keys(Process::$CONFORMITY) ;
                            for ($inx = 0; $inx < count($keys); $inx++)
                            {
                                $aKey = $keys[$inx] ;
                                echo $aKey ;
                                ?>
                                    <option value="<?php echo Process::$CONFORMITY[$aKey] ?>" <?php echo (Process::$CONFORMITY[$aKey]==$conformity)?"selected":"" ?>><?php echo $aKey ?></option>
                                <?php
                            }
                        ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="left"><strong>Objetivo</strong></div></td>
                  <td>&nbsp;</td>
                  <td><input id="objective" name="objective" type="text" class="input" size="16" value="<?php echo $objective ?>"/></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="left"><strong>Descri&ccedil;&atilde;o</strong></div></td>
                  <td>&nbsp;</td>
                  <td><input id="description" name="description" type="text" class="input" size="16" value="<?php echo $description ?>"/></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="left"><strong>Pr&eacute;-condi&ccedil;&atilde;o</strong></div></td>
                  <td>&nbsp;</td>
                  <td><input name="preCondition" type="text" class="input" size="16" value="<?php echo $preCondition ?>"/></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="left"><strong>P&oacute;s-condi&ccedil;&atilde;o</strong></div></td>
                  <td>&nbsp;</td>
                  <td><input name="posCondition" type="text" class="input" size="16" value="<?php echo $posCondition ?>"/></td>
                </tr>
                <tr>
                  <td><div align="left"></div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="left"><strong>Palavra - chave</strong> </div></td>
                  <td>&nbsp;</td>
                  <td><input name="keyWords" type="text" class="input" size="16" value="<?php echo $keyWords ?>"/></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>

                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr class="azul13">
                  <td colspan="3"><strong>Caracter&iacute;sticas</strong></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><strong>Conhecimento requerido</strong> </td>
                  <td>&nbsp;</td>
                  <td>
                    <select name="requiredKnowledge" class="input">
                        <?php
                            $keys = array_keys(Process::$REQUIRED_KNOWLEDGE) ;
                            for ($inx = 0; $inx < count($keys); $inx++)
                            {
                                $aKey = $keys[$inx] ;
                                echo $aKey ;
                                ?>
                                    <option value="<?php echo Process::$REQUIRED_KNOWLEDGE[$aKey] ?>" <?php echo (Process::$REQUIRED_KNOWLEDGE[$aKey]==$requiredKnowledge)?"selected":"" ?>><?php echo $aKey ?></option>
                                <?php
                            }
                        ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><strong>Tamanho da Organiza&ccedil;&atilde;o</strong> </td>
                  <td>&nbsp;</td>
                  <td>
                    <select name="organizationSize" class="input">
                        <?php
                            $keys = array_keys(Process::$ORGANIZATION_SIZE) ;
                            for ($inx = 0; $inx < count($keys); $inx++)
                            {
                                $aKey = $keys[$inx] ;
                                echo $aKey ;
                                ?>
                                    <option value="<?php echo Process::$ORGANIZATION_SIZE[$aKey] ?>" <?php echo (Process::$ORGANIZATION_SIZE[$aKey]==$organizationSize)?"selected":"" ?>><?php echo $aKey ?></option>
                                <?php
                            }
                        ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><strong>Dura&ccedil;&atilde;o do Projeto</strong> </td>
                  <td>&nbsp;</td>
                  <td>
                    <select name="projectDuration" class="input">
                        <?php
                            $keys = array_keys(Process::$PROJECT_DURATION) ;
                            for ($inx = 0; $inx < count($keys); $inx++)
                            {
                                $aKey = $keys[$inx] ;
                                echo $aKey ;
                                ?>
                                    <option value="<?php echo Process::$PROJECT_DURATION[$aKey] ?>" <?php echo (Process::$PROJECT_DURATION[$aKey]==$projectDuration)?"selected":"" ?>><?php echo $aKey ?></option>
                                <?php
                            }
                        ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><strong>Localiza&ccedil;&atilde;o da equipe</strong> </td>
                  <td>&nbsp;</td>
                  <td>
                    <select name="teamLocation" class="input">
                        <?php
                            $keys = array_keys(Process::$TEAM_LOCATION) ;
                            for ($inx = 0; $inx < count($keys); $inx++)
                            {
                                $aKey = $keys[$inx] ;
                                echo $aKey ;
                                ?>
                                    <option value="<?php echo Process::$TEAM_LOCATION[$aKey] ?>" <?php echo (Process::$TEAM_LOCATION[$aKey]==$teamLocation)?"selected":"" ?>><?php echo $aKey ?></option>
                                <?php
                            }
                        ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><strong>&Aacute;rea</strong> </td>
                  <td>&nbsp;</td>
                  <td>
                    <select name="area" class="input">
                        <?php
                            $keys = array_keys(Process::$AREA) ;
                            for ($inx = 0; $inx < count($keys); $inx++)
                            {
                                $aKey = $keys[$inx] ;
                                echo $aKey ;
                                ?>
                                    <option value="<?php echo Process::$AREA[$aKey] ?>" <?php echo (Process::$AREA[$aKey]==$area)?"selected":"" ?>><?php echo $aKey ?></option>
                                <?php
                            }
                        ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><strong>Ciclo Vida </strong> </td>
                  <td>&nbsp;</td>
                  <td>
                    <select name="lifeCicle" class="input">
                        <?php
                            $keys = array_keys(Process::$LIFE_CICLE) ;
                            for ($inx = 0; $inx < count($keys); $inx++)
                            {
                                $aKey = $keys[$inx] ;
                                echo $aKey ;
                                ?>
                                    <option value="<?php echo Process::$LIFE_CICLE[$aKey] ?>" <?php echo (Process::$LIFE_CICLE[$aKey]==$lifeCicle)?"selected":"" ?>><?php echo $aKey ?></option>
                                <?php
                            }
                        ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><strong>Tipo sistema </strong> </td>
                  <td>&nbsp;</td>
                  <td>
                    <select name="systemType" class="input">
                        <?php
                            $keys = array_keys(Process::$SYSTEM_TYPE) ;
                            for ($inx = 0; $inx < count($keys); $inx++)
                            {
                                $aKey = $keys[$inx] ;
                                echo $aKey ;
                                ?>
                                    <option value="<?php echo Process::$SYSTEM_TYPE[$aKey] ?>" <?php echo (Process::$SYSTEM_TYPE[$aKey]==$systemType)?"selected":"" ?>><?php echo $aKey ?></option>
                                <?php
                            }
                        ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><strong>Tamanho da equipe</strong> </td>
                  <td>&nbsp;</td>
                  <td>
                    <select name="teamSize" class="input">
                        <?php
                            $keys = array_keys(Process::$TEAM_SIZE) ;
                            for ($inx = 0; $inx < count($keys); $inx++)
                            {
                                $aKey = $keys[$inx] ;
                                echo $aKey ;
                                ?>
                                    <option value="<?php echo Process::$TEAM_SIZE[$aKey] ?>" <?php echo (Process::$TEAM_SIZE[$aKey]==$teamSize)?"selected":"" ?>><?php echo $aKey ?></option>
                                <?php
                            }
                        ?>
                    </select>
                  </td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;<br/><br/><br/></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><input name="Submit" type="submit" class="submit" value="Próximo"/></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
    </form>
</body>
</html>
