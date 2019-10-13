
<?php

require_once "dal/mysql/Database.php" ;
require_once "dal/interfaces/IAuxiliaryTablesSource.php" ;
require_once "models/Aux_Artifact.php" ;
require_once "models/Aux_Concept.php" ;
require_once "models/Aux_Form.php" ;
require_once "models/Aux_Function.php" ;
require_once "models/Aux_Measurement.php" ;
require_once "models/Aux_Method.php" ;
require_once "models/Aux_Politics.php" ;
require_once "models/Aux_Tool.php" ;
require_once "models/Aux_Training.php" ;
require_once "models/Aux_Verification.php" ;

/**
 * Função que verifica se existe alguma classe que é utilizada e não consta nos imports
 *e traz esta classe para os imports.
 */
//function __autoload($class_name)
//{
//   require_once 'models/'.$class_name . '.php';
//}

/**
 * Classe realiza a criação e manutenção das tabelas auxiliares,
 * implementando a interface IAuxiliaryTablesSource.
 */
class AuxiliaryTablesSource implements IAuxiliaryTablesSource
{
     //begin Artifact

     /**
      * Método para criar uma instância da classe de artefato.
      *
      * @param $userId
      * @param $name
      * @param $description
      * @return retorna identificador do artefato
      */
    public function createArtifact($userId, $name, $description)
    {
        $conn = false ;

        $artifactId = -1  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasCreated = mysql_query("INSERT INTO Aux_Artifacts(userId, name, description) VALUES(".$userId.", '".mysql_escape_string($name)."', '".mysql_escape_string($description)."')", $conn) ;
	        if ($wasCreated)
	        {
                $artifactId = mysql_insert_id($conn) ;
	        }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $artifactId ;
    }

     /**
      * Método para recuperar uma instância da classe de artefato.
      *
      * @param $artifactId
      * @return uma instancia do artefato
      */
    public function getArtifact($artifactId)
    {
        $conn = false ;
        $data = false ;

        $artifact = NULL ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT artifactId, userId, name, description FROM Aux_Artifacts WHERE artifactId=".$artifactId." LIMIT 1", $conn) ;
	        if (!$data)
	            return false ;

            if ($row = mysql_fetch_array($data))
            {
                $artifact = new Aux_Artifact($row["artifactId"], $row["userId"], $row["name"], $row["description"]) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $artifact ;
    }

     /**
      * Método para recuperar a lista de artefatos criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de artefatos
      */
    public function getUserArtifacts($userId)
    {
        $conn = false ;
        $data = false ;

        $artifacts = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT artifactId, userId, name, description FROM Aux_Artifacts WHERE userId=".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anArtifact = new Aux_Artifact($row["artifactId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($artifacts, $anArtifact) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $artifacts ;
    }

     /**
      * Método para recuperar a lista de artefatos criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de artefatos
      */
    public function getOthersArtifacts($userId)
    {
        $conn = false ;
        $data = false ;

        $artifacts = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT artifactId, userId, name, description FROM Aux_Artifacts WHERE userId<>".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anArtifact = new Aux_Artifact($row["artifactId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($artifacts, $anArtifact) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $artifacts ;
    }

     /**
      * Método para alterar a instancia do artefato.
      *
      * @param $artifact
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateArtifact($artifact)
    {
        $conn = false ;

        $wasUpdated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasUpdated = mysql_query("UPDATE Aux_Artifacts set name='".mysql_escape_string($artifact->getName())."', description='".mysql_escape_string($artifact->getDescription())."' WHERE artifactId=".$artifact->getArtifactId(), $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasUpdated ;
    }

     /**
      * Método para excluir a instancia do artefato.
      *
      * @param $artifactId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteArtifact($artifactId)
    {
        $conn = false ;

        $wasDeleted = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDeleted = mysql_query("DELETE FROM Aux_Artifacts WHERE artifactId=".$artifactId, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDeleted ;
    }
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
    public function createConcept($userId, $termName, $termType, $termDescription)
    {
        $conn = false ;

        $conceptId = -1  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasCreated = mysql_query("INSERT INTO Aux_Concepts(userId, termName, termType, termDescription) VALUES(".$userId.", '".mysql_escape_string($termName)."', '".mysql_escape_string($termType)."','".mysql_escape_string($termDescription)."')", $conn) ;
	        if ($wasCreated)
	        {
                $conceptId = mysql_insert_id($conn) ;
	        }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $conceptId ;
    }

    /**
     * Método para recuperar uma instância da classe de conceitos.
     *
     * @param $conceptId
     * @return uma instancia do conceito
     */
    public function getConcept($conceptId)
    {
        $conn = false ;
        $data = false ;

        $concept = NULL ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT conceptId, userId, termName, termType, termDescription FROM Aux_Concepts WHERE conceptId=".$conceptId." LIMIT 1", $conn) ;
	        if (!$data)
	            return false ;

            if ($row = mysql_fetch_array($data))
            {
                $concept = new Aux_Concept($row["conceptId"], $row["userId"], $row["termName"], $row["termType"], $row["termDescription"]) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $concept ;
    }

     /**
      * Método para recuperar a lista de conceitos criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de conceitos
      */
    public function getUserConcepts($userId)
    {
        $conn = false ;
        $data = false ;

        $concepts = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT conceptId, userId, termName, termType, termDescription FROM Aux_Concepts WHERE userId=".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aConcept = new Aux_Concept($row["conceptId"], $row["userId"], $row["termName"], $row["termType"], $row["termDescription"]) ;
                array_push($concepts, $aConcept) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $concepts ;
    }

     /**
      * Método para recuperar a lista de conceitos criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de conceitos
      */
    public function getOthersConcepts($userId)
    {
        $conn = false ;
        $data = false ;

        $concepts = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT conceptId, userId, termName, termType, termDescription FROM Aux_Concepts WHERE userId<>".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aConcept = new Aux_Concept($row["conceptId"], $row["userId"], $row["termName"], $row["termType"], $row["termDescription"]) ;
                array_push($concepts, $aConcept) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $concepts ;
    }

     /**
      * Método para alterar a instancia do conceito.
      *
      * @param $concept
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateConcept($concept)
    {
        $conn = false ;

        $wasUpdated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasUpdated = mysql_query("UPDATE Aux_Concepts set termName='".mysql_escape_string($concept->getTermName())."', termType='".mysql_escape_string($concept->getTermType())."', termDescription='".mysql_escape_string($concept->getTermDescription())."' WHERE conceptId=".$concept->getConceptId(), $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasUpdated ;
    }

    /**
      * Método para excluir a instancia do conceito.
      *
      * @param $conceptId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteConcept($conceptId)
    {
        $conn = false ;

        $wasDeleted = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDeleted = mysql_query("DELETE FROM Aux_Concepts WHERE conceptId=".$conceptId, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDeleted ;
    }
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
    public function createForm($userId, $name, $purpose)
   {
       $conn = false ;

       $formId = -1  ;

       try
       {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasCreated = mysql_query("INSERT INTO Aux_Forms(userId, name, purpose) VALUES(".$userId.", '".mysql_escape_string($name)."', '".mysql_escape_string($purpose)."')", $conn) ;
            if ($wasCreated)
            {
                $formId = mysql_insert_id($conn) ;
            }
       }
       catch(Exception $e)
       {
           echo $e ;
       }

       if ( ! $conn )
           Database::returnConnection($conn) ;

       return $formId ;
   }

    /**
     * Método para recuperar uma instância da classe de formulario.
     *
     * @param $formId
     * @return uma instancia do formulario
     */
    public function getForm($formId)
    {
        $conn = false ;
        $data = false ;

        $form = NULL ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT formId, userId, name, purpose FROM Aux_Forms WHERE formId=".$formId." LIMIT 1", $conn) ;
            if (!$data)
                return false ;

            if ($row = mysql_fetch_array($data))
            {
                $form = new Aux_Form($row["formId"], $row["userId"], $row["name"], $row["purpose"]) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $form ;
    }

     /**
      * Método para recuperar a lista de formulários criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de formulários
      */
    public function getUserForms($userId)
    {
        $conn = false ;
        $data = false ;

        $forms = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT formId, userId, name, purpose FROM Aux_Forms WHERE userId=".$userId, $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aForm = new Aux_Form($row["formId"], $row["userId"], $row["name"], $row["purpose"]) ;
                array_push($forms, $aForm) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $forms ;
    }

     /**
      * Método para recuperar a lista de formulários criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de formulários
      */
    public function getOthersForms($userId)
    {
        $conn = false ;
        $data = false ;

        $forms = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT formId, userId, name, purpose FROM Aux_Forms WHERE userId<>".$userId, $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aForm = new Aux_Form($row["formId"], $row["userId"], $row["name"], $row["purpose"]) ;
                array_push($forms, $aForm) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $forms ;
    }

     /**
      * Método para alterar a instancia do formulário.
      *
      * @param $form
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateForm($form)
    {
        $conn = false ;

        $wasUpdated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasUpdated = mysql_query("UPDATE Aux_Forms set name='".mysql_escape_string($form->getName())."', purpose='".mysql_escape_string($form->getPurpose())."' WHERE formId=".$form->getFormId(), $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasUpdated ;
    }

     /**
      * Método para excluir a instancia do formulário.
      *
      * @param $formId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteForm($formId)
    {
        $conn = false ;

        $wasDeleted = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDeleted = mysql_query("DELETE FROM Aux_Forms WHERE formId=".$formId, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDeleted ;
    }
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
    public function createFunction($userId, $name, $description)
    {
        $conn = false ;

        $functionId = -1  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasCreated = mysql_query("INSERT INTO Aux_Functions(userId, name, description) VALUES(".$userId.", '".mysql_escape_string($name)."', '".mysql_escape_string($description)."')", $conn) ;
	        if ($wasCreated)
	        {
                $functionId = mysql_insert_id($conn) ;
	        }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $functionId ;
    }

    /**
     * Método para recuperar uma instância da classe de funções.
     *
     * @param $functionId
     * @return uma instancia de funções
     */
    public function getFunction($functionId)
    {
        $conn = false ;
        $data = false ;

        $function2 = NULL ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT functionId, userId, name, description FROM Aux_Functions WHERE functionId=".$functionId." LIMIT 1", $conn) ;
	        if (!$data)
	            return false ;

            if ($row = mysql_fetch_array($data))
            {
                $function = new Aux_Function($row["functionId"], $row["userId"], $row["name"], $row["description"]) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $function ;
    }

     /**
      * Método para recuperar a lista de funções criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de funções
      */
    public function getUserFunctions($userId)
    {
        $conn = false ;
        $data = false ;

        $functions = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT functionId, userId, name, description FROM Aux_Functions WHERE userId=".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aFunction = new Aux_Function($row["functionId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($functions, $aFunction) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $functions ;
    }
     /**
      * Método para recuperar a lista de funções criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de funções
      */
    public function getOthersFunctions($userId)
    {
        $conn = false ;
        $data = false ;

        $functions = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT functionId, userId, name, description FROM Aux_Functions WHERE userId<>".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aFunction = new Aux_Function($row["functionId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($functions, $aFunction) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $functions ;
    }

     /**
      * Método para alterar a instancia de funçoes.
      *
      * @param $function
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateFunction($function)
    {
        $conn = false ;

        $wasUpdated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasUpdated = mysql_query("UPDATE Aux_Functions set name='".mysql_escape_string($function->getName())."', description='".mysql_escape_string($function->getDescription())."' WHERE functionId=".$function->getFunctionId(), $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasUpdated ;
    }

     /**
      * Método para excluir a instancia da função.
      *
      * @param $functionId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteFunction($functionId)
    {
        $conn = false ;

        $wasDeleted = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDeleted = mysql_query("DELETE FROM Aux_Functions WHERE functionId=".$functionId, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDeleted ;
    }
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
    public function createMeasurement($userId, $name, $description, $formula, $metric)
    {
        $conn = false ;

        $measurementId = -1  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasCreated = mysql_query("INSERT INTO Aux_Measurements(userId, name, description, formula, metric) VALUES(".$userId.", '".mysql_escape_string($name)."', '".mysql_escape_string($description)."', '".mysql_escape_string($formula)."', '".mysql_escape_string($metric)."')", $conn) ;
	        if ($wasCreated)
	        {
                $measurementId = mysql_insert_id($conn) ;
	        }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $measurementId ;
    }

    /**
     * Método para recuperar uma instância da classe de medições.
     *
     * @param $measurementId
     * @return uma instancia de medição
     */
    public function getMeasurement($measurementId)
    {
        $conn = false ;
        $data = false ;

        $measurement = NULL ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT measurementId, userId, name, description, formula, metric FROM Aux_Measurements WHERE measurementId=".$measurementId." LIMIT 1", $conn) ;
	        if (!$data)
	            return false ;

            if ($row = mysql_fetch_array($data))
            {
                $measurement = new Aux_Measurement($row["measurementId"], $row["userId"], $row["name"], $row["description"], $row["formula"], $row["metric"]) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $measurement ;
    }

     /**
      * Método para recuperar a lista de medições criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de medições
      */
    public function getUserMeasurements($userId)
    {
        $conn = false ;
        $data = false ;

        $measurements = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT measurementId, userId, name, description, formula, metric FROM Aux_Measurements WHERE userId=".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aMeasurement = new Aux_Measurement($row["measurementId"], $row["userId"], $row["name"], $row["description"], $row["formula"], $row["metric"]) ;
                array_push($measurements, $aMeasurement) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $measurements ;
    }

     /**
      * Método para recuperar a lista de medições criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de medições
      */
    public function getOthersMeasurements($userId)
    {
        $conn = false ;
        $data = false ;

        $measurements = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT measurementId, userId, name, description, formula, metric FROM Aux_Measurements WHERE userId<>".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aMeasurement = new Aux_Measurement($row["measurementId"], $row["userId"], $row["name"], $row["description"], $row["formula"], $row["metric"]) ;
                array_push($measurements, $aMeasurement) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $measurements ;
    }

     /**
      * Método para alterar a instancia de medição.
      *
      * @param $measurement
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateMeasurement($measurement)
    {
        $conn = false ;

        $wasUpdated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasUpdated = mysql_query("UPDATE Aux_Measurements set name='".mysql_escape_string($measurement->getName())."', description='".mysql_escape_string($measurement->getDescription())."', formula='".mysql_escape_string($measurement->getFormula())."', metric='".mysql_escape_string($measurement->getMetric())."' WHERE measurementId=".$measurement->getMeasurementId(), $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasUpdated ;
    }

     /**
      * Método para excluir a instancia da medição.
      *
      * @param $measurementId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteMeasurement($measurementId)
    {
        $conn = false ;

        $wasDeleted = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDeleted = mysql_query("DELETE FROM Aux_Measurements WHERE measurementId=".$measurementId, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDeleted ;
    }
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
    public function createMethod($userId, $name, $what, $why, $appliesWhen, $how, $restriction, $generatedProduct, $reference)
    {
        $conn = false ;

        $methodId = -1  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasCreated = mysql_query("INSERT INTO Aux_Methods(userId, name, what, why, appliesWhen, how, restriction, generatedProduct, reference) VALUES(".$userId.", '".mysql_escape_string($name)."', '".mysql_escape_string($what)."', '".mysql_escape_string($why)."', '".mysql_escape_string($appliesWhen)."', '".mysql_escape_string($how)."', '".mysql_escape_string($restriction)."', '".mysql_escape_string($generatedProduct)."', '".mysql_escape_string($reference)."')", $conn) ;
	        if ($wasCreated)
	        {
                $methodId = mysql_insert_id($conn) ;
	        }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $methodId ;
    }

    /**
     * Método para recuperar uma instância da classe de metodo.
     *
     * @param $methodId
     * @return uma instancia de metodo
     */
    public function getMethod($methodId)
    {
        $conn = false ;
        $data = false ;

        $method = NULL ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT methodId, userId, name, what, why, appliesWhen, how, restriction, generatedProduct, reference FROM Aux_Methods WHERE methodId=".$methodId." LIMIT 1", $conn) ;
	        if (!$data)
	            return false ;

            if ($row = mysql_fetch_array($data))
            {
                $method = new Aux_Method($row["methodId"], $row["userId"], $row["name"], $row["what"], $row["why"], $row["appliesWhen"], $row["how"], $row["restriction"], $row["generatedProduct"], $row["reference"]) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $method ;
    }

     /**
      * Método para recuperar a lista de metodos criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de metodos
      */
    public function getUserMethods($userId)
    {
        $conn = false ;
        $data = false ;

        $methods = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT methodId, userId, name, what, why, appliesWhen, how, restriction, generatedProduct, reference FROM Aux_Methods WHERE userId=".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aMethod = new Aux_Method($row["methodId"], $row["userId"], $row["name"], $row["what"], $row["why"], $row["appliesWhen"], $row["how"], $row["restriction"], $row["generatedProduct"], $row["reference"]) ;
                array_push($methods, $aMethod) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $methods ;
    }

     /**
      * Método para recuperar a lista de metodos criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de metodos
      */
    public function getOthersMethods($userId)
    {
        $conn = false ;
        $data = false ;

        $methods = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT methodId, userId, name, what, why, appliesWhen, how, restriction, generatedProduct, reference FROM Aux_Methods WHERE userId<>".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aMethod = new Aux_Method($row["methodId"], $row["userId"], $row["name"], $row["what"], $row["why"], $row["appliesWhen"], $row["how"], $row["restriction"], $row["generatedProduct"], $row["reference"]) ;
                array_push($methods, $aMethod) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $methods ;
    }

     /**
      * Método para alterar a instancia de metodo.
      *
      * @param $method
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateMethod($method)
    {
        $conn = false ;

        $wasUpdated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasUpdated = mysql_query("UPDATE Aux_Methods set name='".mysql_escape_string($method->getName())."', what='".mysql_escape_string($method->getWhat())."', why='".mysql_escape_string($method->getWhy())."', appliesWhen='".mysql_escape_string($method->getAppliesWhen())."', how='".mysql_escape_string($method->getHow())."', restriction='".mysql_escape_string($method->getRestriction())."', generatedProduct='".mysql_escape_string($method->getGeneratedProduct())."', reference='".mysql_escape_string($method->getReference())."' WHERE methodId=".$method->getMethodId(), $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasUpdated ;
    }

     /**
      * Método para excluir a instancia do metodo.
      *
      * @param $methodId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteMethod($methodId)
    {
        $conn = false ;

        $wasDeleted = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDeleted = mysql_query("DELETE FROM Aux_Methods WHERE methodId=".$methodId, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDeleted ;
    }
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
    public function createPolitics($userId, $name, $description)
    {
        $conn = false ;

        $politicsId = -1  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasCreated = mysql_query("INSERT INTO Aux_Politics(userId, name, description) VALUES(".$userId.", '".mysql_escape_string($name)."', '".mysql_escape_string($description)."')", $conn) ;
	        if ($wasCreated)
	        {
                $politicsId = mysql_insert_id($conn) ;
	        }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $politicsId ;
    }

    /**
     * Método para recuperar uma instância da classe de politicas.
     *
     * @param $politicsId
     * @return uma instancia de politicas
     */
    public function getPolitics($politicsId)
    {
        $conn = false ;
        $data = false ;

        $politics = NULL ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT politicsId, userId, name, description FROM Aux_Politics WHERE politicsId=".$politicsId." LIMIT 1", $conn) ;
	        if (!$data)
	            return false ;

            if ($row = mysql_fetch_array($data))
            {
                $politics = new Aux_Politics($row["politicsId"], $row["userId"], $row["name"], $row["description"]) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $politics ;
    }

     /**
      * Método para recuperar a lista de politicas criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de politicas
      */
    public function getUserPolitics($userId)
    {
        $conn = false ;
        $data = false ;

        $politics = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT politicsId, userId, name, description FROM Aux_Politics WHERE userId=".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aPolitics = new Aux_Politics($row["politicsId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($politics, $aPolitics) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $politics ;
    }

     /**
      * Método para recuperar a lista de politicas criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de politicas
      */
    public function getOthersPolitics($userId)
    {
        $conn = false ;
        $data = false ;

        $politics = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT politicsId, userId, name, description FROM Aux_Politics WHERE userId<>".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aPolitics = new Aux_Politics($row["politicsId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($politics, $aPolitics) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $politics ;
    }

     /**
      * Método para alterar a instancia de politica.
      *
      * @param $politics
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updatePolitics($politics)
    {
        $conn = false ;

        $wasUpdated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasUpdated = mysql_query("UPDATE Aux_Politics set name='".mysql_escape_string($politics->getName())."', description='".mysql_escape_string($politics->getDescription())."' WHERE politicsId=".$politics->getPoliticsId(), $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasUpdated ;
    }

     /**
      * Método para excluir a instancia de politicas.
      *
      * @param $politicsId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deletePolitics($politicsId)
    {
        $conn = false ;

        $wasDeleted = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDeleted = mysql_query("DELETE FROM Aux_Politics WHERE politicsId=".$politicsId, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDeleted ;
    }
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
    public function createTool($userId, $name, $description)
    {
        $conn = false ;

        $toolId = -1  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasCreated = mysql_query("INSERT INTO Aux_Tools(userId, name, description) VALUES(".$userId.", '".mysql_escape_string($name)."', '".mysql_escape_string($description)."')", $conn) ;
	        if ($wasCreated)
	        {
                $toolId = mysql_insert_id($conn) ;
	        }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $toolId ;
    }

    /**
     * Método para recuperar uma instância da classe de ferramentas.
     *
     * @param $toolId
     * @return uma instancia de ferramentas
     */
    public function getTool($toolId)
    {
        $conn = false ;
        $data = false ;

        $tool = NULL ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT toolId, userId, name, description FROM Aux_Tools WHERE toolId=".$toolId." LIMIT 1", $conn) ;
	        if (!$data)
	            return false ;

            if ($row = mysql_fetch_array($data))
            {
                $tool = new Aux_Tool($row["toolId"], $row["userId"], $row["name"], $row["description"]) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $tool ;
    }

     /**
      * Método para recuperar a lista de ferramentas criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de ferramentas
      */
    public function getUserTools($userId)
    {
        $conn = false ;
        $data = false ;

        $tools = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT toolId, userId, name, description FROM Aux_Tools WHERE userId=".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aTool = new Aux_Tool($row["toolId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($tools, $aTool) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $tools ;
    }
     /**
      * Método para recuperar a lista de ferramentas criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de ferramentas
      */
    public function getOthersTools($userId)
    {
        $conn = false ;
        $data = false ;

        $tools = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT toolId, userId, name, description FROM Aux_Tools WHERE userId<>".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aTool = new Aux_Tool($row["toolId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($tools, $aTool) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $tools ;
    }

     /**
      * Método para alterar a instancia de ferramenta.
      *
      * @param $tool
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateTool($tool)
    {
        $conn = false ;

        $wasUpdated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasUpdated = mysql_query("UPDATE Aux_Tools set name='".mysql_escape_string($tool->getName())."', description='".mysql_escape_string($tool->getDescription())."' WHERE toolId=".$tool->getToolId(), $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasUpdated ;
    }

     /**
      * Método para excluir a instancia da ferramenta.
      *
      * @param $toolId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteTool($toolId)
    {
        $conn = false ;

        $wasDeleted = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDeleted = mysql_query("DELETE FROM Aux_Tools WHERE toolId=".$toolId, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDeleted ;
    }
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
    public function createTraining($userId, $name, $description, $public)
    {
        $conn = false ;

        $trainingId = -1  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasCreated = mysql_query("INSERT INTO Aux_Trainings(userId, name, description, public) VALUES(".$userId.", '".mysql_escape_string($name)."', '".mysql_escape_string($description)."', '".mysql_escape_string($public)."')", $conn) ;
	        if ($wasCreated)
	        {
                $trainingId = mysql_insert_id($conn) ;
	        }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $trainingId ;
    }

    /**
     * Método para recuperar uma instância da classe de treinamento.
     *
     * @param $trainingId
     * @return uma instancia de treinamento
     */
    public function getTraining($trainingId)
    {
        $conn = false ;
        $data = false ;

        $training = NULL ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT trainingId, userId, name, description, public FROM Aux_Trainings WHERE trainingId=".$trainingId." LIMIT 1", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $training = new Aux_Training($row["trainingId"], $row["userId"], $row["name"], $row["description"], $row["public"]) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $training ;
    }

     /**
      * Método para recuperar a lista de treinamentos criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de treinamentos
      */
    public function getUserTrainings($userId)
    {
        $conn = false ;
        $data = false ;

        $trainings = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT trainingId, userId, name, description, public FROM Aux_Trainings WHERE userId=".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aTraining = new Aux_Training($row["trainingId"], $row["userId"], $row["name"], $row["description"], $row["public"]) ;
                array_push($trainings, $aTraining) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $trainings ;
    }

     /**
      * Método para recuperar a lista de treinamento criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de treinamento
      */
    public function getOthersTrainings($userId)
    {
        $conn = false ;
        $data = false ;

        $trainings = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT trainingId, userId, name, description, public FROM Aux_Trainings WHERE userId<>".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aTraining = new Aux_Training($row["trainingId"], $row["userId"], $row["name"], $row["description"], $row["public"]) ;
                array_push($trainings, $aTraining) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $trainings ;
    }

     /**
      * Método para alterar a instancia de treinamento.
      *
      * @param $training
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateTraining($training)
    {
        $conn = false ;

        $wasUpdated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasUpdated = mysql_query("UPDATE Aux_Trainings set name='".mysql_escape_string($training->getName())."', description='".mysql_escape_string($training->getDescription())."', public='".mysql_escape_string($training->getPublic())."' WHERE trainingId=".$training->getTrainingId(), $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasUpdated ;
    }

     /**
      * Método para excluir a instancia do treinamento.
      *
      * @param $trainingId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteTraining($trainingId)
    {
        $conn = false ;

        $wasDeleted = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDeleted = mysql_query("DELETE FROM Aux_Trainings WHERE trainingId=".$trainingId, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDeleted ;
    }
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
    public function createVerification($userId, $name, $type, $description, $frequency, $worker)
    {
        $conn = false ;

        $verificationId = -1  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasCreated = mysql_query("INSERT INTO Aux_Verifications(userId, name, type, description, frequency, worker) VALUES(".$userId.", '".mysql_escape_string($name)."', '".mysql_escape_string($type)."', '".mysql_escape_string($description)."', '".mysql_escape_string($frequency)."', '".mysql_escape_string($worker)."')", $conn) ;
	        if ($wasCreated)
	        {
                $verificationId = mysql_insert_id($conn) ;
	        }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $verificationId ;
    }

    /**
     * Método para recuperar uma instância da classe de verificação.
     *
     * @param $verificationId
     * @return uma instancia de verificação
     */
    public function getVerification($verificationId)
    {
        $conn = false ;
        $data = false ;

        $verification = NULL ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT verificationId, userId, name, type, description, frequency, worker FROM Aux_Verifications WHERE verificationId=".$verificationId." LIMIT 1", $conn) ;
	        if (!$data)
	            return false ;

            if ($row = mysql_fetch_array($data))
            {
                $verification = new Aux_Verification($row["verificationId"], $row["userId"], $row["name"], $row["type"], $row["description"], $row["frequency"], $row["worker"]) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $verification ;
    }

     /**
      * Método para recuperar a lista de verificações criados pelo usuário referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de verificações
      */
    public function getUserVerifications($userId)
    {
        $conn = false ;
        $data = false ;

        $verifications = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT verificationId, userId, name, type, description, frequency, worker FROM Aux_Verifications WHERE userId=".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aVerification = new Aux_Verification($row["verificationId"], $row["userId"], $row["name"], $row["type"], $row["description"], $row["frequency"], $row["worker"]) ;
                array_push($verifications, $aVerification) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $verifications ;
    }

     /**
      * Método para recuperar a lista de verificações criados por outros usuários diferentes do referenciado pelo userId.
      *
      * @param $userId
      * @return uma lista de verificações
      */
    public function getOthersVerifications($userId)
    {
        $conn = false ;
        $data = false ;

        $verifications = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT verificationId, userId, name, type, description, frequency, worker FROM Aux_Verifications WHERE userId<>".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aVerification = new Aux_Verification($row["verificationId"], $row["userId"], $row["name"], $row["type"], $row["description"], $row["frequency"], $row["worker"]) ;
                array_push($verifications, $aVerification) ;
            }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $data )
            mysql_free_result($data) ;

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $verifications ;
    }

     /**
      * Método para alterar a instancia de verificação.
      *
      * @param $verification
      * @return true se tiver alterado com sucesso e falso caso contrario
      */
    public function updateVerification($verification)
    {
        $conn = false ;

        $wasUpdated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasUpdated = mysql_query("UPDATE Aux_Verifications set name='".mysql_escape_string($verification->getName())."', type='".mysql_escape_string($verification->getType())."', description='".mysql_escape_string($verification->getDescription())."', frequency='".mysql_escape_string($verification->getFrequency())."', worker='".mysql_escape_string($verification->getWorker())."' WHERE verificationId=".$verification->getVerificationId(), $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasUpdated ;
    }

     /**
      * Método para excluir a instancia da verificação.
      *
      * @param $verificationId
      * @return true se tiver excluido com sucesso e falso caso contrario
      */
    public function deleteVerification($verificationId)
    {
        $conn = false ;

        $wasDeleted = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDeleted = mysql_query("DELETE FROM Aux_Verifications WHERE verificationId=".$verificationId, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDeleted ;
    }
    // end Verification
}

?>