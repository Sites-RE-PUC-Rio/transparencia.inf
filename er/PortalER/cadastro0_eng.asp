<html>
<head>
<title>Untitled Document</title>
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
    { alert ("Please, enter your login.") 
      form.login.focus() 
      return false;} 
  if ((senha == ""))
    { alert ("Please, enter your password.") 
      form.Senha.focus() 
      return false;} 
 if ((senha != confirmacao))
     {
      alert ("Please, enter the same password in the confirmation.")
      form.confirmacao.focus()
      return false;
     }	  
  if ((nome == ""))
    { alert ("Please, enter your name.") 
      form.nome.focus() 
      return false;}
  if ((email == ""))
    { alert ("Please, enter your mail.") 
      form.email.focus() 
      return false;} 
  if ((instituicao == ""))
    { alert ("Please, enter your institution name.") 
      form.instituicao.focus() 
      return false;}
  
}

//-->
</SCRIPT>

<body bgcolor="#FFFFFF" topmargin="0">
<table width="100%" border="0" height="27" background="fig25.GIF">
  <tr valign="top"> 
    <td height="21"> 
      <div align="left"> <font size="4"><font face="Verdana, Arial, Helvetica, sans-serif"><b>User 
        information </b></font></font></div>
    </td>
  </tr>
</table>
<div align="center"> </div>
<form method="post" action="cadastro1_eng.asp">
  <table width="77%" border="0">
    <tr> 
      <td colspan="2" height="9"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Put 
        here the login and password that you wish:</font></td>
    </tr>
    <tr> 
      <td width="26%" background="fundotab.gif"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Login</font></td>
      <td width="74%" background="fundotab.gif"> 
        <input type="text" name="login" size="12" maxlength="12">
      </td>
    </tr>
    <tr> 
      <td width="26%" ><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Password</font></td>
      <td width="74%"> 
        <input type="password" name="Senha" size="12" maxlength="12">
      </td>
    </tr>
    <tr> 
      <td width="26%" background="fundotab.gif"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Repeat 
        Password</font></td>
      <td width="74%" background="fundotab.gif"> 
        <input type="password" name="confirmacao" size="12" maxlength="12">
      </td>
    </tr>
    <tr> 
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Put 
        your information on the fields above:</font></td>
    </tr>
    <tr> 
      <td width="26%" background="fundotab.gif"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Name</font></td>
      <td width="74%" background="fundotab.gif"> 
        <input type="text" name="nome" size="35" maxlength="50">
      </td>
    </tr>
    <tr> 
      <td width="26%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">E-mail</font></td>
      <td width="74%"> 
        <input type="text" name="email" size="35" maxlength="50">
      </td>
    </tr>
    <tr> 
      <td width="26%" background="fundotab.gif"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Institute</font></td>
      <td width="74%" background="fundotab.gif"> 
        <input type="text" name="instituicao" size="35" maxlength="50">
      </td>
    </tr>
    <tr> 
      <td width="26%" height="37" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="74%" height="37" bgcolor="#FFFFFF"> 
        <div align="right"> 
          <input type="submit" onClick="return TestarBranco(this.form);" name="Submit" value="Send">
        </div>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
