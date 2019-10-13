<html>
<head>
  <title>dbfull1.asp</title>
</head>
<body bgcolor="#FFFFFF">
<%
  Dim nome
  Dim email
  Dim instituicao

  nome        = Request.Form("nome")
  senha       = Request.Form("Senha")
  login       = Request.Form("login")
  email       = Request.Form("email")
  instituicao = Request.Form("instituicao") 
   
  ' Conexão com o banco
  set conntemp=server.createobject("adodb.connection")
  conntemp.open "er"
  
  set rstemp=server.createobject("adodb.recordset")
 
  set rstemp=conntemp.execute("SELECT * FROM Senhas WHERE login = '"&login&"' ")
   
%> 
<%
   if rstemp.EOF  then 
   set RScadastro=conntemp.execute("insert into senhas (login, senha, nome, email, instituicao, nivel) values ( '"&login&"', '"&senha&"','"&nome&"','"&email&"','"&instituicao&"',0)")
   %> <%conntemp.close%> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Cadastro 
efetuado com sucesso.</font> 
<br><br><center>
  <a href="javascript:window.history.go(-2)"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><img src="voltar.gif" width="121" height="55" border="0"></font></a> 
</center> 
<% else %> <br>
<font face="Verdana, Arial, Helvetica, sans-serif" size="2">Este login já existe. 
Clique <a href="javascript:window.history.go(-1)">aqui</a> para voltar e escolha 
outro login.</font> <% end if %> 
</body>
</html>