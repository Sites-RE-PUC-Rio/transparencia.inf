<%if session("login")="ok" then %>
<html>
<head>
<title>Criar grupo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script language="JavaScript">
<!--
function TestarBranco(form)
{ 
 nome = form.nome.value;

  if ((nome == ""))
    { 
      alert ("Por favor, digite o nome do grupo.") 
      form.nome.focus() 
      return false;
    } 
}

//-->
</SCRIPT>
<!- Formulário para a criação de um novo grupo -->
<body bgcolor="#FFFFFF">

<!- Envia o formulário de criação de um novo grupo para envia_grupo.asp -->
<form action="envia_grupo.asp" method="post">
  <table width="75%" border="0" align="center">
    <tr> 
      <td colspan="3"> 
        <div align="center"><b><font size="5">Cria&ccedil;&atilde;o de Grupos</font></b></div>
      </td>
    </tr>
    <tr> 
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr> 
      <td width="15%"><i>Nome:</i></td>
      <td colspan="2"> 
        <input type="text" name="nome">
      </td>
    </tr>
    <tr> 
      <td width="15%"><i>Observa&ccedil;&atilde;o:</i></td>
      <td colspan="2"> 
        <input type="text" name="obs">
      </td>
    </tr>
    <tr> 
      <td width="15%" height="24">&nbsp;</td>
      <td width="62%" height="24"> 
        <div align="right">
          <input type="submit" onClick="return TestarBranco(this.form);" value="Confirmar">
        </div>
      </td>
      <td width="23%" height="24">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
<%end if%>