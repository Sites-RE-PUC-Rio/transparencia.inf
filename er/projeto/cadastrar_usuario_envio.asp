<%if session("login")="ok" then %>
<html>
<head>
  <title>Cadastra usuário no banco de dados</title>
</head>

<!- Insere no Banco de dados o novo usuário-->
<body bgcolor="#FFFFFF">
<%
  ' Declaração de variaveis locais
  Dim nome
  Dim senha
  Dim login
  Dim email
  Dim instituicao
  Dim nivel

  ' variaveis locais recebem os valores entrados pelo usuário na página anterior
  nome        = Request.Form("nome")
  senha       = Request.Form("Senha")
  login       = Request.Form("login")
  email       = Request.Form("email")
  instituicao = Request.Form("instituicao") 
  nivel       = Request.Form("nivel") 
   
  ' Instancia uma conexão com o banco de dados ER
  Set conntemp = Server.CreateObject("adodb.connection")
  conntemp.open "er"
  
  Set RSjaexiste = Server.CreateObject("adodb.Recordset")
 
  Set RSjaexiste = conntemp.execute("SELECT * FROM Senhas WHERE login = '"&login&"' ") 
%> 
<%
   If RSjaexiste.EOF  then 
   Set RScadastro = conntemp.execute("INSERT INTO Senhas (login, senha, nome, email, instituicao, nivel) values ( '"&login&"', '"&senha&"', '"&nome&"', '"&email&"', '"&instituicao&"', '"&nivel&"')")
%> 
<%conntemp.close%>
   <center><h1>Cadastro efetuado com sucesso.</h1></center>
  <%else%>
   <center><h1>Este Login já existe.</h1></center>
  <%end if%>
  <center>
    <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center> 
</body>
</html>
<% end if%>