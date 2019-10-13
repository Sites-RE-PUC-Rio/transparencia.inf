<%if session("login")="ok" then %>
<html>
<head>
<title>Alterar usuário no Banco de dados</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<!- Altera os dados do usuário no banco de dados -->
<body bgcolor="#FFFFFF">

<p>&nbsp;</p>
<p>
<%
  ' Variaveis locais
  Dim login
  Dim nome
  Dim senha
  Dim instituicao
  Dim nivel
  Dim email 

  ' Resgata os dados entrados pelo usuário e armazena nas variaveis locais
  login       = Request.Form("tlogin")
  nome        = Request.Form("tnome")
  senha       = Request.Form("tsenha")
  email       = Request.Form("temail")
  instituicao = Request.Form("tinstituicao") 
  nivel       = Request.Form("tnivel") 
   
 
  ' Instancia uma conexão com o banco de dados ER
  Set conntemp = Server.CreateObject("adodb.connection")
  conntemp.open "er"

  ' Altera os dados do usuário no banco de dados
  Set RSaltera_usuario = conntemp.execute("UPDATE Senhas SET nome ='"&nome&"', senha ='"&senha&"', email='"&email&"', nivel='"&nivel&"', instituicao='"&instituicao&"' WHERE login = '"&login&"'")        
%>
</p>
<center><h1>Cadastro alterado.</h1></center>
<center>
    <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center>
</body>
</html>
<% end if %>