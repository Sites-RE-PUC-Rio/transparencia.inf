<%if session("login")="ok" then %>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script language="JavaScript">
<!--
function TestarBranco(form)
{ 
 assunto   = form.assunto.value;
 msg       = form.msg.value;
 remetente = form.remetente.value;
 email     = form.emailuser.value;

  if ((assunto == ""))
    { 
      alert ("Por favor, digite o assunto.") 
      form.assunto.focus() 
      return false;
    }
  if ((msg == ""))
    { 
      alert ("Por favor, digite a mensagem.") 
      form.msg.focus() 
      return false;
    }
  if ((if (remetente="user") && (email="") ) 
    { 
      alert ("Por favor, digite o remetente.") 
      form.remetente.focus() 
      return false;
    }
}

//-->
</SCRIPT>
<body bgcolor="#FFFFFF">
<%
  ' Variaveis locais 
  Dim login_usuario
  Dim count
   
  ' Resgata o valor de login passado na página anterior e armazena em uma variavel local
  login_usuario = Request.Form("login")
%> 
<% 
  ' Instancia uma conexão com o banco de dados ER
  Set conntemp = Server.CreateObject("adodb.connection")
  conntemp.open "er","",""
%>
<form action="envia_email_grupo.asp" method="post">
  <table width="100%" border="0" align="center">
    <tr> 
      <td colspan="3"> 
        <div align="center"><font size="5"><b>Enviar e-mail para um grupo</b></font></div>
      </td>
    </tr>
    <tr> 
      <td width="13%" height="37"><i>Grupo:</i></td>
      <td colspan="2" height="37"> <%
        Set RSgrupos = Server.CreateObject("adodb.Recordset")
        RSgrupos.open "SELECT * FROM Grupos", conntemp,3,3 %> <% If (RSgrupos.Recordcount > 0)  Then %> 
        <select name="grupo">
          <% RSgrupos.MoveLast %> <% count = RSgrupos.RecordCount %> <% do while (not count = 0) %> 
          <!- Captura o nome dos grupos na tabela Grupos no banco de dados e coloca como opcao para o administrador, de acordo com a selecao é enviado o codigo do grupo para a proxima página efetuar a inserção do novo grupo --> 
          <option value="<%=RSgrupos.fields(0).value%>"> <%=RSgrupos.fields(1).value%> 
          </option>
          <% count=count-1 
   		   RSgrupos.MovePrevious
      	   loop %> 
        </select>
        <%else%> Não há nenhum grupo criado. <%end if%> </td>
    </tr>
    <tr> 
      <td width="13%"><i>Assunto:</i></td>
      <td colspan="2"> 
        <input type="text" name="assunto" maxlength="50">
      </td>
    </tr>
    <tr> 
      <td width="13%" valign="top"><i>Mensagem:</i></td>
      <td colspan="2"> 
        <textarea name="msg" rows="10" cols="50"></textarea>
      </td>
    </tr>
    <tr> 
      <td width="13%">&nbsp;</td>
      <td width="64%">&nbsp;</td>
      <td width="23%"> 
        <input type="submit" onClick="return TestarBranco(this.form);" value="Enviar">
      </td>
    </tr>
  </table>
  <table width="100%" border="0" align="center">
    <tr>
      <td width="58%" height="35"><i>Selecione o remetente desta mensagem:</i></td>
      <td width="42%" height="35"> 
        <input type="radio" name="remetente" value="adm" checked> 	   Administrador
       &nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="radio" name="remetente" value="user">
       E-mail abaixo
    </td>
  </tr>
  <tr>
    <td width="58%"><i>Caso queira que o seu e-mail conste como o remetente da 
      mensagem, preencha o campo ao lado:</i></td>
    <td width="42%"> 
      <input type="text" name="emailuser" maxlength="50">
    </td>
  </tr>
</table>
</form>
<% conntemp.close %>
</body>
</html>
<%end if%>