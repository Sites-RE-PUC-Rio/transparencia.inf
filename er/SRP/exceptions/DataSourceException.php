

<?php

class DataSourceException extends Exception
{
   // Redefine the exception so message isn't optional
   public function __construct($source, $code = 0)
   {
       // make sure everything is assigned properly
       parent::__construct('The system was unable to find source '.$source, $code);
   }

   function __destruct()
   {
       parent::__destruct();
   }
}

?>