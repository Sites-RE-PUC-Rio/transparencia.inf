<?php

include("httprequest.inc");
$link = mysql_connect("localhost", "wer03", "engreq03")
        or die("Could not connect\n");

mysql_select_db("wer03") or die("Could not select database <br>\n");


$q = "INSERT INTO inscricoes (nome, sexo, organizacao, endereco, cidade, estado, zip, pais, email, categoria) VALUES ('$identificacao_FullName', '$identificacao_Sex', '$Contact_Organization', '$Contact_StreetAddress', '$Contact_City', '$Contact_State', '$Contact_ZipCode', '$Contact_Country', '$Contact_Email', '$categoria' )";



mysql_query($q) or die("Erro ao inserir na tabela".mysql_error());

mysql_close($link);
print "\n\n Inscrição realizada com sucesso. \n Nome: "; echo $identificacao_FullName."  ";
print " \n na categoria "; echo $categoria." "; print "  \n";
?>
<html>
<head>
<title>Incluindo cadastro</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">
<p>
<p>
<p>&nbsp;
<p><font size="+1" color="#0000FF">Inscrições - Workshop em Engenharia de Requisitos
  - WER03</font></p>


<p>Para concluir, faça um depósito no valor acima para WER 2003 na conta:
</p>
<p> Banco Itaú S/A - 341-7 </p>
<p>AG: Rio - 1108 CC: 04 755-4 (Fundação Padre Leonel Franca)</p>
<p> e envie um fax do recibo aos cuidados de: sr. Celso Rodrigues Vitor, fax número
  (0XX21) 2511-5645</p>
<p> Para estudantes e professores, o comprovante deverá ser apresentado no momento
  da retirada do cartão de identificação no início do evento. A taxa inclui uma
  cópia dos Anais e coffee-breaks. </p>
</body>
</html>
