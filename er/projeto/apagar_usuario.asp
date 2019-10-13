<%if session("login")="ok" then %>
<html>
<head>
<title>Apaga Usuário</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<!- Seleciona usuários para posterior eliminação do banco de dados -->
<body bgcolor="#FFFFFF">
<%
  Dim qtde_campos
 
  ' Instancia uma conexão com o banco de dados ER
  set conntemp = Server.CreateObject("adodb.connection")
  conntemp.open "er","",""

  set RSlistar = conntemp.execute("SELECT * FROM Senhas")
  qtde_campos = RSlistar.fields.count -1 
%> 
<form action="apagar_usuario_selecionado.asp" method="post">
  <table border="0">
    <tr>
      <td>&nbsp;</td>
      <% 
    	'Preenche a primeira linha com o nome dos campos
   		for i=0 to qtde_campos %> 
      <td><b><%=RSlistar(i).name %></b></td>
      <% next %> </tr>
      <% 
        ' Preenche a tabela com os registros do banco
  		do while not RSlistar.eof %> 
    <tr>
      <td>
 		<!-- Repassa a proxima página somente os checkbox marcados e o nome do checkbox possui o login do usuario para diferenciar cada um -->
        <input type="checkbox" name="box<%=RSlistar.fields(0).value%>"  >
      </td>
      <% for i = 0 to qtde_campos%> 
      <td valign="top"><% = RSlistar.fields(i).value %></td>
      <% next %> </tr>
    <tr></tr>
    <tr></tr>
    <% RSlistar.movenext
  loop
  conntemp.close%> 
  </table>
  <br>
<input type="submit" value="confirmar">
</form>
</body>
</html>
<% end if %>