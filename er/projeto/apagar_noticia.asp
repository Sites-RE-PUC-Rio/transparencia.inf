<%if session("login") = "ok" then%>
<html>
<head>
<title>Seleção de noticia</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<!- Seleciona as notícias a serem excluídas do banco de dados-->

<body bgcolor="#FFFFFF">
<table width="100%" border="0">
  <tr>
    <td>
      <div align="center"><b><font size="5">Gerenciador de not&iacute;cias - (apagar)</font></b></div>
    </td>
  </tr>
</table>
<%
 
  ' Conexão com o banco
  set conntemp=server.createobject("adodb.connection")
  conntemp.open "er","",""

  set rstemp=conntemp.execute("select * from noticias")
  qtde_campos=rstemp.fields.count -1
  %> 
<form action="apagarnoticias.asp" method="post">
  <table border="0">
    <tr>
      <td>&nbsp;</td>
      <% 'Preenche a primeira linha com o nome dos campos
   for i=1 to qtde_campos-1 %> 
      <td><b><%=rstemp(i).name %></b></td>
      <% next %> </tr>
    <% ' Preenche a tabela com os registros do banco
  do while not rstemp.eof %> 
    <tr>
      <td>
        <input type="checkbox" name="box<%=rstemp.fields(0).value%>"  >
      </td>
      <% for i = 1 to qtde_campos-1%> 
      <td valign="top"><% = rstemp.fields(i).value %></td>
      <% next %> </tr>
    <tr></tr>
    <tr></tr>
    <% rstemp.movenext
  loop
  conntemp.close%> 
  </table>
  <br>
<input type="submit" value="confirmar">
</form>
</body>
</html>
<%end if%>
