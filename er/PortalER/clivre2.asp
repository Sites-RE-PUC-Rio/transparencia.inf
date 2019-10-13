<%
Dim login
Dim senha

login = Request.Form("login")
senha = Request.Form("senha")

set Con = Server.CreateObject("ADODB.Connection")
Con.open "er"
SQL = "SELECT login, senha from Senhas where login='"&login&"' "
set RS = Con.Execute(SQL)

if not RS.EOF then
   if RS("senha") = senha then
      session("login")="oklivre"   
      Response.Redirect "clivre_ok.asp?login2="&login
   else
      session("login")="errou" 
%>

<html>
<head>
<title>Login Invalido</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF">
<h1>Login Invalido</h1><p>
Por favor se cadastre ou redigite a senha.
 <br>
  <br>
  <center>
    <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center>
<%
   end if
else%>
<h1>Login Invalido</h1><p>
Por favor se cadastre ou redigite a senha. 
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