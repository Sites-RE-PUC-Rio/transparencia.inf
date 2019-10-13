<%if session("login")="ok" then %>
<html>
<head>
<title>Alterar Usuário</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<!- Captura o login do usuário que se deseja alterar -->
<body bgcolor="#FFFFFF">

<p>&nbsp;</p>
<center>
<p><b>Por favor, entre com 
  o login do usu&aacute;rio:</b></p>

<!- Envia o formulário para a página alterar_usuario_exibe.asp -->
<form action="alterar_usuario_exibe.asp" method="post">
    <p>Login: <input type="text" name="login">
    </p>
    <p><input type="submit" value="Confirmar">
    </p>
  </form>
</center>
<p>&nbsp;</p>
</body>
</html>
<% end if %>