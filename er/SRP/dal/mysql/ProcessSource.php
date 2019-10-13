
<?php

require_once "dal/mysql/Database.php" ;
require_once "dal/interfaces/IProcessSource.php" ;
require_once "models/Utils.php" ;
require_once "models/Process.php" ;
require_once "models/UsualMacroActivity.php" ;
require_once "models/FrameworkMacroActivity.php" ;
require_once "models/FrameworkMacroActivityReference.php" ;
require_once "models/UsualDetailedActivity.php" ;
require_once "models/FrameworkDetailedActivity.php" ;
require_once "models/FrameworkDetailedActivityReference.php" ;

/**
 * Classe realiza a criação processos, implementando a interface IProcessSource.
 */
class ProcessSource implements IProcessSource
{
  
    public function getProcessesAuthors()
    {
        $conn = false ;
        $data = false ;

        $authors = array() ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT DISTINCT author FROM Processes ORDER BY author", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                array_push($authors, $row["author"]) ;
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

        return $authors ;
    }

    public function getOtherProcessesNames($processId)
    {
        $conn = false ;
        $data = false ;

        $names = array() ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT DISTINCT name FROM Processes WHERE nature='usual' AND processId<>".$processId." ORDER BY name", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                array_push($names, $row["name"]) ;
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

        return $names ;
    }

    public function deleteProcess($processId)
    {
        $conn = false ;
        $data = false ;

        $wasDeleted = false ;

        if (0 > $processId)
        {
            return false ;
        }

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasDeleted = mysql_query("DELETE FROM Processes WHERE processId=".$processId, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDeleted ;
    }

    public function updateProcess($process)
    {
        $conn = false ;
        $data = false ;

        if (NULL == $process)
        {
            return false ;
        }

        $wasUpdated = false ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasUpdated = mysql_query("UPDATE Processes SET name='".$process->getName()."', author='".$process->getAuthor()."', objective='".$process->getObjective()."', description='".$process->getDescription()."', classification='".$process->getClassification()."', nature='".$process->getNature()."', conformity='".$process->getConformity()."', area='".$process->getArea()."', lifeCicle='".$process->getLifeCicle()."', systemType='".$process->getSystemType()."', organizationSize='".$process->getOrganizationSize()."', projectDuration='".$process->getProjectDuration()."', teamSize='".$process->getTeamSize()."', requiredKnowledge='".$process->getRequiredKnowledge()."', teamLocation='".$process->getTeamLocation()."', keyWords='".$process->getKeyWords()."', preCondition='".$process->getPreCondition()."', posCondition='".$process->getPosCondition()."' WHERE processId=".$process->getProcessId(), $conn) ;
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
     * Método para criar uma instância da classe de processo.
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
     * @param $macroRepresentationDescription
     * @param $detailedRepresentationDescription
     * @return retorna o identificador do processo
     */
    public function createProcess($userId, $name, $author, $objective, $description, $classification, $nature, $conformity, $area, $lifeCicle, $systemType, $organizationSize, $projectDuration, $teamSize, $requiredKnowledge, $teamLocation, $keyWords, $preCondition, $posCondition)
    {
        $conn = false ;
        $data = false ;

        $processId = -1 ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasCreated = mysql_query("INSERT INTO Processes(userId, name, author, objective, description, classification, nature, conformity, area, lifeCicle, systemType, organizationSize, projectDuration, teamSize, requiredKnowledge, teamLocation, keyWords, preCondition, posCondition) VALUES(".$userId.", '".mysql_escape_string($name)."', '".mysql_escape_string($author)."', '".mysql_escape_string($objective)."', '".mysql_escape_string($description)."', '".mysql_escape_string($classification)."', '".mysql_escape_string($nature)."', '".mysql_escape_string($conformity)."', '".mysql_escape_string($area)."', '".mysql_escape_string($lifeCicle)."', '".mysql_escape_string($systemType)."', '".mysql_escape_string($organizationSize)."', '".mysql_escape_string($projectDuration)."', '".mysql_escape_string($teamSize)."', '".mysql_escape_string($requiredKnowledge)."', '".mysql_escape_string($teamLocation)."', '".mysql_escape_string($keyWords)."', '".mysql_escape_string($preCondition)."', '".mysql_escape_string($posCondition)."')", $conn) ;
	        if ($wasCreated)
	        {
                $processId = mysql_insert_id($conn) ;
	        }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $processId ;
    }

    public function getProcess($processId)
    {
        $conn = false ;
        $data = false ;

        $process = NULL ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT name, userId, author, objective, description, classification, nature, conformity, area, lifeCicle, systemType, organizationSize, projectDuration, teamSize, requiredKnowledge, teamLocation, keyWords, preCondition, posCondition FROM Processes WHERE processId=".$processId." LIMIT 1", $conn) ;
	        if (!$data)
	            return false ;

            if ($row = mysql_fetch_array($data))
            {
                $process = new Process($processId, $row["name"], $row["userId"], $row["author"], $row["objective"], $row["description"], $row["classification"], $row["nature"], $row["conformity"], $row["area"], $row["lifeCicle"], $row["systemType"], $row["organizationSize"], $row["projectDuration"], $row["teamSize"], $row["requiredKnowledge"], $row["teamLocation"], $row["keyWords"], $row["preCondition"], $row["posCondition"]) ;
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

        return $process ;
    }

    public function getUserProcesses($userId)
    {
        $conn = false ;
        $data = false ;

        $processes = array() ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT processId, name, userId, author, objective, description, classification, nature, conformity, area, lifeCicle, systemType, organizationSize, projectDuration, teamSize, requiredKnowledge, teamLocation, keyWords, preCondition, posCondition FROM Processes WHERE userId=".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $process = new Process($row["processId"], $row["name"], $row["userId"], $row["author"], $row["objective"], $row["description"], $row["classification"], $row["nature"], $row["conformity"], $row["area"], $row["lifeCicle"], $row["systemType"], $row["organizationSize"], $row["projectDuration"], $row["teamSize"], $row["requiredKnowledge"], $row["teamLocation"], $row["keyWords"], $row["preCondition"], $row["posCondition"]) ;

                if (NULL != $process)
                {
                    array_push($processes, $process) ;
                }
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

        return $processes ;
    }

    public function getOthersProcesses($userId)
    {
        $conn = false ;
        $data = false ;

        $processes = array() ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT processId, name, userId, author, objective, description, classification, nature, conformity, area, lifeCicle, systemType, organizationSize, projectDuration, teamSize, requiredKnowledge, teamLocation, keyWords, preCondition, posCondition FROM Processes WHERE userId<>".$userId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $process = new Process($row["processId"], $row["name"], $row["userId"], $row["author"], $row["objective"], $row["description"], $row["classification"], $row["nature"], $row["conformity"], $row["area"], $row["lifeCicle"], $row["systemType"], $row["organizationSize"], $row["projectDuration"], $row["teamSize"], $row["requiredKnowledge"], $row["teamLocation"], $row["keyWords"], $row["preCondition"], $row["posCondition"]) ;

                if (NULL != $process)
                {
                    array_push($processes, $process) ;
                }
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

        return $processes ;
    }

    public function getProcessesMapByAuthor($author)
    {
        $conn = false ;
        $data = false ;

        $processes = array() ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT processId, name, userId, author, objective, description, classification, nature, conformity, area, lifeCicle, systemType, organizationSize, projectDuration, teamSize, requiredKnowledge, teamLocation, keyWords, preCondition, posCondition FROM Processes WHERE author='".$author."' ORDER BY name", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $process = new Process($row["processId"], $row["name"], $row["userId"], $row["author"], $row["objective"], $row["description"], $row["classification"], $row["nature"], $row["conformity"], $row["area"], $row["lifeCicle"], $row["systemType"], $row["organizationSize"], $row["projectDuration"], $row["teamSize"], $row["requiredKnowledge"], $row["teamLocation"], $row["keyWords"], $row["preCondition"], $row["posCondition"]) ;
                $processes[$process->getProcessId()] = $process ;
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

        return $processes ;
    }

    public function getProcessesMapByName($name)
    {
        $conn = false ;
        $data = false ;

        $processes = array() ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT processId, name, userId, author, objective, description, classification, nature, conformity, area, lifeCicle, systemType, organizationSize, projectDuration, teamSize, requiredKnowledge, teamLocation, keyWords, preCondition, posCondition FROM Processes WHERE name='".$name."'", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $process = new Process($row["processId"], $row["name"], $row["userId"], $row["author"], $row["objective"], $row["description"], $row["classification"], $row["nature"], $row["conformity"], $row["area"], $row["lifeCicle"], $row["systemType"], $row["organizationSize"], $row["projectDuration"], $row["teamSize"], $row["requiredKnowledge"], $row["teamLocation"], $row["keyWords"], $row["preCondition"], $row["posCondition"]) ;
                $processes[$process->getProcessId()] = $process ;
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

        return $processes ;
    }

    public function getProcessesMapByMacroActivity($action, $object)
    {
        $conn = false ;
        $data = false ;

        $processes = array() ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT processId, name, userId, author, objective, description, classification, nature, conformity, area, lifeCicle, systemType, organizationSize, projectDuration, teamSize, requiredKnowledge, teamLocation, keyWords, preCondition, posCondition FROM Processes WHERE nature='usual' AND processId IN (SELECT processId FROM MacroActivities WHERE ( '".$action."' regexp CONCAT(action, IF(action IS NOT NULL AND ''<>action AND action_synonymous IS NOT NULL AND ''<>action_synonymous,'|',''), IF(''=action_synonymous,'',action_synonymous)) )=1 AND ( '".$object."' regexp CONCAT(object, IF(object IS NOT NULL AND ''<>object AND object_synonymous IS NOT NULL AND ''<>object_synonymous,'|',''), IF(''=object_synonymous,'',object_synonymous)) )=1) ORDER BY name", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $process = new Process($row["processId"], $row["name"], $row["userId"], $row["author"], $row["objective"], $row["description"], $row["classification"], $row["nature"], $row["conformity"], $row["area"], $row["lifeCicle"], $row["systemType"], $row["organizationSize"], $row["projectDuration"], $row["teamSize"], $row["requiredKnowledge"], $row["teamLocation"], $row["keyWords"], $row["preCondition"], $row["posCondition"]) ;
                $processes[$process->getProcessId()] = $process ;
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

        return $processes ;
    }

    public function getProcessesMapByDetailedActivity($action, $object)
    {
        $conn = false ;
        $data = false ;

        $processes = array() ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT DISTINCT p.processId, p.name, p.userId, p.author, p.objective, p.description, p.classification, p.nature, p.conformity, p.area, p.lifeCicle, p.systemType, p.organizationSize, p.projectDuration, p.teamSize, p.requiredKnowledge, p.teamLocation, p.keyWords, p.preCondition, p.posCondition FROM Processes AS p, MacroActivities AS m WHERE p.nature='usual' AND p.processId=m.processId AND macroActivityId IN (SELECT macroActivityId FROM DetailedActivities WHERE ( '".$action."' regexp CONCAT(action, IF(action IS NOT NULL AND ''<>action AND action_synonymous IS NOT NULL AND ''<>action_synonymous,'|',''), IF(''=action_synonymous,'',action_synonymous)) )=1 AND ( '".$object."' regexp CONCAT(object, IF(object IS NOT NULL AND ''<>object AND object_synonymous IS NOT NULL AND ''<>object_synonymous,'|',''), IF(''=object_synonymous,'',object_synonymous)) )=1) ORDER BY p.name", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $process = new Process($row["processId"], $row["name"], $row["userId"], $row["author"], $row["objective"], $row["description"], $row["classification"], $row["nature"], $row["conformity"], $row["area"], $row["lifeCicle"], $row["systemType"], $row["organizationSize"], $row["projectDuration"], $row["teamSize"], $row["requiredKnowledge"], $row["teamLocation"], $row["keyWords"], $row["preCondition"], $row["posCondition"]) ;
                $processes[$process->getProcessId()] = $process ;
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

        return $processes ;
    }

    public function getMacroActivitiesActions()
    {
        $conn = false ;
        $data = false ;

        $actions = array() ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT DISTINCT action FROM MacroActivities ORDER BY action", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                array_push($actions, $row["action"]) ;
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

        return $actions ;
    }

    public function getMacroActivitiesObjects()
    {
        $conn = false ;
        $data = false ;

        $objects = array() ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT DISTINCT object FROM MacroActivities ORDER BY object", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                array_push($objects, $row["object"]) ;
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

        return $objects ;
    }

    /**
     * Metodo para deletar uma atividade macro
     *
     * @param $processId
     * @param $macroActivityId
     * @return true se foi deletada com sucesso, false caso contrário
     */
    public function deleteMacroActivity($macroActivityId)
    {
        $conn = false ;
        $data = false ;

        $wasDeleted = false ;

        if (0 > $macroActivityId)
        {
            return false ;
        }

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasDeleted = mysql_query("DELETE FROM MacroActivities WHERE macroActivityId=".$macroActivityId, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDeleted ;
    }

    public function updateUsualMacroActivity($macroActivity)
    {
        $conn = false ;
        $data = false ;

        if (NULL == $macroActivity)
        {
            return false ;
        }

        $wasUpdated = false ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasUpdated = mysql_query("UPDATE MacroActivities SET action='".$macroActivity->getAction()."', object='".$macroActivity->getObject()."', action_synonymous='".Utils::array2String($macroActivity->getActionSynonymous(), "|")."', object_synonymous='".Utils::array2String($macroActivity->getObjectSynonymous(), "|")."', description='".$macroActivity->getDescription()."', u_preCondition='".$macroActivity->getPreCondition()."', u_posCondition='".$macroActivity->getPosCondition()."', u_restriction='".$macroActivity->getRestriction()."' WHERE macroActivityId=".$macroActivity->getMacroActivityId(), $conn) ;
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
     * Método para criar uma atividade macro para processos do tipo usual no banco.
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
     * @return retorna o identificador da macro atividade.
     */
    public function createUsualMacroActivity($userId, $processId, $action, $object, $action_synonymous, $object_synonymous, $description, $preCondition, $posCondition, $restriction, $reusedFrom)
    {
        $conn = false ;
        $data = false ;

        $macroActivityId = -1 ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasCreated = mysql_query("INSERT INTO MacroActivities(macroType, userId, processId, action, object, action_synonymous, object_synonymous, description, u_preCondition, u_posCondition, u_restriction, u_reusedFrom, priority) (SELECT 'usual', ".$userId.", '".$processId."', '".mysql_escape_string($action)."', '".mysql_escape_string($object)."', '".Utils::array2String($action_synonymous, "|")."', '".Utils::array2String($object_synonymous, "|")."', '".mysql_escape_string($description)."', '".mysql_escape_string($preCondition)."', '".mysql_escape_string($posCondition)."', '".mysql_escape_string($restriction)."', ".(NULL == $reusedFrom?"NULL":$reusedFrom).", IF( MAX(macroActivityId) IS NULL, 0, MAX(priority) )+1 FROM MacroActivities WHERE processId=".$processId." LIMIT 1)", $conn) ;
	        if ($wasCreated)
	        {
                $macroActivityId = mysql_insert_id($conn) ;
	        }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $macroActivityId ;
    }

    public function updateFrameworkMacroActivity($macroActivity)
    {
        $conn = false ;
        $data = false ;

        if (NULL == $macroActivity)
        {
            return false ;
        }

        $wasUpdated = false ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasUpdated = mysql_query("UPDATE MacroActivities SET action='".$macroActivity->getAction()."', object='".$macroActivity->getObject()."', action_synonymous='".Utils::array2String($macroActivity->getActionSynonymous(), "|")."', object_synonymous='".Utils::array2String($macroActivity->getObjectSynonymous(), "|")."', description='".$macroActivity->getDescription()."', f_type='".$macroActivity->getType()."', f_caracteristics='".$macroActivity->getCaracteristics()."' WHERE macroActivityId=".$macroActivity->getMacroActivityId(), $conn) ;
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
     * Método para criar uma atividade macro para processos do tipo framework no banco.
     *
     * @param $userId
     * @param $processId
     * @param $action
     * @param $object
     * @param $action_synonymous
     * @param $object_synonymous
     * @param $description
     * @param $type
     * @param $carcteristis
     * @return retorna o identificador da macro atividade.
     */
    public function createFrameworkMacroActivity($userId, $processId, $action, $object, $action_synonymous, $object_synonymous, $description, $type, $caracteristics)
    {
        $conn = false ;
        $data = false ;

        $macroActivityId = -1 ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasCreated = mysql_query("INSERT INTO MacroActivities(macroType, userId, processId, action, object, action_synonymous, object_synonymous, description, f_type, f_caracteristics, priority) (SELECT 'framework', ".$userId.", '".$processId."', '".mysql_escape_string($action)."', '".mysql_escape_string($object)."', '".Utils::array2String($action_synonymous, "|")."', '".Utils::array2String($object_synonymous, "|")."', '".mysql_escape_string($description)."', '".$type."', '".$caracteristics."', IF( MAX(macroActivityId) IS NULL, 0, MAX(priority) )+1 FROM MacroActivities WHERE processId=".$processId." LIMIT 1)", $conn) ;
	        if ($wasCreated)
	        {
                $macroActivityId = mysql_insert_id($conn) ;
	        }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $macroActivityId ;
    }

    public function getProcessMacroActivities($processId)
    {
        $conn = false ;
        $data = false ;

        $processMacroActivities = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT macroActivityId, macroType, userId, action, object, description, action_synonymous, object_synonymous, u_preCondition, u_posCondition, u_restriction, u_reusedFrom, f_type, f_caracteristics, priority FROM MacroActivities WHERE processId=".$processId." ORDER BY priority", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aMacroActivity = NULL ;

                $macroType = $row["macroType"] ;
                if ("usual" == $macroType)
                {
                    $aMacroActivity = new UsualMacroActivity($row["macroActivityId"], $row["userId"], $processId, $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"]), Utils::string2Array($row["object_synonymous"]), $row["priority"], $row["u_preCondition"], $row["u_posCondition"], $row["u_restriction"], $row["u_reusedFrom"]) ;
                }
                else if ("framework" == $macroType)
                {
                    $aMacroActivity = new FrameworkMacroActivity($row["macroActivityId"], $row["userId"], $processId, $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"]), Utils::string2Array($row["object_synonymous"]), $row["priority"], $row["f_type"], $row["f_caracteristics"]) ;
                }

                if (NULL != $aMacroActivity)
                {
                    array_push($processMacroActivities, $aMacroActivity) ;
                }
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

        return $processMacroActivities ;
    }

    public function getReusedMacroActivity($processId, $reusedFrom)
    {
        $conn = false ;
        $data = false ;

        $macroActivity = NULL ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT macroActivityId, macroType, userId, action, object, description, action_synonymous, object_synonymous, u_preCondition, u_posCondition, u_restriction, priority FROM MacroActivities WHERE macroType='usual' AND processId=".$processId." AND u_reusedFrom=".(NULL==$reusedFrom?"NULL":$reusedFrom)." LIMIT 1", $conn) ;
	        if (!$data)
	            return false ;

            if ($row = mysql_fetch_array($data))
            {
                $macroActivity = new UsualMacroActivity($row["macroActivityId"], $row["userId"], $processId, $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"]), Utils::string2Array($row["object_synonymous"]), $row["priority"], $row["u_preCondition"], $row["u_posCondition"], $row["u_restriction"], $reusedFrom) ;
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

        return $macroActivity ;
    }

    public function getMacroActivity($macroActivityId)
    {
        $conn = false ;
        $data = false ;

        $macroActivity = NULL ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT macroActivityId, processId, macroType, userId, action, object, description, action_synonymous, object_synonymous, u_preCondition, u_posCondition, u_restriction, u_reusedFrom, f_type, f_caracteristics, priority FROM MacroActivities WHERE macroActivityId=".$macroActivityId." LIMIT 1", $conn) ;
	        if (!$data)
	            return false ;

            if ($row = mysql_fetch_array($data))
            {
                $macroType = $row["macroType"] ;
                if ("usual" == $macroType)
                {
                    $macroActivity = new UsualMacroActivity($row["macroActivityId"], $row["userId"], $row["processId"], $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"]), Utils::string2Array($row["object_synonymous"]), $row["priority"], $row["u_preCondition"], $row["u_posCondition"], $row["u_restriction"], $row["u_reusedFrom"]) ;
                }
                else if ("framework" == $macroType)
                {
                    $macroActivity = new FrameworkMacroActivity($row["macroActivityId"], $row["userId"], $row["processId"], $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"]), Utils::string2Array($row["object_synonymous"]), $row["priority"], $row["f_type"], $row["f_caracteristics"]) ;
                }
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

        return $macroActivity ;
    }

    public function getSimilarMacroActivities($macroActivityId)
    {
        $conn = false ;
        $data = false ;

        $macroActivities = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT md.macroActivityId, processId, macroType, userId, action, object, description, action_synonymous, object_synonymous, u_preCondition, u_posCondition, u_restriction, u_reusedFrom, f_type, f_caracteristics, priority FROM MacroActivities AS md, (SELECT macroActivityId, CONCAT(action, IF(action IS NOT NULL AND ''<>action AND action_synonymous IS NOT NULL AND ''<>action_synonymous,'|',''), IF(''=action_synonymous,'',action_synonymous)) AS actions, CONCAT(object, IF(object IS NOT NULL AND ''<>object AND object_synonymous IS NOT NULL AND ''<>object_synonymous,'|',''), IF(''=object_synonymous,'',object_synonymous)) AS objects FROM MacroActivities WHERE  macroActivityId=".$macroActivityId.") AS tmp WHERE md.macroActivityId<>tmp.macroActivityId AND macroType='usual' AND ( (action regexp tmp.actions)=1 OR (action_synonymous regexp tmp.actions)=1 ) AND ( (object regexp tmp.objects)=1 OR (object_synonymous regexp tmp.objects)=1 )", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aMacroActivity = NULL ;

                $macroType = $row["macroType"] ;
                if ("usual" == $macroType)
                {
                    $aMacroActivity = new UsualMacroActivity($row["macroActivityId"], $row["userId"], $row["processId"], $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"]), Utils::string2Array($row["object_synonymous"]), $row["priority"], $row["u_preCondition"], $row["u_posCondition"], $row["u_restriction"], $row["u_reusedFrom"]) ;
                }
                else if ("framework" == $macroType)
                {
                    $aMacroActivity = new FrameworkMacroActivity($row["macroActivityId"], $row["userId"], $row["processId"], $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"]), Utils::string2Array($row["object_synonymous"]), $row["priority"], $row["f_type"], $row["f_caracteristics"]) ;
                }

                if (NULL != $aMacroActivity)
                {
                    array_push($macroActivities, $aMacroActivity) ;
                }
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

        return $macroActivities ;
    }

    public function associateUsualToFrameworkMacroActivity($frameworkMacroActivityId, $usualMacroActivityId, $similarity)
    {
        $conn = false ;
        $data = false ;

        $wasAssociated = false ;

        if (0 > $frameworkMacroActivityId || 0 > $usualMacroActivityId || NULL == $similarity)
        {
            return false ;
        }

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasAssociated = mysql_query("INSERT INTO FrameworkMacroActivityReferences(frameworkMacroActivityId, usualMacroActivityId, similarity) VALUES(".$frameworkMacroActivityId.", ".$usualMacroActivityId.", '".$similarity."') ON DUPLICATE KEY UPDATE similarity='".$similarity."'", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    public function deleteFrameworkMacroActivityReferences($frameworkMacroActivityId)
    {
        $conn = false ;
        $data = false ;

        $wasDeleted = false ;

        if (0 > $frameworkMacroActivityId )
        {
            return false ;
        }

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasDeleted = mysql_query("DELETE FROM FrameworkMacroActivityReferences WHERE frameworkMacroActivityId=".$frameworkMacroActivityId, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDeleted ;
    }

    public function getFrameworkMacroActivityReferences($frameworkMacroActivityId)
    {
        $conn = false ;
        $data = false ;

        $macroActivities = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT macroActivityId, macroType, userId, processId, action, object, description, action_synonymous, object_synonymous, u_preCondition, u_posCondition, u_restriction, u_reusedFrom, f_type, f_caracteristics, priority, similarity FROM MacroActivities, FrameworkMacroActivityReferences WHERE macroActivityId=usualMacroActivityId AND frameworkMacroActivityId=".$frameworkMacroActivityId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aMacroActivity = NULL ;

                $macroType = $row["macroType"] ;
                if ("usual" == $macroType)
                {
                    $aMacroActivity = new UsualMacroActivity($row["macroActivityId"], $row["userId"], $row["processId"], $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"], "|"), Utils::string2Array($row["object_synonymous"], "|"), $row["priority"], $row["u_preCondition"], $row["u_posCondition"], $row["u_restriction"], $row["u_reusedFrom"]) ;
                }
                else if ("framework" == $macroType)
                {
                    $aMacroActivity = new FrameworkMacroActivity($row["macroActivityId"], $row["userId"], $row["processId"], $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"], "|"), Utils::string2Array($row["object_synonymous"], "|"), $row["priority"], $row["f_type"], $row["f_caracteristics"]) ;
                }

                if (NULL != $aMacroActivity)
                {
                    $reference = new FrameworkMacroActivityRefence($aMacroActivity, $row["similarity"]) ;
                    array_push($macroActivities, $reference) ;
                }
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

        return $macroActivities ;
    }

    public function exchangeProcessMacroActivitiesPriority($macroActivityId1, $priority1, $macroActivityId2, $priority2)
    {
        $conn = false ;
        $data = false ;

        $wasAssociated = false ;

        if (0 > $macroActivityId1 || 0 > $macroActivityId2)
        {
            return false ;
        }

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasAssociated = mysql_query("UPDATE MacroActivities AS ma1, MacroActivities AS ma2 SET ma1.priority=".$priority2.", ma2.priority=".$priority1." WHERE ma1.macroActivityId=".$macroActivityId1." AND ma2.macroActivityId=".$macroActivityId2, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    public function getDetailedActivitiesActions()
    {
        $conn = false ;
        $data = false ;

        $actions = array() ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT DISTINCT action FROM DetailedActivities ORDER BY action", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                array_push($actions, $row["action"]) ;
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

        return $actions ;
    }

    public function getDetailedActivitiesObjects()
    {
        $conn = false ;
        $data = false ;

        $objects = array() ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT DISTINCT object FROM DetailedActivities ORDER BY object", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                array_push($objects, $row["object"]) ;
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

        return $objects ;
    }

    /**
     * Metodo para deletar uma atividade detalhada.
     *
     * @param $processId
     * @param $macroActivityId
     * @return true se foi deletada com sucesso, false caso contrário
     */
    public function deleteDetailedActivity($detailedActivityId)
    {
        $conn = false ;
        $data = false ;

        $wasDeleted = false ;

        if (0 > $detailedActivityId)
        {
            return false ;
        }

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasDeleted = mysql_query("DELETE FROM DetailedActivities WHERE detailedActivityId=".$detailedActivityId, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDeleted ;
    }

    public function updateUsualDetailedActivity($detailedActivity)
    {
        $conn = false ;
        $data = false ;

        if (NULL == $detailedActivity)
        {
            return false ;
        }

        $wasUpdated = false ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasUpdated = mysql_query("UPDATE DetailedActivities SET action='".$detailedActivity->getAction()."', object='".$detailedActivity->getObject()."', action_synonymous='".Utils::array2String($detailedActivity->getActionSynonymous(), "|")."', object_synonymous='".Utils::array2String($detailedActivity->getObjectSynonymous(), "|")."', description='".$detailedActivity->getDescription()."', u_preCondition='".$detailedActivity->getPreCondition()."', u_posCondition='".$detailedActivity->getPosCondition()."', u_restriction='".$detailedActivity->getRestriction()."' WHERE detailedActivityId=".$detailedActivity->getDetailedActivityId(), $conn) ;
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
     * Método para criar uma atividade detalhada para atividades macros do tipo usual no banco.
     *
     * @param $userId
     * @param $action
     * @param $object
     * @param $action_synonymous
     * @param $object_synonymous
     * @param $description
     * @param $preCondition
     * @param $posCondition
     * @param $restriction
     * @param $reusedFrom
     * @return retorna o identificador da atividade detalhada.
     */
    public function createUsualDetailedActivity($userId, $macroActivityId, $action, $object, $action_synonymous, $object_synonymous, $description, $preCondition, $posCondition, $restriction, $reusedFrom)
    {
        $conn = false ;
        $data = false ;

        $detailedActivityId = -1 ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasCreated = mysql_query("INSERT INTO DetailedActivities(detailedType, userId, macroActivityId, action, object, action_synonymous, object_synonymous, description, u_preCondition, u_posCondition, u_restriction, u_reusedFrom, priority) (SELECT 'usual', ".$userId.", ".$macroActivityId.", '".mysql_escape_string($action)."', '".mysql_escape_string($object)."', '".Utils::array2String($action_synonymous, "|")."', '".Utils::array2String($object_synonymous, "|")."', '".mysql_escape_string($description)."', '".mysql_escape_string($preCondition)."', '".mysql_escape_string($posCondition)."', '".mysql_escape_string($restriction)."', ".(NULL == $reusedFrom?"NULL":$reusedFrom).", IF( MAX(detailedActivityId) IS NULL, 0, MAX(priority) )+1 FROM DetailedActivities WHERE macroActivityId=".$macroActivityId." LIMIT 1)", $conn) ;
	        if ($wasCreated)
	        {
                $detailedActivityId = mysql_insert_id($conn) ;
	        }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $detailedActivityId ;
    }

    public function updateFrameworkDetailedActivity($detailedActivity)
    {
        $conn = false ;
        $data = false ;

        if (NULL == $detailedActivity)
        {
            return false ;
        }

        $wasUpdated = false ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasUpdated = mysql_query("UPDATE DetailedActivities SET action='".$detailedActivity->getAction()."', object='".$detailedActivity->getObject()."', action_synonymous='".Utils::array2String($detailedActivity->getActionSynonymous(), "|")."', object_synonymous='".Utils::array2String($detailedActivity->getObjectSynonymous(), "|")."', description='".$detailedActivity->getDescription()."', f_type='".$detailedActivity->getType()."', f_caracteristics='".$detailedActivity->getCaracteristics()."' WHERE detailedActivityId=".$detailedActivity->getDetailedActivityId(), $conn) ;
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
     * Método para criar uma atividade detalhada para atividades macros do tipo framework no banco.
     *
     * @param $userId
     * @param $action
     * @param $object
     * @param $action_synonymous
     * @param $object_synonymous
     * @param $description
     * @param $type
     * @param $caracteristics
     * @return retorna o identificador da atividade detalhada.
     */
    public function createFrameworkDetailedActivity($userId, $macroActivityId, $action, $object, $action_synonymous, $object_synonymous, $description, $type, $caracteristics)
    {
        $conn = false ;
        $data = false ;

        $detailedActivityId = -1 ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasCreated = mysql_query("INSERT INTO DetailedActivities(detailedType, userId, macroActivityId, action, object, action_synonymous, object_synonymous, description, f_type, f_caracteristics, priority) (SELECT 'framework', ".$userId.", ".$macroActivityId.", '".mysql_escape_string($action)."', '".mysql_escape_string($object)."', '".Utils::array2String($action_synonymous, "|")."', '".Utils::array2String($object_synonymous, "|")."', '".mysql_escape_string($description)."', '".$type."', '".$caracteristics."', IF( MAX(detailedActivityId) IS NULL, 0, MAX(priority) )+1 FROM DetailedActivities WHERE macroActivityId=".$macroActivityId." LIMIT 1)", $conn) ;
	        if ($wasCreated)
	        {
                $detailedActivityId = mysql_insert_id($conn) ;
	        }
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $detailedActivityId ;
    }

    public function getMacroDetailedActivities($macroActivityId)
    {
        $conn = false ;
        $data = false ;

        $macroDetailedActivities = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT detailedActivityId, detailedType, userId, macroActivityId, action, object, description, action_synonymous, object_synonymous, u_preCondition, u_posCondition, u_restriction, u_reusedFrom, f_type, f_caracteristics, priority FROM DetailedActivities WHERE macroActivityId=".$macroActivityId." ORDER BY priority", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aDetailedActivity = NULL ;

                $detailedType = $row["detailedType"] ;
                if ("usual" == $detailedType)
                {
                    $aDetailedActivity = new UsualDetailedActivity($row["detailedActivityId"], $row["userId"], $row["macroActivityId"], $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"], "|"), Utils::string2Array($row["object_synonymous"], "|"), $row["priority"], $row["u_preCondition"], $row["u_posCondition"], $row["u_restriction"], $row["u_reusedFrom"]) ;
                }
                else if ("framework" == $detailedType)
                {
                    $aDetailedActivity = new FrameworkDetailedActivity($row["detailedActivityId"], $row["userId"], $row["macroActivityId"], $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"], "|"), Utils::string2Array($row["object_synonymous"], "|"), $row["priority"], $row["f_type"], $row["f_caracteristics"]) ;
                }

                if (NULL != $aDetailedActivity)
                {
                    array_push($macroDetailedActivities, $aDetailedActivity) ;
                }
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

        return $macroDetailedActivities ;
    }

    public function getReusedDetailedActivity($macroActivityId, $reusedFrom)
    {
        $conn = false ;
        $data = false ;

        $detailedActivity = NULL ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT detailedActivityId, detailedType, userId, macroActivityId, action, object, description, action_synonymous, object_synonymous, u_preCondition, u_posCondition, u_restriction, u_reusedFrom, priority FROM DetailedActivities WHERE detailedType='usual' AND macroActivityId=".$macroActivityId." AND u_reusedFrom=".(NULL==$reusedFrom?"NULL":$reusedFrom)." LIMIT 1", $conn) ;
	        if (!$data)
	            return false ;

            if ($row = mysql_fetch_array($data))
            {
                $detailedActivity = new UsualDetailedActivity($row["detailedActivityId"], $row["userId"], $row["macroActivityId"], $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"], "|"), Utils::string2Array($row["object_synonymous"], "|"), $row["priority"], $row["u_preCondition"], $row["u_posCondition"], $row["u_restriction"], $row["u_reusedFrom"]) ;
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

        return $detailedActivity ;
    }

    public function getDetailedActivity($detailedActivityId)
    {
        $conn = false ;
        $data = false ;

        $detailedActivity = NULL ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT detailedActivityId, detailedType, userId, macroActivityId, action, object, description, action_synonymous, object_synonymous, u_preCondition, u_posCondition, u_restriction, u_reusedFrom, f_type, f_caracteristics, priority FROM DetailedActivities WHERE detailedActivityId=".$detailedActivityId." LIMIT 1", $conn) ;
	        if (!$data)
	            return false ;

            if ($row = mysql_fetch_array($data))
            {
                $detailedType = $row["detailedType"] ;
                if ("usual" == $detailedType)
                {
                    $detailedActivity = new UsualDetailedActivity($row["detailedActivityId"], $row["userId"], $row["macroActivityId"], $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"], "|"), Utils::string2Array($row["object_synonymous"], "|"), $row["priority"], $row["u_preCondition"], $row["u_posCondition"], $row["u_restriction"], $row["u_reusedFrom"]) ;
                }
                else if ("framework" == $detailedType)
                {
                    $detailedActivity = new FrameworkDetailedActivity($row["detailedActivityId"], $row["userId"], $row["macroActivityId"], $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"], "|"), Utils::string2Array($row["object_synonymous"], "|"), $row["priority"], $row["f_type"], $row["f_caracteristics"]) ;
                }
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

        return $detailedActivity ;
    }

    public function getSimilarDetailedActivities($detailedActivityId)
    {
        $conn = false ;
        $data = false ;

        $detailedActivities = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT md.detailedActivityId, detailedType, userId, macroActivityId, action, object, description, action_synonymous, object_synonymous, u_preCondition, u_posCondition, u_restriction, u_reusedFrom, f_type, f_caracteristics, priority FROM DetailedActivities AS md, (SELECT detailedActivityId, CONCAT(action, IF(action IS NOT NULL AND ''<>action AND action_synonymous IS NOT NULL AND ''<>action_synonymous,'|',''), IF(''=action_synonymous,'',action_synonymous)) AS actions, CONCAT(object, IF(object IS NOT NULL AND ''<>object AND object_synonymous IS NOT NULL AND ''<>object_synonymous,'|',''), IF(''=object_synonymous,'',object_synonymous)) AS objects FROM DetailedActivities WHERE  detailedActivityId=".$detailedActivityId.") AS tmp WHERE md.detailedActivityId<>tmp.detailedActivityId AND detailedType='usual' AND ( (action regexp tmp.actions)=1 OR (action_synonymous regexp tmp.actions)=1 ) AND ( (object regexp tmp.objects)=1 OR (object_synonymous regexp tmp.objects)=1 )", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aDetailedActivity = NULL ;

                $detailedType = $row["detailedType"] ;
                if ("usual" == $detailedType)
                {
                    $aDetailedActivity = new UsualDetailedActivity($row["detailedActivityId"], $row["userId"], $row["macroActivityId"], $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"], "|"), Utils::string2Array($row["object_synonymous"], "|"), $row["priority"], $row["u_preCondition"], $row["u_posCondition"], $row["u_restriction"], $row["u_reusedFrom"]) ;
                }
                else if ("framework" == $detailedType)
                {
                    $aDetailedActivity = new FrameworkDetailedActivity($row["detailedActivityId"], $row["userId"], $row["macroActivityId"], $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"], "|"), Utils::string2Array($row["object_synonymous"], "|"), $row["priority"], $row["f_type"], $row["f_caracteristics"]) ;
                }

                if (NULL != $aDetailedActivity)
                {
                    array_push($detailedActivities, $aDetailedActivity) ;
                }
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

        return $detailedActivities ;
    }

    public function associateUsualToFrameworkDetailedActivity($frameworkDetailedActivityId, $usualDetailedActivityId, $similarity)
    {
        $conn = false ;
        $data = false ;

        $wasAssociated = false ;

        if (0 > $frameworkDetailedActivityId || 0 > $usualDetailedActivityId || NULL == $similarity)
        {
            return false ;
        }

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasAssociated = mysql_query("INSERT INTO FrameworkDetailedActivityReferences(frameworkDetailedActivityId, usualDetailedActivityId, similarity) VALUES(".$frameworkDetailedActivityId.", ".$usualDetailedActivityId.", '".$similarity."') ON DUPLICATE KEY UPDATE similarity='".$similarity."'", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    public function deleteFrameworkDetailedActivityReferences($frameworkDetailedActivityId)
    {
        $conn = false ;
        $data = false ;

        $wasDeleted = false ;

        if (0 > $frameworkDetailedActivityId )
        {
            return false ;
        }

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasDeleted = mysql_query("DELETE FROM FrameworkDetailedActivityReferences WHERE frameworkDetailedActivityId=".$frameworkDetailedActivityId, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDeleted ;
    }

    public function getFrameworkDetailedActivityReferences($frameworkDetailedActivityId)
    {
        $conn = false ;
        $data = false ;

        $detailedActivities = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT detailedActivityId, detailedType, userId, macroActivityId, action, object, description, action_synonymous, object_synonymous, u_preCondition, u_posCondition, u_restriction, u_reusedFrom, f_type, f_caracteristics, priority, similarity FROM DetailedActivities, FrameworkDetailedActivityReferences WHERE detailedActivityId=usualDetailedActivityId AND frameworkDetailedActivityId=".$frameworkDetailedActivityId, $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $aDetailedActivity = NULL ;

                $detailedType = $row["detailedType"] ;
                if ("usual" == $detailedType)
                {
                    $aDetailedActivity = new UsualDetailedActivity($row["detailedActivityId"], $row["userId"], $row["macroActivityId"], $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"], "|"), Utils::string2Array($row["object_synonymous"], "|"), $row["priority"], $row["u_preCondition"], $row["u_posCondition"], $row["u_restriction"], $row["u_reusedFrom"]) ;
                }
                else if ("framework" == $detailedType)
                {
                    $aDetailedActivity = new FrameworkDetailedActivity($row["detailedActivityId"], $row["userId"], $row["macroActivityId"], $row["action"], $row["object"], $row["description"], Utils::string2Array($row["action_synonymous"], "|"), Utils::string2Array($row["object_synonymous"], "|"), $row["priority"], $row["f_type"], $row["f_caracteristics"]) ;
                }

                if (NULL != $aDetailedActivity)
                {
                    $reference = new FrameworkDetaildActivityRefence($aDetailedActivity, $row["similarity"]) ;
                    array_push($detailedActivities, $reference) ;
                }
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

        return $detailedActivities ;
    }

    public function exchangeMacroDetailedActivitiesPriority($detailedActivityId1, $priority1, $detailedActivityId2, $priority2)
    {
        $conn = false ;
        $data = false ;

        $wasAssociated = false ;

        if (0 > $detailedActivityId1 || 0 > $detailedActivityId2)
        {
            return false ;
        }

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

            $wasAssociated = mysql_query("UPDATE DetailedActivities AS da1, DetailedActivities AS da2 SET da1.priority=".$priority2.", da2.priority=".$priority1." WHERE da1.detailedActivityId=".$detailedActivityId1." AND da2.detailedActivityId=".$detailedActivityId2, $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    /**
     * Metodo para recuperar os artefatos associados ao processo
     *
     * @param $processId
     * @param $type  (artefato de entrada ou de saida)
     * @return lista de artefatos associadas ao processo
     */
    public function getProcessArtifacts($processId, $type)
    {
        $conn = false ;
        $data = false ;

        $artifacts = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT artifactId, userId, name, description FROM Aux_Artifacts WHERE artifactId IN (SELECT artifactId FROM Process_Artifacts WHERE processId=".$processId." AND type='".$type."')", $conn) ;
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
     * Metodo para recuperar os artefatos que não foram associados ao processo
     *
     * @param $processId
     * @param $type  (artefato de entrada ou de saida)
     * @return lista de artefatos que não foram associadas ao processo
     */
    public function getNonProcessArtifacts($processId, $type)
    {
        $conn = false ;
        $data = false ;

        $artifacts = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT artifactId, userId, name, description FROM Aux_Artifacts WHERE artifactId NOT IN (SELECT artifactId FROM Process_Artifacts WHERE processId=".$processId." AND type='".$type."')", $conn) ;
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
     * Metodo para associar os artefatos ao processo
     *
     * @param $processId
     * @param $artifactId
     * @param $type  (artefato de entrada ou de saida)
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public function associateArtifactToProcess($processId, $artifactId, $type)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasAssociated = mysql_query("INSERT INTO Process_Artifacts VALUES(".$processId.", ".$artifactId.", '".$type."')", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    /**
     * Metodo para desassociar os artefatos ao processo
     *
     * @param $processId
     * @param $artifactId
     * @param $type  (artefato de entrada ou de saida)
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public function dissociateArtifactFromProcess($processId, $artifactId, $type)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDissociated = mysql_query("DELETE FROM Process_Artifacts WHERE processId=".$processId." AND artifactId=".$artifactId." AND type='".$type."'", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }

    /**
     * Metodo para recuperar os conceitos associados ao processo
     *
     * @param $processId
     * @return lista de conceitos associadas ao processo
     */
    public function getProcessConcepts($processId)
    {
        $conn = false ;
        $data = false ;

        $concepts = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT conceptId, userId, termName, termType, termDescription FROM Aux_Concepts WHERE conceptId IN (SELECT conceptId FROM Process_Concepts WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anConcept = new Aux_Concept($row["conceptId"], $row["userId"], $row["termName"],$row["termType"], $row["termDescription"]) ;
                array_push($concepts, $anConcept) ;
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
     * Metodo para recuperar os conceitos que não foram associados ao processo
     *
     * @param $processId
     * @return lista de conceitos que não foram associadas ao processo
     */
    public function getNonProcessConcepts($processId)
    {
        $conn = false ;
        $data = false ;

        $concepts = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT conceptId, userId, termName, termType, termDescription FROM Aux_Concepts WHERE conceptId NOT IN (SELECT conceptId FROM Process_Concepts WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anConcept = new Aux_Concept($row["conceptId"], $row["userId"], $row["termName"],$row["termType"], $row["termDescription"]) ;
                array_push($concepts, $anConcept) ;
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
     * Metodo para associar os conceitos ao processo
     *
     * @param $processId
     * @param $conceptId
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public function associateConceptToProcess($processId, $conceptId)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasAssociated = mysql_query("INSERT INTO Process_Concepts VALUES(".$processId.", ".$conceptId.")", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    /**
     * Metodo para desassociar os conceitos ao processo
     *
     * @param $processId
     * @param $conceptId
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public function dissociateConceptFromProcess($processId,$conceptId)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasDissociated = mysql_query("DELETE FROM Process_Concepts WHERE processId=".$processId." AND conceptId=".$conceptId , $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }

    /**
     * Metodo para recuperar as ferramentas associadas ao processo
     *
     * @param $processId
     * @return lista de ferramentas associadas ao processo
     */
    public function getProcessTools($processId)
    {
        $conn = false ;
        $data = false ;

        $tools = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT toolId, userId, name, description FROM Aux_Tools WHERE toolId IN (SELECT toolId FROM Process_Tools WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anTool = new Aux_Tool($row["toolId"], $row["userId"], $row["name"],$row["description"]) ;
                array_push($tools, $anTool) ;
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
     * Metodo para recuperar as ferramentas que não foram associadas ao processo
     *
     * @param $processId
     * @return lista de ferramentas que não foram associadas ao processo
     */
    public function getNonProcessTools($processId)
    {
        $conn = false ;
        $data = false ;

        $tools = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT toolId, userId, name, description FROM Aux_Tools WHERE toolId NOT IN (SELECT toolId FROM Process_Tools WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anTool = new Aux_Tool($row["toolId"], $row["userId"], $row["name"],$row["description"]) ;
                array_push($tools, $anTool) ;
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
     * Metodo para associar as ferramentas ao processo
     *
     * @param $processId
     * @param $toolId
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public function associateToolToProcess($processId, $toolId)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasAssociated = mysql_query("INSERT INTO Process_Tools VALUES(".$processId.", ".$toolId.")", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    /**
     * Metodo para desassociar as ferramentas ao processo
     *
     * @param $processId
     * @param $toolId
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public function dissociateToolFromProcess($processId,$toolId)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasDissociated = mysql_query("DELETE FROM Process_Tools WHERE processId=".$processId." AND toolId=".$toolId , $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }


    /**
     * Metodo para recuperar os formularios associadas ao processo
     *
     * @param $processId
     * @return lista de formularios associados ao processo
     */
    public function getProcessForms($processId)
    {
        $conn = false ;
        $data = false ;

        $forms = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT formId, userId, name, purpose FROM Aux_Forms WHERE formId IN (SELECT formId FROM Process_Forms WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anForm = new Aux_Form($row["formId"], $row["userId"], $row["name"],$row["purpose"]) ;
                array_push($forms, $anForm) ;
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
     * Metodo para recuperar os formularios que não foram associados ao processo
     *
     * @param $processId
     * @return lista de formularios que não foram associados ao processo
     */
    public function getNonProcessForms($processId)
    {
        $conn = false ;
        $data = false ;

        $forms = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT formId, userId, name, purpose FROM Aux_Forms WHERE formId NOT IN (SELECT formId FROM Process_Forms WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anForm = new Aux_Form($row["formId"], $row["userId"], $row["name"],$row["purpose"]) ;
                array_push($forms, $anForm) ;
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
     * Metodo para associar os formularios ao processo
     *
     * @param $processId
     * @param $formId
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public function associateFormToProcess($processId, $formId)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasAssociated = mysql_query("INSERT INTO Process_Forms VALUES(".$processId.", ".$formId.")", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    /**
     * Metodo para desassociar os formularios ao processo
     *
     * @param $processId
     * @param $formId
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public function dissociateFormFromProcess($processId,$formId)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasDissociated = mysql_query("DELETE FROM Process_Forms WHERE processId=".$processId." AND formId=".$formId , $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }

    /**
     * Metodo para recuperar as funções associadas ao processo
     *
     * @param $processId
     * @return lista de funções associadas ao processo
     */
    public function getProcessFunctions($processId)
    {
        $conn = false ;
        $data = false ;

        $functions = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT functionId, userId, name, description FROM Aux_Functions WHERE functionId IN (SELECT functionId FROM Process_Functions WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anFunction = new Aux_Function($row["functionId"], $row["userId"], $row["name"],$row["description"]) ;
                array_push($functions, $anFunction) ;
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
     * Metodo para recuperar as funções que não foram associadas ao processo
     *
     * @param $processId
     * @return lista de funções que não foram associadas ao processo
     */
    public function getNonProcessFunctions($processId)
    {
        $conn = false ;
        $data = false ;

        $functions = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT functionId, userId, name, description FROM Aux_Functions WHERE functionId NOT IN (SELECT functionId FROM Process_Functions WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anFunction = new Aux_Function($row["functionId"], $row["userId"], $row["name"],$row["description"]) ;
                array_push($functions, $anFunction) ;
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
     * Metodo para associar as funções ao processo
     *
     * @param $processId
     * @param $functionId
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public function associateFunctionToProcess($processId, $functionId)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasAssociated = mysql_query("INSERT INTO Process_Functions VALUES(".$processId.", ".$functionId.")", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    /**
     * Metodo para desassociar as funções ao processo
     *
     * @param $processId
     * @param $functionId
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public function dissociateFunctionFromProcess($processId,$functionId)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasDissociated = mysql_query("DELETE FROM Process_Functions WHERE processId=".$processId." AND functionId=".$functionId , $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }

    /**
     * Metodo para recuperar medições associadas ao processo
     *
     * @param $processId
     * @return lista de medições associadas ao processo
     */
    public function getProcessMeasurements($processId)
    {
        $conn = false ;
        $data = false ;

        $measurements = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT measurementId, userId, name, description, formula, metric FROM Aux_Measurements WHERE measurementId IN (SELECT measurementId FROM Process_Measurements WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anMeasurement = new Aux_Measurement($row["measurementId"], $row["userId"], $row["name"], $row["description"], $row["formula"], $row["metric"]) ;
                array_push($measurements, $anMeasurement) ;
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
     * Metodo para recuperar medições que não foram associadas ao processo
     *
     * @param $processId
     * @return lista de medições que não foram associadas ao processo
     */
    public function getNonProcessMeasurements($processId)
    {
        $conn = false ;
        $data = false ;

        $measurements = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT measurementId, userId, name, description, formula, metric FROM Aux_Measurements WHERE measurementId NOT IN (SELECT measurementId FROM Process_Measurements WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anMeasurement = new Aux_Measurement($row["measurementId"], $row["userId"], $row["name"], $row["description"], $row["formula"], $row["metric"]) ;
                array_push($measurements, $anMeasurement) ;
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
     * Metodo para associar medições ao processo
     *
     * @param $processId
     * @param $measurementId
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public function associateMeasurementToProcess($processId, $measurementId)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasAssociated = mysql_query("INSERT INTO Process_Measurements VALUES(".$processId.", ".$measurementId.")", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    /**
     * Metodo para desassociar medições ao processo
     *
     * @param $processId
     * @param $measurementId
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public function dissociateMeasurementFromProcess($processId,$measurementId)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasDissociated = mysql_query("DELETE FROM Process_Measurements WHERE processId=".$processId." AND measurementId=".$measurementId , $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }

    /**
     * Metodo para recuperar metodos associadas ao processo
     *
     * @param $processId
     * @return lista de metodos associadas ao processo
     */
    public function getProcessMethods($processId)
    {
        $conn = false ;
        $data = false ;

        $methods = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT methodId, userId, name, what, why, appliesWhen, how, restriction, generatedProduct, reference FROM Aux_Methods WHERE methodId IN (SELECT methodId FROM Process_Methods WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anMethod = new Aux_Method($row["methodId"], $row["userId"], $row["name"], $row["what"], $row["why"], $row["appliesWhen"], $row["how"], $row["restriction"], $row["generatedProduct"], $row["reference"]) ;
                array_push($methods, $anMethod) ;
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
     * Metodo para recuperar metodos que não foram associadas ao processo
     *
     * @param $processId
     * @return lista de metodos que não foram associadas ao processo
     */
    public function getNonProcessMethods($processId)
    {
        $conn = false ;
        $data = false ;

        $methods = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT methodId, userId, name, what, why, appliesWhen, how, restriction, generatedProduct, reference FROM Aux_Methods WHERE methodId NOT IN (SELECT methodId FROM Process_Methods WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anMethod = new Aux_Method($row["methodId"], $row["userId"], $row["name"], $row["what"], $row["why"], $row["appliesWhen"], $row["how"], $row["restriction"], $row["generatedProduct"], $row["reference"]) ;
                array_push($methods, $anMethod) ;
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
     * Metodo para associar metodos ao processo
     *
     * @param $processId
     * @param $methodId
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public function associateMethodToProcess($processId, $methodId)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasAssociated = mysql_query("INSERT INTO Process_Methods VALUES(".$processId.", ".$methodId.")", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    /**
     * Metodo para desassociar metodos ao processo
     *
     * @param $processId
     * @param $methodId
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public function dissociateMethodFromProcess($processId,$methodId)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasDissociated = mysql_query("DELETE FROM Process_Methods WHERE processId=".$processId." AND methodId=".$methodId , $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }

    /**
     * Metodo para recuperar politicas associadas ao processo
     *
     * @param $processId
     * @return lista de politicas associadas ao processo
     */
    public function getProcessPolitics($processId)
    {
        $conn = false ;
        $data = false ;

        $politicss = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;



            $data = mysql_query("SELECT politicsId, userId, name, description FROM Aux_Politics WHERE politicsId IN (SELECT politicsId FROM Process_Politics WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anPolitics = new Aux_Politics($row["politicsId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($politicss, $anPolitics) ;
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

        return $politicss ;
    }

    /**
     * Metodo para recuperar politicas que não foram associadas ao processo
     *
     * @param $processId
     * @return lista de politicas que não foram associadas ao processo
     */
    public function getNonProcessPolitics($processId)
    {
        $conn = false ;
        $data = false ;

        $politicss = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT politicsId, userId, name, description FROM Aux_Politics WHERE politicsId NOT IN (SELECT politicsId FROM Process_Politics WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anPolitics = new Aux_Politics($row["politicsId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($politicss, $anPolitics) ;
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

        return $politicss ;
    }

    /**
     * Metodo para associar politicas ao processo
     *
     * @param $processId
     * @param $politicsId
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public function associatePoliticsToProcess($processId, $politicsId)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasAssociated = mysql_query("INSERT INTO Process_Politics VALUES(".$processId.", ".$politicsId.")", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    /**
     * Metodo para desassociar politicas ao processo
     *
     * @param $processId
     * @param $politicsId
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public function dissociatePoliticsFromProcess($processId,$politicsId)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasDissociated = mysql_query("DELETE FROM Process_Politics WHERE processId=".$processId." AND politicsId=".$politicsId , $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }

    /**
     * Metodo para recuperar treinamentos associadas ao processo
     *
     * @param $processId
     * @return lista de treinamentos associadas ao processo
     */
    public function getProcessTrainings($processId)
    {
        $conn = false ;
        $data = false ;

        $trainings = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT trainingId, userId, name, description, public FROM Aux_Trainings WHERE trainingId IN (SELECT trainingId FROM Process_Trainings WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anTraining = new Aux_Training($row["trainingId"], $row["userId"], $row["name"], $row["description"], $row["public"]) ;
                array_push($trainings, $anTraining) ;
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
     * Metodo para recuperar treinamentos que não foram associadas ao processo
     *
     * @param $processId
     * @return lista de treinamentos que não foram associadas ao processo
     */
    public function getNonProcessTrainings($processId)
    {
        $conn = false ;
        $data = false ;

        $trainings = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT trainingId, userId, name, description, public FROM Aux_Trainings WHERE trainingId NOT IN (SELECT trainingId FROM Process_Trainings WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anTraining = new Aux_Training($row["trainingId"], $row["userId"], $row["name"], $row["description"], $row["public"]) ;
                array_push($trainings, $anTraining) ;
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
     * Metodo para associar treinamentos ao processo
     *
     * @param $processId
     * @param $trainingId
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public function associateTrainingToProcess($processId, $trainingId)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasAssociated = mysql_query("INSERT INTO Process_Trainings VALUES(".$processId.", ".$trainingId.")", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    /**
     * Metodo para desassociar treinamentos ao processo
     *
     * @param $processId
     * @param $trainingId
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public function dissociateTrainingFromProcess($processId,$trainingId)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasDissociated = mysql_query("DELETE FROM Process_Trainings WHERE processId=".$processId." AND trainingId=".$trainingId , $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }

    /**
     * Metodo para recuperar verificações associadas ao processo
     *
     * @param $processId
     * @return lista de verificações associadas ao processo
     */
    public function getProcessVerifications($processId)
    {
        $conn = false ;
        $data = false ;

        $verifications = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT verificationId, userId, name, type, description, frequency, worker  FROM Aux_Verifications WHERE verificationId IN (SELECT verificationId FROM Process_Verifications WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anVerification = new Aux_Verification($row["verificationId"], $row["userId"], $row["name"], $row["type"],$row["description"], $row["frequency"], $row["worker"]) ;
                array_push($verifications, $anVerification) ;
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
     * Metodo para recuperar verificações que não foram associadas ao processo
     *
     * @param $processId
     * @return lista de verificações que não foram associadas ao processo
     */
    public function getNonProcessVerifications($processId)
    {
        $conn = false ;
        $data = false ;

        $verifications = array()  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $data = mysql_query("SELECT verificationId, userId, name, type, description, frequency, worker FROM Aux_Verifications WHERE verificationId NOT IN (SELECT verificationId FROM Process_Verifications WHERE processId=".$processId." )", $conn) ;
            if (!$data)
                return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anVerification = new Aux_Verification($row["verificationId"], $row["userId"], $row["name"], $row["type"],$row["description"], $row["frequency"], $row["worker"]) ;
                array_push($verifications, $anVerification) ;
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
     * Metodo para associar verificações ao processo
     *
     * @param $processId
     * @param $verificationId
     * @return true se associação foi criada com sucesso, false caso contrário
     */
    public function associateVerificationToProcess($processId, $verificationId)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasAssociated = mysql_query("INSERT INTO Process_Verifications VALUES(".$processId.", ".$verificationId.")", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    /**
     * Metodo para desassociar verificações ao processo
     *
     * @param $processId
     * @param $verificationId
     * @return true se desassociação foi feita com sucesso, false caso contrário
     */
    public function dissociateVerificationFromProcess($processId,$verificationId)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
            $conn = Database::getConnection() ;
            if (!$conn)
                return false ;

            $wasDissociated = mysql_query("DELETE FROM Process_Verifications WHERE processId=".$processId." AND verificationId=".$verificationId , $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }

    public function getMacroActivityArtifacts($processId, $macroActivityId, $type)
    {
        $conn = false ;
        $data = false ;

        $artifacts = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT artifactId, userId, name, description FROM Aux_Artifacts WHERE artifactId IN (SELECT artifactId FROM MacroActivity_Artifacts WHERE processId=".$processId." AND macroActivityId=".$macroActivityId." AND type='".$type."')", $conn) ;
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

    public function getNonMacroActivityArtifacts($processId, $macroActivityId, $type)
    {
        $conn = false ;
        $data = false ;

        $artifacts = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT artifactId, userId, name, description FROM Aux_Artifacts WHERE artifactId NOT IN (SELECT artifactId FROM MacroActivity_Artifacts WHERE processId=".$processId." AND macroActivityId=".$macroActivityId." AND type='".$type."')", $conn) ;
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

    public function associateArtifactToMacroActivity($processId, $macroActivityId, $artifactId, $type)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasAssociated = mysql_query("INSERT INTO MacroActivity_Artifacts VALUES(".$processId.", ".$macroActivityId.", ".$artifactId.", '".$type."')", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    public function dissociateArtifactFromMacroActivity($processId, $macroActivityId, $artifactId, $type)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDissociated = mysql_query("DELETE FROM MacroActivity_Artifacts WHERE processId=".$processId." AND macroActivityId=".$macroActivityId." AND artifactId=".$artifactId." AND type='".$type."'", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }

    public function getMacroActivityFunctions($processId, $macroActivityId)
    {
        $conn = false ;
        $data = false ;

        $functions = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT functionId, userId, name, description FROM Aux_Functions WHERE functionId IN (SELECT functionId FROM MacroActivity_Functions WHERE processId=".$processId." AND macroActivityId=".$macroActivityId.")", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anFunction = new Aux_Function($row["functionId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($functions, $anFunction) ;
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

    public function getNonMacroActivityFunctions($processId, $macroActivityId)
    {
        $conn = false ;
        $data = false ;

        $functions = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT functionId, userId, name, description FROM Aux_Functions WHERE functionId NOT IN (SELECT functionId FROM MacroActivity_Functions WHERE processId=".$processId." AND macroActivityId=".$macroActivityId.")", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anFunction = new Aux_Function($row["functionId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($functions, $anFunction) ;
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

    public function associateFunctionToMacroActivity($processId, $macroActivityId, $functionId)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasAssociated = mysql_query("INSERT INTO MacroActivity_Functions VALUES(".$processId.", ".$macroActivityId.", ".$functionId.")", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    public function dissociateFunctionFromMacroActivity($processId, $macroActivityId, $functionId)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDissociated = mysql_query("DELETE FROM MacroActivity_Functions WHERE processId=".$processId." AND macroActivityId=".$macroActivityId." AND functionId=".$functionId."", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }

    public function getMacroActivityMethods($processId, $macroActivityId)
    {
        $conn = false ;
        $data = false ;

        $methods = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT methodId, userId, name, what, why, appliesWhen, how, restriction, generatedProduct, reference FROM Aux_Methods WHERE methodId IN (SELECT methodId FROM MacroActivity_Methods WHERE processId=".$processId." AND macroActivityId=".$macroActivityId.")", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anMethod = new Aux_Method($row["methodId"], $row["userId"], $row["name"], $row["what"], $row["why"], $row["appliesWhen"], $row["how"], $row["restriction"], $row["generatedProduct"], $row["reference"]) ;
                array_push($methods, $anMethod) ;
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

    public function getNonMacroActivityMethods($processId, $macroActivityId)
    {
        $conn = false ;
        $data = false ;

        $methods = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT methodId, userId, name, what, why, appliesWhen, how, restriction, generatedProduct, reference FROM Aux_Methods WHERE methodId NOT IN (SELECT methodId FROM MacroActivity_Methods WHERE processId=".$processId." AND macroActivityId=".$macroActivityId.")", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anMethod = new Aux_Method($row["methodId"], $row["userId"], $row["name"], $row["what"], $row["why"], $row["appliesWhen"], $row["how"], $row["restriction"], $row["generatedProduct"], $row["reference"]) ;
                array_push($methods, $anMethod) ;
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

    public function associateMethodToMacroActivity($processId, $macroActivityId, $methodId)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasAssociated = mysql_query("INSERT INTO MacroActivity_Methods VALUES(".$processId.", ".$macroActivityId.", ".$methodId.")", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    public function dissociateMethodFromMacroActivity($processId, $macroActivityId, $methodId)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDissociated = mysql_query("DELETE FROM MacroActivity_Methods WHERE processId=".$processId." AND macroActivityId=".$macroActivityId." AND methodId=".$methodId."", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }

    public function getMacroActivityTools($processId, $macroActivityId)
    {
        $conn = false ;
        $data = false ;

        $tools = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT toolId, userId, name, description FROM Aux_Tools WHERE toolId IN (SELECT toolId FROM MacroActivity_Tools WHERE processId=".$processId." AND macroActivityId=".$macroActivityId.")", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anTool = new Aux_Tool($row["toolId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($tools, $anTool) ;
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

    public function getNonMacroActivityTools($processId, $macroActivityId)
    {
        $conn = false ;
        $data = false ;

        $tools = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT toolId, userId, name, description FROM Aux_Tools WHERE toolId NOT IN (SELECT toolId FROM MacroActivity_Tools WHERE processId=".$processId." AND macroActivityId=".$macroActivityId.")", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anTool = new Aux_Tool($row["toolId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($tools, $anTool) ;
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

    public function associateToolToMacroActivity($processId, $macroActivityId, $toolId)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasAssociated = mysql_query("INSERT INTO MacroActivity_Tools VALUES(".$processId.", ".$macroActivityId.", ".$toolId.")", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    public function dissociateToolFromMacroActivity($processId, $macroActivityId, $toolId)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDissociated = mysql_query("DELETE FROM MacroActivity_Tools WHERE processId=".$processId." AND macroActivityId=".$macroActivityId." AND toolId=".$toolId."", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }

    public function getDetailedActivityArtifacts($processId, $detailedActivityId, $type)
    {
        $conn = false ;
        $data = false ;

        $artifacts = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT artifactId, userId, name, description FROM Aux_Artifacts WHERE artifactId IN (SELECT artifactId FROM DetailedActivity_Artifacts WHERE processId=".$processId." AND detailedActivityId=".$detailedActivityId." AND type='".$type."')", $conn) ;
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

    public function getNonDetailedActivityArtifacts($processId, $detailedActivityId, $type)
    {
        $conn = false ;
        $data = false ;

        $artifacts = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT artifactId, userId, name, description FROM Aux_Artifacts WHERE artifactId NOT IN (SELECT artifactId FROM DetailedActivity_Artifacts WHERE processId=".$processId." AND detailedActivityId=".$detailedActivityId." AND type='".$type."')", $conn) ;
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

    public function associateArtifactToDetailedActivity($processId, $detailedActivityId, $artifactId, $type)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasAssociated = mysql_query("INSERT INTO DetailedActivity_Artifacts VALUES(".$processId.", ".$detailedActivityId.", ".$artifactId.", '".$type."')", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    public function dissociateArtifactFromDetailedActivity($processId, $detailedActivityId, $artifactId, $type)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDissociated = mysql_query("DELETE FROM DetailedActivity_Artifacts WHERE processId=".$processId." AND detailedActivityId=".$detailedActivityId." AND artifactId=".$artifactId." AND type='".$type."'", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }

    public function getDetailedActivityFunctions($processId, $detailedActivityId)
    {
        $conn = false ;
        $data = false ;

        $functions = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT functionId, userId, name, description FROM Aux_Functions WHERE functionId IN (SELECT functionId FROM DetailedActivity_Functions WHERE processId=".$processId." AND detailedActivityId=".$detailedActivityId.")", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anFunction = new Aux_Function($row["functionId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($functions, $anFunction) ;
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

    public function getNonDetailedActivityFunctions($processId, $detailedActivityId)
    {
        $conn = false ;
        $data = false ;

        $functions = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT functionId, userId, name, description FROM Aux_Functions WHERE functionId NOT IN (SELECT functionId FROM DetailedActivity_Functions WHERE processId=".$processId." AND detailedActivityId=".$detailedActivityId.")", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anFunction = new Aux_Function($row["functionId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($functions, $anFunction) ;
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

    public function associateFunctionToDetailedActivity($processId, $detailedActivityId, $functionId)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasAssociated = mysql_query("INSERT INTO DetailedActivity_Functions VALUES(".$processId.", ".$detailedActivityId.", ".$functionId.")", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    public function dissociateFunctionFromDetailedActivity($processId, $detailedActivityId, $functionId)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDissociated = mysql_query("DELETE FROM DetailedActivity_Functions WHERE processId=".$processId." AND detailedActivityId=".$detailedActivityId." AND functionId=".$functionId."", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }

    public function getDetailedActivityMethods($processId, $detailedActivityId)
    {
        $conn = false ;
        $data = false ;

        $methods = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT methodId, userId, name, what, why, appliesWhen, how, restriction, generatedProduct, reference FROM Aux_Methods WHERE methodId IN (SELECT methodId FROM DetailedActivity_Methods WHERE processId=".$processId." AND detailedActivityId=".$detailedActivityId.")", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anMethod = new Aux_Method($row["methodId"], $row["userId"], $row["name"], $row["what"], $row["why"], $row["appliesWhen"], $row["how"], $row["restriction"], $row["generatedProduct"], $row["reference"]) ;
                array_push($methods, $anMethod) ;
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

    public function getNonDetailedActivityMethods($processId, $detailedActivityId)
    {
        $conn = false ;
        $data = false ;

        $methods = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT methodId, userId, name, what, why, appliesWhen, how, restriction, generatedProduct, reference FROM Aux_Methods WHERE methodId NOT IN (SELECT methodId FROM DetailedActivity_Methods WHERE processId=".$processId." AND detailedActivityId=".$detailedActivityId.")", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anMethod = new Aux_Method($row["methodId"], $row["userId"], $row["name"], $row["what"], $row["why"], $row["appliesWhen"], $row["how"], $row["restriction"], $row["generatedProduct"], $row["reference"]) ;
                array_push($methods, $anMethod) ;
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

    public function associateMethodToDetailedActivity($processId, $detailedActivityId, $methodId)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasAssociated = mysql_query("INSERT INTO DetailedActivity_Methods VALUES(".$processId.", ".$detailedActivityId.", ".$methodId.")", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    public function dissociateMethodFromDetailedActivity($processId, $detailedActivityId, $methodId)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDissociated = mysql_query("DELETE FROM DetailedActivity_Methods WHERE processId=".$processId." AND detailedActivityId=".$detailedActivityId." AND methodId=".$methodId."", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }

    public function getDetailedActivityTools($processId, $detailedActivityId)
    {
        $conn = false ;
        $data = false ;

        $tools = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT toolId, userId, name, description FROM Aux_Tools WHERE toolId IN (SELECT toolId FROM DetailedActivity_Tools WHERE processId=".$processId." AND detailedActivityId=".$detailedActivityId.")", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anTool = new Aux_Tool($row["toolId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($tools, $anTool) ;
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

    public function getNonDetailedActivityTools($processId, $detailedActivityId)
    {
        $conn = false ;
        $data = false ;

        $tools = array()  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $data = mysql_query("SELECT toolId, userId, name, description FROM Aux_Tools WHERE toolId NOT IN (SELECT toolId FROM DetailedActivity_Tools WHERE processId=".$processId." AND detailedActivityId=".$detailedActivityId.")", $conn) ;
	        if (!$data)
	            return false ;

            while ($row = mysql_fetch_array($data))
            {
                $anTool = new Aux_Tool($row["toolId"], $row["userId"], $row["name"], $row["description"]) ;
                array_push($tools, $anTool) ;
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

    public function associateToolToDetailedActivity($processId, $detailedActivityId, $toolId)
    {
        $conn = false ;

        $wasAssociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasAssociated = mysql_query("INSERT INTO DetailedActivity_Tools VALUES(".$processId.", ".$detailedActivityId.", ".$toolId.")", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasAssociated ;
    }

    public function dissociateToolFromDetailedActivity($processId, $detailedActivityId, $toolId)
    {
        $conn = false ;

        $wasDissociated = false  ;

        try
        {
        	$conn = Database::getConnection() ;
	        if (!$conn)
	            return false ;

	        $wasDissociated = mysql_query("DELETE FROM DetailedActivity_Tools WHERE processId=".$processId." AND detailedActivityId=".$detailedActivityId." AND toolId=".$toolId."", $conn) ;
        }
        catch(Exception $e)
        {
            echo $e ;
        }

        if ( ! $conn )
            Database::returnConnection($conn) ;

        return $wasDissociated ;
    }
}

?>