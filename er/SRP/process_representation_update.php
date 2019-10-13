<!--
    Ação que altera a representação do processo
-->
<?php
    require_once "dal/dao/DAOProcess.php" ;
    require_once "dal/dao/DAOFile.php" ;
    require_once "models/Process.php" ;
    require_once "models/User.php" ;
    require_once "models/Utils.php" ;

    session_start() ;
    $user = $_SESSION["user"] ;
    $userId = $user->getUserId() ;

    $reference = Utils::getValue($_REQUEST, "reference") ;
    $next_page = Utils::getValue($_REQUEST, "next_page") ;

    $action = Utils::getValue($_REQUEST, "action") ;
    if ("keep" == $action)
    {
        $description = Utils::getValue($_REQUEST, "description") ;
        DAOFile::updateFileDescription($reference, $description) ;
    }
    if ("delete" == $action)
    {
        DAOFile::deleteFile($reference) ;
    }
    else if ("overwrite" == $action)
    {
        $description = Utils::getValue($_REQUEST, "description") ;
        DAOFile::updateFile("representation", $reference, $description);
    }
    else if ("create" == $action)
    {
        $description = Utils::getValue($_REQUEST, "description") ;
        DAOFile::createFile("representation", $reference, $description);
    }

    header("Location: ".$next_page) ;
?>