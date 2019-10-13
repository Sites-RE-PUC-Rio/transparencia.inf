<%@ LANGUAGE="VBSCRIPT" %>
<% Response.Buffer = True %>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF" background="fundo1.jpg" leftmargin="7" topmargin="0" marginwidth="0" marginheight="0">
<p align="center"><font size="5" color="#3333FF">Confer&ecirc;ncias - Espa&ccedil;o 
  Livre</font></p>
<p>Sua mensagem foi enviada com sucesso.</p>
<!- #include virtual = "/MySSIncludes/adovbs.inc" - >
<%

set erconn = server.createobject("adodb.connection")
erconn.open "er"
set tabela = server.createobject("adodb.recordset")
tabela.open "ertab"
tabela.close
erconn.Close
Set erconn   = Nothing

%>
</body>
</html>
