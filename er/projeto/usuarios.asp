<%if session("login")="ok" then %>
<html>
<head>
<title>Gerenciamento de Usuários</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<!-Opções de gerenciamento de usuário -->
<body bgcolor="#FFFFFF">
<center>
<br>
  <!-Envia formulário com a escolha do administrador para cadastrar_usuario.asp -->
  <form action="cadastrar_usuario.asp" method="post"> 
    <table width="34%" border="0">
      <tr> 
      <td colspan="2" height="37"><b><font size="5">Gerenciador de usuários</font></b></td>
    </tr>
    <tr> 
        <td colspan="2" height="9"></td>
    </tr>
    <tr> 
      <td width="10%" height="37">
	    <input type="radio" name="opcao" value="cadastrar" checked>
      </td>
      <td width="90%" height="37"><i>Cadastrar usu&aacute;rio</i></td>
    </tr>
    <tr> 
      <td width="10%" height="37">
	    <input type="radio" name="opcao" value="apagar">
      </td>
      <td width="90%" height="37"><i>Apagar usu&aacute;rio</i></td>
    </tr>
    <tr> 
      <td width="10%" height="38"> 
        <input type="radio" name="opcao" value="alterar">
      </td>
      <td width="90%" height="38"><i>Alterar usu&aacute;rio</i></td>
    </tr>
    <tr> 
      <td width="10%" height="36">&nbsp;</td>
        <td width="90%" height="36"> 
          <div align="center">
            <input type="submit" value="Confirmar">
          </div>
        </td>
   </tr>
</table>
</form>
</center>
</body>
</html>
<%else%>
  <font size="2">Esta sessão foi encerrada.<br>
	Clique <a href="index.html" target="_top">aqui</a> para iniciar nova sessão.</font>
<% end if %>
