<%if session("login")="ok" then %>
<html>
<head>
<title>Editor do Canal Livre</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<!- Faz a seleção entre inserir e apagar mensagens no Canal Livre-->
<script language="JavaScript">
<!--
function TestarBox(form)
{ 
  radiobutton = form.opcao.value

  if ((radiobutton == ""))
    { alert ("Por favor, selecione uma opção.") 
      form.radiobutton.focus() 
      return false;
    }  
}
  
//-->
</SCRIPT>

<body bgcolor="#FFFFFF">
<center>
<br>
<!- Envia o formulário com a seleção da opção para apagarmsg.asp-->
<form action="apagarmsg.asp" method="post"> 
    <table width="37%" border="0">
      <tr> 
      <td colspan="2" height="37"><b><font size="5">Gerenciador de mensagens</font></b></td>
    </tr>
    <tr> 
        <td colspan="2" height="11"></td>
    </tr>
    <tr> 
      <td width="10%" height="37">
	    <input type="radio" name="opcao" value="inserir" checked>
      </td>
      <td width="90%" height="37"><i>Inserir mensagem</i></td>
    </tr>
    <tr> 
      <td width="10%" height="37">
	    <input type="radio" name="opcao" value="apagar">
      </td>
      <td width="90%" height="37"><i>Apagar mensagem</i></td>
    </tr>
    <tr> 
      <td width="10%" height="36">&nbsp;</td>
        <td width="90%" height="36"> 
          <div align="center">
            <input type="submit" onClick="return TestarBox(this.form);" value="Confirmar">
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
<%end if%>

