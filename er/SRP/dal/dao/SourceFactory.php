

<?php

final class SourceFactory
{
    private static $_SOURCES = array() ;

    // The factory method
    public static function getSource($type)
    {
        if (isset($_SOURCES[$type]))
        {
            return $_SOURCES[$type] ;
        }
        else
        {
            $classname = $type . 'Source' ;
            if (include_once 'dal/mysql/' . $classname . '.php')
            {
                $obj = new $classname ;
                $_SOURCES[$type] = $obj ;

                return $obj ;
            }
            else
            {
                throw new DataSourceNotFoundException ('$type') ;
            }
        }
    }
}

?>