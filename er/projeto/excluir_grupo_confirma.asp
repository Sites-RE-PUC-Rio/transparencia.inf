<%if session("login")="ok" then %>
<html>
<head>
<title>Confirmar exclus�o</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<!- Pede confirma��o para a exclus�o do grupo selecionado -->
<body bgcolor="#FFFFFF">
<%
  ' Variavel local
  Dim codigo_grupo
  
  ' Resgata o codigo do grupo passado na p�gina anterior e armazena numa variavel local
  codigo_grupo = Request.Form("grupo")
  
  ' Instancia uma conex�o com o banco de dados ER
  Set conntemp = Server.CreateObject("adodb.connection")
  conntemp.open "er","","" 

  Set RStem_usuario = Server.CreateObject("adodb.Recordset")
  RStem_usuario.open "SELECT * FROM agrupamentos WHERE grupo = '"&codigo_grupo&"' ", conntemp,3,3
    
  ' Verifica se existe algum usuario no grupo, pois o administrador nao pode excluir um    ' grupo que tenha usuario(s) nele. Para isso ele dever� excluir os usuarios do grupo     ' primeiro para depois excluir o grupo.
  If (RStem_usuario.Recordcount = 0) Then
  Set RSnome_grupo = Server.CreateObject("adodb.Recordset")
  RSnome_grupo.open "SELECT * FROM Grupos WHERE Codigo = "&codigo_grupo&" ", conntemp,3,3
%>
 
<!- Envia formul�rio com a confirma��o do administrador para excluir_grupo_ok.asp-->
<form action="excluir_grupo_ok.asp" method="post">
<input type="hidden" name="grupo" value="<%=codigo_grupo%>"> 
<table width="75%" border="0" align="center" height="60">
  <tr> 
    <td colspan="4" height="27"> 
      <div align="center"><b><font size="5">Exclus&atilde;o de grupo</font></b></div>
    </td>
  </tr>
  <tr> 
    <td colspan="4" height="25">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="2" height="25"><i>Grupo a ser exclu&iacute;do:</i> </td>
    <td height="25" colspan="2"><%=RSnome_grupo.fields(1).value%></td>
  </tr>
  <tr> 
    <td colspan="2" height="25">&nbsp;</td>
    <td height="25" width="49%"> 
      <div align="right">
        <input type="submit" name="Submit" value="Confirmar exclus&atilde;o">
      </div>
    </td>
    <td height="25" width="20%">&nbsp;</td>
  </tr>
</table>
</form>

<!- Caso o grupo possua usu�rios -->
<%else%>
  O grupo possui usu�rios. Para exclu�-lo voc� dever� excluir seus usu�rios antes.
<%end if%>
<%conntemp.close%>
</body>
</html>
<%end if%>