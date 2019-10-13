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
      Response.Redirect "clivre_ok_eng.asp?login2="&login
   else
      session("login")="errou" 
%>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF">
<h1>Incorrect Login</h1><p>
Please, sign in or retype your password.
<%
   end if
else%>
<h1>Incorrect Login</h1><p>
Please, sign in or retype your password. 
</body>
</html>
 
<%end if
set RS = Nothing
set Con = Nothing    
%>