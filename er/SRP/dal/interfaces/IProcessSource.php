
<?php

interface IProcessSource
{
    /**
     * M�todo utilizado para recuperar uma lista de autores de processos.
     *
     * @return uma lista ordenada de forma crescente com os autores de processos
     */
    public function getProcessesAuthors() ;

    /**
     * M�todo utilizado para recuperar uma lista de nomes de processos usuais diferentes
     * do processo cujo identificador � passado como argumento.
     *
     * @param $processId
     *
     * @return uma lista ordenada de forma crescente com os nomes dos processos usuais
     */
    public function getOtherProcessesNames($processId) ;

    /**
     * M�todo utilizado para apagar um processo da fonte de dados.
     *
     * @param $processId
     *
     * @return true se foi apagado com sucesso, false caso contr�rio.
     */
    public function deleteProcess($processId) ;

    /**
     * M�todo utilizado para alterar um processo na fonte de dados.
     *
     * @param $process
     *
     * @return true se foi alterado com sucesso, false caso contr�rio.
     */
    public function updateProcess($process) ;

    /**
     * M�todo utilizado para criar um processo.
     *
     * @param $userId
     * @param $name
     * @param $author
     * @param $objective
     * @param $description
     * @param $classification
     * @param $nature
     * @param $conformity
     * @param $area
     * @param $lifeCicle
     * @param $systemType
     * @param $organizationSize
     * @param $projectDuration
     * @param $teamSize
     * @param $requiredKnowledge
     * @param $teamLocation
     * @param $keyWords
     * @param $preCondition
     * @param $posCondition
     *
     * @return identificador do processo criado ou -1 no caso de erro
     */
    public function createProcess($userId, $name, $author, $objective, $description, $classification, $nature, $conformity, $area, $lifeCicle, $systemType, $organizationSize, $projectDuration, $teamSize, $requiredKnowledge, $teamLocation, $keyWords, $preCondition, $posCondition) ;

    /**
     * M�todo utilizado para recuperar um processo da fonte de dados.
     *
     * @param $processId
     *
     * @return o processo ou null em caso de erro
     */
    public function getProcess($processId) ;

    /**
     * M�todo utilizado para recuperar a lista de processos criados por um usu�rio.
     *
     * @param $userId
     *
     * @return uma lista com os processos criados por aquele usu�rio
     */
    public function getUserProcesses($userId) ;

    /**
     * M�todo utilizado para recuperar a lista de processos criados por outro usu�rio que nao seja o identificado pelo par�metro.
     *
     * @param $userId
     *
     * @return uma lista com os processos criados por outros usu�rios
     */
    public function getOthersProcesses($userId) ;

    /**
     * M�todo utilizado para recuperar um mapa de processos dado o autor.
     * A chave do mapa seria o identificador do projeto.
     *
     * @param $userId
     *
     * @return um mapa com os processos
     */
    public function getProcessesMapByAuthor($author) ;

    /**
     * M�todo utilizado para recuperar um mapa de processos dado o nome.
     * A chave do mapa seria o identificador do projeto.
     *
     * @param $userId
     *
     * @return um mapa com os processos
     */
    public function getProcessesMapByName($name) ;

    /**
     * M�todo utilizado para recuperar um mapa de processos dado a a��o e objeto de uma atividade macro
     * A chave do mapa seria o identificador do projeto.
     *
     * @param $userId
     *
     * @return um mapa com os processos
     */
    public function getProcessesMapByMacroActivity($action, $object) ;

    /**
     * M�todo utilizado para recuperar um mapa de processos dado a a��o e objeto de uma atividade macro
     * A chave do mapa seria o identificador do projeto.
     *
     * @param $userId
     *
     * @return um mapa com os processos
     */
    public function getProcessesMapByDetailedActivity($action, $object) ;

    /**
     * M�todo utilizado para recuperar uma lista de artefatos do processo
     * A chave do mapa seria o identificador do projeto.
     *
     * @param $processId
     * @param $type
     *
     * @return uma lista com os processos
     */
    public function getProcessArtifacts($processId, $type) ;

    /**
     * M�todo utilizado para recuperar uma lista de artefatos que nao s�o associados a este processo.
     *
     * @param $processId
     * @param $type
     *
     * @return uma lista com os processos
     */
    public function getNonProcessArtifacts($processId, $type) ;

    /**
     * M�todo utilizado para associar um artefato a um processo
     *
     * @param $processId
     * @param $artifactId
     * @param $type
     *
     * @return true se foi associado com sucesso, caso contr�rio false
     */
    public function associateArtifactToProcess($processId, $artifactId, $type) ;

    /**
     * M�todo utilizado para dissociar um artefato de um processo
     *
     * @param $processId
     * @param $artifactId
     * @param $type
     *
     * @return true se foi dissociado com sucesso, caso contr�rio false
     */
    public function dissociateArtifactFromProcess($processId, $artifactId, $type) ;

   /**
    * M�todo utilizado para recuperar os conceitos associados ao processo
    *
    * @param $processId
    * @return lista de conceitos associadas ao processo
    */
    public function getProcessConcepts($processId);

    /**
     * M�todo utilizado para recuperar os conceitos que n�o foram associados ao processo
     *
     * @param $processId
     * @return lista de conceitos que n�o foram associadas ao processo
     */
    public function getNonProcessConcepts($processId);

    /**
    * M�todo utilizado para associar os conceitos ao processo
    *
    * @param $processId
    * @param $conceptId
    * @return true se associa��o foi criada com sucesso, false caso contr�rio
    */
    public function associateConceptToProcess($processId, $conceptId);

    /**
    * M�todo utilizado para desassociar os conceitos ao processo
    *
    * @param $processId
    * @param $conceptId
    * @return true se desassocia��o foi feita com sucesso, false caso contr�rio
    */
    public function dissociateConceptFromProcess($processId,$conceptId);


   /**
    * M�todo utilizado para recuperar as ferramentas associadas ao processo
    *
    * @param $processId
    * @return lista de ferramentas associadas ao processo
    */
    public function getProcessTools($processId);


    /**
     * M�todo utilizado para recuperar as ferramentas que n�o foram associadas ao processo
     *
     * @param $processId
     * @return lista de ferramentas que n�o foram associadas ao processo
     */
    public function getNonProcessTools($processId);


   /**
    * M�todo utilizado para associar as ferramentas ao processo
    *
    * @param $processId
    * @param $toolId
    * @return true se associa��o foi criada com sucesso, false caso contr�rio
    */
    public function associateToolToProcess($processId, $toolId);


   /**
    * M�todo utilizado para desassociar as ferramentas ao processo
    *
    * @param $processId
    * @param $toolId
    * @return true se desassocia��o foi feita com sucesso, false caso contr�rio
    */
    public function dissociateToolFromProcess($processId,$toolId);


   /**
    * M�todo utilizado para recuperar os formularios associados ao processo
    *
    * @param $processId
    * @return lista de formularios associados ao processo
    */
    public function getProcessForms($processId);


    /**
     * M�todo utilizado para recuperar os formularios que n�o foram associados ao processo
     *
     * @param $processId
     * @return lista de formularios que n�o foram associados ao processo
     */
    public function getNonProcessForms($processId);


   /**
    * M�todo utilizado para associar os formularios ao processo
    *
    * @param $processId
    * @param $formId
    * @return true se associa��o foi criada com sucesso, false caso contr�rio
    */
    public function associateFormToProcess($processId, $formId);


   /**
    * M�todo utilizado para desassociar os formularios ao processo
    *
    * @param $processId
    * @param $formId
    * @return true se desassocia��o foi feita com sucesso, false caso contr�rio
    */
    public function dissociateFormFromProcess($processId,$formId);


   /**
    * M�todo utilizado para recuperar as fun��es associadas ao processo
    *
    * @param $processId
    * @return lista de fun��es associadas ao processo
    */
    public function getProcessFunctions($processId);


    /**
     * M�todo utilizado para recuperar as fun��es que n�o foram associadas ao processo
     *
     * @param $processId
     * @return lista de fun��es que n�o foram associadas ao processo
     */
    public function getNonProcessFunctions($processId);


    /**
     * M�todo utilizado para associar as fun��es ao processo
     *
     * @param $processId
     * @param $functionId
     * @return true se associa��o foi criada com sucesso, false caso contr�rio
     */
    public function associateFunctionToProcess($processId, $functionId);


    /**
     * M�todo utilizado para desassociar as fun��es ao processo
     *
     * @param $processId
     * @param $functionId
     * @return true se desassocia��o foi feita com sucesso, false caso contr�rio
     */
    public function dissociateFunctionFromProcess($processId,$functionId);


    /**
     * M�todo utilizado para recuperar medi��es associadas ao processo
     *
     * @param $processId
     * @return lista de medi��es associadas ao processo
     */
    public function getProcessMeasurements($processId);

    /**
     * M�todo utilizado para recuperar medi��es que n�o foram associadas ao processo
     *
     * @param $processId
     * @return lista de medi��es que n�o foram associadas ao processo
     */
    public function getNonProcessMeasurements($processId);

    /**
     * M�todo utilizado para associar medi��es ao processo
     *
     * @param $processId
     * @param $measurementId
     * @return true se associa��o foi criada com sucesso, false caso contr�rio
     */
    public function associateMeasurementToProcess($processId, $measurementId);

    /**
     * M�todo utilizado para desassociar medi��es ao processo
     *
     * @param $processId
     * @param $measurementId
     * @return true se desassocia��o foi feita com sucesso, false caso contr�rio
     */
    public function dissociateMeasurementFromProcess($processId,$measurementId);

    /**
     * M�todo utilizado para recuperar metodos associadas ao processo
     *
     * @param $processId
     * @return lista de metodos associadas ao processo
     */
    public function getProcessMethods($processId);

    /**
     * M�todo utilizado para recuperar metodos que n�o foram associadas ao processo
     *
     * @param $processId
     * @return lista de metodos que n�o foram associadas ao processo
     */
    public function getNonProcessMethods($processId);

    /**
     * M�todo utilizado para associar metodos ao processo
     *
     * @param $processId
     * @param $methodId
     * @return true se associa��o foi criada com sucesso, false caso contr�rio
     */
    public function associateMethodToProcess($processId, $methodId);

    /**
     * M�todo utilizado para desassociar metodos ao processo
     *
     * @param $processId
     * @param $methodId
     * @return true se desassocia��o foi feita com sucesso, false caso contr�rio
     */
    public function dissociateMethodFromProcess($processId,$methodId);

    /**
     * M�todo utilizado para recuperar politicas associadas ao processo
     *
     * @param $processId
     * @return lista de politicas associadas ao processo
     */
    public function getProcessPolitics($processId);

    /**
     * M�todo utilizado para recuperar politicas que n�o foram associadas ao processo
     *
     * @param $processId
     * @return lista de politicas que n�o foram associadas ao processo
     */
    public function getNonProcessPolitics($processId);

    /**
     * M�todo utilizado para associar politicas ao processo
     *
     * @param $processId
     * @param $politicsId
     * @return true se associa��o foi criada com sucesso, false caso contr�rio
     */
    public function associatePoliticsToProcess($processId, $politicsId);

    /**
     * M�todo utilizado para desassociar politicas ao processo
     *
     * @param $processId
     * @param $politicsId
     * @return true se desassocia��o foi feita com sucesso, false caso contr�rio
     */
    public function dissociatePoliticsFromProcess($processId,$politicsId);

    /**
     * M�todo utilizado para recuperar treinamentos associadas ao processo
     *
     * @param $processId
     * @return lista de treinamentos associadas ao processo
     */
    public function getProcessTrainings($processId);

    /**
     * M�todo utilizado para recuperar treinamentos que n�o foram associadas ao processo
     *
     * @param $processId
     * @return lista de treinamentos que n�o foram associadas ao processo
     */
    public function getNonProcessTrainings($processId);

    /**
     * M�todo utilizado para associar treinamentos ao processo
     *
     * @param $processId
     * @param $trainingId
     * @return true se associa��o foi criada com sucesso, false caso contr�rio
     */
    public function associateTrainingToProcess($processId, $trainingId);

    /**
     * M�todo utilizado para desassociar treinamentos ao processo
     *
     * @param $processId
     * @param $trainingId
     * @return true se desassocia��o foi feita com sucesso, false caso contr�rio
     */
    public function dissociateTrainingFromProcess($processId,$trainingId);

    /**
     * M�todo utilizado para recuperar verifica��es associadas ao processo
     *
     * @param $processId
     * @return lista de verifica��es associadas ao processo
     */
    public function getProcessVerifications($processId);

    /**
     * M�todo utilizado para recuperar verifica��es que n�o foram associadas ao processo
     *
     * @param $processId
     * @return lista de verifica��es que n�o foram associadas ao processo
     */
    public function getNonProcessVerifications($processId);

    /**
     * M�todo utilizado para associar verifica��es ao processo
     *
     * @param $processId
     * @param $verificationId
     * @return true se associa��o foi criada com sucesso, false caso contr�rio
     */
    public function associateVerificationToProcess($processId, $verificationId);

    /**
     * M�todo utilizado para desassociar verifica��es ao processo
     *
     * @param $processId
     * @param $verificationId
     * @return true se desassocia��o foi feita com sucesso, false caso contr�rio
     */
    public function dissociateVerificationFromProcess($processId,$verificationId);    

    /**
     * M�todo utilizado para recuperar uma lista com acoes de projeto.
     *
     * @return uma lista com acoes das atividades macro
     */
    public function getMacroActivitiesActions() ;

    /**
     * M�todo utilizado para recuperar uma lista com objetos de projeto.
     *
     * @return uma lista com objetos das atividades macro
     */
    public function getMacroActivitiesObjects() ;

    /**
     * M�todo utilizado para apagar uma atividade macro da fonte de dados.
     *
     * @param $macroActivityId
     *
     * @return true se foi apagada com sucesso, caso contr�rio false.
     */
    public function deleteMacroActivity($macroActivityId) ;

    /**
     * M�todo utilizado para alterar uma atividade macro na fonte de dados.
     *
     * @param $macroActivity
     *
     * @return true se foi apagada com sucesso, caso contr�rio false.
     */
    public function updateUsualMacroActivity($macroActivity) ;

    /**
     * M�todo utilizado para criar na fonte de dados, uma atividade macro usual.
     *
     * @param $userId
     * @param $processId
     * @param $action
     * @param $object
     * @param $action_synonymous
     * @param $object_synonymous
     * @param $description
     * @param $preCondition
     * @param $posCondition
     * @param $restriction
     * @param $reusedFrom
     *
     * @return true se foi criada com sucesso, caso contr�rio false.
     */
    public function createUsualMacroActivity($userId, $processId, $action, $object, $action_synonymous, $object_synonymous, $description, $preCondition, $posCondition, $restriction, $reusedFrom) ;

    /**
     * M�todo utilizado para alterar uma atividade macro de framework na fonte de dados.
     *
     * @param $macroActivity
     *
     * @return true se foi apagada com sucesso, caso contr�rio false.
     */
    public function updateFrameworkMacroActivity($macroActivity) ;

    /**
     * M�todo utilizado para criar na fonte de dados, uma atividade macro framework.
     *
     * @param $userId
     * @param $processId
     * @param $action
     * @param $object
     * @param $action_synonymous
     * @param $object_synonymous
     * @param $description
     * @param $type
     * @param $caracteristics
     *
     * @return true se foi criada com sucesso, caso contr�rio false.
     */
    public function createFrameworkMacroActivity($userId, $processId, $action, $object, $action_synonymous, $object_synonymous, $description, $type, $caracteristics) ;

    /**
     * M�todo utilizado recuperar as atividades macro de um processo.
     *
     * @param $processId
     *
     * @return uma lista de atividades macro
     */
    public function getProcessMacroActivities($processId) ;

    /**
     * M�todo utilizado recuperar uma atividade macro reutilizada.
     *
     * @param $processId
     * @param $reusedFrom
     *
     * @return uma atividade macro reutilizada
     */
    public function getReusedMacroActivity($processId, $reusedFrom) ;

    /**
     * M�todo utilizado recuperar uma atividade macro.
     *
     * @param $macroActivityId
     *
     * @return uma atividade macro reutilizada
     */
    public function getMacroActivity($macroActivityId) ;

    /**
     * M�todo utilizado recuperar atividades macro similares a cujo identificador � passado como par�metro.
     *
     * @param $macroActivityId
     *
     * @return uma lista de atividades macro reutilizada
     */
    public function getSimilarMacroActivities($macroActivityId) ;

    /**
     * M�todo utilizado para associar uma atividade detalhada usual a uma de framework.
     *
     * @param $frameworkDetailedActivityId
     * @param $usualDetailedActivityId
     * @param $similarity
     *
     * @return true se associada com sucesso, false caso contr�rio
     */
    public function associateUsualToFrameworkMacroActivity($frameworkMacroActivityId, $usualMacroActivityId, $similarity) ;

    /**
     * M�todo utilizado para apagar as associa��es de uma atividade detalhada usual a uma de framework.
     *
     * @param $frameworkMacroActivityId
     *
     * @return true se apagada com sucesso, false caso contr�rio
     */
    public function deleteFrameworkMacroActivityReferences($frameworkMacroActivityId) ;

    /**
     * M�todo utilizado para recuperar as associa��es de uma atividade macro usual a uma de framework.
     *
     * @param $frameworkMacroActivityId
     *
     * @return uma lista com as referencias do tipo FrameworkMacroActivityReference
     */
    public function getFrameworkMacroActivityReferences($frameworkMacroActivityId);

    /**
     * M�todo utilizado para trocar a prioridade que indica a ordem com que duas atividades macros aparecem na �rovre do processo.
     *
     * @param $macroActivityId1
     * @param $priority1
     * @param $macroActivityId2
     * @param $priority2
     *
     * @return true se alteradas com sucesso, false caso contr�rio
     */
    public function exchangeProcessMacroActivitiesPriority($macroActivityId1, $priority1, $macroActivityId2, $priority2) ;

    /**
     * M�todo utilizado para recuperar uma lista com acoes de projeto.
     *
     * @return uma lista com acoes das atividades detalhadas
     */
    public function getDetailedActivitiesActions() ;

    /**
     * M�todo utilizado para recuperar uma lista com objetos de projeto.
     *
     * @return uma lista com objetos das atividades macro
     */
    public function getDetailedActivitiesObjects() ;

    /**
     * M�todo utilizado para apagar uma atividade detalhada da fonte de dados.
     *
     * @param $detailedActivityId
     *
     * @return true se foi apagada com sucesso, caso contr�rio false.
     */
    public function deleteDetailedActivity($detailedActivityId) ;

    /**
     * M�todo utilizado para alterar uma atividade detalhada na fonte de dados.
     *
     * @param $detailedActivity
     *
     * @return true se foi apagada com sucesso, caso contr�rio false.
     */
    public function updateUsualDetailedActivity($detailedActivity) ;

    /**
     * M�todo utilizado para criar na fonte de dados, uma atividade detalhada usual.
     *
     * @param $userId
     * @param $macroActivityId
     * @param $action
     * @param $object
     * @param $action_synonymous
     * @param $object_synonymous
     * @param $description
     * @param $preCondition
     * @param $posCondition
     * @param $restriction
     * @param $reusedFrom
     *
     * @return true se foi criada com sucesso, caso contr�rio false.
     */
    public function createUsualDetailedActivity($userId, $macroActivityId, $action, $object, $action_synonymous, $object_synonymous, $description, $preCondition, $posCondition, $restriction, $reusedFrom) ;

    /**
     * M�todo utilizado para alterar uma atividade detalhada de framework na fonte de dados.
     *
     * @param $detailedActivity
     *
     * @return true se foi apagada com sucesso, caso contr�rio false.
     */
    public function updateFrameworkDetailedActivity($detailedActivity) ;

    /**
     * M�todo utilizado para criar na fonte de dados, uma atividade detalhada framework.
     *
     * @param $userId
     * @param $macroActivityId
     * @param $action
     * @param $object
     * @param $action_synonymous
     * @param $object_synonymous
     * @param $description
     * @param $type
     * @param $caracteristics
     *
     * @return true se foi criada com sucesso, caso contr�rio false.
     */
    public function createFrameworkDetailedActivity($userId, $macroActivityId, $action, $object, $action_synonymous, $object_synonymous, $description, $type, $caracteristics) ;

    /**
     * M�todo utilizado recuperar as atividades detalhadas de uma macro
     *
     * @param $macroActivityId
     *
     * @return uma lista de atividades detalhadas
     */
    public function getMacroDetailedActivities($macroActivityId) ;

    /**
     * M�todo utilizado recuperar uma atividade detalhada reutilizada.
     *
     * @param $macroActivityId
     * @param $reusedFrom
     *
     * @return uma atividade detalhada reutilizada
     */
    public function getReusedDetailedActivity($macroActivityId, $reusedFrom) ;

    /**
     * M�todo utilizado recuperar uma atividade detalhada.
     *
     * @param $macroActivityId
     *
     * @return uma atividade detalhada reutilizada
     */
    public function getDetailedActivity($detailedActivityId) ;

    /**
     * M�todo utilizado recuperar atividades detalhadas similares a cujo identificador � passado como par�metro.
     *
     * @param $macroActivityId
     *
     * @return uma lista de atividades detalhadas reutilizada
     */
    public function getSimilarDetailedActivities($detailedActivityId) ;

    /**
     * M�todo utilizado para associar uma atividade detalhada usual a uma de framework.
     *
     * @param $frameworkDetailedActivityId
     * @param $usualDetailedActivityId
     * @param $similarity
     *
     * @return true se associada com sucesso, false caso contr�rio
     */
    public function associateUsualToFrameworkDetailedActivity($frameworkDetailedActivityId, $usualDetailedActivityId, $similarity) ;

    /**
     * M�todo utilizado para apagar as associa��es de uma atividade detalhada usual a uma de framework.
     *
     * @param $frameworkDetailedActivityId
     *
     * @return true se apagada com sucesso, false caso contr�rio
     */
    public function deleteFrameworkDetailedActivityReferences($frameworkDetailedActivityId) ;

    /**
     * M�todo utilizado para recuperar as associa��es de uma atividade detalhada usual a uma de framework.
     *
     * @param $frameworkDetailedActivityId
     *
     * @return uma lista com as referencias do tipo FrameworkDetailedActivityReference
     */
    public function getFrameworkDetailedActivityReferences($frameworkDetailedActivityId) ;

    /**
     * M�todo utilizado para trocar a prioridade que indica a ordem com que duas atividades detalhadas aparecem na �rovre do processo.
     *
     * @param $detailedActivityId1
     * @param $priority1
     * @param $detailedActivityId2
     * @param $priority2
     *
     * @return true se alteradas com sucesso, false caso contr�rio
     */
    public function exchangeMacroDetailedActivitiesPriority($detailedActivityId1, $priority1, $detailedActivityId2, $priority2) ;


    /**
     * M�todo utilizado para recuperar artefatos associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     * @param $type
     *
     * @return uma lista artefatos
     */
    public function getMacroActivityArtifacts($processId, $macroActivityId, $type) ;

    /**
     * M�todo utilizado para recuperar artefatos n�o associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     * @param $type
     *
     * @return uma lista artefatos
     */
    public function getNonMacroActivityArtifacts($processId, $macroActivityId, $type) ;

    /**
     * M�todo utilizado para associar um artefato a uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $artifactId
     * @param $type
     *
     * @return true se associado com sucesso, false caso contr�rio.
     */
    public function associateArtifactToMacroActivity($processId, $macroActivityId, $artifactId, $type) ;

    /**
     * M�todo utilizado para desassociar um artefato de uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $artifactId
     * @param $type
     *
     * @return true se desassociado com sucesso, false caso contr�rio.
     */
    public function dissociateArtifactFromMacroActivity($processId, $macroActivityId, $artifactId, $type) ;

    /**
     * M�todo utilizado para recuperar fun��es associadas a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return uma lista fun��es
     */
    public function getMacroActivityFunctions($processId, $macroActivityId) ;

    /**
     * M�todo utilizado para recuperar fun��es n�o associadas a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return uma lista fun��es
     */
    public function getNonMacroActivityFunctions($processId, $macroActivityId) ;

    /**
     * M�todo utilizado para associar uma fun��es a uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $functionsId
     *
     * @return true se associado com sucesso, false caso contr�rio.
     */
    public function associateFunctionToMacroActivity($processId, $macroActivityId, $functionId) ;

    /**
     * M�todo utilizado para desassociar um artefato de uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $functionId
     *
     * @return true se desassociado com sucesso, false caso contr�rio.
     */
    public function dissociateFunctionFromMacroActivity($processId, $macroActivityId, $functionId) ;

    /**
     * M�todo utilizado para recuperar m�todos associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return uma lista m�todos
     */
    public function getMacroActivityMethods($processId, $macroActivityId) ;

    /**
     * M�todo utilizado para recuperar m�todos n�o associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return m�todos
     */
    public function getNonMacroActivityMethods($processId, $macroActivityId) ;

    /**
     * M�todo utilizado para associar um m�todos a uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $methodId
     *
     * @return true se associado com sucesso, false caso contr�rio.
     */
    public function associateMethodToMacroActivity($processId, $macroActivityId, $methodId) ;

    /**
     * M�todo utilizado para desassociar um m�todos de uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $methodId
     *
     * @return true se desassociado com sucesso, false caso contr�rio.
     */
    public function dissociateMethodFromMacroActivity($processId, $macroActivityId, $methodId) ;

    /**
     * M�todo utilizado para recuperar ferramentas associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return uma lista ferramentas
     */
    public function getMacroActivityTools($processId, $macroActivityId) ;

    /**
     * M�todo utilizado para recuperar ferramentas n�o associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return uma lista ferramentas
     */
    public function getNonMacroActivityTools($processId, $macroActivityId) ;

    /**
     * M�todo utilizado para associar um ferramentas a uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $toolId
     *
     * @return true se associado com sucesso, false caso contr�rio.
     */
    public function associateToolToMacroActivity($processId, $macroActivityId, $toolId) ;

    /**
     * M�todo utilizado para desassociar um ferramentas de uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $toolId
     *
     * @return true se desassociado com sucesso, false caso contr�rio.
     */
    public function dissociateToolFromMacroActivity($processId, $macroActivityId, $toolId) ;

    /**
     * M�todo utilizado para recuperar artefatos associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     * @param $type
     *
     * @return uma lista artefatos
     */
    public function getDetailedActivityArtifacts($processId, $detailedActivityId, $type) ;

    /**
     * M�todo utilizado para recuperar artefatos n�o associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     * @param $type
     *
     * @return uma lista artefatos
     */
    public function getNonDetailedActivityArtifacts($processId, $detailedActivityId, $type) ;

    /**
     * M�todo utilizado para associar um artefato a uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $artifactId
     * @param $type
     *
     * @return true se associado com sucesso, false caso contr�rio.
     */
    public function associateArtifactToDetailedActivity($processId, $detailedActivityId, $artifactId, $type) ;

    /**
     * M�todo utilizado para desassociar um artefato de uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $artifactId
     * @param $type
     *
     * @return true se desassociado com sucesso, false caso contr�rio.
     */
    public function dissociateArtifactFromDetailedActivity($processId, $detailedActivityId, $artifactId, $type) ;

    /**
     * M�todo utilizado para recuperar fun��es associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista fun��es
     */
    public function getDetailedActivityFunctions($processId, $detailedActivityId) ;

    /**
     * M�todo utilizado para recuperar fun��es n�o associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista fun��es
     */
    public function getNonDetailedActivityFunctions($processId, $detailedActivityId) ;

    /**
     * M�todo utilizado para associar umas fun��es a uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $functionId
     *
     * @return true se associado com sucesso, false caso contr�rio.
     */
    public function associateFunctionToDetailedActivity($processId, $detailedActivityId, $functionId) ;

    /**
     * M�todo utilizado para desassociar um artefato de uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $functionId
     *
     * @return true se desassociado com sucesso, false caso contr�rio.
     */
    public function dissociateFunctionFromDetailedActivity($processId, $detailedActivityId, $functionId) ;

    /**
     * M�todo utilizado para recuperar m�todos associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista m�todos
     */
    public function getDetailedActivityMethods($processId, $detailedActivityId) ;

    /**
     * M�todo utilizado para recuperar m�todos n�o associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista m�todos
     */
    public function getNonDetailedActivityMethods($processId, $detailedActivityId) ;

    /**
     * M�todo utilizado para associar um m�todos a uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $methodId
     *
     * @return true se associado com sucesso, false caso contr�rio.
     */
    public function associateMethodToDetailedActivity($processId, $detailedActivityId, $methodId) ;

    /**
     * M�todo utilizado para desassociar um m�todos de uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $methodId
     *
     * @return true se desassociado com sucesso, false caso contr�rio.
     */
    public function dissociateMethodFromDetailedActivity($processId, $detailedActivityId, $methodId) ;

    /**
     * M�todo utilizado para recuperar ferramentas n�o associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista ferramentas
     */
    public function getDetailedActivityTools($processId, $detailedActivityId) ;

    /**
     * M�todo utilizado para recuperar ferramentas n�o associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista ferramentas
     */
    public function getNonDetailedActivityTools($processId, $detailedActivityId) ;

    /**
     * M�todo utilizado para associar um ferramentas a uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $toolId
     *
     * @return true se associado com sucesso, false caso contr�rio.
     */
    public function associateToolToDetailedActivity($processId, $detailedActivityId, $toolId) ;

    /**
     * M�todo utilizado para desassociar um ferramentas de uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $toolId
     *
     * @return true se desassociado com sucesso, false caso contr�rio.
     */
    public function dissociateToolFromDetailedActivity($processId, $detailedActivityId, $toolId) ;
}

?>