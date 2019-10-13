<html>
<head>
<title>MYSQL Test</title>
</head>
<body>
<?php
    /* Connecting, selecting database */
    $link = mysql_connect("localhost", "wer03", "engreq03")
        or die("Could not connect<br>\n");
    print "Connected successfully<br>\n";

    mysql_select_db("wer03") or die("Could not select database<br>\n");
    print "Database selected successfully<br>\n";

    /* Performing SQL query */
    $query = "SELECT * FROM usuario";
    $result = mysql_query($query) or die("Query failed, cannot find table<br>\n");
    print "Query selected successfully<br>\n";

    /* Printing results in HTML */
    print "<table>\n";
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        print "\t<tr>\n";
        foreach ($line as $col_value) {
            print "\t\t<td>$col_value</td>\n";
        }
        print "\t</tr>\n";
    }
    print "</table>\n";

    /* Free resultset */
    mysql_free_result($result);

    /* Closing connection */
    mysql_close($link);
?>
</body>
</html>

