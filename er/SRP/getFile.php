<!--
    A��o que retorna um arquivo para o usu�rio
-->
<?php

    require_once "dal/dao/DAOFile.php" ;
    require_once "models/File.php" ;
    require_once "models/Utils.php" ;

    $reference = Utils::getValue($_REQUEST, "reference") ;
    $file = DAOFile::getFile($reference) ;
    File::outputFile($file) ;

?>
