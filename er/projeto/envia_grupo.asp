<%if session("login")="ok" then %>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF">

<!- Insere o novo grupo no banco de dados -->
<%
 ' Resgata os valores entrados pelo administrador na página anterior, como o nome do
 ' grupo e uma observação sobre ele
 nome = Request.Form("nome")
 obs  = Request.Form("obs") 

' Instancia uma conexao com o banco de dados ER
Set conntemp = Server.CreateObject("adodb.connection")
conntemp.open "er"

'Insere no banco de dados o novo grupo
Set RSgrupo = conntemp.execute("INSERT INTO Grupos (Nome, Observ) VALUES ('"&nome&"', '"&obs&"')")
%>
<h1><center>Grupo criado com sucesso.</center></h1>
<% conntemp.close %>
<center>
    <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center>
</body>
</html>
<%end if%>