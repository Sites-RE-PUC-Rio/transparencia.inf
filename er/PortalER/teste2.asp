<html>
<head>
   <title>Teste2</title>
</head>
<body>
<%
dim var
var  = Request.Form("textfield_nome")
var2 = Request.Form("textfield_email")
var3 = Request.Form("textfield_msg")
%> 
nome: <% if var = "" then%> <font color="#FF0000">nome n�o informado.</font> 
<%else%> <%=var%> <%end if%><br>
email: <% if var2 = "" then%> <font color="#FF0000">email n�o informado.</font> 
<%else%> <%=var2%> <%end if%><br>
mensagem: <% if var3 = "" then%> <font color="#FF0000">mensagem n�o informada.</font> 
<%else%> <%=var3%> <%end if%> 
<p>&nbsp; </p>
</body>
</html>