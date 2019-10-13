<?php

function bd_connect()
{
    
	  $r = mysql_pconnect("localhost","wer03","engreq03");
	  if($r && mysql_select_db("wer03"))
	    return($r);
	  return(FALSE);
}
  

?>

