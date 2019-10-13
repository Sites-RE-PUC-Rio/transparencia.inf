<%if session("login")="ok" then %>
<html>
<head>
<title>Listar usuários de um grupo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<!- Lista os usuários de um determinado grupo -->
<body bgcolor="#FFFFFF">
<%
   ' Variaveis locais
   Dim grupo  
   Dim login_usuario

  ' Resgata o valor do codigo do grupo que é passado na página anterior e armazena em uma variavel local 
  grupo = Request.Form("grupo")  
  
  ' Instancia uma conexão com o banco de dados ER
  Set conntemp = Server.CreateObject("adodb.connection")
  conntemp.open "er","",""

  Set RSlistar = Server.CreateObject("adodb.recordset")
  RSlistar.open "SELECT * FROM agrupamentos WHERE grupo = '"&grupo&"' ", conntemp,3,3
  
  count = RSlistar.RecordCount
  
  ' Caso não ache nenhum usuário 
  If (RSlistar.RecordCount) = 0 then %>
   <center>
  <h1>Não há usuários neste grupo</h1>
  <%else%> <%RSlistar.MoveLast%> 
</center><br>
<table width="100%" border="0">
    <tr> 
      <td> 
        <div align="center"><b><font size="5">Gerenciador de grupos - (listar 
          usu&aacute;rios)</font></b></div>
      </td>
    </tr>
</table>   
<table width="100%" border="0">
  <tr>
    <td width="15%"> 
      <div align="left"><b>Login</b></div>
    </td>
    <td width="44%"> 
      <div align="left"><b>Nome</b></div>
    </td>
    <td width="33%"> 
      <div align="left"><b>e-mail</b></div>
    </td>
    <td width="8%"> 
      <div align="left"><b>n&iacute;vel</b></div>
    </td>
  </tr>
</table>
<!- Exibe usuários -->
<%do while (not count = 0)%>
<%If (RSlistar.fields(1).value = grupo) Then %> 
<%
   login_usuario = RSlistar.fields(0).value

   Sel = "SELECT nome, email, nivel FROM Senhas WHERE login = '"&login_usuario&"' "
   Set RSdados = Conntemp.Execute(Sel)
   
   %> 
<table width="99%" border="0" background="fundotab.gif">
  <tr> 
    <td width="15%"><% = RSlistar.fields(0).value %> 
      <div align="center"></div>
    </td>
    <td width="44%"><% = RSdados("nome")%> 
      <div align="center"><br>
      </div>
    </td>
    <td width="34%"><% = RSdados("email")%> 
      <div align="center"><br>
      </div>
    </td>
    <td width="7%"><% = RSdados("nivel")%> 
      <div align="center"></div>
    </td>
  </tr>
</table>
  
<p><br>
  <%count=count-1 
     RSlistar.MovePrevious %>
  <%end if%>
    <%loop%>
       <%end if%>
         <%end if%> </p>
<center>
  <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a> 
</center>
<p>&nbsp;</p>
</body>
</html>
 