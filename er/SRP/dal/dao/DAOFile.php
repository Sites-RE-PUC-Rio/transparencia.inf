
<?php

require_once "dal/interfaces/IFileSource.php" ;
require_once "dal/dao/SourceFactory.php" ;

final class DAOFile
{
    private static $_SOURCE_NAME = "File" ;

    private function __construct()
    {
    }

    public static function createFile($uploadTagName, $reference, $description)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->createFile($uploadTagName, $reference, $description) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    public static function deleteFile($reference)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->deleteFile($reference) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    public static function updateFile($uploadTagName, $reference, $description)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updateFile($uploadTagName, $reference, $description) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    public static function updateFileDescription($reference, $description)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->updateFileDescription($reference, $description) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return false ;
        }
    }

    public static function getFile($reference)
    {
        try
        {
            return SourceFactory::getSource(self::$_SOURCE_NAME)->getFile($reference) ;
        }
        catch (Exception $e)
        {
            echo $e.getTraceAsString() ;
            return NULL ;
        }
    }
}

?>