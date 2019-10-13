<%if session("login")="ok" then %>
<% 
   ' Verifica qual a opcao selecionada pelo usuario
   selecao = Request.Form("opcao") 
   if selecao = "inserir" then
      Response.Redirect "inserir_msg_adm.asp"
   else 
 %>
<html>
<head>
<title>Apagar mensagem</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<!- Seleciona mensagens para serem excluídas do banco de dados-->
<body bgcolor="#FFFFFF">
<%
  ' Variaveis locais
  Dim qtde_campos
  
  ' Instancia uma conexão com o banco de dados ER
  Set conntemp = Server.CreateObject("adodb.connection")
  conntemp.open "er","",""
%>
<%
 if selecao = "apagar" then
%>
<%
  Set RSapagar=conntemp.execute("SELECT * FROM ermsg")
  qtde_campos=RSapagar.fields.count -1
  %> 
<form action="apagarselecionados.asp" method="post">
  <table border="0">
    <tr>
      <td>&nbsp;</td>
      <%
	    'Preenche a primeira linha com o nome dos campos
        for i=1 to qtde_campos %> 
     <td><b><%=RSapagar(i).name %></b></td>
     <% next %>
    </tr>
    <% 
	   ' Preenche a tabela com os registros do banco
  	   do while not RSapagar.eof %> 
    <tr>
      <td>
        <input type="checkbox" name="box<%=RSapagar.fields(0).value%>"  >
      </td>
      <% for i = 1 to qtde_campos%> 
      <td valign="top"><% = RSapagar.fields(i).value %></td>
      <% next %>
   </tr>
    <tr></tr>
    <tr></tr>
    <% RSapagar.movenext
  loop
  conntemp.close%> 
</table>
  <br>
<input type="submit" value="confirmar">
</form>
<% end if %> 
</body>
</html>
<% end if %>
<% end if %>
