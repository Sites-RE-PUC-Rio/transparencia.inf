<% 
Dim atual
Dim inicial

atual   = Request.Form("final")
inicial = Request.Form("inicial")
inicial = atual
  %>

<html>

<head>
  <title>mostrar_outras_msg</title>
</head>
<script language="JavaScript">
<!--
function VoltaAnterior(form)
{
   anterior = parseInt(form.inicial.value);
   
   anterior = anterior + 10;
   
   form.inicial.value = anterior;
   form.final.value = form.inicial.value;
   return form.inicial.value;

}
//-->
</SCRIPT>

<body bgcolor="#FFFFFF">
<% 
  ' Conexão com o banco
  set conntemp=server.createobject("adodb.connection")
  conntemp.open "er","",""
  set rstemp=server.createobject("adodb.recordset")
  rstemp.open "select * from ermsg", conntemp,3,3
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
  <% contador = 0 %> 
  <% ' Preenche a tabela com os registros do banco %>
  <% rstemp.AbsolutePosition = atual %>
  <% do while ((not atual = 0) AND(not contador = 10 ))  %> 
  <tr> 
    <td width="11%" height="64" valign="middle" align="center"><% = mid(rstemp.fields(3).value,1,2)&"/"&mid(rstemp.fields(3).value,3,2)&"/"&mid(rstemp.fields(3).value,5,4) %></td>
    <td width="19%" height="64" valign="middle" align="center"><% = rstemp.fields(1).value %></td>
    <td width="27%" height="64" valign="middle" align="center"><% = rstemp.fields(2).value %></td>
    <td width="43%" height="64" valign="top" align="left"><% = rstemp.fields(4).value %></td>
  </tr>
  <% contador = contador + 1%>
  <% atual = atual -1 
   rstemp.MovePrevious
   loop%>
   
</table>
<br>

<form name="form2" method="post" action="mostrar_outras_msg.asp" >
<center>
<input type="hidden" name="final" value=<%=atual%> >
<input type="hidden" name="inicial" value=<%=inicial%> >
    <%
    countaux = inicial + 10
    valorfinal = rstemp.RecordCount 
    if (countaux <= valorfinal) then
   %>
    <input type="submit" name="Submit2" value="10 Anteriores" onclick="return VoltaAnterior(this.form);">
    <%end if%>
    <%if not atual = 0  then%> 
    &nbsp;
    <input type="submit" name="Submit" value="Pr&oacute;ximos 10">
    &nbsp;&nbsp;&nbsp;<br> 
  <% end if%>
</center>
.
</form>
</body>
</html>
<%conntemp.close%>
