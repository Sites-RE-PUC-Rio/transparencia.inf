<!--
    Pagina que mostra uma visão do processo
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "dal/dao/DAOFile.php" ;
    require_once "models/Process.php" ;
    require_once "models/Aux_Artifact.php" ;
    require_once "models/Aux_Concept.php" ;
    require_once "models/Aux_Tool.php" ;
    require_once "models/Aux_Form.php" ;
    require_once "models/Aux_Function.php" ;
    require_once "models/Aux_Measurement.php" ;
    require_once "models/Aux_Method.php" ;
    require_once "models/Aux_Politics.php" ;
    require_once "models/Aux_Training.php" ;
    require_once "models/Aux_Verification.php" ;


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

    $macroRepresentationFile = DAOFile::getFile(Process::getMacroRepresentationRerence($processId)) ;
    $detailedRepresentationFile = DAOFile::getFile(Process::getDetailedRepresentationRerence($processId)) ;

    if ( Process::$NATURE["Framework"] == $nature )
    {
        $methods = DAOProcess::getProcessMethods($processId) ;
    }
    else
    {
        $artifacts_in = DAOProcess::getProcessArtifacts($processId, 'input') ;
        $artifacts_out = DAOProcess::getProcessArtifacts($processId, 'output') ;
        $concepts = DAOProcess::getProcessConcepts($processId) ;
        $tools = DAOProcess::getProcessTools($processId) ;
        $forms = DAOProcess::getProcessForms($processId) ;
        $functions = DAOProcess::getProcessFunctions($processId) ;
        $measurements = DAOProcess::getProcessMeasurements($processId) ;
        $methods = DAOProcess::getProcessMethods($processId) ;
        $politics = DAOProcess::getProcessPolitics($processId) ;
        $trainings = DAOProcess::getProcessTrainings($processId) ;
        $verifications = DAOProcess::getProcessVerifications($processId) ;
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
    <table width="700" border="0" align="left" cellpadding="4" cellspacing="0">

      <tr class="azul14">
        <td width="386" colspan="2"><strong>Cadastrar</strong></td>
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
              <td width="69%"><?php echo $name ?></td>
            </tr>
            <tr>
              <td><div align="left"></div></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="left"><strong>Autor</strong></div></td>
              <td>&nbsp;</td>
              <td><?php echo $author ?></td>
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
                    $keys = array_keys(Process::$NATURE) ;
                    for ($inx = 0; $inx < count($keys); $inx++)
                    {
                        $aKey = $keys[$inx] ;
                        $aValue = Process::$NATURE[$aKey] ;
                        if ($aValue==$nature)
                        {
                            echo $aKey ;
                             break ;
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
                <?php
                    $keys = array_keys(Process::$CLASSIFICATION) ;
                    for ($inx = 0; $inx < count($keys); $inx++)
                    {
                        $aKey = $keys[$inx] ;
                        $aValue = Process::$CLASSIFICATION[$aKey] ;
                        if ($aValue==$classification)
                        {
                            echo $aKey ;
                             break ;
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
              <td><div align="left"><strong>Conformidade</strong></div></td>
              <td>&nbsp;</td>
              <td>
                <?php
                    $keys = array_keys(Process::$CONFORMITY) ;
                    for ($inx = 0; $inx < count($keys); $inx++)
                    {
                        $aKey = $keys[$inx] ;
                        $aValue = Process::$CONFORMITY[$aKey] ;
                        if ($aValue==$conformity)
                        {
                            echo $aKey ;
                             break ;
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
              <td><div align="left"><strong>Objetivo</strong></div></td>
              <td>&nbsp;</td>
              <td><?php echo $objective ?></td>
            </tr>
            <tr>
              <td><div align="left"></div></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="left"><strong>Descri&ccedil;&atilde;o</strong></div></td>
              <td>&nbsp;</td>
              <td><?php echo $description ?></td>
            </tr>
            <tr>
              <td><div align="left"></div></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="left"><strong>Pr&eacute;-condi&ccedil;&atilde;o</strong></div></td>
              <td>&nbsp;</td>
              <td><?php echo $preCondition ?></td>
            </tr>
            <tr>
              <td><div align="left"></div></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="left"><strong>P&oacute;s-condi&ccedil;&atilde;o</strong></div></td>
              <td>&nbsp;</td>
              <td><?php echo $posCondition ?></td>
            </tr>
            <tr>
              <td><div align="left"></div></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="left"><strong>Palavra - chave</strong> </div></td>
              <td>&nbsp;</td>
              <td><?php echo $keyWords ?></td>
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
                <?php
                    $keys = array_keys(Process::$REQUIRED_KNOWLEDGE) ;
                    for ($inx = 0; $inx < count($keys); $inx++)
                    {
                        $aKey = $keys[$inx] ;
                        $aValue = Process::$REQUIRED_KNOWLEDGE[$aKey] ;
                        if ($aValue==$requiredKnowledge)
                        {
                            echo $aKey ;
                            break ;
                        }
                    }
                ?>
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
                <?php
                    $keys = array_keys(Process::$ORGANIZATION_SIZE) ;
                    for ($inx = 0; $inx < count($keys); $inx++)
                    {
                        $aKey = $keys[$inx] ;
                        $aValue = Process::$ORGANIZATION_SIZE[$aKey] ;
                        if ($aValue==$organizationSize)
                        {
                            echo $aKey ;
                             break ;
                        }
                    }
                ?>
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
                <?php
                    $keys = array_keys(Process::$PROJECT_DURATION) ;
                    for ($inx = 0; $inx < count($keys); $inx++)
                    {
                        $aKey = $keys[$inx] ;
                        $aValue = Process::$PROJECT_DURATION[$aKey] ;
                        if ($aValue==$projectDuration)
                        {
                            echo $aKey ;
                             break ;
                        }
                    }
                ?>
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
                <?php
                    $keys = array_keys(Process::$TEAM_LOCATION) ;
                    for ($inx = 0; $inx < count($keys); $inx++)
                    {
                        $aKey = $keys[$inx] ;
                        $aValue = Process::$TEAM_LOCATION[$aKey] ;
                        if ($aValue==$teamLocation)
                        {
                            echo $aKey ;
                             break ;
                        }
                    }
                ?>
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
                <?php
                    $keys = array_keys(Process::$AREA) ;
                    for ($inx = 0; $inx < count($keys); $inx++)
                    {
                        $aKey = $keys[$inx] ;
                        $aValue = Process::$AREA[$aKey] ;
                        if ($aValue==$area)
                        {
                            echo $aKey ;
                             break ;
                        }
                    }
                ?>
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
                <?php
                    $keys = array_keys(Process::$LIFE_CICLE) ;
                    for ($inx = 0; $inx < count($keys); $inx++)
                    {
                        $aKey = $keys[$inx] ;
                        $aValue = Process::$LIFE_CICLE[$aKey] ;
                        if ($aValue==$lifeCicle)
                        {
                            echo $aKey ;
                             break ;
                        }
                    }
                ?>
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
                <?php
                    $keys = array_keys(Process::$SYSTEM_TYPE) ;
                    for ($inx = 0; $inx < count($keys); $inx++)
                    {
                        $aKey = $keys[$inx] ;
                        $aValue = Process::$SYSTEM_TYPE[$aKey] ;
                        if ($aValue==$systemType)
                        {
                            echo $aKey ;
                             break ;
                        }
                    }
                ?>
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
                <?php
                    $keys = array_keys(Process::$TEAM_SIZE) ;
                    for ($inx = 0; $inx < count($keys); $inx++)
                    {
                        $aKey = $keys[$inx] ;
                        $aValue = Process::$TEAM_SIZE[$aKey] ;
                        if ($aValue==$teamSize)
                        {
                            echo $aKey ;
                             break ;
                        }
                    }
                ?>
              </td>
            </tr>
            <?php
                if (NULL != $macroRepresentationFile)
                {
            ?>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr class="azul12">
                    <td width="386" colspan="3"><strong>Caracter&iacute;sticas das Atividades Macro</strong></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>

               <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Descrição Fluxo de Controle</strong></td>
                    <td>&nbsp;</td>
                    <td>
                        <?php echo $macroRepresentationFile->getDescription() ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Representação Gráfica</strong></td>
                    <td>&nbsp;</td>
                    <td>
                        <a href='getFile.php?reference=<?php echo $macroRepresentationFile->getReference() ?>' class='link'><?php echo $macroRepresentationFile->getName() ?></a>
                    </td>
                </tr>
            <?php
                }
            ?>
            <?php
                if (NULL != $detailedRepresentationFile)
                {
            ?>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr class="azul12">
                    <td width="386" colspan="3"><strong>Caracter&iacute;sticas das Atividades Detalhadas</strong></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>

               <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Descrição Fluxo de Controle</strong></td>
                    <td>&nbsp;</td>
                    <td>
                        <?php echo $detailedRepresentationFile->getDescription() ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Representação Gráfica</strong></td>
                    <td>&nbsp;</td>
                    <td>
                        <a href='getFile.php?reference=<?php echo $detailedRepresentationFile->getReference() ?>' class='link'><?php echo $detailedRepresentationFile->getName() ?></a>
                    </td>
                </tr>
            <?php
                }
            ?>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr class="azul12">
                    <td width="386" colspan="3"><strong>Tabelas Auxiliares</strong></td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>

<?php
    if ( Process::$NATURE["Framework"] == $nature )
    {
?>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Métodos:</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($methods))
    {
?>
                        <div class="vermelho12">Não há método associado</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($methods); $inx++)
        {
            $method = $methods[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_method_view.php?methodId=<?php echo $method->getMethodId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, methodbar=no', false) ;"><strong><?php echo $method->getName() ?></strong></a>
                        <br/>
<?php
        }
    }
?>
                    </td>
                </tr>

<?php
    }
    else
    {
?>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Artefatos de Entrada:</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($artifacts_in))
    {
?>
                        <div class="vermelho12">Não há artefato associado</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($artifacts_in); $inx++)
        {
            $artifact = $artifacts_in[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_artifact_view.php?artifactId=<?php echo $artifact->getArtifactId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, toolbar=no', false) ;"><strong><?php echo $artifact->getName() ?></strong></a>
                        <br/>
<?php
        }
    }
?>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Artefatos de Saída:</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($artifacts_out))
    {
?>
                        <div class="vermelho12">Não há artefato associado</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($artifacts_out); $inx++)
        {
            $artifact = $artifacts_out[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_artifact_view.php?artifactId=<?php echo $artifact->getArtifactId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, toolbar=no', false) ;"><strong><?php echo $artifact->getName() ?></strong></a>
                        <br/>
<?php
        }
    }
?>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Conceitos:</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($concepts))
    {
?>
                        <div class="vermelho12">Não há conceito associado</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($concepts); $inx++)
        {
            $concept = $concepts[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_concept_view.php?conceptId=<?php echo $concept->getConceptId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, conceptbar=no', false) ;"><strong><?php echo $concept->getName() ?></strong></a>
                        <br/>
<?php
        }
    }
?>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Ferramentas:</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($tools))
    {
?>
                        <div class="vermelho12">Não há ferramenta associada</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($tools); $inx++)
        {
            $tool = $tools[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_tool_view.php?toolId=<?php echo $tool->getToolId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, toolbar=no', false) ;"><strong><?php echo $tool->getName() ?></strong></a>
                        <br/>
<?php
        }
    }
?>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Formulários:</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($forms))
    {
?>
                        <div class="vermelho12">Não há formulário associado</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($forms); $inx++)
        {
            $form = $forms[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_form_view.php?formId=<?php echo $form->getFormId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, formbar=no', false) ;"><strong><?php echo $form->getName() ?></strong></a>
                        <br/>
<?php
        }
    }
?>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Funções:</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($functions))
    {
?>
                        <div class="vermelho12">Não há função associada</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($functions); $inx++)
        {
            $function = $functions[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_function_view.php?functionId=<?php echo $function->getFunctionId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, functionbar=no', false) ;"><strong><?php echo $function->getName() ?></strong></a>
                        <br/>
<?php
        }
    }
?>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Medições:</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($measurements))
    {
?>
                        <div class="vermelho12">Não há medição associada</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($measurements); $inx++)
        {
            $measurement = $measurements[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_measurement_view.php?measurementId=<?php echo $measurement->getMeasurementId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, measurementbar=no', false) ;"><strong><?php echo $measurement->getName() ?></strong></a>
                        <br/>
<?php
        }
    }
?>
                    </td>
                </tr>


                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Métodos:</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($methods))
    {
?>
                        <div class="vermelho12">Não há método associado</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($methods); $inx++)
        {
            $method = $methods[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_method_view.php?methodId=<?php echo $method->getMethodId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, methodbar=no', false) ;"><strong><?php echo $method->getName() ?></strong></a>
                        <br/>
<?php
        }
    }
?>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Políticas :</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($politics))
    {
?>
                        <div class="vermelho12">Não há polítics associada</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($politics); $inx++)
        {
            $politics = $politics[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_politics_view.php?politicsId=<?php echo $politics->getPoliticsId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, politicsbar=no', false) ;"><strong><?php echo $politics->getName() ?></strong></a>
                        <br/>
<?php
        }
    }
?>
                    </td>
                </tr>


                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Treinamentos:</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($trainings))
    {
?>
                        <div class="vermelho12">Não há treinamento associado</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($trainings); $inx++)
        {
            $training = $trainings[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_training_view.php?trainingId=<?php echo $training->getTrainingId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, trainingbar=no', false) ;"><strong><?php echo $training->getName() ?></strong></a>
                        <br/>
<?php
        }
    }
?>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Verificações:</strong></td>
                    <td>&nbsp;</td>
                    <td>
<?php
    if (0 == count($verifications))
    {
?>
                        <div class="vermelho12">Não há verificação associada</div>
<?php
    }
    else
    {
        for ($inx = 0; $inx < count($verifications); $inx++)
        {
            $verification = $verifications[$inx] ;
?>
                        <a class="linkNoDec12" href='#' onClick="javascript: window.open('aux_verification_view.php?verificationId=<?php echo $verification->getVerificationId() ?>', '_blank', 'channelmode=no, directories=no, fullscreen=no, lef=0, top=0, height=300, width=500, menubar=no, location=no, resizable=no, scrollbars=no, status=no, titlebar=no, verificationbar=no', false) ;"><strong><?php echo $verification->getName() ?></strong></a>
                        <br/>
<?php
        }
    }
?>
                    </td>
                </tr>


<?php
    }
?>


            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
</body>
</html>
