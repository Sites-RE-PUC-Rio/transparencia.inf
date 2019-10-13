
<?php

interface IProcessSource
{
    /**
     * Método utilizado para recuperar uma lista de autores de processos.
     *
     * @return uma lista ordenada de forma crescente com os autores de processos
     */
    public function getProcessesAuthors() ;

    /**
     * Método utilizado para recuperar uma lista de nomes de processos usuais diferentes
     * do processo cujo identificador é passado como argumento.
     *
     * @param $processId
     *
     * @return uma lista ordenada de forma crescente com os nomes dos processos usuais
     */
    public function getOtherProcessesNames($processId) ;

    /**
     * Método utilizado para apagar um processo da fonte de dados.
     *
     * @param $processId
     *
     * @return true se foi apagado com sucesso, false caso contrário.
     */
    public function deleteProcess($processId) ;

    /**
     * Método utilizado para alterar um processo na fonte de dados.
     *
     * @param $process
     *
     * @return true se foi alterado com sucesso, false caso contrário.
     */
    public function updateProcess($process) ;

    /**
     * Método utilizado para criar um processo.
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
     * Método utilizado para recuperar um processo da fonte de dados.
     *
     * @param $processId
     *
     * @return o processo ou null em caso de erro
     */
    public function getProcess($processId) ;

    /**
     * Método utilizado para recuperar a lista de processos criados por um usuário.
     *
     * @param $userId
     *
     * @return uma lista com os processos criados por aquele usuário
     */
    public function getUserProcesses($userId) ;

    /**
     * Método utilizado para recuperar a lista de processos criados por outro usuário que nao seja o identificado pelo parâmetro.
     *
     * @param $userId
     *
     * @return uma lista com os processos criados por outros usuários
     */
    public function getOthersProcesses($userId) ;

    /**
     * Método utilizado para recuperar um mapa de processos dado o autor.
     * A chave do mapa seria o identificador do projeto.
     *
     * @param $userId
     *
     * @return um mapa com os processos
     */
    public function getProcessesMapByAuthor($author) ;

    /**
     * Método utilizado para recuperar um mapa de processos dado o nome.
     * A chave do mapa seria o identificador do projeto.
     *
     * @param $userId
     *
     * @return um mapa com os processos
     */
    public function getProcessesMapByName($name) ;

    /**
     * Método utilizado para recuperar um mapa de processos dado a ação e objeto de uma atividade macro
     * A chave do mapa seria o identificador do projeto.
     *
     * @param $userId
     *
     * @return um mapa com os processos
     */
    public function getProcessesMapByMacroActivity($action, $object) ;

    /**
     * Método utilizado para recuperar um mapa de processos dado a ação e objeto de uma atividade macro
     * A chave do mapa seria o identificador do projeto.
     *
     * @param $userId
     *
     * @return um mapa com os processos
     */
    public function getProcessesMapByDetailedActivity($action, $object) ;

    /**
     * Método utilizado para recuperar uma lista de artefatos do processo
     * A chave do mapa seria o identificador do projeto.
     *
     * @param $processId
     * @param $type
     *
     * @return uma lista com os processos
     */
    public function getProcessArtifacts($processId, $type) ;

    /**
     * Método utilizado para recuperar uma lista de artefatos que nao são associados a este processo.
     *
     * @param $processId
     * @param $type
     *
     * @return uma lista com os processos
     */
    public function getNonProcessArtifacts($processId, $type) ;

    /**
     * Método utilizado para associar um artefato a um processo
     *
     * @param $processId
     * @param $artifactId
     * @param $type
     *
     * @return true se foi associado com sucesso, caso contrário false
     */
    public function associateArtifactToProcess($processId, $artifactId, $type) ;

    /**
     * Método utilizado para dissociar um artefato de um processo
     *
     * @param $processId
     * @param $artifactId
     * @param $type
     *
     * @return true se foi dissociado com sucesso, caso contrário false
     */
    public function dissociateArtifactFromProcess($processId, $artifactId, $type) ;

   /**
    * Método utilizado para recuperar os conceitos associados ao processo
    *
    * @param $processId
    * @return lista de conceitos associadas ao processo
    */
    public function getProcessConcepts($processId);

    /**
     * Método utilizado para recuperar os conceitos que não foram associados ao processo
     *
     * @param $processId
     * @return lista de conceitos que não foram associadas ao processo
     */
    public function getNonProcessConcepts($processId);

    /**
    * Método utilizado para associar os conceitos ao processo
    *
    * @param $processId
    * @param $conceptId
    * @return true se associação foi criada com sucesso, false caso contrário
    */
    public function associateConceptToProcess($processId, $conceptId);

    /**
    * Método utilizado para desassociar os conceitos ao processo
    *
    * @param $processId
    * @param $conceptId
    * @return true se desassociação foi feita com sucesso, false caso contrário
    */
    public function dissociateConceptFromProcess($processId,$conceptId);


   /**
    * Método utilizado para recuperar as ferramentas associadas ao processo
    *
    * @param $processId
    * @return lista de ferramentas associadas ao processo
    */
    public function getProcessTools($processId);


    /**
     * Método utilizado para recuperar as ferramentas que não foram associadas ao processo
     *
     * @param $processId
     * @return lista de ferramentas que não foram associadas ao processo
     */
    public function getNonProcessTools($processId);


   /**
    * Método utilizado para associar as ferramentas ao processo
    *
    * @param $processId
    * @param $toolId
    * @return true se associação foi criada com sucesso, false caso contrário
    */
    public function associateToolToProcess($processId, $toolId);


   /**
    * Método utilizado para desassociar as ferramentas ao processo
    *
    * @param $processId
    * @param $toolId
    * @return true se desassociação foi feita com sucesso, false caso contrário
    */
    public function dissociateToolFromProcess($processId,$toolId);


   /**
    * Método utilizado para recuperar os formularios associados ao processo
    *
    * @param $processId
    * @return lista de formularios associados ao processo
    */
    public function getProcessForms($processId);


    /**
     * Método utilizado para recuperar os formularios que não foram associados ao processo
     *
     * @param $processId
     * @return lista de formularios que não foram associados ao processo
     */
    public function getNonProcessForms($processId);


   /**
    * Método utilizado para associar os formularios ao processo
    *
    * @param $processId
    * @param $formId
    * @return true se associação foi criada com sucesso, false caso contrário
    */
    public function associateFormToProcess($processId, $formId);


   /**
    * Método utilizado para desassociar os formularios ao processo
    *
    * @param $processId
    * @param $formId
    * @return true se desassociação foi feita com sucesso, false caso contrário
    */
    public function dissociateFormFromProcess($processId,$formId);


   /**
    * Método utilizado para recuperar as funções associadas ao processo
    *
    * @param $processId
    * @return lista de funções associadas ao processo
    */
    public function getProcessFunctions($processId);


    /**
     * Método utilizado para recuperar as funções que não foram associadas ao processo
     *
     * @param $processId
     * @return lista de funções que não foram associadas ao processo
     */
    public function getNonProcessFunctions($processId);


    /**
     * Método utilizado para associar as funções ao processo
     *
     * @param $processId
     * @param $functionId
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public function associateFunctionToProcess($processId, $functionId);


    /**
     * Método utilizado para desassociar as funções ao processo
     *
     * @param $processId
     * @param $functionId
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public function dissociateFunctionFromProcess($processId,$functionId);


    /**
     * Método utilizado para recuperar medições associadas ao processo
     *
     * @param $processId
     * @return lista de medições associadas ao processo
     */
    public function getProcessMeasurements($processId);

    /**
     * Método utilizado para recuperar medições que não foram associadas ao processo
     *
     * @param $processId
     * @return lista de medições que não foram associadas ao processo
     */
    public function getNonProcessMeasurements($processId);

    /**
     * Método utilizado para associar medições ao processo
     *
     * @param $processId
     * @param $measurementId
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public function associateMeasurementToProcess($processId, $measurementId);

    /**
     * Método utilizado para desassociar medições ao processo
     *
     * @param $processId
     * @param $measurementId
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public function dissociateMeasurementFromProcess($processId,$measurementId);

    /**
     * Método utilizado para recuperar metodos associadas ao processo
     *
     * @param $processId
     * @return lista de metodos associadas ao processo
     */
    public function getProcessMethods($processId);

    /**
     * Método utilizado para recuperar metodos que não foram associadas ao processo
     *
     * @param $processId
     * @return lista de metodos que não foram associadas ao processo
     */
    public function getNonProcessMethods($processId);

    /**
     * Método utilizado para associar metodos ao processo
     *
     * @param $processId
     * @param $methodId
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public function associateMethodToProcess($processId, $methodId);

    /**
     * Método utilizado para desassociar metodos ao processo
     *
     * @param $processId
     * @param $methodId
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public function dissociateMethodFromProcess($processId,$methodId);

    /**
     * Método utilizado para recuperar politicas associadas ao processo
     *
     * @param $processId
     * @return lista de politicas associadas ao processo
     */
    public function getProcessPolitics($processId);

    /**
     * Método utilizado para recuperar politicas que não foram associadas ao processo
     *
     * @param $processId
     * @return lista de politicas que não foram associadas ao processo
     */
    public function getNonProcessPolitics($processId);

    /**
     * Método utilizado para associar politicas ao processo
     *
     * @param $processId
     * @param $politicsId
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public function associatePoliticsToProcess($processId, $politicsId);

    /**
     * Método utilizado para desassociar politicas ao processo
     *
     * @param $processId
     * @param $politicsId
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public function dissociatePoliticsFromProcess($processId,$politicsId);

    /**
     * Método utilizado para recuperar treinamentos associadas ao processo
     *
     * @param $processId
     * @return lista de treinamentos associadas ao processo
     */
    public function getProcessTrainings($processId);

    /**
     * Método utilizado para recuperar treinamentos que não foram associadas ao processo
     *
     * @param $processId
     * @return lista de treinamentos que não foram associadas ao processo
     */
    public function getNonProcessTrainings($processId);

    /**
     * Método utilizado para associar treinamentos ao processo
     *
     * @param $processId
     * @param $trainingId
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public function associateTrainingToProcess($processId, $trainingId);

    /**
     * Método utilizado para desassociar treinamentos ao processo
     *
     * @param $processId
     * @param $trainingId
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public function dissociateTrainingFromProcess($processId,$trainingId);

    /**
     * Método utilizado para recuperar verificações associadas ao processo
     *
     * @param $processId
     * @return lista de verificações associadas ao processo
     */
    public function getProcessVerifications($processId);

    /**
     * Método utilizado para recuperar verificações que não foram associadas ao processo
     *
     * @param $processId
     * @return lista de verificações que não foram associadas ao processo
     */
    public function getNonProcessVerifications($processId);

    /**
     * Método utilizado para associar verificações ao processo
     *
     * @param $processId
     * @param $verificationId
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public function associateVerificationToProcess($processId, $verificationId);

    /**
     * Método utilizado para desassociar verificações ao processo
     *
     * @param $processId
     * @param $verificationId
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public function dissociateVerificationFromProcess($processId,$verificationId);    

    /**
     * Método utilizado para recuperar uma lista com acoes de projeto.
     *
     * @return uma lista com acoes das atividades macro
     */
    public function getMacroActivitiesActions() ;

    /**
     * Método utilizado para recuperar uma lista com objetos de projeto.
     *
     * @return uma lista com objetos das atividades macro
     */
    public function getMacroActivitiesObjects() ;

    /**
     * Método utilizado para apagar uma atividade macro da fonte de dados.
     *
     * @param $macroActivityId
     *
     * @return true se foi apagada com sucesso, caso contrário false.
     */
    public function deleteMacroActivity($macroActivityId) ;

    /**
     * Método utilizado para alterar uma atividade macro na fonte de dados.
     *
     * @param $macroActivity
     *
     * @return true se foi apagada com sucesso, caso contrário false.
     */
    public function updateUsualMacroActivity($macroActivity) ;

    /**
     * Método utilizado para criar na fonte de dados, uma atividade macro usual.
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
     * @return true se foi criada com sucesso, caso contrário false.
     */
    public function createUsualMacroActivity($userId, $processId, $action, $object, $action_synonymous, $object_synonymous, $description, $preCondition, $posCondition, $restriction, $reusedFrom) ;

    /**
     * Método utilizado para alterar uma atividade macro de framework na fonte de dados.
     *
     * @param $macroActivity
     *
     * @return true se foi apagada com sucesso, caso contrário false.
     */
    public function updateFrameworkMacroActivity($macroActivity) ;

    /**
     * Método utilizado para criar na fonte de dados, uma atividade macro framework.
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
     * @return true se foi criada com sucesso, caso contrário false.
     */
    public function createFrameworkMacroActivity($userId, $processId, $action, $object, $action_synonymous, $object_synonymous, $description, $type, $caracteristics) ;

    /**
     * Método utilizado recuperar as atividades macro de um processo.
     *
     * @param $processId
     *
     * @return uma lista de atividades macro
     */
    public function getProcessMacroActivities($processId) ;

    /**
     * Método utilizado recuperar uma atividade macro reutilizada.
     *
     * @param $processId
     * @param $reusedFrom
     *
     * @return uma atividade macro reutilizada
     */
    public function getReusedMacroActivity($processId, $reusedFrom) ;

    /**
     * Método utilizado recuperar uma atividade macro.
     *
     * @param $macroActivityId
     *
     * @return uma atividade macro reutilizada
     */
    public function getMacroActivity($macroActivityId) ;

    /**
     * Método utilizado recuperar atividades macro similares a cujo identificador é passado como parâmetro.
     *
     * @param $macroActivityId
     *
     * @return uma lista de atividades macro reutilizada
     */
    public function getSimilarMacroActivities($macroActivityId) ;

    /**
     * Método utilizado para associar uma atividade detalhada usual a uma de framework.
     *
     * @param $frameworkDetailedActivityId
     * @param $usualDetailedActivityId
     * @param $similarity
     *
     * @return true se associada com sucesso, false caso contrário
     */
    public function associateUsualToFrameworkMacroActivity($frameworkMacroActivityId, $usualMacroActivityId, $similarity) ;

    /**
     * Método utilizado para apagar as associações de uma atividade detalhada usual a uma de framework.
     *
     * @param $frameworkMacroActivityId
     *
     * @return true se apagada com sucesso, false caso contrário
     */
    public function deleteFrameworkMacroActivityReferences($frameworkMacroActivityId) ;

    /**
     * Método utilizado para recuperar as associações de uma atividade macro usual a uma de framework.
     *
     * @param $frameworkMacroActivityId
     *
     * @return uma lista com as referencias do tipo FrameworkMacroActivityReference
     */
    public function getFrameworkMacroActivityReferences($frameworkMacroActivityId);

    /**
     * Método utilizado para trocar a prioridade que indica a ordem com que duas atividades macros aparecem na árovre do processo.
     *
     * @param $macroActivityId1
     * @param $priority1
     * @param $macroActivityId2
     * @param $priority2
     *
     * @return true se alteradas com sucesso, false caso contrário
     */
    public function exchangeProcessMacroActivitiesPriority($macroActivityId1, $priority1, $macroActivityId2, $priority2) ;

    /**
     * Método utilizado para recuperar uma lista com acoes de projeto.
     *
     * @return uma lista com acoes das atividades detalhadas
     */
    public function getDetailedActivitiesActions() ;

    /**
     * Método utilizado para recuperar uma lista com objetos de projeto.
     *
     * @return uma lista com objetos das atividades macro
     */
    public function getDetailedActivitiesObjects() ;

    /**
     * Método utilizado para apagar uma atividade detalhada da fonte de dados.
     *
     * @param $detailedActivityId
     *
     * @return true se foi apagada com sucesso, caso contrário false.
     */
    public function deleteDetailedActivity($detailedActivityId) ;

    /**
     * Método utilizado para alterar uma atividade detalhada na fonte de dados.
     *
     * @param $detailedActivity
     *
     * @return true se foi apagada com sucesso, caso contrário false.
     */
    public function updateUsualDetailedActivity($detailedActivity) ;

    /**
     * Método utilizado para criar na fonte de dados, uma atividade detalhada usual.
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
     * @return true se foi criada com sucesso, caso contrário false.
     */
    public function createUsualDetailedActivity($userId, $macroActivityId, $action, $object, $action_synonymous, $object_synonymous, $description, $preCondition, $posCondition, $restriction, $reusedFrom) ;

    /**
     * Método utilizado para alterar uma atividade detalhada de framework na fonte de dados.
     *
     * @param $detailedActivity
     *
     * @return true se foi apagada com sucesso, caso contrário false.
     */
    public function updateFrameworkDetailedActivity($detailedActivity) ;

    /**
     * Método utilizado para criar na fonte de dados, uma atividade detalhada framework.
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
     * @return true se foi criada com sucesso, caso contrário false.
     */
    public function createFrameworkDetailedActivity($userId, $macroActivityId, $action, $object, $action_synonymous, $object_synonymous, $description, $type, $caracteristics) ;

    /**
     * Método utilizado recuperar as atividades detalhadas de uma macro
     *
     * @param $macroActivityId
     *
     * @return uma lista de atividades detalhadas
     */
    public function getMacroDetailedActivities($macroActivityId) ;

    /**
     * Método utilizado recuperar uma atividade detalhada reutilizada.
     *
     * @param $macroActivityId
     * @param $reusedFrom
     *
     * @return uma atividade detalhada reutilizada
     */
    public function getReusedDetailedActivity($macroActivityId, $reusedFrom) ;

    /**
     * Método utilizado recuperar uma atividade detalhada.
     *
     * @param $macroActivityId
     *
     * @return uma atividade detalhada reutilizada
     */
    public function getDetailedActivity($detailedActivityId) ;

    /**
     * Método utilizado recuperar atividades detalhadas similares a cujo identificador é passado como parâmetro.
     *
     * @param $macroActivityId
     *
     * @return uma lista de atividades detalhadas reutilizada
     */
    public function getSimilarDetailedActivities($detailedActivityId) ;

    /**
     * Método utilizado para associar uma atividade detalhada usual a uma de framework.
     *
     * @param $frameworkDetailedActivityId
     * @param $usualDetailedActivityId
     * @param $similarity
     *
     * @return true se associada com sucesso, false caso contrário
     */
    public function associateUsualToFrameworkDetailedActivity($frameworkDetailedActivityId, $usualDetailedActivityId, $similarity) ;

    /**
     * Método utilizado para apagar as associações de uma atividade detalhada usual a uma de framework.
     *
     * @param $frameworkDetailedActivityId
     *
     * @return true se apagada com sucesso, false caso contrário
     */
    public function deleteFrameworkDetailedActivityReferences($frameworkDetailedActivityId) ;

    /**
     * Método utilizado para recuperar as associações de uma atividade detalhada usual a uma de framework.
     *
     * @param $frameworkDetailedActivityId
     *
     * @return uma lista com as referencias do tipo FrameworkDetailedActivityReference
     */
    public function getFrameworkDetailedActivityReferences($frameworkDetailedActivityId) ;

    /**
     * Método utilizado para trocar a prioridade que indica a ordem com que duas atividades detalhadas aparecem na árovre do processo.
     *
     * @param $detailedActivityId1
     * @param $priority1
     * @param $detailedActivityId2
     * @param $priority2
     *
     * @return true se alteradas com sucesso, false caso contrário
     */
    public function exchangeMacroDetailedActivitiesPriority($detailedActivityId1, $priority1, $detailedActivityId2, $priority2) ;


    /**
     * Método utilizado para recuperar artefatos associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     * @param $type
     *
     * @return uma lista artefatos
     */
    public function getMacroActivityArtifacts($processId, $macroActivityId, $type) ;

    /**
     * Método utilizado para recuperar artefatos não associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     * @param $type
     *
     * @return uma lista artefatos
     */
    public function getNonMacroActivityArtifacts($processId, $macroActivityId, $type) ;

    /**
     * Método utilizado para associar um artefato a uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $artifactId
     * @param $type
     *
     * @return true se associado com sucesso, false caso contrário.
     */
    public function associateArtifactToMacroActivity($processId, $macroActivityId, $artifactId, $type) ;

    /**
     * Método utilizado para desassociar um artefato de uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $artifactId
     * @param $type
     *
     * @return true se desassociado com sucesso, false caso contrário.
     */
    public function dissociateArtifactFromMacroActivity($processId, $macroActivityId, $artifactId, $type) ;

    /**
     * Método utilizado para recuperar funções associadas a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return uma lista funções
     */
    public function getMacroActivityFunctions($processId, $macroActivityId) ;

    /**
     * Método utilizado para recuperar funções não associadas a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return uma lista funções
     */
    public function getNonMacroActivityFunctions($processId, $macroActivityId) ;

    /**
     * Método utilizado para associar uma funções a uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $functionsId
     *
     * @return true se associado com sucesso, false caso contrário.
     */
    public function associateFunctionToMacroActivity($processId, $macroActivityId, $functionId) ;

    /**
     * Método utilizado para desassociar um artefato de uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $functionId
     *
     * @return true se desassociado com sucesso, false caso contrário.
     */
    public function dissociateFunctionFromMacroActivity($processId, $macroActivityId, $functionId) ;

    /**
     * Método utilizado para recuperar métodos associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return uma lista métodos
     */
    public function getMacroActivityMethods($processId, $macroActivityId) ;

    /**
     * Método utilizado para recuperar métodos não associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return métodos
     */
    public function getNonMacroActivityMethods($processId, $macroActivityId) ;

    /**
     * Método utilizado para associar um métodos a uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $methodId
     *
     * @return true se associado com sucesso, false caso contrário.
     */
    public function associateMethodToMacroActivity($processId, $macroActivityId, $methodId) ;

    /**
     * Método utilizado para desassociar um métodos de uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $methodId
     *
     * @return true se desassociado com sucesso, false caso contrário.
     */
    public function dissociateMethodFromMacroActivity($processId, $macroActivityId, $methodId) ;

    /**
     * Método utilizado para recuperar ferramentas associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return uma lista ferramentas
     */
    public function getMacroActivityTools($processId, $macroActivityId) ;

    /**
     * Método utilizado para recuperar ferramentas não associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return uma lista ferramentas
     */
    public function getNonMacroActivityTools($processId, $macroActivityId) ;

    /**
     * Método utilizado para associar um ferramentas a uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $toolId
     *
     * @return true se associado com sucesso, false caso contrário.
     */
    public function associateToolToMacroActivity($processId, $macroActivityId, $toolId) ;

    /**
     * Método utilizado para desassociar um ferramentas de uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $toolId
     *
     * @return true se desassociado com sucesso, false caso contrário.
     */
    public function dissociateToolFromMacroActivity($processId, $macroActivityId, $toolId) ;

    /**
     * Método utilizado para recuperar artefatos associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     * @param $type
     *
     * @return uma lista artefatos
     */
    public function getDetailedActivityArtifacts($processId, $detailedActivityId, $type) ;

    /**
     * Método utilizado para recuperar artefatos não associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     * @param $type
     *
     * @return uma lista artefatos
     */
    public function getNonDetailedActivityArtifacts($processId, $detailedActivityId, $type) ;

    /**
     * Método utilizado para associar um artefato a uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $artifactId
     * @param $type
     *
     * @return true se associado com sucesso, false caso contrário.
     */
    public function associateArtifactToDetailedActivity($processId, $detailedActivityId, $artifactId, $type) ;

    /**
     * Método utilizado para desassociar um artefato de uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $artifactId
     * @param $type
     *
     * @return true se desassociado com sucesso, false caso contrário.
     */
    public function dissociateArtifactFromDetailedActivity($processId, $detailedActivityId, $artifactId, $type) ;

    /**
     * Método utilizado para recuperar funções associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista funções
     */
    public function getDetailedActivityFunctions($processId, $detailedActivityId) ;

    /**
     * Método utilizado para recuperar funções não associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista funções
     */
    public function getNonDetailedActivityFunctions($processId, $detailedActivityId) ;

    /**
     * Método utilizado para associar umas funções a uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $functionId
     *
     * @return true se associado com sucesso, false caso contrário.
     */
    public function associateFunctionToDetailedActivity($processId, $detailedActivityId, $functionId) ;

    /**
     * Método utilizado para desassociar um artefato de uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $functionId
     *
     * @return true se desassociado com sucesso, false caso contrário.
     */
    public function dissociateFunctionFromDetailedActivity($processId, $detailedActivityId, $functionId) ;

    /**
     * Método utilizado para recuperar métodos associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista métodos
     */
    public function getDetailedActivityMethods($processId, $detailedActivityId) ;

    /**
     * Método utilizado para recuperar métodos não associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista métodos
     */
    public function getNonDetailedActivityMethods($processId, $detailedActivityId) ;

    /**
     * Método utilizado para associar um métodos a uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $methodId
     *
     * @return true se associado com sucesso, false caso contrário.
     */
    public function associateMethodToDetailedActivity($processId, $detailedActivityId, $methodId) ;

    /**
     * Método utilizado para desassociar um métodos de uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $methodId
     *
     * @return true se desassociado com sucesso, false caso contrário.
     */
    public function dissociateMethodFromDetailedActivity($processId, $detailedActivityId, $methodId) ;

    /**
     * Método utilizado para recuperar ferramentas não associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista ferramentas
     */
    public function getDetailedActivityTools($processId, $detailedActivityId) ;

    /**
     * Método utilizado para recuperar ferramentas não associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista ferramentas
     */
    public function getNonDetailedActivityTools($processId, $detailedActivityId) ;

    /**
     * Método utilizado para associar um ferramentas a uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $toolId
     *
     * @return true se associado com sucesso, false caso contrário.
     */
    public function associateToolToDetailedActivity($processId, $detailedActivityId, $toolId) ;

    /**
     * Método utilizado para desassociar um ferramentas de uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $toolId
     *
     * @return true se desassociado com sucesso, false caso contrário.
     */
    public function dissociateToolFromDetailedActivity($processId, $detailedActivityId, $toolId) ;
}

?>