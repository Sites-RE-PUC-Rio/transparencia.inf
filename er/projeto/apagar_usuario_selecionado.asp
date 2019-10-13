<%if session("login")="ok" then %>
<html>
<head>
<title>Apagar usuários selecionados</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<!- Apaga os usuários selecionados do banco de dados -->
<body bgcolor="#FFFFFF">
<p>&nbsp;</p>
<p>

<% 
 Dim qtde_campos
 Dim b
 Dim selecao

 ' Instancia uma conexão com o banco de dados ER
 Set conntemp = Server.CreateObject("adodb.connection")
 conntemp.open "er","",""

 ' "Varre" o banco de dados para checar qual os usuários selecionados
 Set RSvarredura = conntemp.execute("SELECT * FROM Senhas") 
 qtde_campos=RSvarredura.fields.count -1
 
 do while not RSvarredura.eof
   
   'Verifica valor da caixa de seleção
   b = Request.Form("box"&RSvarredura.fields(0).value)
   if b = "on" then  
     selecao = RSvarredura.fields(0).value 
     ' Apaga usuário
     Set RSdelete = conntemp.execute("DELETE FROM Senhas WHERE login = '"&selecao&"' ")
%> 
     Usuário <%=login%> foi apagado com sucesso.<br>
   <% end if %>
 <% RSvarredura.movenext
  loop
  conntemp.close%> </p>
 <center>
    <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center>
</body>
</html>
<% end if %>