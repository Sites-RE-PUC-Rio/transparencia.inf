<%LANGUAGE="VBSCRIPT" %>
<HTML>
<HEAD><TITLE>Engenharia de Requisitos</TITLE>
</HEAD>
<body bgcolor="#FFFFFF" topmargin="0">
<table width="100%" border="0" background="fig25.GIF">
  <tr> 
    <td height="27"><font size="4"><font face="Verdana, Arial, Helvetica, sans-serif"><b>Envio 
      de senha esquecida<font size="3"></font></b></font></font></td>
  </tr>
</table><br><br>
<%
'Variaveis locais
Dim objNewMail
Dim strBCC
Dim strBody
Dim strSender
Dim strReceiver
Dim strSubject
Dim email

email = Request.Form("emailto")
'Instancia uma conexao com o Banco de Dados
Set conntemp = Server.CreateObject("ADODB.Connection")

'Abre a conexao com o Banco de Dados
conntemp.Open "er"

Sel = "SELECT nome, senha FROM Senhas WHERE email = '"&email&"' "
Set RS = Conntemp.Execute(Sel)

'Instancia um objeto NewMail
Set objNewMail = Server.CreateObject("CDONTS.NewMail")

objNewMail.BodyFormat = cdoBodyFormatTEXT
strBCC = "per@les.inf.puc-rio.br"
strSender = "per@les.inf.puc-rio.br"
strReceiver = email
strSubject = "Esqueci minha senha"
strBody = "  Prezado "&RS("nome")&" , de acordo com o solicitado estamos enviando sua senha, por favor sinta-se a vontade para muda-la se assim o desejar. Sua senha é '"&RS("senha")&"' , por favor anote em um lugar seguro."
'Copia escondida para equipePER
objNewMail.Bcc = strBCC
objNewMail.Send strSender, strReceiver, strSubject, strBody
%>
<%conntemp.Close%>
<br><br><center>
  <font face="Verdana, Arial, Helvetica, sans-serif" size="3">E-mail enviado com 
  sucesso.</font> 
</center>
<br><br><center>
  <a href="javascript:window.history.go(-1)"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><img src="voltar.gif" width="121" height="55" border="0"></font></a> 
</center>

</BODY>
</HTML>