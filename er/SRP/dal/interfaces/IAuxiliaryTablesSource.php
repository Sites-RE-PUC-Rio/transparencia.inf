
<?php
/**
 * Interface realiza a criação e manutenção das tabelas auxiliares.
 */
interface IAuxiliaryTablesSource
{
    // begin Artifact

     /**
      * Método para criar uma instância da classe de artefato.
      *
      * @param $userId
      * @param $name
      * @param $description
      * @return retorna identificador do artefato
      */
    public function createArtifact($userId, $name, $description) ;

     /**
      * Método para recuperar uma instância da classe de artefato.
      *
      * @param $artifactId
      * @return uma instancia do artefato
      */
    public function getArtifact($artifactId) ;

     /**
      * Método para recuperar a lista de artefatos criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de artefatos
      */
    public function getUserArtifacts($userId) ;

     /**
      * Método para recuperar a lista de artefatos criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de artefatos
      */
    public function getOthersArtifacts($userId) ;

     /**
      * Método para alterar a instancia do artefato.
      *
      * @param $artifact
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateArtifact($artifact) ;

     /**
      * Método para excluir a instancia do artefato.
      *
      * @param $artifactId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteArtifact($artifactId) ;
    // end Artifact

    // begin Concept

     /**
      * Método para criar uma instância da classe de conceito.
      *
      * @param $userId
      * @param $termName
      * @param $termType
      * @param $termDescription
      * @return retorna identificador do conceito
      */
    public function createConcept($userId, $termName, $termType, $termDescription) ;

    /**
     * Método para recuperar uma instância da classe de conceitos.
     *
     * @param $conceptId
     * @return uma instancia do conceito
     */
    public function getConcept($conceptId) ;

     /**
      * Método para recuperar a lista de conceitos criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de conceitos
      */
    public function getUserConcepts($userId) ;

     /**
      * Método para recuperar a lista de conceitos criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de conceitos
      */
    public function getOthersConcepts($userId) ;

     /**
      * Método para alterar a instancia do conceito.
      *
      * @param $concept
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateConcept($concept) ;

    /**
      * Método para excluir a instancia do conceito.
      *
      * @param $conceptId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteConcept($conceptId) ;
    // end Concept

    // begin Form

     /**
      * Método para criar uma instância da classe de formulário.
      *
      * @param $userId
      * @param $name
      * @param $purpose
      * @return retorna identificador do formulário
      */
    public function createForm($userId, $name, $purpose) ;

    /**
     * Método para recuperar uma instância da classe de formulario.
     *
     * @param $formId
     * @return uma instancia do formulario
     */
    public function getForm($formId) ;

     /**
      * Método para recuperar a lista de formulários criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de formulários
      */
    public function getUserForms($userId) ;

     /**
      * Método para recuperar a lista de formulários criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de formulários
      */
    public function getOthersForms($userId) ;

     /**
      * Método para alterar a instancia do formulário.
      *
      * @param $form
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateForm($form) ;

     /**
      * Método para excluir a instancia do formulário.
      *
      * @param $formId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteForm($formId) ;
    // end Form

   // begin Function

     /**
      * Método para criar uma instância da classe de funções.
      *
      * @param $userId
      * @param $name
      * @param $description
      * @return retorna identificador da função
      */
    public function createFunction($userId, $name, $description) ;

    /**
     * Método para recuperar uma instância da classe de funções.
     *
     * @param $functionId
     * @return uma instancia de funções
     */
    public function getFunction($functionId) ;

     /**
      * Método para recuperar a lista de funções criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de funções
      */
    public function getUserFunctions($userId) ;

     /**
      * Método para recuperar a lista de funções criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de funções
      */
    public function getOthersFunctions($userId) ;

     /**
      * Método para alterar a instancia de funçoes.
      *
      * @param $function
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateFunction($function) ;

     /**
      * Método para excluir a instancia da função.
      *
      * @param $functionId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteFunction($functionId) ;
    // end Function

    // begin Measurement

     /**
      * Método para criar uma instância da classe de medições.
      *
      * @param $userId
      * @param $name
      * @param $description
      * @param $formula
      * @param $metric
      * @return retorna identificador da medição
      */
    public function createMeasurement($userId, $name, $description, $formula, $metric) ;

    /**
     * Método para recuperar uma instância da classe de medições.
     *
     * @param $measurementId
     * @return uma instancia de medição
     */
    public function getMeasurement($measurementId) ;

     /**
      * Método para recuperar a lista de medições criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de medições
      */
    public function getUserMeasurements($userId) ;

     /**
      * Método para recuperar a lista de medições criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de medições
      */
    public function getOthersMeasurements($userId) ;

     /**
      * Método para alterar a instancia de medição.
      *
      * @param $measurement
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateMeasurement($measurement) ;

     /**
      * Método para excluir a instancia da medição.
      *
      * @param $measurementId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteMeasurement($measurementId) ;
    // end Function

   // begin Method

     /**
      * Método para criar uma instância da classe de metodo.
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
     * Método para recuperar uma instância da classe de metodo.
     *
     * @param $methodId
     * @return uma instancia de metodo
     */
    public function getMethod($methodId) ;

     /**
      * Método para recuperar a lista de metodos criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de metodos
      */
    public function getUserMethods($userId) ;

     /**
      * Método para recuperar a lista de metodos criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de metodos
      */
    public function getOthersMethods($userId) ;

     /**
      * Método para alterar a instancia de metodo.
      *
      * @param $method
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateMethod($method) ;

     /**
      * Método para excluir a instancia do metodo.
      *
      * @param $methodId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteMethod($methodId) ;
    // end Method

    // begin Politics

     /**
      * Método para criar uma instância da classe de politica.
      *
      * @param $userId
      * @param $name
      * @param $description
      * @return retorna identificador da politica
      */
    public function createPolitics($userId, $name, $description) ;

    /**
     * Método para recuperar uma instância da classe de politicas.
     *
     * @param $politicsId
     * @return uma instancia de politicas
     */
    public function getPolitics($politicsId) ;

     /**
      * Método para recuperar a lista de politicas criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de politicas
      */
    public function getUserPolitics($userId) ;

     /**
      * Método para recuperar a lista de politicas criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de politicas
      */
    public function getOthersPolitics($userId) ;

     /**
      * Método para alterar a instancia de politica.
      *
      * @param $politics
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updatePolitics($politics) ;

     /**
      * Método para excluir a instancia de politicas.
      *
      * @param $politicsId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deletePolitics($politicsId) ;
    // end Politics

    // begin Tools

     /**
      * Método para criar uma instância da classe de ferramenta.
      *
      * @param $userId
      * @param $name
      * @param $description
      * @return retorna identificador da ferramenta
      */
    public function createTool($userId, $name, $description) ;

    /**
     * Método para recuperar uma instância da classe de ferramentas.
     *
     * @param $toolId
     * @return uma instancia de ferramentas
     */
    public function getTool($toolId) ;

     /**
      * Método para recuperar a lista de ferramentas criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de ferramentas
      */
    public function getUserTools($userId) ;

     /**
      * Método para recuperar a lista de ferramentas criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de ferramentas
      */
    public function getOthersTools($userId) ;

     /**
      * Método para alterar a instancia de ferramenta.
      *
      * @param $tool
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateTool($tool) ;

     /**
      * Método para excluir a instancia da ferramenta.
      *
      * @param $toolId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteTool($toolId) ;
    // end Tools

    // begin Training

      /**
      * Método para criar uma instância da classe de treinamento.
      *
      * @param $userId
      * @param $name
      * @param $description
      * @param $public
      * @return retorna identificador do treinamento
      */
    public function createTraining($userId, $name, $description, $public) ;

    /**
     * Método para recuperar uma instância da classe de treinamento.
     *
     * @param $trainingId
     * @return uma instancia de treinamento
     */
    public function getTraining($trainingId) ;

     /**
      * Método para recuperar a lista de treinamentos criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de treinamentos
      */
    public function getUserTrainings($userId) ;

     /**
      * Método para recuperar a lista de treinamento criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de treinamento
      */
    public function getOthersTrainings($userId) ;

     /**
      * Método para alterar a instancia de treinamento.
      *
      * @param $training
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateTraining($training) ;

     /**
      * Método para excluir a instancia do treinamento.
      *
      * @param $trainingId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteTraining($trainingId) ;
    // end Training

    // begin Verification

     /**
      * Método para criar uma instância da classe de verificação.
      *
      * @param $userId
      * @param $name
      * @param $type
      * @param $description
      * @param $frequency
      * @param $worker
      * @return retorna identificador da verificação
      */
    public function createVerification($userId, $name, $type, $description, $frequency, $worker) ;

    /**
     * Método para recuperar uma instância da classe de verificação.
     *
     * @param $verificationId
     * @return uma instancia de verificação
     */
    public function getVerification($verificationId) ;

     /**
      * Método para recuperar a lista de verificações criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de verificações
      */
    public function getUserVerifications($userId) ;

     /**
      * Método para recuperar a lista de verificações criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de verificações
      */
    public function getOthersVerifications($userId) ;

     /**
      * Método para alterar a instancia de verificação.
      *
      * @param $verification
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateVerification($verification) ;

     /**
      * Método para excluir a instancia da verificação.
      *
      * @param $verificationId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteVerification($verificationId) ;
    // end Verification
}

?>