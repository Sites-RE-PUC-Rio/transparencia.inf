<%if session("login")="ok" then %>
<html>
<head>
<title>Dados do Portal</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<!- Exibe dados relativos ao portal de Engenharia de Requisitos-->

<body bgcolor="#FFFFFF">
<table width="100%">
  <tr>
    <td height="37"> 
      <div align="center"><b><font size="5">Dados do Portal</font></b></div>
    </td>
  </tr>
  <tr> 
    <td> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> <%
 ' Conex�o com o banco
 set conntemp=server.createobject("adodb.connection") 
 conntemp.open "er", "", ""
 
 set RSuser=server.createobject("adodb.Recordset")

 RSuser.open "select * from Senhas", conntemp,3,3
 If RSuser.RecordCount = 0 Then
 'N�o tem usu�rios
%> <b><font size="2">N�o h� usu�rios cadastrados.</font></b><br>
      <br>
      <%else%> <b><font size="2">Total de Usu�rios = <%=RSuser.RecordCount%></font></b><br>
      <br>
      <%end if
  RSuser.close
%> 
      <!-Exibe num�ro de usu�rios em cada n�vel --> 
      <hr>
      <%
 RSuser.open "SELECT * FROM Senhas WHERE nivel = 0", conntemp,3,3
%> Usu�rios de n�vel 0 = <%=RSuser.RecordCount%> (usu�rio comum)<br>
      <% RSuser.close
%> <%
 RSuser.open "SELECT * FROM Senhas WHERE nivel = 1", conntemp,3,3
%> Usu�rios de n�vel 1 = <%=RSuser.RecordCount%><br>
      <% RSuser.close
%> <%
 RSuser.open "SELECT * FROM Senhas WHERE nivel = 2", conntemp,3,3
%> Usu�rios de n�vel 2 = <%=RSuser.RecordCount%><br>
      <% RSuser.close
%> <%
 RSuser.open "SELECT * FROM Senhas WHERE nivel = 3", conntemp,3,3
%> Usu�rios de n�vel 3 = <%=RSuser.RecordCount%><br>
      <% RSuser.close
%> <%
 RSuser.open "SELECT * FROM Senhas WHERE nivel = 4", conntemp,3,3
%> Usu�rios de n�vel 4 = <%=RSuser.RecordCount%><br>
      <% RSuser.close
%> <%
 RSuser.open "SELECT * FROM Senhas WHERE nivel = 5", conntemp,3,3
%> Usu�rios de n�vel 5 = <%=RSuser.RecordCount%> (super usu�rio)<br>
      <%
 RSuser.close
%> <br>
      <hr>
      <!- Exibe n�meros de usu�rios da Puc-Rio --> <%
 RSuser.open "SELECT * FROM SENHAS WHERE INSTITUICAO =  'PUC-Rio' OR INSTITUICAO =  'PUC-RJ' OR INSTITUICAO = 'PUC' OR INSTITUICAO = 'Pontificia Universidade Catolica' OR INSTITUICAO = 'Pontificia Universidade Catolica do Rio de Janeiro'", conntemp,3,3
%> Usu�rios da PUC-Rio = <%=RSuser.RecordCount%><br>
      <%
 RSuser.close
%> 
      <hr>
      <!- Exibe quantidade de mensagens --> <%
 RSuser.open "SELECT * FROM ermsg", conntemp,3,3
%> Qtd de mensagens = <%=RSuser.RecordCount%><br>
      
      <% RSuser.close
%> <!- Exibe quantidade de not�cias--> <%
 RSuser.open "SELECT * FROM noticias", conntemp,3,3
%> Qtd de not�cias = <%=RSuser.RecordCount%><br>
      <%
 RSuser.close
 conntemp.close %></font> </td>
  </tr>
</table>
<font size="2">
<br>
<a href="../webtrends/AnaliseER_111100.HTM">WebTrends 11 nov 2000</a>
<br>
<a href="../webtrends/jan2001.HTM">WebTrends 12,15,16 jan 2001</a>
</font>
</body>
</html>
<%else%>
  <font size="2">Esta sess�o foi encerrada.<br>
	Clique <a href="index.html" target="_top">aqui</a> para iniciar nova sess�o.</font>
<% end if %>
