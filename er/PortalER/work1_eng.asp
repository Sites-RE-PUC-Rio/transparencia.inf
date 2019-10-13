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
      Response.Redirect "work1_p2_eng.asp"
   else
    if RS("senha") = senha AND RS("nivel") < 3 then
	session("login")="semdireito"
%>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF">
<h1>User without permission.</h1><p>
Your level don´t give you permission.
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
<h1>Invalid Login</h1><p>
Please retype your password or join.
<% end if
end if
else%>
<h1>Invalid Login</h1><p>
Please retype your password or join. 
</body>
</html>
 
<%end if
set RS = Nothing
set Con = Nothing    
%>
