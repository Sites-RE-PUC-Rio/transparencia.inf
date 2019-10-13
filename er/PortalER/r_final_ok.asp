<%
Dim login
Dim senha

login = Request.Form("login")
senha = Request.Form("senha")




set Con = Server.CreateObject("ADODB.Connection")
Con.open "er"
SQL = "SELECT login, senha, nivel from Senhas where login='"&login&"' "
set RS = Con.Execute(SQL)

if not RS.EOF then
   if RS("senha") = senha AND RS("nivel") >= 3 then
      session("login")="ok"   
      Response.Redirect "r_final.asp"
   else
    if RS("senha") = senha AND RS("nivel") < 3 then
	session("login")="semdireito"
%>
<html>
<head>
<title>Checar Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF">
<h1>Usuário sem privilégios.</h1>
<p> O seu nível de usuário não tem permissão.<br>
  <br>
  <br>
  <center>
    <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center>
</body>
</html>

<%     
   else 
    session("login")="errou" 
%>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF">
<h1>Login Inválido</h1><p>
Por favor se cadastre ou redigite a senha.
<br>
  <br>
  <br>
  <center>
    <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center>
<% end if
end if
else%>
<h1>Login Inválido</h1><p>
Por favor se cadastre ou redigite a senha.
<br>
  <br>
  <br>
  <center>
    <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center> 
</body>
</html>
 
<%end if
set RS = Nothing
set Con = Nothing    
%>