
<%
Dim login

login = Request.QueryString("login2")

Set Con = Server.CreateObject("ADODB.Connection")
Con.open "er"
SQL = "SELECT nome, email FROM Senhas WHERE login = '" & login & "'"
Set RS = Con.Execute(SQL)
nome_usuario =  RS("nome")
email_usuario = RS("email")


%>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body leftmargin="7" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF">
<%if session("login")="oklivre" then %>
<table width="100%" border="0" height="27" background="fig25.GIF">
  <tr valign="top"> 
    <td height="21"> 
      <div align="left"> <font size="4"><font face="Verdana, Arial, Helvetica, sans-serif"><b>Free 
        Channel <font size="3"> </font></b></font></font></div>
    </td>
  </tr>
</table>
<%If NOT RS.EOF Then%> 
      
<form action="envio_msg_eng.asp" method="post">
  <table width="97%" border="0" height="100">
    <tr> 
      <td width="32%" height="22" valign="top" background="fundotab.gif"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">name:</font> 
      </td> 
      <td width="48%" height="22" valign="top" background="fundotab.gif"><%Response.write ""&RS("nome")%></td>
      <td rowspan="4" height="52" width="3%" valign="top">
        <input type="hidden" name="nome_usuario" value=<%=nome_usuario%> >
        <input type="hidden" name="email_usuario" value=<%=email_usuario%> >
        </td>
    </tr>
    <tr> 
      <td width="32%" height="22" valign="top" background="fundotab.gif"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">e-mail:</font></td>
      <td width="48%" height="22" valign="top" background="fundotab.gif"><%Response.write ""&RS("email")%></td>
    </tr>
    <tr>
      <td width="32%" height="127" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Write 
        your message:</font></td>
      <td width="48%" height="127" valign="top">
        <textarea name="textarea" cols="40" rows="9"></textarea>
      </td>
    </tr>
    <tr> 
      <td width="32%" height="39" valign="top">
        <input type="submit" name="Submit22" value="Send">
        <input type="reset" name="Reset2" value="Clear">
      </td>
      <td width="48%" height="39" valign="top">&nbsp; </td>
    </tr>
  <%End If 
    Con.Close 
    Set Con = Nothing%>
  </table>
  </form>
 <form action="mostrar_msgs_eng.asp" method="post">
  <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Read all messages:</font> 
  <input type="submit" name="Button" value="Read messages">
 </form>  
 <br>
<% else %>
<center>
  <h1>Access denied!</h1>
</center>
<% end if %> 
</body>
</html>
