<html>
<head>
<title>Insere not�cia no bd</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<!- Insere a not�cia e t�tulo no banco de dados-->
<body bgcolor="#FFFFFF">
<%
  Dim news
  Dim titnews
    
  news    = Request.Form("noticia")
  titnews = Request.Form("titulo")
  idioma  = Request.Form("idioma")
  data = (day(now())*1000000+month(now())*10000+year(now()))

  ' Conex�o com o banco
  set conntemp=server.createobject("adodb.connection")
  conntemp.open "er"
  
  if idioma = "port" Then
     ' Insere a not�cia, t�tulo e data no banco de dados 
     Set RSnews = conntemp.execute("insert into noticias (titulo, noticia, data, ingles) values ('"&titnews&"', '"&news&"', '"&data&"', 0)")
  else
     ' Insere a not�cia, t�tulo e data no banco de dados 
     Set RSnews = conntemp.execute("insert into noticias (titulo, noticia, data, ingles) values ('"&titnews&"', '"&news&"', '"&data&"', 1)")
  end if

 conntemp.close  
%>
<br>
<font face="Georgia, Times New Roman, Times, serif"><b>Sua not�cia foi enviada 
com sucesso.</b></font>
<center>
    <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center> 
</body>
</html>
