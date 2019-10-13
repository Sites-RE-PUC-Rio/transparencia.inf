
<?php

require_once "dal/interfaces/IAuxiliaryTablesSource.php" ;
require_once "dal/dao/SourceFactory.php" ;

/**
 * Classe realiza a cria��o e manuten��o das tabelas auxiliares,
 */
final class DAOAuxiliaryTables
{
    private static $_SOURCE_NAME = "AuxiliaryTables" ;

    private function __construct()
    {
    }

    // begin Artifact

     /**
      * M�todo para criar uma instancia da classe artefato.
      *
      * @param $userId
      * @param $name
      * @param $description
      * @return retorna identificador do artefato
      */
    public static function createArtifact($userId, $name, $description)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createArtifact($userId, $name, $description) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return -1 ;
        }
    }

     /**
      * M�todo para recuperar uma inst�ncia da classe de artefato.
      *
      * @param $artifactId
      * @return uma instancia do artefato
      */
    public static function getArtifact($artifactId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getArtifact($artifactId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return NULL ;
        }
    }

     /**
      * M�todo para recuperar a lista de artefatos criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de artefatos
      */
    public static function getUserArtifacts($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getUserArtifacts($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para recuperar a lista de artefatos criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de artefatos
      */
    public static function getOthersArtifacts($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getOthersArtifacts($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para alterar a instancia do artefato.
      *
      * @param $artifact
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public static function updateArtifact($artifact)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updateArtifact($artifact) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

     /**
      * M�todo para excluir a instancia do artefato.
      *
      * @param $artifactId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public static function deleteArtifact($artifactId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->deleteArtifact($artifactId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }
    // end Artifact

    // begin Concept

     /**
      * M�todo para criar uma inst�ncia da classe de conceito.
      *
      * @param $userId
      * @param $termName
      * @param $termType
      * @param $termDescription
      * @return retorna identificador do conceito
      */
    public static function createConcept($userId, $termName, $termType, $termDescription)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createConcept($userId, $termName, $termType, $termDescription) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return -1 ;
        }
    }

    /**
     * M�todo para recuperar uma inst�ncia da classe de conceitos.
     *
     * @param $conceptId
     * @return uma instancia do conceito
     */
    public static function getConcept($conceptId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getConcept($conceptId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return NULL ;
        }
    }

     /**
      * M�todo para recuperar a lista de conceitos criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de conceitos
      */
    public static function getUserConcepts($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getUserConcepts($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para recuperar a lista de conceitos criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de conceitos
      */
    public static function getOthersConcepts($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getOthersConcepts($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para alterar a instancia do conceito.
      *
      * @param $concept
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public static function updateConcept($concept)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updateConcept($concept) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

     /**
      * M�todo para excluir a instancia do conceito.
      *
      * @param $conceptId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public static function deleteConcept($conceptId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->deleteConcept($conceptId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }
    // end Concept

    // begin Form

     /**
      * M�todo para criar uma inst�ncia da classe de formul�rio.
      *
      * @param $userId
      * @param $name
      * @param $purpose
      * @return retorna identificador do formul�rio
      */
    public static function createForm($userId, $name, $purpose)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createForm($userId, $name, $purpose) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return -1 ;
        }
    }

    /**
     * M�todo para recuperar uma inst�ncia da classe de formulario.
     *
     * @param $formId
     * @return uma instancia do formulario
     */
    public static function getForm($formId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getForm($formId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return NULL ;
        }
    }

     /**
      * M�todo para recuperar a lista de formul�rios criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de formul�rios
      */
    public static function getUserForms($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getUserForms($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para recuperar a lista de formul�rios criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de formul�rios
      */
    public static function getOthersForms($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getOthersForms($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para alterar a instancia do formul�rio.
      *
      * @param $form
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public static function updateForm($form)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updateForm($form) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

     /**
      * M�todo para excluir a instancia do formul�rio.
      *
      * @param $formId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public static function deleteForm($formId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->deleteForm($formId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }
    // end Form

   // begin Function

     /**
      * M�todo para criar uma inst�ncia da classe de fun��es.
      *
      * @param $userId
      * @param $name
      * @param $description
      * @return retorna identificador da fun��o
      */
    public static function createFunction($userId, $name, $description)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createFunction($userId, $name, $description) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return -1 ;
        }
    }

    /**
     * M�todo para recuperar uma inst�ncia da classe de fun��es.
     *
     * @param $functionId
     * @return uma instancia de fun��es
     */
    public static function getFunction($functionId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getFunction($functionId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return NULL ;
        }
    }

     /**
      * M�todo para recuperar a lista de fun��es criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de fun��es
      */
    public static function getUserFunctions($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getUserFunctions($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para recuperar a lista de fun��es criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de fun��es
      */
    public static function getOthersFunctions($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getOthersFunctions($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para alterar a instancia de fun�oes.
      *
      * @param $function
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public static function updateFunction($function)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updateFunction($function) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

     /**
      * M�todo para excluir a instancia da fun��o.
      *
      * @param $functionId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public static function deleteFunction($functionId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->deleteFunction($functionId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }
    // end Function

    // begin Measurement

     /**
      * M�todo para criar uma inst�ncia da classe de medi��es.
      *
      * @param $userId
      * @param $name
      * @param $description
      * @param $formula
      * @param $metric
      * @return retorna identificador da medi��o
      */
    public static function createMeasurement($userId, $name, $description, $formula, $metric)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createMeasurement($userId, $name, $description, $formula, $metric) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return -1 ;
        }
    }

    /**
     * M�todo para recuperar uma inst�ncia da classe de medi��es.
     *
     * @param $measurementId
     * @return uma instancia de medi��o
     */
    public static function getMeasurement($measurementId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getMeasurement($measurementId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return NULL ;
        }
    }

     /**
      * M�todo para recuperar a lista de medi��es criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de medi��es
      */
    public static function getUserMeasurements($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getUserMeasurements($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para recuperar a lista de medi��es criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de medi��es
      */
    public static function getOthersMeasurements($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getOthersMeasurements($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para alterar a instancia de medi��o.
      *
      * @param $measurement
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public static function updateMeasurement($measurement)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updateMeasurement($measurement) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

     /**
      * M�todo para excluir a instancia da medi��o.
      *
      * @param $measurementId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public static function deleteMeasurement($measurementId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->deleteMeasurement($measurementId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }
    // end Function

   // begin Method

     /**
      * M�todo para criar uma inst�ncia da classe de metodo.
      *
      * @param $userId
      * @param $name
      * @param $what
      * @param $why
      * @param $appliesWhen
      * @param $how
      * @param $restriction
      * @param $generatedProduct
      * @param $reference
      * @return retorna identificador do metodo
      */
    public static function createMethod($userId, $name, $what, $why, $appliesWhen, $how, $restriction, $generatedProduct, $reference)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createMethod($userId, $name, $what, $why, $appliesWhen, $how, $restriction, $generatedProduct, $reference) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return -1 ;
        }
    }
    /**
     * M�todo para recuperar uma inst�ncia da classe de metodo.
     *
     * @param $methodId
     * @return uma instancia de metodo
     */
    public static function getMethod($methodId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getMethod($methodId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return NULL ;
        }
    }

     /**
      * M�todo para recuperar a lista de metodos criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de metodos
      */
    public static function getUserMethods($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getUserMethods($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para recuperar a lista de metodos criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de metodos
      */
    public static function getOthersMethods($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getOthersMethods($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para alterar a instancia de metodo.
      *
      * @param $method
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public static function updateMethod($method)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updateMethod($method) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

     /**
      * M�todo para excluir a instancia do metodo.
      *
      * @param $methodId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public static function deleteMethod($methodId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->deleteMethod($methodId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }
    // end Method

    // begin Politics

     /**
      * M�todo para criar uma inst�ncia da classe de politica.
      *
      * @param $userId
      * @param $name
      * @param $description
      * @return retorna identificador da politica
      */
    public static function createPolitics($userId, $name, $description)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createPolitics($userId, $name, $description) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return -1 ;
        }
    }

    /**
     * M�todo para recuperar uma inst�ncia da classe de politicas.
     *
     * @param $politicsId
     * @return uma instancia de politicas
     */
    public static function getPolitics($politicsId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getPolitics($politicsId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return NULL ;
        }
    }

     /**
      * M�todo para recuperar a lista de politicas criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de politicas
      */
    public static function getUserPolitics($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getUserPolitics($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para recuperar a lista de politicas criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de politicas
      */
    public static function getOthersPolitics($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getOthersPolitics($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para alterar a instancia de politica.
      *
      * @param $politics
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public static function updatePolitics($politics)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updatePolitics($politics) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

     /**
      * M�todo para excluir a instancia de politicas.
      *
      * @param $politicsId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public static function deletePolitics($politicsId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->deletePolitics($politicsId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }
    // end Politics

    // begin Tools

     /**
      * M�todo para criar uma inst�ncia da classe de ferramenta.
      *
      * @param $userId
      * @param $name
      * @param $description
      * @return retorna identificador da ferramenta
      */
    public static function createTool($userId, $name, $description)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createTool($userId, $name, $description) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return -1 ;
        }
    }

    /**
     * M�todo para recuperar uma inst�ncia da classe de ferramentas.
     *
     * @param $toolId
     * @return uma instancia de ferramentas
     */
    public static function getTool($toolId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getTool($toolId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return NULL ;
        }
    }

     /**
      * M�todo para recuperar a lista de ferramentas criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de ferramentas
      */
    public static function getUserTools($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getUserTools($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para recuperar a lista de ferramentas criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de ferramentas
      */
    public static function getOthersTools($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getOthersTools($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para alterar a instancia de ferramenta.
      *
      * @param $tool
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public static function updateTool($tool)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updateTool($tool) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

     /**
      * M�todo para excluir a instancia da ferramenta.
      *
      * @param $toolId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public static function deleteTool($toolId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->deleteTool($toolId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }
    // end Tools

    // begin Training

     /**
      * M�todo para criar uma inst�ncia da classe de treinamento.
      *
      * @param $userId
      * @param $name
      * @param $description
      * @param $public
      * @return retorna identificador do treinamento
      */
    public static function createTraining($userId, $name, $description, $public)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createTraining($userId, $name, $description, $public) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return -1 ;
        }
    }

    /**
     * M�todo para recuperar uma inst�ncia da classe de treinamento.
     *
     * @param $trainingId
     * @return uma instancia de treinamento
     */
    public static function getTraining($trainingId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getTraining($trainingId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return NULL ;
        }
    }

     /**
      * M�todo para recuperar a lista de treinamentos criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de treinamentos
      */
    public static function getUserTrainings($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getUserTrainings($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para recuperar a lista de treinamento criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de treinamento
      */
    public static function getOthersTrainings($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getOthersTrainings($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para alterar a instancia de treinamento.
      *
      * @param $training
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public static function updateTraining($training)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updateTraining($training) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

     /**
      * M�todo para excluir a instancia do treinamento.
      *
      * @param $trainingId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public static function deleteTraining($trainingId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->deleteTraining($trainingId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }
    // end Training

    // begin Verification

     /**
      * M�todo para criar uma inst�ncia da classe de verifica��o.
      *
      * @param $userId
      * @param $name
      * @param $type
      * @param $description
      * @param $frequency
      * @param $worker
      * @return retorna identificador da verifica��o
      */
    public static function createVerification($userId, $name, $type, $description, $frequency, $worker)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createVerification($userId, $name, $type, $description, $frequency, $worker) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return -1 ;
        }
    }

    /**
     * M�todo para recuperar uma inst�ncia da classe de verifica��o.
     *
     * @param $verificationId
     * @return uma instancia de verifica��o
     */
    public static function getVerification($verificationId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getVerification($verificationId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return NULL ;
        }
    }

     /**
      * M�todo para recuperar a lista de verifica��es criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de verifica��es
      */
    public static function getUserVerifications($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getUserVerifications($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para recuperar a lista de verifica��es criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de verifica��es
      */
    public static function getOthersVerifications($userId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getOthersVerifications($userId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return array() ;
        }
    }

     /**
      * M�todo para alterar a instancia de verifica��o.
      *
      * @param $verification
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public static function updateVerification($Verification)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updateVerification($Verification) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

     /**
      * M�todo para excluir a instancia da verifica��o.
      *
      * @param $verificationId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public static function deleteVerification($VerificationId)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->deleteVerification($VerificationId) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }
    // end Verification
}

?>