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
   if RS("senha") = senha AND RS("nivel") >= 5 then
      session("login")="ok"   
      Response.Redirect "administrador.asp"
   else
    if RS("senha") = senha AND RS("nivel") < 5 then
	session("login")="semdireito"
%>
<html>
<head>
<title>Entrada</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<!- Faz a validação do usuário, só deixa entrar se seu nível for 5 e a senha estiver correta-->

<body bgcolor="#FFFFFF">
<h1>Usuário sem privilégios.</h1><p>
O seu nível de usuário não tem permissão.

<!- Não tem permissão -->

<%     
   else 
    session("login")="errou" 
%>

<h1>Login Inválido</h1><p>
Por favor se cadastre ou redigite a senha.
<% end if
end if
else%>
<h1>Login Inválido</h1><p>
Por favor se cadastre ou redigite a senha. 
</body>
</html>
 
<%end if
set RS = Nothing
set Con = Nothing    
%>