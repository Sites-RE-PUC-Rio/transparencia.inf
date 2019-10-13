<%if session("login")="ok" then %>
<html>
<head>
<title>Excluir usuario de grupo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">
<form action="desagrupar_usuario_ok.asp" method="post">
<%
 ' Variaveis locais  
 Dim grupo  
 Dim login_usuario

 ' Resgata o valor do grupo passado na página anterior e armazena em uma variavel local
 grupo = Request.Form("grupo")  
  
  ' Instancia uma conexão com o banco de dados ER
  Set conntemp = Server.CreateObject("adodb.connection")
  conntemp.open "er","",""

  Set RSfiltra_grupo = Server.CreateObject("adodb.recordset")
  RSfiltra_grupo.open "SELECT * FROM agrupamentos WHERE grupo = '"&grupo&"' ", conntemp,3,3
  
  count = RSfiltra_grupo.RecordCount 
  
  ' Verifica se há usuários no grupo escolhido
  If (RSfiltra_grupo.RecordCount) = 0 then %>
   <center><h1>Não há usuários neste grupo</h1></center>
   
<%else%>
<!- passa o valor do grupo escondido para a próxima página --> 
<input type="hidden" name="grupo" value="<%=grupo%>">
  <%RSfiltra_grupo.MoveLast%> 
  <table width="100%" border="0">
    <tr>
      <td>
        <div align="center"><b><font size="5">Exclus&atilde;o de usu&aacute;rio 
          de grupo</font></b></div>
      </td>
    </tr>
  </table>
  <br>
  <table width="100%" border="0">
  <tr>
    <td width="5%"></td>
    <td width="42%"> 
      <div align="left"><b>Login</b></div>
    </td>
    <td width="53%"> 
      <div align="left"><b>Nome</b></div>
    </td>
  </tr>
</table>
<%do while (not count = 0)%> 
<%If (RSfiltra_grupo.fields(1).value = grupo) Then %>
<%
   login_usuario = RSfiltra_grupo.fields(0).value
   
   Sel = "SELECT nome, email, nivel FROM Senhas WHERE login = '"&login_usuario&"' "
   Set RSdados = conntemp.Execute(Sel)   
%> 
  <table width="100%" border="0" background="fundotab.gif">
    <tr>
	<td width="5%">
    <input type="checkbox" name="excluir<%=RSfiltra_grupo.fields(0).value%>"></td> 
    <td width="42%"><% = RSfiltra_grupo.fields(0).value %></td>
    <td width="53%"><% = RSdados("nome")%></td>
  </tr>
</table>
<br>
  <% count=count-1 
     RSfiltra_grupo.MovePrevious %> 
<%end if%> 
<%loop%>
<%end if%>
<input type="submit" value="excluir">
<%conntemp.close%>
</form>
</body>
</html>
<%end if%>