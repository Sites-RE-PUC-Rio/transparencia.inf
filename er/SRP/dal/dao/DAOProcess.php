
<?php

require_once "dal/interfaces/IProcessSource.php" ;
require_once "dal/dao/SourceFactory.php" ;


final class DAOProcess
{
    private static $_SOURCE_NAME = "Process" ;

    private function __construct()
    {
    }

     /**
     * Método utilizado para recuperar uma lista de autores de processos.
     *
     * @return uma lista ordenada de forma crescente com os autores de processos
     */
    public static function getProcessesAuthors()
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcessesAuthors() ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar uma lista de nomes de processos usuais diferentes
     * do processo cujo identificador é passado como argumento.
     *
     * @param $processId
     *
     * @return uma lista ordenada de forma crescente com os nomes dos processos usuais
     */
    public static function getOtherProcessesNames($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getOtherProcessesNames($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para apagar um processo da fonte de dados.
     *
     * @param $processId
     *
     * @return true se foi apagado com sucesso, false caso contrário.
     */
    public static function deleteProcess($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->deleteProcess($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para alterar um processo na fonte de dados.
     *
     * @param $process
     *
     * @return true se foi alterado com sucesso, false caso contrário.
     */
    public static function updateProcess($process)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updateProcess($process) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

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
    public static function createProcess($userId, $name, $author, $objective, $description, $classification, $nature, $conformity, $area, $lifeCicle, $systemType, $organizationSize, $projectDuration, $teamSize, $requiredKnowledge, $teamLocation, $keyWords=NULL, $preCondition=NULL, $posCondition=NULL)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createProcess($userId, $name, $author, $objective, $description, $classification, $nature, $conformity, $area, $lifeCicle, $systemType, $organizationSize, $projectDuration, $teamSize, $requiredKnowledge, $teamLocation, $keyWords, $preCondition, $posCondition) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return -1 ;
        }
    }

    /**
     * Método utilizado para recuperar um processo da fonte de dados.
     *
     * @param $processId
     *
     * @return o processo ou null em caso de erro
     */
    public static function getProcess($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcess($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return NULL ;
        }
    }

    /**
     * Método utilizado para recuperar a lista de processos criados por um usuário.
     *
     * @param $userId
     *
     * @return uma lista com os processos criados por aquele usuário
     */
    public static function getUserProcesses($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getUserProcesses($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar a lista de processos criados por outro usuário que nao seja o identificado pelo parâmetro.
     *
     * @param $userId
     *
     * @return uma lista com os processos criados por outros usuários
     */
    public static function getOthersProcesses($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getOthersProcesses($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar um mapa de processos dado o autor.
     * A chave do mapa seria o identificador do projeto.
     *
     * @param $userId
     *
     * @return um mapa com os processos
     */
    public static function getProcessesMapByAuthor($author)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcessesMapByAuthor($author) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar um mapa de processos dado o nome.
     * A chave do mapa seria o identificador do projeto.
     *
     * @param $userId
     *
     * @return um mapa com os processos
     */
    public static function getProcessesMapByName($name)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcessesMapByName($name) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar um mapa de processos dado a ação e objeto de uma atividade macro
     * A chave do mapa seria o identificador do projeto.
     *
     * @param $userId
     *
     * @return um mapa com os processos
     */
    public static function getProcessesMapByMacroActivity($action, $object)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcessesMapByMacroActivity($action, $object) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar um mapa de processos dado a ação e objeto de uma atividade macro
     * A chave do mapa seria o identificador do projeto.
     *
     * @param $userId
     *
     * @return um mapa com os processos
     */
    public static function getProcessesMapByDetailedActivity($action, $object)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcessesMapByDetailedActivity($action, $object) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar uma lista com acoes de projeto.
     *
     * @return uma lista com acoes das atividades macro
     */
    public static function getMacroActivitiesActions()
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getMacroActivitiesActions() ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar uma lista com objetos de projeto.
     *
     * @return uma lista com objetos das atividades macro
     */
    public static function getMacroActivitiesObjects()
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getMacroActivitiesObjects() ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para apagar uma atividade macro da fonte de dados.
     *
     * @param $macroActivityId
     *
     * @return true se foi apagada com sucesso, caso contrário false.
     */
    public static function deleteMacroActivity($macroActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->deleteMacroActivity($macroActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para alterar uma atividade macro na fonte de dados.
     *
     * @param $macroActivity
     *
     * @return true se foi apagada com sucesso, caso contrário false.
     */
    public static function updateUsualMacroActivity($macroActivity)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updateUsualMacroActivity($macroActivity) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

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
    public static function createUsualMacroActivity($userId, $processId, $action, $object, $action_synonymous, $object_synonymous, $description, $preCondition, $posCondition, $restriction)
    {
        return self::reuseUsualMacroActivity($userId, $processId, $action, $object, $action_synonymous, $object_synonymous, $description, $preCondition, $posCondition, $restriction, NULL) ;
    }


    public static function reuseUsualMacroActivity($userId, $processId, $action, $object, $action_synonymous, $object_synonymous, $description, $preCondition, $posCondition, $restriction, $reusedFrom)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createUsualMacroActivity($userId, $processId, $action, $object, $action_synonymous, $object_synonymous, $description, $preCondition, $posCondition, $restriction, $reusedFrom) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return -1 ;
        }
    }

    /**
     * Método utilizado para alterar uma atividade macro de framework na fonte de dados.
     *
     * @param $macroActivity
     *
     * @return true se foi apagada com sucesso, caso contrário false.
     */
    public static function updateFrameworkMacroActivity($macroActivity)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updateFrameworkMacroActivity($macroActivity) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

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
    public static function createFrameworkMacroActivity($userId, $processId, $action, $object, $action_synonymous, $object_synonymous, $description, $type, $caracteristics)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createFrameworkMacroActivity($userId, $processId, $action, $object, $action_synonymous, $object_synonymous, $description, $type, $caracteristics) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return -1 ;
        }
    }

    /**
     * Método utilizado recuperar as atividades macro de um processo.
     *
     * @param $processId
     *
     * @return uma lista de atividades macro
     */
    public static function getProcessMacroActivities($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcessMacroActivities($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado recuperar uma atividade macro reutilizada.
     *
     * @param $processId
     * @param $reusedFrom
     *
     * @return uma atividade macro reutilizada
     */
    public static function getReusedMacroActivity($processId, $reusedFrom)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getReusedMacroActivity($processId, $reusedFrom)  ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return NULL ;
        }
    }

    /**
     * Método utilizado recuperar uma atividade macro.
     *
     * @param $macroActivityId
     *
     * @return uma atividade macro reutilizada
     */
    public static function getMacroActivity($macroActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getMacroActivity($macroActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return NULL ;
        }
    }

    /**
     * Método utilizado recuperar atividades macro similares a cujo identificador é passado como parâmetro.
     *
     * @param $macroActivityId
     *
     * @return uma lista de atividades macro reutilizada
     */
    public static function getSimilarMacroActivities($macroActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getSimilarMacroActivities($macroActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para associar uma atividade detalhada usual a uma de framework.
     *
     * @param $frameworkDetailedActivityId
     * @param $usualDetailedActivityId
     * @param $similarity
     *
     * @return true se associada com sucesso, false caso contrário
     */
    public static function associateUsualToFrameworkMacroActivity($frameworkMacroActivityId, $usualMacroActivityId, $similarity)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateUsualToFrameworkMacroActivity($frameworkMacroActivityId, $usualMacroActivityId, $similarity) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para apagar as associações de uma atividade detalhada usual a uma de framework.
     *
     * @param $frameworkMacroActivityId
     *
     * @return true se apagada com sucesso, false caso contrário
     */
    public static function deleteFrameworkMacroActivityReferences($frameworkMacroActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->deleteFrameworkMacroActivityReferences($frameworkMacroActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para recuperar as associações de uma atividade macro usual a uma de framework.
     *
     * @param $frameworkMacroActivityId
     *
     * @return uma lista com as referencias do tipo FrameworkMacroActivityReference
     */
    public static function getFrameworkMacroActivityReferences($frameworkMacroActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getFrameworkMacroActivityReferences($frameworkMacroActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

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
    public static function exchangeProcessMacroActivitiesPriority($macroActivityId1, $priority1, $macroActivityId2, $priority2)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->exchangeProcessMacroActivitiesPriority($macroActivityId1, $priority1, $macroActivityId2, $priority2) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado recuperar uma atividade detalhada reutilizada.
     *
     * @param $macroActivityId
     * @param $reusedFrom
     *
     * @return uma atividade detalhada reutilizada
     */
    public static function getReusedDetailedActivity($macroActivityId, $reusedFrom)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getReusedDetailedActivity($macroActivityId, $reusedFrom) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar uma lista com acoes de projeto.
     *
     * @return uma lista com acoes das atividades detalhadas
     */
    public static function getDetailedActivitiesActions()
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getDetailedActivitiesActions() ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar uma lista com objetos de projeto.
     *
     * @return uma lista com objetos das atividades macro
     */
    public static function getDetailedActivitiesObjects()
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getDetailedActivitiesObjects() ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para apagar uma atividade detalhada da fonte de dados.
     *
     * @param $detailedActivityId
     *
     * @return true se foi apagada com sucesso, caso contrário false.
     */
    public static function deleteDetailedActivity($detailedActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->deleteDetailedActivity($detailedActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para alterar uma atividade detalhada na fonte de dados.
     *
     * @param $detailedActivity
     *
     * @return true se foi apagada com sucesso, caso contrário false.
     */
    public static function updateUsualDetailedActivity($detailedActivity)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updateUsualDetailedActivity($detailedActivity) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

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
    public static function createUsualDetailedActivity($userId, $macroActivityId, $action, $object, $action_synonymous, $object_synonymous, $description, $preCondition, $posCondition, $restriction)
    {
        return self::reuseUsualDetailedActivity($userId, $macroActivityId, $action, $object, $action_synonymous, $object_synonymous, $description, $preCondition, $posCondition, $restriction, NULL) ;
    }

    public static function reuseUsualDetailedActivity($userId, $macroActivityId, $action, $object, $action_synonymous, $object_synonymous, $description, $preCondition, $posCondition, $restriction, $reusedFrom)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createUsualDetailedActivity($userId, $macroActivityId, $action, $object, $action_synonymous, $object_synonymous, $description, $preCondition, $posCondition, $restriction, $reusedFrom) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return -1 ;
        }
    }

    /**
     * Método utilizado para alterar uma atividade detalhada de framework na fonte de dados.
     *
     * @param $detailedActivity
     *
     * @return true se foi apagada com sucesso, caso contrário false.
     */
    public static function updateFrameworkDetailedActivity($detailedActivity)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updateFrameworkDetailedActivity($detailedActivity) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

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
    public static function createFrameworkDetailedActivity($userId, $macroActivityId, $action, $object, $action_synonymous, $object_synonymous, $description, $type, $caracteristics)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createFrameworkDetailedActivity($userId, $macroActivityId, $action, $object, $action_synonymous, $object_synonymous, $description, $type, $caracteristics) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return -1 ;
        }
    }

    /**
     * Método utilizado recuperar as atividades detalhadas de uma macro
     *
     * @param $macroActivityId
     *
     * @return uma lista de atividades detalhadas
     */
    public static function getMacroDetailedActivities($macroActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getMacroDetailedActivities($macroActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado recuperar uma atividade detalhada.
     *
     * @param $macroActivityId
     *
     * @return uma atividade detalhada reutilizada
     */
    public static function getDetailedActivity($detailedActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getDetailedActivity($detailedActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return NULL ;
        }
    }

    /**
     * Método utilizado recuperar atividades detalhadas similares a cujo identificador é passado como parâmetro.
     *
     * @param $macroActivityId
     *
     * @return uma lista de atividades detalhadas reutilizada
     */
    public static function getSimilarDetailedActivities($detailedActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getSimilarDetailedActivities($detailedActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para associar uma atividade detalhada usual a uma de framework.
     *
     * @param $frameworkDetailedActivityId
     * @param $usualDetailedActivityId
     * @param $similarity
     *
     * @return true se associada com sucesso, false caso contrário
     */
    public static function associateUsualToFrameworkDetailedActivity($frameworkDetailedActivityId, $usualDetailedActivityId, $similarity)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateUsualToFrameworkDetailedActivity($frameworkDetailedActivityId, $usualDetailedActivityId, $similarity) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para apagar as associações de uma atividade detalhada usual a uma de framework.
     *
     * @param $frameworkDetailedActivityId
     *
     * @return true se apagada com sucesso, false caso contrário
     */
    public static function deleteFrameworkDetailedActivityReferences($frameworkDetailedActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->deleteFrameworkDetailedActivityReferences($frameworkDetailedActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para recuperar as associações de uma atividade detalhada usual a uma de framework.
     *
     * @param $frameworkDetailedActivityId
     *
     * @return uma lista com as referencias do tipo FrameworkDetailedActivityReference
     */
    public static function getFrameworkDetailedActivityReferences($frameworkDetailedActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getFrameworkDetailedActivityReferences($frameworkDetailedActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

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
    public static function exchangeMacroDetailedActivitiesPriority($detailedActivityId1, $priority1, $detailedActivityId2, $priority2)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->exchangeMacroDetailedActivitiesPriority($detailedActivityId1, $priority1, $detailedActivityId2, $priority2) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para recuperar uma lista de artefatos do processo
     * A chave do mapa seria o identificador do projeto.
     *
     * @param $processId
     * @param $type
     *
     * @return uma lista com os processos
     */
    public static function getProcessArtifacts($processId, $type)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcessArtifacts($processId, $type) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar uma lista de artefatos que nao são associados a este processo.
     *
     * @param $processId
     * @param $type
     *
     * @return uma lista com os processos
     */
    public static function getNonProcessArtifacts($processId, $type)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonProcessArtifacts($processId, $type) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para associar um artefato a um processo
     *
     * @param $processId
     * @param $artifactId
     * @param $type
     *
     * @return true se foi associado com sucesso, caso contrário false
     */
    public static function associateArtifactToProcess($processId, $artifactId, $type)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateArtifactToProcess($processId, $artifactId, $type) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para dissociar um artefato de um processo
     *
     * @param $processId
     * @param $artifactId
     * @param $type
     *
     * @return true se foi dissociado com sucesso, caso contrário false
     */
    public static function dissociateArtifactFromProcess($processId, $artifactId, $type)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateArtifactFromProcess($processId, $artifactId, $type) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Metodo para recuperar os conceitos associados ao processo
     *
     * @param $processId
     * @return lista de conceitos associadas ao processo
     */
    public static function getProcessConcepts($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcessConcepts($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Metodo para recuperar os conceitos que não foram associados ao processo
     *
     * @param $processId
     * @return lista de conceitos que não foram associadas ao processo
     */
    public static function getNonProcessConcepts($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonProcessConcepts($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Metodo para associar os conceitos ao processo
     *
     * @param $processId
     * @param $conceptId
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public static function associateConceptToProcess($processId, $conceptId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateConceptToProcess($processId, $conceptId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Metodo para desassociar os conceitos ao processo
     *
     * @param $processId
     * @param $conceptId
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public static function dissociateConceptFromProcess($processId,$conceptId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateConceptFromProcess($processId,$conceptId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

   /**
    * Metodo para recuperar as ferramentas associadas ao processo
    *
    * @param $processId
    * @return lista de ferramentas associadas ao processo
    */
    public static function getProcessTools($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcessTools($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Metodo para recuperar as ferramentas que não foram associadas ao processo
     *
     * @param $processId
     * @return lista de ferramentas que não foram associadas ao processo
     */
    public static function getNonProcessTools($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonProcessTools($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

   /**
    * Metodo para associar as ferramentas ao processo
    *
    * @param $processId
    * @param $toolId
    * @return true se associação foi criada com sucesso, false caso contrário
    */
    public static function associateToolToProcess($processId, $toolId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateToolToProcess($processId, $toolId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

   /**
    * Metodo para desassociar as ferramentas ao processo
    *
    * @param $processId
    * @param $toolId
    * @return true se desassociação foi feita com sucesso, false caso contrário
    */
    public static function dissociateToolFromProcess($processId,$toolId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateToolFromProcess($processId,$toolId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

   /**
    * Metodo para recuperar os formularios associados ao processo
    *
    * @param $processId
    * @return lista de formularios associados ao processo
    */
    public static function getProcessForms($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcessForms($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Metodo para recuperar os formularios que não foram associados ao processo
     *
     * @param $processId
     * @return lista de formularios que não foram associados ao processo
     */
    public static function getNonProcessForms($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonProcessForms($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

   /**
    * Metodo para associar os formularios ao processo
    *
    * @param $processId
    * @param $formId
    * @return true se associação foi criada com sucesso, false caso contrário
    */
    public static function associateFormToProcess($processId, $formId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateFormToProcess($processId, $formId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

   /**
    * Metodo para desassociar os formularios ao processo
    *
    * @param $processId
    * @param $formId
    * @return true se desassociação foi feita com sucesso, false caso contrário
    */
    public static function dissociateFormFromProcess($processId,$formId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateFormFromProcess($processId,$formId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

   /**
    * Metodo para recuperar os funções associados ao processo
    *
    * @param $processId
    * @return lista de funções associados ao processo
    */
    public static function getProcessFunctions($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcessFunctions($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Metodo para recuperar os funções que não foram associados ao processo
     *
     * @param $processId
     * @return lista de funções que não foram associados ao processo
     */
    public static function getNonProcessFunctions($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonProcessFunctions($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

   /**
    * Metodo para associar os funções ao processo
    *
    * @param $processId
    * @param $functionId
    * @return true se associação foi criada com sucesso, false caso contrário
    */
    public static function associateFunctionToProcess($processId, $functionId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateFunctionToProcess($processId, $functionId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

   /**
    * Metodo para desassociar os funções ao processo
    *
    * @param $processId
    * @param $functionId
    * @return true se desassociação foi feita com sucesso, false caso contrário
    */
    public static function dissociateFunctionFromProcess($processId,$functionId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateFunctionFromProcess($processId,$functionId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

   /**
    * Metodo para recuperar os medições associados ao processo
    *
    * @param $processId
    * @return lista de medições associados ao processo
    */
    public static function getProcessMeasurements($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcessMeasurements($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Metodo para recuperar os medições que não foram associados ao processo
     *
     * @param $processId
     * @return lista de medições que não foram associados ao processo
     */
    public static function getNonProcessMeasurements($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonProcessMeasurements($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

   /**
    * Metodo para associar os medições ao processo
    *
    * @param $processId
    * @param $measurementId
    * @return true se associação foi criada com sucesso, false caso contrário
    */
    public static function associateMeasurementToProcess($processId, $measurementId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateMeasurementToProcess($processId, $measurementId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }       

   /**
    * Metodo para desassociar os medições ao processo
    *
    * @param $processId
    * @param $measurementId
    * @return true se desassociação foi feita com sucesso, false caso contrário
    */
    public static function dissociateMeasurementFromProcess($processId,$measurementId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateMeasurementFromProcess($processId,$measurementId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

   /**
    * Metodo para recuperar os metodos associados ao processo
    *
    * @param $processId
    * @return lista de metodos associados ao processo
    */
    public static function getProcessMethods($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcessMethods($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Metodo para recuperar os metodos que não foram associados ao processo
     *
     * @param $processId
     * @return lista de metodos que não foram associados ao processo
     */
    public static function getNonProcessMethods($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonProcessMethods($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

   /**
    * Metodo para associar os metodos ao processo
    *
    * @param $processId
    * @param $methodId
    * @return true se associação foi criada com sucesso, false caso contrário
    */
    public static function associateMethodToProcess($processId, $methodId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateMethodToProcess($processId, $methodId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

   /**
    * Metodo para desassociar os metodos ao processo
    *
    * @param $processId
    * @param $methodId
    * @return true se desassociação foi feita com sucesso, false caso contrário
    */
    public static function dissociateMethodFromProcess($processId,$methodId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateMethodFromProcess($processId,$methodId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

   /**
    * Metodo para recuperar os politicas associados ao processo
    *
    * @param $processId
    * @return lista de politicas associados ao processo
    */
    public static function getProcessPolitics($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcessPolitics($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Metodo para recuperar os politicas que não foram associados ao processo
     *
     * @param $processId
     * @return lista de politicas que não foram associados ao processo
     */
    public static function getNonProcessPolitics($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonProcessPolitics($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

   /**
    * Metodo para associar os politicas ao processo
    *
    * @param $processId
    * @param $politicsId
    * @return true se associação foi criada com sucesso, false caso contrário
    */
    public static function associatePoliticsToProcess($processId, $politicsId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associatePoliticsToProcess($processId, $politicsId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

   /**
    * Metodo para desassociar os politicas ao processo
    *
    * @param $processId
    * @param $politicsId
    * @return true se desassociação foi feita com sucesso, false caso contrário
    */
    public static function dissociatePoliticsFromProcess($processId,$politicsId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociatePoliticsFromProcess($processId,$politicsId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

   /**
    * Metodo para recuperar os treinamentos associados ao processo
    *
    * @param $processId
    * @return lista de treinamentos associados ao processo
    */
    public static function getProcessTrainings($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcessTrainings($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Metodo para recuperar os treinamentos que não foram associados ao processo
     *
     * @param $processId
     * @return lista de treinamentos que não foram associados ao processo
     */
    public static function getNonProcessTrainings($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonProcessTrainings($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

   /**
    * Metodo para associar os treinamentos ao processo
    *
    * @param $processId
    * @param $trainingId
    * @return true se associação foi criada com sucesso, false caso contrário
    */
    public static function associateTrainingToProcess($processId, $trainingId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateTrainingToProcess($processId, $trainingId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

   /**
    * Metodo para desassociar os treinamentos ao processo
    *
    * @param $processId
    * @param $trainingId
    * @return true se desassociação foi feita com sucesso, false caso contrário
    */
    public static function dissociateTrainingFromProcess($processId,$trainingId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateTrainingFromProcess($processId,$trainingId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

   /**
    * Metodo para recuperar os verificações associados ao processo
    *
    * @param $processId
    * @return lista de verificações associados ao processo
    */
    public static function getProcessVerifications($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getProcessVerifications($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Metodo para recuperar os verificações que não foram associados ao processo
     *
     * @param $processId
     * @return lista de verificações que não foram associados ao processo
     */
    public static function getNonProcessVerifications($processId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonProcessVerifications($processId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

   /**
    * Metodo para associar os verificações ao processo
    *
    * @param $processId
    * @param $verificationId
    * @return true se associação foi criada com sucesso, false caso contrário
    */
    public static function associateVerificationToProcess($processId, $verificationId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateVerificationToProcess($processId, $verificationId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

   /**
    * Metodo para desassociar os verificações ao processo
    *
    * @param $processId
    * @param $verificationId
    * @return true se desassociação foi feita com sucesso, false caso contrário
    */
    public static function dissociateVerificationFromProcess($processId,$verificationId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateVerificationFromProcess($processId,$verificationId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para recuperar artefatos associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     * @param $type
     *
     * @return uma lista artefatos
     */
    public static function getMacroActivityArtifacts($processId, $macroActivityId, $type)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getMacroActivityArtifacts($processId, $macroActivityId, $type) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar artefatos não associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     * @param $type
     *
     * @return uma lista artefatos
     */
    public static function getNonMacroActivityArtifacts($processId, $macroActivityId, $type)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonMacroActivityArtifacts($processId, $macroActivityId, $type) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

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
    public static function associateArtifactToMacroActivity($processId, $macroActivityId, $artifactId, $type)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateArtifactToMacroActivity($processId, $macroActivityId, $artifactId, $type) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

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
    public static function dissociateArtifactFromMacroActivity($processId, $macroActivityId, $artifactId, $type)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateArtifactFromMacroActivity($processId, $macroActivityId, $artifactId, $type) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para recuperar funções associadas a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return uma lista funções
     */
    public static function getMacroActivityFunctions($processId, $macroActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getMacroActivityFunctions($processId, $macroActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar funções não associadas a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return uma lista funções
     */
    public static function getNonMacroActivityFunctions($processId, $macroActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonMacroActivityFunctions($processId, $macroActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para associar uma funções a uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $functionsId
     *
     * @return true se associado com sucesso, false caso contrário.
     */
    public static function associateFunctionToMacroActivity($processId, $macroActivityId, $functionId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateFunctionToMacroActivity($processId, $macroActivityId, $functionId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para desassociar um artefato de uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $functionId
     *
     * @return true se desassociado com sucesso, false caso contrário.
     */
    public static function dissociateFunctionFromMacroActivity($processId, $macroActivityId, $functionId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateFunctionFromMacroActivity($processId, $macroActivityId, $functionId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para recuperar métodos associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return uma lista métodos
     */
    public static function getMacroActivityMethods($processId, $macroActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getMacroActivityMethods($processId, $macroActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar métodos não associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return métodos
     */
    public static function getNonMacroActivityMethods($processId, $macroActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonMacroActivityMethods($processId, $macroActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para associar um métodos a uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $methodId
     *
     * @return true se associado com sucesso, false caso contrário.
     */
    public static function associateMethodToMacroActivity($processId, $macroActivityId, $methodId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateMethodToMacroActivity($processId, $macroActivityId, $methodId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para desassociar um métodos de uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $methodId
     *
     * @return true se desassociado com sucesso, false caso contrário.
     */
    public static function dissociateMethodFromMacroActivity($processId, $macroActivityId, $methodId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateMethodFromMacroActivity($processId, $macroActivityId, $methodId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para recuperar ferramentas associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return uma lista ferramentas
     */
    public static function getMacroActivityTools($processId, $macroActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getMacroActivityTools($processId, $macroActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar ferramentas não associados a uma atividade marco.
     *
     * @param $processId
     * @param $macroActivityId
     *
     * @return uma lista ferramentas
     */
    public static function getNonMacroActivityTools($processId, $macroActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonMacroActivityTools($processId, $macroActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para associar um ferramentas a uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $toolId
     *
     * @return true se associado com sucesso, false caso contrário.
     */
    public static function associateToolToMacroActivity($processId, $macroActivityId, $toolId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateToolToMacroActivity($processId, $macroActivityId, $toolId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para desassociar um ferramentas de uma atividade macro.
     *
     * @param $processId
     * @param $macroActivityId     .
     * @param $toolId
     *
     * @return true se desassociado com sucesso, false caso contrário.
     */
    public static function dissociateToolFromMacroActivity($processId, $macroActivityId, $toolId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateToolFromMacroActivity($processId, $macroActivityId, $toolId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para recuperar artefatos associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     * @param $type
     *
     * @return uma lista artefatos
     */
    public static function getDetailedActivityArtifacts($processId, $detailedActivityId, $type)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getDetailedActivityArtifacts($processId, $detailedActivityId, $type) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar artefatos não associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     * @param $type
     *
     * @return uma lista artefatos
     */
    public static function getNonDetailedActivityArtifacts($processId, $detailedActivityId, $type)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonDetailedActivityArtifacts($processId, $detailedActivityId, $type) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

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
    public static function associateArtifactToDetailedActivity($processId, $detailedActivityId, $artifactId, $type)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateArtifactToDetailedActivity($processId, $detailedActivityId, $artifactId, $type) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

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
    public static function dissociateArtifactFromDetailedActivity($processId, $detailedActivityId, $artifactId, $type)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateArtifactFromDetailedActivity($processId, $detailedActivityId, $artifactId, $type) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para recuperar funções associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista funções
     */
    public static function getDetailedActivityFunctions($processId, $detailedActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getDetailedActivityFunctions($processId, $detailedActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar funções não associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista funções
     */
    public static function getNonDetailedActivityFunctions($processId, $detailedActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonDetailedActivityFunctions($processId, $detailedActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para associar umas funções a uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $functionId
     *
     * @return true se associado com sucesso, false caso contrário.
     */
    public static function associateFunctionToDetailedActivity($processId, $detailedActivityId, $functionId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateFunctionToDetailedActivity($processId, $detailedActivityId, $functionId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para desassociar um artefato de uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $functionId
     *
     * @return true se desassociado com sucesso, false caso contrário.
     */
    public static function dissociateFunctionFromDetailedActivity($processId, $detailedActivityId, $functionId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateFunctionFromDetailedActivity($processId, $detailedActivityId, $functionId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para recuperar métodos associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista métodos
     */
    public static function getDetailedActivityMethods($processId, $detailedActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getDetailedActivityMethods($processId, $detailedActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar métodos não associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista métodos
     */
    public static function getNonDetailedActivityMethods($processId, $detailedActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonDetailedActivityMethods($processId, $detailedActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para associar um métodos a uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $methodId
     *
     * @return true se associado com sucesso, false caso contrário.
     */
    public static function associateMethodToDetailedActivity($processId, $detailedActivityId, $methodId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateMethodToDetailedActivity($processId, $detailedActivityId, $methodId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para desassociar um métodos de uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $methodId
     *
     * @return true se desassociado com sucesso, false caso contrário.
     */
    public static function dissociateMethodFromDetailedActivity($processId, $detailedActivityId, $methodId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateMethodFromDetailedActivity($processId, $detailedActivityId, $methodId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para recuperar ferramentas não associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista ferramentas
     */
    public static function getDetailedActivityTools($processId, $detailedActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getDetailedActivityTools($processId, $detailedActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para recuperar ferramentas não associados a uma atividade marco.
     *
     * @param $processId
     * @param $detailedActivityId
     *
     * @return uma lista ferramentas
     */
    public static function getNonDetailedActivityTools($processId, $detailedActivityId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getNonDetailedActivityTools($processId, $detailedActivityId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

    /**
     * Método utilizado para associar um ferramentas a uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $toolId
     *
     * @return true se associado com sucesso, false caso contrário.
     */
    public static function associateToolToDetailedActivity($processId, $detailedActivityId, $toolId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->associateToolToDetailedActivity($processId, $detailedActivityId, $toolId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    /**
     * Método utilizado para desassociar um ferramentas de uma atividade detalhada.
     *
     * @param $processId
     * @param $detailedActivityId     .
     * @param $toolId
     *
     * @return true se desassociado com sucesso, false caso contrário.
     */
    public static function dissociateToolFromDetailedActivity($processId, $detailedActivityId, $toolId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->dissociateToolFromDetailedActivity($processId, $detailedActivityId, $toolId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }
}

?>