<html>
<head>
<title>Cadastrar Usuário</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<script language="JavaScript">
<!--
function TestarBranco(form)
{ 
login       = form.login.value;
nome        = form.nome.value;
email       = form.email.value;
instituicao = form.instituicao.value;
senha       = form.Senha.value;
confirmacao = form.confirmacao.value;

  if ((login == ""))
    { alert ("Por favor, digite o seu Login.") 
      form.login.focus() 
      return false;} 
  if ((senha == ""))
    { alert ("Por favor, digite a sua Senha.") 
      form.Senha.focus() 
      return false;} 
 if ((senha != confirmacao))
     {
      alert ("Por favor entre com a mesma senha na confirmação")
      form.confirmacao.focus()
      return false;
     }	  
  if ((nome == ""))
    { alert ("Por favor, entre com o seu nome.") 
      form.nome.focus() 
      return false;}
  if ((email == ""))
    { alert ("Por favor, digite o seu email.") 
      form.email.focus() 
      return false;} 
  if ((instituicao == ""))
    { alert ("Por favor, entre com o seu nome da sua instituição.") 
      form.instituicao.focus() 
      return false;}
  
}

//-->
</SCRIPT>

<body bgcolor="#FFFFFF" topmargin="0">
<table width="100%" border="0" height="27" background="fig25.GIF">
  <tr valign="top"> 
    <td height="21"> 
      <div align="left"> <font size="4"><font face="Verdana, Arial, Helvetica, sans-serif"><b>Cadastro 
        de Usu&aacute;rios<font size="3"> </font></b></font></font></div>
    </td>
  </tr>
</table>
<form method="post" action="cadastro1.asp">
  <table width="77%" border="0">
    <tr> 
      <td colspan="2" height="9"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Coloque 
        aqui o login de sua prefer&ecirc;ncia:</font></td>
    </tr>
    <tr> 
      <td width="22%" background="fundotab.gif"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Login</font></td>
      <td width="78%" background="fundotab.gif"> 
        <input type="text" name="login" size="12" maxlength="12">
      </td>
    </tr>
    <tr> 
      <td width="22%" ><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Senha</font></td>
      <td width="78%"> 
        <input type="password" name="Senha" size="12" maxlength="12">
      </td>
    </tr>
    <tr> 
      <td width="22%" background="fundotab.gif"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Repita 
        Senha</font></td>
      <td width="78%" background="fundotab.gif"> 
        <input type="password" name="confirmacao" size="12" maxlength="12">
      </td>
    </tr>
    <tr> 
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Preencha 
        os campos abaixo com os seus dados:</font></td>
    </tr>
    <tr> 
      <td width="22%" background="fundotab.gif"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Nome</font></td>
      <td width="78%" background="fundotab.gif"> 
        <input type="text" name="nome" size="35" maxlength="50">
      </td>
    </tr>
    <tr> 
      <td width="22%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">E-mail</font></td>
      <td width="78%"> 
        <input type="text" name="email" size="35" maxlength="50">
      </td>
    </tr>
    <tr> 
      <td width="22%" background="fundotab.gif"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Institui&ccedil;&atilde;o</font></td>
      <td width="78%" background="fundotab.gif"> 
        <input type="text" name="instituicao" size="35" maxlength="50">
      </td>
    </tr>
    <tr> 
      <td width="22%" height="37" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="78%" height="37" bgcolor="#FFFFFF"> 
        <div align="right"> 
          <input type="submit" onClick="return TestarBranco(this.form);" name="Submit" value="Enviar">
        </div>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
