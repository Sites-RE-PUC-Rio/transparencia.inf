<%if session("login")="ok" then %>
<% ' verifica qual a opcao o usuario selecionou
   selecao = Request.Form("opcao") 
   if selecao = "apagar" then
      Response.Redirect "apagar_usuario.asp"
   else 
	if selecao = "alterar" then
      Response.Redirect "alterar_usuario.asp"
      end if 
        end if
 %>
<html>
<head>
<title>Cadastro de Usuário</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<!- Formulário de cadastro de usuários -->

<!- Função que checa se os campos foram preenchidos corretamente -->
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
nivel       = form.nivel.value;

  if ((login == ""))
    { alert ("Por favor, digite o Login.") 
      form.login.focus() 
      return false;} 
  if ((senha == ""))
    { alert ("Por favor, digite a Senha.") 
      form.Senha.focus() 
      return false;} 
 if ((senha != confirmacao))
     {
      alert ("Por favor entre com a mesma senha na confirmação")
      form.confirmacao.focus()
      return false;
     }	  
  if ((nome == ""))
    { alert ("Por favor, entre com o nome.") 
      form.nome.focus() 
      return false;}
  if ((email == ""))
    { alert ("Por favor, digite o email.") 
      form.email.focus() 
      return false;} 
  if ((instituicao == ""))
    { alert ("Por favor, entre com o nome.") 
      form.instituicao.focus() 
      return false;}
  if ((nivel== ""))
    { alert ("Por favor, entre com o nivel.") 
      form.instituicao.focus() 
      return false;}
}

//-->
</SCRIPT>

<body bgcolor="#FFFFFF">
<table width="100%" border="0" height="27">
  <tr valign="top"> 
    <td height="21"> 
      <center><font size="5"><b>Gerenciador 
        de Usu&aacute;rios</b></font></center>
    </td>
  </tr>
</table>

<!- Formulário que envia o cadastro do novo usuário para cadastrar_usuário_envio.asp-->
<form method="post" action="cadastrar_usuario_envio.asp">
  <table width="77%" border="0">
    <tr> 
      <td colspan="2" height="9"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Coloque aqui o login de sua prefer&ecirc;ncia:</font>
      </td>
    </tr>
    <tr> 
      <td width="24%" background="fundotab.gif"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Login</font>
      </td>
      <td width="76%" background="fundotab.gif"> 
        <input type="text" name="login" size="12" maxlength="12">
      </td>
    </tr>
    <tr> 
      <td width="24%" ><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Senha</font>
      </td>
      <td width="76%"> 
        <input type="password" name="Senha" size="12" maxlength="12">
      </td>
    </tr>
    <tr> 
      <td width="24%" background="fundotab.gif"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Repita a Senha</font>
      </td>
      <td width="76%" background="fundotab.gif"> 
        <input type="password" name="confirmacao" size="12" maxlength="12">
      </td>
    </tr>
    <tr> 
      <td width="24%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Nivel:(0-5)</font>
      </td>
      <td width="76%"> 
        <input type="text" name="nivel" size="1" maxlength="1" >
      </td>
    </tr>
    <tr> 
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      
      <!- Dados do usuário--> 
      <td colspan="2"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Preencha os campos abaixo com os seus dados:</font>
      </td>
    </tr>
    <tr> 
      <td width="24%" background="fundotab.gif"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Nome</font>
      </td>
      <td width="76%" background="fundotab.gif"> 
        <input type="text" name="nome" size="35" maxlength="50">
      </td>
    </tr>
    <tr> 
      <td width="24%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">E-mail</font>
      </td>
      <td width="76%"> 
        <input type="text" name="email" size="35" maxlength="50">
      </td>
    </tr>
    <tr> 
      <td width="24%" background="fundotab.gif"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Institui&ccedil;&atilde;o</font>
      </td>
      <td width="76%" background="fundotab.gif"> 
        <input type="text" name="instituicao" size="35" maxlength="50">
      </td>
    </tr>
    <tr> 
      <td width="24%" height="37" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="76%" height="37" bgcolor="#FFFFFF"> 
        <div align="right"> 
          <input type="submit" onClick="return TestarBranco(this.form);" value="Enviar">
        </div>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
<% end if%>
