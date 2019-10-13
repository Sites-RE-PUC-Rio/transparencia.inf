<%if session("login")="ok" then %>
<html>
<head>
<title>Excluir usuario de um grupo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">
<%
  ' Variavel local
  Dim count 
   
  ' Instancia uma conexão com o banco de dados ER
  Set conntemp = Server.CreateObject("adodb.connection")
  conntemp.open "er","","" 
%>
<form action="desagrupar_usuario_confirma.asp" method="post">
  <table width="75%" border="0" align="center" height="117">
    <tr> 
    <td colspan="3"> 
        <div align="center"><b><font size="5">Exclus&atilde;o de usu&aacute;rio 
          de grupo</font></b></div>
    </td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr> 
      <td width="27%" height="27"><i>Selecione o grupo:</i></td>
    <td height="27" colspan="2">
      <%
        Set RSgrupos = Server.CreateObject("adodb.Recordset")
        RSgrupos.open "SELECT * FROM Grupos", conntemp,3,3 %>
      <% If (RSgrupos.Recordcount > 0)  Then %> 
      <select name="grupo">
	     <% RSgrupos.MoveLast %>	
	  	 <% count = RSgrupos.RecordCount %>
		 <% do while (not count = 0) %>
  		 <!- Captura o nome dos grupos na tabela Grupos no banco de dados e coloca como opcao para o administrador, de acordo com a selecao é enviado o codigo do grupo para a proxima página efetuar a inserção do novo grupo -->
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
  <tr> 
      <td width="27%" height="30">&nbsp;</td>
      <td width="40%" height="30"> 
        <div align="right">
        <input type="submit" value="Excluir">
      </div>
    </td>
    <td width="33%" height="30">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
<%end if%>
