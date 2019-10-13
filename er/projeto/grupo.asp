<%if session("login")="ok" then %>
<html>
<head>
<title>Selecao de acao sobre grupo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<!- Opções para gerenciamento de grupos -->
<body bgcolor="#FFFFFF">
<br>
<center>
<!- Envia a seleção do administrador para opcao_grupo_ok.asp -->
<form action="opcao_grupo_ok.asp" method="post"> 
  <table width="34%" border="0">
    <tr> 
        <td colspan="2" height="31"><b><font size="5">Gerenciador de grupos</font></b></td>
    </tr>
    <tr> 
        <td colspan="2" height="5"></td>
    </tr>
    <tr> 
      <td width="10%" height="37"> 
        <input type="radio" name="opcao" value="criar" checked>
      </td>
      <td width="90%" height="37"><i> Cria&ccedil;&atilde;o 
        de grupos</i>
      </td>
    </tr>
    <tr> 
      <td width="10%" height="37"> 
        <input type="radio" name="opcao" value="excluir">
      </td>
      <td width="90%" height="37"><i>Exclus&atilde;o de grupos</i>
	  </td>
    </tr>
    <tr> 
      <td width="10%" height="38"> 
        <input type="radio" name="opcao" value="incluirUsuario">
      </td>
      <td width="90%" height="38"><i>Inclus&atilde;o de usu&aacute;rio em um grupo</i>
	  </td>
    </tr>
    <tr> 
      <td width="10%" height="38">
		<input type="radio" name="opcao" value="excluirUsuario"> 
	  </td>
      <td width="90%" height="38"><i>Exclus&atilde;o de usu&aacute;rio de um grupo</i>
	  </td>
    </tr>
    <tr> 
      <td width="10%" height="36">
        <input type="radio" name="opcao" value="listar">
      </td>
      <td width="90%" height="36"><i>Listar usu&aacute;rios de um grupo</i>
      </td>
    </tr>
    <tr>
      <td width="10%" height="36">
        <input type="radio" name="opcao" value="email">
      </td>
      <td width="90%" height="36"><i>Enviar e-mail para o grupo</i>
      </td>
    </tr>
    <tr> 
      <td width="10%" height="36">&nbsp;</td>
      <td width="90%" height="36"> 
        <div align="center">
          <input type="submit" name="Submit" value="Confirmar">
        </div>
      </td>
    </tr>
  </table>
  <div align="center"></div>
</form>
</center>
</body>
</html>
<%else%>
  <font size="2">Esta sessão foi encerrada.<br>
	Clique <a href="index.html" target="_top">aqui</a> para iniciar nova sessão.</font>
<%end if%>