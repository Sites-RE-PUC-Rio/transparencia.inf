<%if session("login")="ok" then %>
<html>
<head>
<title>Busca</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<!- Faz uma busca de palavras chaves em diversas ferramentas de busca da Web-->
<body bgcolor="#FFFFFF">
<br>
<center>
  <table width="38%" border="1">
    <tr bgcolor="#336699" valign="top"> 
      <td colspan="3" height="17"><b><i><font size="4" color="#FFFFFF">Busca</font></i></b> 
      </td>
    </tr>
    <!- Busca no Altavista--> 
    <form action="http://www.altavista.digital.com/cgi-bin/query" method="get">
      <tr> 
        <td height="37" width="36%">
          <div align="center"><img src="/projeto/altavist.gif" width="100" height="27"></div>
        </td>
        <td height="37" width="47%"> 
          <div align="center"> 
            <input type="text" name="q" size="40" maxlength="200">
          </div>
        </td>
        <td height="37" width="17%"> 
          <input type="hidden" name="what" value="web">
          <input type="hidden" name="fmt" value="0">
          <input type="submit" value="procurar">
        </td>
      </tr>
    </form>
    <!- Busca no Aonde--> 
    <form action="http://www.aonde.com/cgi/consulta.cgi" method="get">
      <tr> 
        <td width="36%" height="39">
          <div align="center"><img src="/projeto/aondeb.gif" width="103" height="33"></div>
        </td>
        <td width="47%" height="39"> 
          <div align="center"> 
            <input type="text" name="keys" size="40">
          </div>
        </td>
        <td width="17%" height="39"> 
          <input type="submit" value="procurar">
        </td>
      </tr>
    </form>
    <!- Busca no cade--> 
    <form action="http://busca.cade.com.br/scripts/engine.exe" method="get">
      <tr valign="middle"> 
        <td width="36%" height="47">
          <div align="center"><img src="/projeto/cade.gif" width="126" height="40"></div>
        </td>
        <td width="47%" height="47"> 
          <div align="center"> 
            <input type="text" name="p1" size="40" maxlength="200">
          </div>
        </td>
        <td width="17%" height="47"> 
          <input type="submit" value="procurar">
        </td>
      </tr>
    </form>
    <!- Busca no Yahoo --> 
    <form action="http://search.yahoo.com/bin/search" method="get">
      <tr> 
        <td width="36%" height="44">
          <div align="center"><img src="/projeto/yahoo.gif" width="100" height="21"></div>
        </td>
        <td width="47%" height="44"> 
          <div align="center"> 
            <input type="text" name="p" size="40" maxlength="200">
          </div>
        </td>
        <td width="17%" height="44"> 
          <input type="hidden" name="s" value="o">
          <input type="hidden" name="n" value="25">
          <input type="submit" value="procurar">
        </td>
      </tr>
    </form>
    <!- Busca BR --> 
    <form action="http://brbrasil.com.br/cgi-bin/brbusca/brbusca.cgi" method="get">
      <tr> 
        <td width="36%" height="44"> 
          <div align="center"><img src="logo_buscabr.jpg" width="80" height="50"></div>
        </td>
        <td width="47%" height="44"> 
          <input type="text" name="query" size="40" maxlength="200">
        </td>
        <td width="17%" height="44"> 
          <input type="hidden" name="where" value="web">
          <input type="hidden" name="match" value="any">
          <input type="hidden" name="sum" value="n%3An">
          <input type="hidden" name="pp" value="10">
          <input type="submit" value="procurar" name="submit">
        </td>
      </tr>
	  </form>
	  <form action="http://www.todobr.com.br/cgi-bin/query.cgi" method="get">
      <tr>
        <td width="36%" height="44"><img src="logo_todobr.gif" width="148" height="62"></td>
        <td width="47%" height="44">
          <input type="text" name="query" size="40" maxlength="200">
        </td>
        <td width="17%" height="44">
		  <input type="hidden" name="estado" value="255">
          <input type="hidden" name="and_or" value="0">
          <input type="hidden" name="items_per_page" value="10">
          <input type="submit" value="procurar" name="submit">
		</td>
      </tr>
    </form>
  </table>
</center>
<center>
    <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center>
</body>
</html>
<%else%>
  <font size="2">Esta sessão foi encerrada.<br>
	Clique <a href="index.html" target="_top">aqui</a> para iniciar nova sessão.</font>
<%end if%>
