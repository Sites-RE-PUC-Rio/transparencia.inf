<%if session("login")="ok" then %>
<html>
<head>
<title>Excluir usu�rios selecionados do grupo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<!- Apaga os usu�rios selecionados do banco de dados -->
<body bgcolor="#FFFFFF">

<p>&nbsp;</p>
<p>

<% 
  ' Variaveis locais
  Dim codigo_grupo
  Dim qtde_campos
  Dim b

  ' Resgata o valor do codigo do grupo passado pela p�gina anterior e armazena em uma variavel local
  codigo_grupo = Request.Form("grupo")

  ' Instancia uma conex�o com o banco de dados ER
  Set conntemp = Server.CreateObject("adodb.connection")
  conntemp.open "er","",""

 Set RSbuscaGrupo = conntemp.execute("SELECT * FROM agrupamentos WHERE grupo = '"&codigo_grupo&"' ") 
 qtde_campos = RSbuscaGrupo.fields.count -1
 
 do while not RSbuscaGrupo.eof   
 
 ' Verifica valor da caixa de sele��o
 b = Request.Form("excluir"&RSbuscaGrupo.fields(0).value)
 if b = "on" then  
 selecao = RSbuscaGrupo.fields(0).value
 
 ' Exclui usu�rio do grupo selecionado
 Set RSdelete = conntemp.execute("DELETE FROM agrupamentos WHERE usuario = '"&selecao&"' AND grupo = '"&codigo_grupo&"' ") %> 
  Usu�rio <%=login%> foi apagado com sucesso.<br>
  <% end if %> 
  <% RSbuscaGrupo.movenext
     loop
     conntemp.close%> </p>
 <center>
    <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center>
</body>
</html>
<% end if %>