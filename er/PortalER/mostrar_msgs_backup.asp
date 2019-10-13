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
<table width="100%" border="1" height="28" bordercolorlight="#CCCCCC">
  <tr bgcolor="#999999"> 
    <td height="15" width="11%"> 
      <div align="center"><font color="#FFFFFF"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Data</font></b></font></div>
    </td>
    <td height="15" width="19%"> 
      <div align="center"><font color="#FFFFFF"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Nome</font></b></font></div>
    </td>
    <td height="15" width="27%"> 
      <div align="center"><font color="#FFFFFF"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">E-mail</font></b></font></div>
    </td>
    <td height="15" width="43%"> 
      <div align="center"><font color="#FFFFFF"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Mensagem</font></b></font></div>
    </td>
  </tr>
  <% count=0 %>
  <% ' Preenche a tabela com os registros do banco %>
  <% do while not rstemp.eof %>
  countline=<%linhas = rstemp.fields.count / 5%>
			<%linhatotal = linhas + linhatotal %>
			<%=linhatotal%>
  <%if count < 10 then %>
  <tr> 
    <td width="11%" height="64" valign="middle" align="center"><% = rstemp.fields(3).value %></td>
    <td width="19%" height="64" valign="middle" align="center"><% = rstemp.fields(1).value %></td>
    <td width="27%" height="64" valign="middle" align="center"><% = rstemp.fields(2).value %></td>
    <td width="43%" height="64" valign="top" align="left"><% = rstemp.fields(4).value %></td>
  </tr>
  <% else parada= 1%>
  <%end if%>  
<% count=count+1 
   rstemp.movenext
   loop
   conntemp.close%> 
</table>
<br>
<center>
  <a href="mostrar_msgs.asp"><font color="#006666"><< 10 anteriores</font></a>
  &nbsp;&nbsp;&nbsp;&nbsp; 
  <a href="mostrar_msgs.asp"><font color="#006666">proximas 10 >></font></a><br>
</center>
</body>
</html>
