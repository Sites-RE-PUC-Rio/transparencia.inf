<%if session("login")="ok" then %>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<!- Apaga as mensagens selecionadas do banco de dados-->
<body bgcolor="#FFFFFF"> 
<% ' Conexão com o banco
  set conntemp=server.createobject("adodb.connection")
  conntemp.open "er","",""
%> 
<%
 set rstemp=conntemp.execute("select * from ermsg") 
 qtde_campos=rstemp.fields.count -1
%> 
<% do while not rstemp.eof %>
<!- Verifica estado do campo de selação-->
<% 
  b = Request.Form("box"&rstemp.fields(0).value)
%>
<%if b = "on" then %>
   <% selecao = rstemp.fields(0).value %>
   <!- Apaga as mensagens -->
   <% set RSdelete=conntemp.execute("delete from ermsg where codigo = "&selecao&" ") %>
   mensagem <%=selecao%> foi apagada com sucesso.<br>
<% end if %>

<% rstemp.movenext
  loop
  conntemp.close%>
  <center>
    <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center>  
</body>
</html>
<% end if %>