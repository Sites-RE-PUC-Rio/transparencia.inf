<%if session("login")="ok" then %>
<html>
<head>
<title>Busca agrupar usuário</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<!- Seleciona o grupo para listar os usuarios -->
<body bgcolor="#FFFFFF">

<br>
<!- Envia o formulário para listar_usuarios.asp --> 
<table width="100%" border="0">
  <tr>
    <td>
      <div align="center"><b><font size="5">Gerenciador de grupos - (listar usu&aacute;rios)</font></b></div>
    </td>
  </tr>
</table>
<form action="listar_usuarios.asp" method="post">
<font face="Verdana, Arial, Helvetica, sans-serif" size="1">Abaixo entre com o 
grupo que deseja listar:</font> 
  <table width="75%" border="0" height="27">
    <tr>
      <td width="30%" height="28"><i>Entre com o grupo</i>:</td>
      <td width="55%" valign="top" height="28">   
      <%
        ' Instancia uma conexão com o banco de dados ER
        Set conntemp = Server.CreateObject("adodb.connection")
        conntemp.open "er","",""

        Set RSgrupos = Server.CreateObject("adodb.Recordset")
        RSgrupos.open "SELECT * FROM Grupos", conntemp,3,3 %>
		<% If (RSgrupos.Recordcount > 0)  Then %>
        <select name="grupo" size="1">
		  <% RSgrupos.MoveLast %>	
	  	  <% count = RSgrupos.RecordCount %>
		  <% do while (not count = 0) %>
          <option value="<%=RSgrupos.fields(0).value%>">
		    <%=RSgrupos.fields(1).value%>
          </option>
	      <% count=count-1 
   		     RSgrupos.MovePrevious
      	     loop %>
        </select>
		<%else%>
	    Não há nenhum grupo criado.
		<%end if%>
    </td>
  </tr>
</table>
  <input type="submit" name="Submit" value="Confirmar">
</form>
</body>
</html>
<%end if%>