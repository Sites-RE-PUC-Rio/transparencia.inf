<%if session("login")="ok" then %>
<html>
<head>
<title>Agrupa usu�rio</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<!- Agrupa o usu�rio caso ele j� n�o esteja neste grupo -->
<body bgcolor="#FFFFFF">
<%
 ' Variaveis locais  
 Dim login
 Dim grupo  
 
 ' Resgata o login e o grupo selecionado passados na p�gina anterior pelo administrador e ' armazena nas variaveis locais  
 login = Request.Form("login")
 grupo = Request.Form("grupo")  
  
 ' Instancia uma conex�o com o banco de dados ER
 Set conntemp = Server.CreateObject("adodb.connection")
 conntemp.open "er","",""

 Set RSjaExiste = conntemp.execute("SELECT * FROM agrupamentos WHERE usuario = '"&login&"' AND grupo = '"&grupo&"' ")
 
 ' Confere se o usu�rio j� pertence ao grupo
 If RSjaExiste.EOF  then 
 
   ' Se n�o pertence, ent�o insere o usu�rio no grupo
   InsereUsuario = "INSERT INTO agrupamentos (usuario, grupo) values ('"&login&"', "&grupo&") "
   Set RSsetgrupo = conntemp.Execute(InsereUsuario)
%>
<br>
<font face="Verdana, Arial, Helvetica, sans-serif"><b><font size="2">Agrupamento 
efetuado com sucesso</font></b></font>. 
<%else%>
<!- Usu�rio j� pertence ao grupo -->
<center><h1>Este usu�rio j� pertence ao grupo</h1></center>
<%end if%>
<center>
    <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center>
</body>
</html>
<%end if%>