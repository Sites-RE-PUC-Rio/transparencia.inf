<?php

?>
<html>
<head>
<title>Incluindo cadastro</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF">

<?php
$link = mysql_connect("localhost", "wer03", "engreq03")
        or die("Could not connect<br>\n");
    print "Connected successfully<br>\n";

mysql_select_db("wer03") or die("Could not select database<br>\n");
    print "Database selected successfully<br>\n";

$q = "CREATE TABLE inscricoes (
  nome text NOT NULL,
  sexo text NOT NULL,
  organizacao text,
  endereco text,
  cidade text,
  estado text,
  zip text,
  pais text,
  email text NOT NULL,
  categoria text NOT NULL )";

mysql_query($q) or die("Erro ao inserir na tabela".mysql_error());


mysql_close($link);


?>
Tabela criada com sucesso.
</body>
</html>