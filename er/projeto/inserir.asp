<%if session("login")="ok" then %>
<html>
<head>
  <title>Insere mensagem do administrador no banco de dados</title>
</head>

<body bgcolor="#FFFFFF">

<!-Recebe dados da mensagem e a insere no banco de dados -->
<%
  ' Declaração de variaveis locais
  Dim nome
  Dim email
  Dim message
  
  ' Estabelecendo os valores da variaveis locais como os valores das variaveis passadas
  ' pelo formulário pela página anterior
  nome     = Request.Form("nome_usuario")
  email    = Request.Form("email_usuario")
  mensagem = Request.Form("msg")
  data     = (day(now())*1000000+month(now())*10000+year(now())) 

   if ( len(data) ) < 8 then

   data = "0" & data

   end if 
   
  ' Instanciar uma conexão com o banco de dados ER
  Set conntemp = Server.CreateObject("adodb.connection")
  conntemp.open "er"

  ' Insere mensagem, nome, data e email no banco de dados ER na tabela ermsg
  ' (tabela de mensagens) 
  Set RSmsg=conntemp.execute("INSERT INTO ermsg (nome, email, msg, data) VALUES ('"&nome&"','"&email&"','"&mensagem&"','"&data&"') ")
%>
  
<%conntemp.close%>
 <center> 
<p><h2>Mensagem enviada com sucesso.</h2>

<!- Exibe todas as mensagens escritas -->
<form action="../mostrar_msgs.asp" method="post">
  <input type="submit" value="Ler Mensagens">
</form>
</center>
<p>&nbsp;</p>
<center>
    <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center> 
</body>
</html>
<%end if%>