<html>
<head>
  <title>dbfull1.asp</title>
</head>
<body bgcolor="#FFFFFF">
  <%
  Dim nome
  Dim email
  Dim message
  

  nome    = Request.Form("nome_usuario")
  email   = Request.Form("email_usuario")
  message = Request.Form("textarea")
  data    = (day(now())*1000000+month(now())*10000+year(now())) 
  if ( len(data) ) < 8 then

   data = "0" & data

   end if 

  
   
  ' Conexão com o banco
  set conntemp=server.createobject("adodb.connection")
  conntemp.open "er"
   'set RSmsg=conntemp.execute("insert into ermsg (msg, data) values ('"&message&"','"&data&"')")
   set RSmsg=conntemp.execute("insert into ermsg (nome, email, msg, data) values ('"&nome&"','"&email&"','"&message&"','"&data&"')")
  %>
  
  <%conntemp.close%>
 <center> 
<p><h2>Mensagem enviada com sucesso. </h2>
<form name="Ver mensagens" action="mostrar_msgs.asp" method="post">
  <input type="submit" name="Button" value="Ler Mensagens">
</form>
</center>
<p>&nbsp;</p>
</body>
</html>
