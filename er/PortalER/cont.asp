<html>
<head>
    <title>Teste</title>
<head>

<body>
<%

' Conexão com o banco
  Set Con = Server.CreateObject("ADODB.Connection")
  Con.open "er"

  SQL = "SELECT contador from Contador"
  Set RS = Con.Execute(SQL)
  cont =  RS("nome")
  cont = cont + 1
  set RSalterasenha=conntemp.execute("UPDATE Contador set contador = " + cont)

%>
<%=cont%>

</body>
</html>