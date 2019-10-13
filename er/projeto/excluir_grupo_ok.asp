<%if session("login")="ok" then %>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">
<%
  ' Variavel local
  Dim codigo_grupo
  
  ' Resgata o codigo do grupo e armazena em uma variavel local para efetuar a exclusão
  codigo_grupo = Request.Form("grupo")

  ' Instancia uma conexão com o banco de dados ER
  Set conntemp = Server.CreateObject("adodb.connection")
  conntemp.open "er","",""

  ExcluirGrupo = "DELETE FROM Grupos WHERE codigo="&codigo_grupo&" "
  Set RSexcluir = conntemp.Execute(ExcluirGrupo)
%>
<%
  Set RSconfirmar = Server.CreateObject("adodb.Recordset")
  RSconfirmar.open "SELECT * FROM agrupamentos WHERE grupo = '"&codigo_grupo&"' ", conntemp,3,3
  If (RSconfirmar.Recordcount = 0) Then
%>
  <h1><center>Grupo foi excluído com sucesso.</center></h1>
<%else%>
  Não foi possível efetuar a exclusão.
<%end if%>
<%conntemp.close%>
<center>
    <a href="JavaScript:window.history.go(-2)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center>
</body>
</html>
<%end if%>