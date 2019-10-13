<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">
<%
  Dim codigo

  codigo = Request.QueryString("codigo")

  ' Conexão com o banco
  Set conntemp=server.createobject("adodb.connection")
  conntemp.open "er", "", ""
   
  Set RSnews = conntemp.execute("SELECT * FROM noticias WHERE codigo = "&codigo&" ")  
%>
  <br>
  <table cellpadding="0" cellspacing="0" border="0" align="center" width="75%">
  <tr>
    <td><b><%= mid(RSnews.fields(3).value,1,2)&"/"&mid(RSnews.fields(3).value,3,2)&"/"&mid(RSnews.fields(3).value,5,4) %></b></td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td><b><%=RSnews.fields(1).value%></b></td>
  </tr>
  <tr>
  <td><p align="justify"><%=RSnews.fields(2).value%></p></td>
  </tr>
  </table>
<% conntemp.close %>
 </body>
</html>
