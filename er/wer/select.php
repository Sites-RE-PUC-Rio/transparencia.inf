<?php
   
include("httprequest.inc");
$link = mysql_connect("localhost", "wer03", "engreq03")
        or die("Could not connect\n"); 

mysql_select_db("wer03") or die("Could not select database <br>\n");

  
$q = "SELECT * FROM inscricoes";


?> 
<html>
<head>
<title>Incluindo cadastro</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">
<?php

$result = mysql_query($q) or die("Query failed, cannot find table<br>\n");
    print "Query selected successfully<br>\n";

    /* Printing results in HTML */
    print "<table>";
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        print "<tr>";
        foreach ($line as $col_value) {
            print "<td>$col_value</td>";
        }
        print "</tr>";
    }
    print "</table>";


?>
</body>
</html>


