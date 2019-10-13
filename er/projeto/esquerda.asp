<%if session("login")="ok" then %>
<html>
<head>
<!- Estilo da página-->
<title>Opcoes</title>
<style>
<!--
       A:link    { color: #FFFFFF; text-decoration: none; ; font-family: Arial, Helvetica, sans-serif; font-size: 10pt; font-style: normal}
       A:visited { color: #FFFFFF; text-decoration: none; ; font-family: Arial, Helvetica, sans-serif; font-size: 10pt; font-style: normal}
       A:active  { color: #FFFFFF; text-decoration: none; ; font-family: Arial, Helvetica, sans-serif; font-size: 10pt; font-style: normal}
       A:hover   { color: #CCCCCC; ; font-family: Arial, Helvetica, sans-serif; font-size: 10pt; font-style: normal; text-decoration: none}
   -->

</style>
</head>

<body bgcolor="#000066">
<!- Frame Esquerdo da página(sempre visível)-->
<!- Tabela com os links do frame esquerdo-->
<table width="75%" border="0">
  <tr> 
    <td> 
      <p><a href="canallivre.asp" target="central"><font size="3" face="Georgia, Times New Roman, Times, serif">EDITAR 
        CANAL LIVRE</font></a></p>
    </td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td> 
      <p><a href="usuarios.asp" target="central"><font face="Georgia, Times New Roman, Times, serif" size="3">GERENCIADOR 
        DE USU&Aacute;RIOS</font></a></p>
    </td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td> 
      <p><font face="Georgia, Times New Roman, Times, serif"><a href="opcoes_grupo.asp" target="central">GERENCIADOR 
        DE GRUPOS</a></font></p>
    </td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td> 
      <p><font face="Georgia, Times New Roman, Times, serif"><a href="busca.asp" target="central"><font size="3">BUSCA</font></a></font></p>
    </td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td> 
      <p><font face="Georgia, Times New Roman, Times, serif"><a href="dados.asp" target="central"><font size="3">DADOS 
        DO PORTAL</font></a> </font></p>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td><font face="Georgia, Times New Roman, Times, serif"><a href="ger_noticia.asp" target="central"><font size="3">NOT&Iacute;CIAS 
      </font></a></font></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td> 
      <p><font face="Georgia, Times New Roman, Times, serif" size="3"><a href="central.asp" target="central">PRINCIPAL</a></font></p>
    </td>
  </tr>
</table>
</body>
</html>
<% end if %>
