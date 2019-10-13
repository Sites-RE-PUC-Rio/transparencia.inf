<%response.buffer = true%>
<html>
<head>
  <title>mostrar_msg</title>
</head>
<body bgcolor="#FFFFFF">
<% 
  ' Conexão com o banco
  set conntemp=server.createobject("adodb.connection")
  conntemp.open "er","",""
  set rstemp=server.createobject("adodb.recordset")
  rstemp.open "select * from ermsg", conntemp,3,3
  qtde_campos=rstemp.fields.count -1
  %>
<%if rstemp.Recordcount > 0  Then%> 
<table width="100%" border="1" height="28" bordercolorlight="#CCCCCC">
  <tr bgcolor="#999999"> 
    <td height="15" width="11%"> 
      <div align="center"><font color="#FFFFFF"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Date</font></b></font></div>
    </td>
    <td height="15" width="19%"> 
      <div align="center"><font color="#FFFFFF"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Name</font></b></font></div>
    </td>
    <td height="15" width="27%"> 
      <div align="center"><font color="#FFFFFF"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">E-mail</font></b></font></div>
    </td>
    <td height="15" width="43%"> 
      <div align="center"><font color="#FFFFFF"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Message</font></b></font></div>
    </td>
  </tr>
  <% count = rstemp.RecordCount %>
  <% contador = 0 %> 
  <% ' Preenche a tabela com os registros do banco %>
  <% rstemp.MoveLast %>

  <% do while ((not count = 0) AND (not contador = 10 ))  %> 
  <tr> 
    <td width="11%" height="64" valign="middle" align="center"><% = mid(rstemp.fields(3).value,3,2)&"/"&mid(rstemp.fields(3).value,1,2)&"/"&mid(rstemp.fields(3).value,5,4) %></td>
    <td width="19%" height="64" valign="middle" align="center"><% = rstemp.fields(1).value %></td>
    <td width="27%" height="64" valign="middle" align="center"><% = rstemp.fields(2).value %></td>
    <td width="43%" height="64" valign="top" align="left"><% = rstemp.fields(4).value %></td>
  </tr>
  <% contador = contador + 1%>
  <% count=count-1 
   rstemp.MovePrevious
   loop
   atual = count
   atual2 = 0
   %> 
</table>

<form name="form2" method="post" action="mostrar_outras_msg_eng.asp" >
<center>
    <% valorfinal = rstemp.RecordCount %>
    <%if not count = 0  then%> 
    <input type="hidden" name="final" value=<%=atual%> >
    <input type="hidden" name="inicial" value=<%=atual%> >
    &nbsp;
    <input type="submit" name="Submit" value="Next 10">
    &nbsp;&nbsp;&nbsp;<br> 
  <% end if%>
</center>
.
</form>
<%else%> There is no messages. <%end if%> 
</body>
</html>
<%conntemp.close%>
