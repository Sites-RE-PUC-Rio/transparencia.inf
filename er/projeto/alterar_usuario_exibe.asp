<%if session("login")="ok" then %>
<%
 ' Variaveis locais
 Dim login_usuario
  
 ' Resgata o valor passado na p�gina anterior e coloca numa variavel local
 login_usuario = Request.Form("login")

%>
<html>
<head>
<title>Exibir Usu�rio - Altera��o</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script language="JavaScript">
<!--
function TestarBranco(form)
{ 
nome         = form.tnome.value;
senha        = form.tsenha.value;
instituicao  = form.tinstituicao.value;
email        = form.temail.value;
nivel        = form.tnivel.value;

  if ((nome == ""))
    { 
      alert ("Por favor, digite o nome.") 
      form.tnome.focus() 
      return false;
    }
  if ((senha == ""))
    { 
      alert ("Por favor, digite a senha.") 
      form.tsenha.focus() 
      return false;
    }
  if ((instituicao == ""))   
    { 
      alert ("Por favor, digite a institui��o.") 
      form.tinstituicao.focus() 
      return false;
    }
  if ((email == ""))
    { 
      alert ("Por favor, digite o email.") 
      form.temail.focus() 
      return false;
    }
  if ((nivel == ""))
    { 
      alert ("Por favor, digite o n�vel.") 
      form.tnivel.focus() 
      return false;
    } 
}

//-->
</SCRIPT>
<!- Exibe os dados do usu�rio para altera��o -->
<body bgcolor="#FFFFFF">
<%
  ' Instancia uma conex�o com o banco de dados ER
  Set conntemp = Server.CreateObject("adodb.connection")
  conntemp.open "er","",""


  login_existe = "SELECT login FROM Senhas WHERE login = '"&login_usuario&"' "
  Set RSlogin = conntemp.Execute(login_existe)
If not RSlogin.EOF then
     
   'Seleciona dados do usu�rio
   Sel = "SELECT nome, senha, instituicao, email, nivel FROM Senhas WHERE login = '"&login_usuario&"' "
   Set RSdados = Conntemp.Execute(Sel)
%>

<div align="center">
  <p><b><font face="Georgia, Times New Roman, Times, serif" size="4">Os dados 
    atuais do usu�rio de login <%= login_usuario%> s�o:</font></b></p>
  <p><br>
    <b>Nome: <%= RSdados("nome") %><br>
    Senha: <%= RSdados("senha") %><br>
    Institui��o: <%= RSdados("instituicao")%><br>
    E-mail: <%= RSdados("email") %><br>
    N�vel: <%= RSdados("nivel") %></b><br>
  </p>

  <!- Envia formul�rio com os novos dados do usu�rio para alterar_usuario_bd.asp -->
  <form name="alterar" method="post" action="alterar_usuario_bd.asp" >
    <table width="75%" border="0" background="fundotab.gif">
      <tr> 
        <td><b>Nome:</b></td>
        <td> 
          <input type="text" name="tnome" value="<%= RSdados("nome")%>" maxlength="30" size="30">
        </td>
      </tr>
      <tr> 
        <td><b>Senha:</b></td>
        <td> 
          <input type="text" name="tsenha" value="<%= RSdados("senha")%>" maxlength="12" size="12">
        </td>
      </tr>
      <tr> 
        <td><b>Institui&ccedil;&atilde;o:</b></td>
        <td> 
          <input type="text" name="tinstituicao" value="<%= RSdados("instituicao")%>" maxlength="30" size="30">
        </td>
      </tr>
      <tr> 
        <td><b>E-mail: </b></td>
        <td> 
          <input type="text" name="temail" value="<%= RSdados("email")%>" maxlength="30" size="30">
        </td>
      </tr>
      <tr> 
        <td><b>N&iacute;vel: </b></td>
        <td> 
          <input type="text" name="tnivel" value="<%= RSdados("nivel")%>" maxlength="1" size="1">
        </td>
      </tr>
    </table>
    <p> 
      <input type="submit" onClick="return TestarBranco(this.form);" value="Confirmar">
    </p>
    <p>
      <input type="hidden" name="tlogin" value="<%=login_usuario%>">
    </p>
    <p>&nbsp; </p>
    <p>&nbsp;</p>
  </form>
  <p>&nbsp; </p>
</div>
<% else %>

<!- Caso o usu�rio n�o exista -->  
<center>
  <h1>Usu&aacute;rio Inexistente</h1>
  <font face="Verdana, Arial, Helvetica, sans-serif" size="2">Este usu�rio n�o existe. 
Clique <a href="javascript:window.history.go(-1)">aqui</a> para voltar e escolher um novo usu�rio.</font>
</center>
<% end if %>
</body>
</html>
<% end if %>