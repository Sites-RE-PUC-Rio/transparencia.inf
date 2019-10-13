<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF" topmargin="0">
<table width="100%" border="0" background="fig25.GIF">
  <tr> 
    <td><font size="4"><font face="Verdana, Arial, Helvetica, sans-serif"><b>Password 
      Change <font size="3"></font></b></font></font></td>
  </tr>
</table><br><br>
<%
  Dim login
  Dim senha
  Dim novasenha

  login       = Request.Form("login")
  senha       = Request.Form("senha")
  novasenha   = Request.Form("novasenha")
   
  ' Conexão com o banco
  set conntemp=server.createobject("adodb.connection")
  conntemp.open "er"
  
  SQL = "SELECT login, senha from Senhas where login='"&login&"' "
  set RSteste = conntemp.Execute(SQL)

if not RSteste.EOF then
   if RSteste("senha") = senha then
     set RSalterasenha=conntemp.execute("UPDATE senhas set senha ='"&novasenha&"' where login = '"&login&"'") 
%>
<center>
  <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Your password was 
  successful changed.</font> 
</center>
<%else%>
<center>
  <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Your password wasn&acute;t 
  changed, please try again.</font> 
</center>
<%end if%>
<%end if%> 
<%conntemp.close%> 
</body>
</html>
