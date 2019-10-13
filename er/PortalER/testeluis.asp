<html>
<head>
  <title>dbfull1.asp</title>
</head>
<body bgcolor="#FFFFFF">
  <% 
  ' Conexão com o banco
  set conntemp=server.createobject("adodb.connection")
  conntemp.open "er","",""
 
  set rstemp=conntemp.execute("select * from ermsg")
  qtde_campos=rstemp.fields.count -1
  %>
  <table border="0">
  <tr>
  
  <% 'Preenche a primeira linha com o nome dos campos
  for i= 1 to qtde_campos %>
  <td><b><%=rstemp(i).name %></b></td>
  <% next %>
  </tr>
  <% ' Preenche a tabela com os registros do banco
  do while not rstemp.eof %>
  <tr>
  
  <% for i = qtde_campos to  1 %>
  <td valign="top"><% = rstemp.fields(i).value %></td>
  <% next %>
  </tr><tr></tr><tr></tr>
  <% rstemp.movenext
  loop
  conntemp.close%>
  </table>
</body>
</html>
