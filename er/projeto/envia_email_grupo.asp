<%if session("login")="ok" then %>
<html>
<head>
<title>Envia e-mail para grupo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">
<%
  'Variaveis locais
  Dim objNewMail
  Dim strBCC
  Dim strBody
  Dim strSender
  Dim strReceiver
  Dim strSubject
  Dim count
  
  ' Resgata todos os dados entrados pelo administrador na página anterior e armazena em variaveis locais
  grupo    = Request.Form("grupo")
  assunto  = Request.Form("assunto")
  mensagem = Request.Form("msg")
  selecao  = Request.Form("remetente")
  emailto  = Request.Form("emailuser") 
 
  ' Instancia uma conexão com o banco de dados ER
  Set conntemp = Server.CreateObject("adodb.connection")
  conntemp.open "er","",""

  'Instancia um objeto NewMail
  Set objNewMail = Server.CreateObject("CDONTS.NewMail")

  objNewMail.BodyFormat = cdoBodyFormatTEXT
  strBCC = "per@les.inf.puc-rio.br" 

  If (selecao = "adm") Then
    strSender = "per@les.inf.puc-rio.br"
  else
    ' Caso o remetente não seja o Administrador
    strSender = emailto
  end if

  strReceiver = ""  
  strSubject = assunto
  strBody = mensagem
  
  Set RSmail = Server.CreateObject("adodb.Recordset")
  RSmail.open "SELECT * FROM Agrupamentos WHERE grupo = '"&grupo&"'", conntemp,3,3%>
  <% If (RSmail.Recordcount > 0) Then %>
  <% RSmail.MoveLast %>	
  <% count = RSmail.RecordCount %>
  <% do while (not count = 0) %>
  <%
    Set RSuser = Server.CreateObject("adodb.Recordset")
    RSuser.open "SELECT * FROM Senhas WHERE login = '"&RSmail.fields(0).value&"' ", conntemp,3,3  
  %>
  <%
	If (not count = 1) Then
      strReceiver = strReceiver&RSuser.fields(4).value&";"
    else 
      strReceiver = strReceiver&RSuser.fields(4).value 
    end if %>
  <% count=count-1 
     RSmail.MovePrevious
     loop %>
  <%end if%>
<%  
  'Copia escondida para equipePER
  objNewMail.Bcc = strBCC
  objNewMail.Send strSender, strReceiver, strSubject, strBody %>
E-mail enviado com sucesso.
<%conntemp.close%>
</body>
</html>
<%end if%>