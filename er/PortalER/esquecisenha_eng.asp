<%LANGUAGE="VBSCRIPT" %>
<HTML>
<HEAD><TITLE>Engenharia de Requisitos</TITLE>
</HEAD>
<BODY>
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
strSubject = "Forgot my password"
strBody = "  Dear "&RS("nome")&" , as it was asked we are sending your password, please fell free to change if you want.Your password is  "&RS("senha")&" , please put it in a safe place."
'Copia escondida para equipePER
objNewMail.Bcc = strBCC
objNewMail.Send strSender, strReceiver, strSubject, strBody
%>
<%conntemp.Close%>
<br><br><center>
  <p>E-mail successful send.</p>
  <a href = "javascript:window.history.go(-1)">Back</a> 
  <p>&nbsp;</p>
</center>

</BODY>
</HTML>