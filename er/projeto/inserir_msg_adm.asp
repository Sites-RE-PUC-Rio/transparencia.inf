
<%
  ' nome e e-mail de envio do remetente
  nome_usuario =  "Administrador"
  email_usuario = "per@les.inf.puc-rio.br"
%>
<html>
<head>
<title>Insere mensagem do administrador</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script language="JavaScript">
<!--
function TestarBranco(form)
{ 
mensagem  = form.msg.value;

  if ((mensagem == ""))
    { 
      alert ("Por favor, digite a mensagem.") 
      form.msg.focus() 
      return false;
    } 
}

//-->
</SCRIPT>

<!- Envia mensagem do administrador para ser inserida no banco de dados -->
<body leftmargin="7" marginwidth="0" marginheight="0" bgcolor="#FFFFFF">

<%if session("login")="ok" then %>
<table width="100%" border="0" height="27">
  <tr valign="top"> 
    <td height="21"> 
      <div align="center"><b><font size="5">Gerenciador de mensagens 
        - (inserir)</font></b></div>
    </td>
  </tr>
</table>

<!- Envia o formulário com os dados da mensagem do administrador para inserir.asp -->    
<form action="inserir.asp" method="post">
  <table width="97%" border="0" height="100">
    <tr> 
      <td width="32%" height="22" valign="top" background="../fundotab.gif"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">nome:</font> 
      </td> 
      <td width="48%" height="22" valign="top" background="../fundotab.gif">
		<%Response.write nome_usuario%>
	  </td>
      <td rowspan="4" height="52" width="3%" valign="top">
        <input type="hidden" name="nome_usuario" value="<%=nome_usuario%>">
        <input type="hidden" name="email_usuario" value="<%=email_usuario%>">
      </td>
    </tr>
    <tr> 
      <td width="32%" height="22" valign="top" background="../fundotab.gif"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">e-mail:</font></td>
      <td width="48%" height="22" valign="top" background="../fundotab.gif">                   <%Response.write email_usuario%>
	  </td>
    </tr>
    <tr>
      <td width="32%" height="127" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Escreva 
        sua mensagem:</font></td>
      <td width="48%" height="127" valign="top">
        <textarea name="msg" cols="40" rows="9"></textarea>
      </td>
    </tr>
    <tr> 
      <td width="32%" height="39" valign="top">
        <input type="submit" onClick="return TestarBranco(this.form);" value="Enviar">
        <input type="reset" value="Limpar">
      </td>
      <td width="48%" height="39" valign="top">&nbsp;</td>
    </tr>
 </table>
</form>
<form action="../mostrar_msgs.asp" method="post">
  <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Leia as mensagens 
  de outros usu&aacute;rios:</font> 
  <input type="submit" name="Button" value="Ler mensagens">
</form>  
 <br>
<% else %>

<!- Usuário sem permissão -->
<center><h1>Acesso negado!</h1></center>
<% end if %> 
</body>
</html>
