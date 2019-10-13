<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<script language="JavaScript">
<!--
function TestarBranco(form)
{ 
login = form.login.value
senha = form.senha.value
novasenha = form.novasenha.value
repetenovasenha = form.repetenovasenha.value

  if ((login == ""))
    { alert ("Por favor, digite o seu Login.") 
      form.login.focus() 
      return false;} 
  if ((senha == ""))
    { alert ("Por favor, digite sua senha.") 
      form.senha.focus() 
      return false;}
  if ((novasenha == ""))
    { alert ("Por favor, digite sua nova senha.") 
      form.novasenha.focus() 
      return false;}
  if ((repetenovasenha == ""))
    { alert ("Por favor, repita sua nova senha.") 
      form.repetenovasenha.focus() 
      return false;}
  if ((repetenovasenha != novasenha))
    { alert ("Você digitou duas senhas diferentes!") 
      form.repetenovasenha.focus() 
      return false;}

 
}

//-->
</SCRIPT>

<body bgcolor="#FFFFFF" topmargin="0">
<table width="100%" border="0" background="fig25.GIF">
  <tr>
    <td height="30"><font size="4"><font face="Verdana, Arial, Helvetica, sans-serif"><b>Password 
      Change <font size="3"></font></b></font></font></td>
  </tr>
</table><br><br>
<br>
<form action="alterasenha_ok_eng.asp" method="post">
<table width="35%" border="0" align="center" background="fundotab.gif">
  <tr> 
    <td width="70%"><font face="Verdana, Arial, Helvetica, sans-serif">login</font></td>
    <td width="30%"> 
      <div align="center"> 
        <input type="text" name="login" size="12" maxlength="12">
      </div>
    </td>
  </tr>
  <tr> 
      <td width="70%"><font face="Verdana, Arial, Helvetica, sans-serif">password</font></td>
    <td width="30%"> 
      <div align="center"> 
        <input type="password" name="senha" size="12" maxlength="12">
      </div>
    </td>
  </tr>
  <tr> 
      <td width="70%"><font face="Verdana, Arial, Helvetica, sans-serif">new password</font></td>
    <td width="30%"> 
      <div align="center"> 
        <input type="password" name="novasenha" size="12" maxlength="12">
      </div>
    </td>
  </tr>
  <tr> 
      <td height="22" width="70%"><font face="Verdana, Arial, Helvetica, sans-serif">repeat 
        new password</font></td>
    <td height="22" width="30%"> 
      <div align="center"> 
        <input type="password" name="repetenovasenha" size="12" maxlength="12">
      </div>
    </td>
  </tr>
</table>
  <table width="35%" border="0" align="center">
    <tr>
      <td> 
        <div align="right">
          <input type="submit" onClick="return TestarBranco(this.form);" name="Submit" value="Send">
        </div>
      </td>
  </tr>
</table>
</form>

</body>
</html>
