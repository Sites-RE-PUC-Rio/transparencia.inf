<%if session("login")="ok" then %>
<html>
<head>
<title>Editor de Not�cias</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<!- Seleciona entre inserir e apagar not�cas -->

<script language="JavaScript">
<!--
function TestarBox(form)
{ 
  radiobutton = form.radiobutton.value

  if ((radiobutton == ""))
    { alert ("Por favor, selecione uma op��o.") 
      form.radiobutton.focus() 
      return false;
    }  
}
  
//-->
</SCRIPT>

<body bgcolor="#FFFFFF">
<br>
<center>
  <!- Formul�rio que envia a escolha do administrador para inserir_not�cia.asp--> 
  <form action="inserir_noticia.asp" method="post">
    <table width="34%" border="0">
      <tr> 
        <td colspan="2" height="37"><b><font size="5">Gerenciador de not&iacute;cias</font></b></td>
      </tr>
      <tr> 
        <td colspan="2" height="9"></td>
      </tr>
      <tr> 
        <td width="10%" height="37"> 
          <input type="radio" name="radiobutton" value="inserir" checked>
        </td>
        <td width="90%" height="37"><i>Inserir not&iacute;cia</i></td>
      </tr>
      <tr> 
        <td width="10%" height="37"> 
          <input type="radio" name="radiobutton" value="apagar">
        </td>
        <td width="90%" height="37"><i>Apagar not&iacute;cia</i></td>
      </tr>
      <tr> 
        <td width="10%" height="36">&nbsp;</td>
        <td width="90%" height="36"> 
          <div align="center"> 
            <input type="submit" onClick="return TestarBox(this.form);" name="Submit" value="Confirmar">
          </div>
        </td>
      </tr>
    </table>
</form>
</center>
<p>&nbsp;</p>
</body>
</html>
<%else%>
  <font size="2">Esta sess�o foi encerrada.<br>
	Clique <a href="index.html" target="_top">aqui</a> para iniciar nova sess�o.</font>	
<%end if%>
