
<?php
/**
 * Interface realiza a cria��o e manuten��o das tabelas auxiliares.
 */
interface IAuxiliaryTablesSource
{
    // begin Artifact

     /**
      * M�todo para criar uma inst�ncia da classe de artefato.
      *
      * @param $userId
      * @param $name
      * @param $description
      * @return retorna identificador do artefato
      */
    public function createArtifact($userId, $name, $description) ;

     /**
      * M�todo para recuperar uma inst�ncia da classe de artefato.
      *
      * @param $artifactId
      * @return uma instancia do artefato
      */
    public function getArtifact($artifactId) ;

     /**
      * M�todo para recuperar a lista de artefatos criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de artefatos
      */
    public function getUserArtifacts($userId) ;

     /**
      * M�todo para recuperar a lista de artefatos criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de artefatos
      */
    public function getOthersArtifacts($userId) ;

     /**
      * M�todo para alterar a instancia do artefato.
      *
      * @param $artifact
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateArtifact($artifact) ;

     /**
      * M�todo para excluir a instancia do artefato.
      *
      * @param $artifactId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteArtifact($artifactId) ;
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
    public function createConcept($userId, $termName, $termType, $termDescription) ;

    /**
     * M�todo para recuperar uma inst�ncia da classe de conceitos.
     *
     * @param $conceptId
     * @return uma instancia do conceito
     */
    public function getConcept($conceptId) ;

     /**
      * M�todo para recuperar a lista de conceitos criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de conceitos
      */
    public function getUserConcepts($userId) ;

     /**
      * M�todo para recuperar a lista de conceitos criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de conceitos
      */
    public function getOthersConcepts($userId) ;

     /**
      * M�todo para alterar a instancia do conceito.
      *
      * @param $concept
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateConcept($concept) ;

    /**
      * M�todo para excluir a instancia do conceito.
      *
      * @param $conceptId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteConcept($conceptId) ;
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
    public function createForm($userId, $name, $purpose) ;

    /**
     * M�todo para recuperar uma inst�ncia da classe de formulario.
     *
     * @param $formId
     * @return uma instancia do formulario
     */
    public function getForm($formId) ;

     /**
      * M�todo para recuperar a lista de formul�rios criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de formul�rios
      */
    public function getUserForms($userId) ;

     /**
      * M�todo para recuperar a lista de formul�rios criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de formul�rios
      */
    public function getOthersForms($userId) ;

     /**
      * M�todo para alterar a instancia do formul�rio.
      *
      * @param $form
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateForm($form) ;

     /**
      * M�todo para excluir a instancia do formul�rio.
      *
      * @param $formId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteForm($formId) ;
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
    public function createFunction($userId, $name, $description) ;

    /**
     * M�todo para recuperar uma inst�ncia da classe de fun��es.
     *
     * @param $functionId
     * @return uma instancia de fun��es
     */
    public function getFunction($functionId) ;

     /**
      * M�todo para recuperar a lista de fun��es criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de fun��es
      */
    public function getUserFunctions($userId) ;

     /**
      * M�todo para recuperar a lista de fun��es criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de fun��es
      */
    public function getOthersFunctions($userId) ;

     /**
      * M�todo para alterar a instancia de fun�oes.
      *
      * @param $function
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateFunction($function) ;

     /**
      * M�todo para excluir a instancia da fun��o.
      *
      * @param $functionId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteFunction($functionId) ;
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
    public function createMeasurement($userId, $name, $description, $formula, $metric) ;

    /**
     * M�todo para recuperar uma inst�ncia da classe de medi��es.
     *
     * @param $measurementId
     * @return uma instancia de medi��o
     */
    public function getMeasurement($measurementId) ;

     /**
      * M�todo para recuperar a lista de medi��es criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de medi��es
      */
    public function getUserMeasurements($userId) ;

     /**
      * M�todo para recuperar a lista de medi��es criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de medi��es
      */
    public function getOthersMeasurements($userId) ;

     /**
      * M�todo para alterar a instancia de medi��o.
      *
      * @param $measurement
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateMeasurement($measurement) ;

     /**
      * M�todo para excluir a instancia da medi��o.
      *
      * @param $measurementId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteMeasurement($measurementId) ;
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
    public function createMethod($userId, $name, $what, $why, $appliesWhen, $how, $restriction, $generatedProduct, $reference) ;

    /**
     * M�todo para recuperar uma inst�ncia da classe de metodo.
     *
     * @param $methodId
     * @return uma instancia de metodo
     */
    public function getMethod($methodId) ;

     /**
      * M�todo para recuperar a lista de metodos criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de metodos
      */
    public function getUserMethods($userId) ;

     /**
      * M�todo para recuperar a lista de metodos criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de metodos
      */
    public function getOthersMethods($userId) ;

     /**
      * M�todo para alterar a instancia de metodo.
      *
      * @param $method
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateMethod($method) ;

     /**
      * M�todo para excluir a instancia do metodo.
      *
      * @param $methodId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteMethod($methodId) ;
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
    public function createPolitics($userId, $name, $description) ;

    /**
     * M�todo para recuperar uma inst�ncia da classe de politicas.
     *
     * @param $politicsId
     * @return uma instancia de politicas
     */
    public function getPolitics($politicsId) ;

     /**
      * M�todo para recuperar a lista de politicas criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de politicas
      */
    public function getUserPolitics($userId) ;

     /**
      * M�todo para recuperar a lista de politicas criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de politicas
      */
    public function getOthersPolitics($userId) ;

     /**
      * M�todo para alterar a instancia de politica.
      *
      * @param $politics
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updatePolitics($politics) ;

     /**
      * M�todo para excluir a instancia de politicas.
      *
      * @param $politicsId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deletePolitics($politicsId) ;
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
    public function createTool($userId, $name, $description) ;

    /**
     * M�todo para recuperar uma inst�ncia da classe de ferramentas.
     *
     * @param $toolId
     * @return uma instancia de ferramentas
     */
    public function getTool($toolId) ;

     /**
      * M�todo para recuperar a lista de ferramentas criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de ferramentas
      */
    public function getUserTools($userId) ;

     /**
      * M�todo para recuperar a lista de ferramentas criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de ferramentas
      */
    public function getOthersTools($userId) ;

     /**
      * M�todo para alterar a instancia de ferramenta.
      *
      * @param $tool
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateTool($tool) ;

     /**
      * M�todo para excluir a instancia da ferramenta.
      *
      * @param $toolId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteTool($toolId) ;
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
    public function createTraining($userId, $name, $description, $public) ;

    /**
     * M�todo para recuperar uma inst�ncia da classe de treinamento.
     *
     * @param $trainingId
     * @return uma instancia de treinamento
     */
    public function getTraining($trainingId) ;

     /**
      * M�todo para recuperar a lista de treinamentos criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de treinamentos
      */
    public function getUserTrainings($userId) ;

     /**
      * M�todo para recuperar a lista de treinamento criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de treinamento
      */
    public function getOthersTrainings($userId) ;

     /**
      * M�todo para alterar a instancia de treinamento.
      *
      * @param $training
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateTraining($training) ;

     /**
      * M�todo para excluir a instancia do treinamento.
      *
      * @param $trainingId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteTraining($trainingId) ;
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
    public function createVerification($userId, $name, $type, $description, $frequency, $worker) ;

    /**
     * M�todo para recuperar uma inst�ncia da classe de verifica��o.
     *
     * @param $verificationId
     * @return uma instancia de verifica��o
     */
    public function getVerification($verificationId) ;

     /**
      * M�todo para recuperar a lista de verifica��es criados pelo usu�rio referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de verifica��es
      */
    public function getUserVerifications($userId) ;

     /**
      * M�todo para recuperar a lista de verifica��es criados por outros usu�rios diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de verifica��es
      */
    public function getOthersVerifications($userId) ;

     /**
      * M�todo para alterar a instancia de verifica��o.
      *
      * @param $verification
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateVerification($verification) ;

     /**
      * M�todo para excluir a instancia da verifica��o.
      *
      * @param $verificationId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteVerification($verificationId) ;
    // end Verification
}

?>