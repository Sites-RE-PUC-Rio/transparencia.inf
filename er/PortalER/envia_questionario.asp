<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">
<%
  p1 = Request.Form("pergunta1")
  p2 = Request.Form("pergunta2")
  p3 = Request.Form("pergunta3")
  p4 = Request.Form("pergunta4")
  p5 = Request.Form("pergunta5")
  p6 = Request.Form("pergunta6")
  p7 = Request.Form("pergunta7")
  p8 = Request.Form("pergunta8")
  p9 = Request.Form("pergunta9")
  p10 = Request.Form("pergunta10")
  p11 = Request.Form("pergunta11")
  p12 = Request.Form("pergunta12")
  outros = Request.Form("outros")
  p13 = Request.Form("pergunta13")
  email = Request.Form("email") 

  ' Conexão com o banco
  set conntemp = Server.CreateObject("adodb.connection")
  conntemp.open "questionario"
 
  Set RSquest=conntemp.execute("INSERT INTO questionario (pergunta1, pergunta2, pergunta3, pergunta4, pergunta5, pergunta6, pergunta7, pergunta8, pergunta9, pergunta10, pergunta11, pergunta12, pergunta13, outros, email) values ( "&p1&", "&p2&", "&p3&", "&p4&", "&p5&", "&p6&", "&p7&", "&p8&", "&p9&", "&p10&", "&p11&", "&p12&", '"&p13&"', '"&outros&"', '"&email&"') ")
%>
Seu questionário foi enviado com sucesso.
<% 
 conntemp.close
%>
<center>
    <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center>
</body>
</html>
