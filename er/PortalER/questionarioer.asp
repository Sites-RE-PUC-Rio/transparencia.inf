<html>
<head>
<title>Engenharia de Requisitos - Question�rio</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<META HTTP-EQUIV="pragma" CONTENT="no-cache">
</head>
<script language="JavaScript">
<!--

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function TestarBranco(form)
{
  email = form.email.value
  outros = form.outros.value

  if ((!(form.pergunta1[0].checked)) && (!(form.pergunta1[1].checked)) &&
	  (!(form.pergunta1[2].checked)) && (!(form.pergunta1[3].checked)) &&
	  (!(form.pergunta1[4].checked)))
    { alert ("Por favor, responda a pergunta 1.")
      return false;}
  if ((!(form.pergunta2[0].checked)) && (!(form.pergunta2[1].checked)) &&
	  (!(form.pergunta2[2].checked)) && (!(form.pergunta2[3].checked)) &&
	  (!(form.pergunta2[4].checked)))
    { alert ("Por favor, responda a pergunta 2.")
      return false;}
  if ((!(form.pergunta3[0].checked)) && (!(form.pergunta3[1].checked)) &&
	  (!(form.pergunta3[2].checked)) && (!(form.pergunta3[3].checked)) &&
	  (!(form.pergunta3[4].checked)))
    { alert ("Por favor, responda a pergunta 3.")
      return false;}
  if ((!(form.pergunta4[0].checked)) && (!(form.pergunta4[1].checked)) &&
	  (!(form.pergunta4[2].checked)) && (!(form.pergunta4[3].checked)) &&
	  (!(form.pergunta4[4].checked)))
    { alert ("Por favor, responda a pergunta 4.")
      return false;}
  if ((!(form.pergunta5[0].checked)) && (!(form.pergunta5[1].checked)) &&
	  (!(form.pergunta5[2].checked)) && (!(form.pergunta5[3].checked)) &&
	  (!(form.pergunta5[4].checked)))
    { alert ("Por favor, responda a pergunta 5.")
      return false;}
  if ((!(form.pergunta6[0].checked)) && (!(form.pergunta6[1].checked)) &&
	  (!(form.pergunta6[2].checked)) && (!(form.pergunta6[3].checked)) &&
	  (!(form.pergunta6[4].checked)))
    { alert ("Por favor, responda a pergunta 6.")
      return false;}
  if ((!(form.pergunta7[0].checked)) && (!(form.pergunta7[1].checked)) &&
	  (!(form.pergunta7[2].checked)) && (!(form.pergunta7[3].checked)) &&
	  (!(form.pergunta7[4].checked)))
    { alert ("Por favor, responda a pergunta 7.")
      return false;}
  if ((!(form.pergunta8[0].checked)) && (!(form.pergunta8[1].checked)) &&
	  (!(form.pergunta8[2].checked)) && (!(form.pergunta8[3].checked)) &&
	  (!(form.pergunta8[4].checked)))
    { alert ("Por favor, responda a pergunta 8.")
      return false;}
  if ((!(form.pergunta9[0].checked)) && (!(form.pergunta9[1].checked)) &&
	  (!(form.pergunta9[2].checked)) && (!(form.pergunta9[3].checked)) &&
	  (!(form.pergunta9[4].checked)))
    { alert ("Por favor, responda a pergunta 9.")
      return false;}
  if ((!(form.pergunta10[0].checked)) && (!(form.pergunta10[1].checked)) &&
	  (!(form.pergunta10[2].checked)) && (!(form.pergunta10[3].checked)) &&
	  (!(form.pergunta10[4].checked)))
    { alert ("Por favor, responda a pergunta 10.")
      return false;}
  if ((!(form.pergunta11[0].checked)) && (!(form.pergunta11[1].checked)) &&
	  (!(form.pergunta11[2].checked)) && (!(form.pergunta11[3].checked)) &&
	  (!(form.pergunta11[4].checked)))
    { alert ("Por favor, responda a pergunta 11.")
      return false;}
  if ((!(form.pergunta12[0].checked)) && (!(form.pergunta12[1].checked)) &&
	  (!(form.pergunta12[2].checked)) && (!(form.pergunta12[3].checked)) &&
	  (!(form.pergunta12[4].checked)) && (!(form.pergunta12[5].checked)) &&
      (!(form.pergunta12[6].checked)))
    { alert ("Por favor, responda a pergunta 12.")
      return false;}

  if ((form.pergunta12[6].checked) && (outros == ""))
    { alert ("Por favor,escreva o nome da ferramenta ou t�cnica utilizada na pergunta 12.")
      form.outros.focus()
	  return false;}

  if ((email == ""))
    { alert ("Por favor, digite o seu email.")
      form.email.focus()
      return false;}
}
//-->
</SCRIPT>

<body bgcolor="#FFFFFF">
<p>&nbsp;</p><form action="envia_questionario.asp" method="post">
  <table width="100%" border="0" align="center">
    <tr>
      <td colspan="5">
        <div align="center"><b><font size="4">Question&aacute;rio de Engenharia
          de Requisitos</font></b></div>
      </td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5" height="26">1) <i>Como voc� acredita que o cliente percebe
        a entrega do sistema em rela��o as necessidades deles?</i> </td>
    </tr>
    <tr>
      <td height="26" colspan="5">
        <div align="center"><font size="2">Apresenta uma s&eacute;rie de problemas</font>&nbsp;&nbsp;&nbsp;
          <font size="2">1</font>
          <input type="radio" name="pergunta1" value="1">
          <font size="2">2 </font>
          <input type="radio" name="pergunta1" value="2">
          <font size="2">3</font>
          <input type="radio" name="pergunta1" value="3">
          <font size="2">4</font>
          <input type="radio" name="pergunta1" value="4">
          <font size="2">5</font>
          <input type="radio" name="pergunta1" value="5">
          &nbsp;&nbsp;&nbsp;<font size="2">Atende ao que foi solicitado</font></div>
      </td>
    </tr>
    <tr>
      <td colspan="5" height="11">
        <div align="right"><a href="#"
		onClick="MM_openBrWindow('http://139.82.24.188:9090/per/servlet/Teste1?perg=1) Como voc� acredita que o cliente percebe a entrega do sistema em rela��o as necessidades deles?&numero=pergunta1&quant=5','pergunta1','status=yes,width=320,height=280')">Resultado Parcial</a></div>

      </td>
    </tr>
    <tr>
      <td colspan="5" height="25">2) <i>Como voc� acredita que os clientes percebem
        a importancia da fase de levantamento de requisitos?</i> </td>
    </tr>
    <tr>
      <td colspan="5">
        <div align="center"><font size="2">Pouca valoriza&ccedil;&atilde;o</font>&nbsp;&nbsp;&nbsp;
          1
          <input type="radio" name="pergunta2" value="1">
          2
          <input type="radio" name="pergunta2" value="2">
          3
          <input type="radio" name="pergunta2" value="3">
          4
          <input type="radio" name="pergunta2" value="4">
          5
          <input type="radio" name="pergunta2" value="5">
          &nbsp;&nbsp;&nbsp;<font size="2">Valoriza intensamente</font></div>
      </td>
    </tr>
    <tr>
      <td colspan="5" height="10">&nbsp;
	  <div align="right"><a href="#"
		onClick="MM_openBrWindow('http://139.82.24.188:9090/per/servlet/Teste1?perg=2) Como voc� acredita que os clientes percebem a importancia da fase de levantamento de requisitos?&numero=pergunta2&quant=5','pergunta2','status=yes,width=320,height=280')">Resultado Parcial</a></div>

	  </td>

    </tr>
    <tr>
      <td colspan="5" height="25">3) <i>Os requisitos, quando precisam ser revistos
        ou consultados s�o</i>: </td>
    </tr>
    <tr>
      <td colspan="5">
        <div align="center"><font size="2">Dificilmente acess&iacute;veis</font>&nbsp;&nbsp;&nbsp;
          1
          <input type="radio" name="pergunta3" value="1">
          2
          <input type="radio" name="pergunta3" value="2">
          3
          <input type="radio" name="pergunta3" value="3">
          4
          <input type="radio" name="pergunta3" value="4">
          5
          <input type="radio" name="pergunta3" value="5">
          &nbsp;&nbsp;&nbsp;<font size="2">Facilmente acess&iacute;veis</font></div>
      </td>
    </tr>
    <tr>
      <td colspan="5" height="12">&nbsp;
	  <div align="right"><a href="#"
		onClick="MM_openBrWindow('http://139.82.24.188:9090/per/servlet/Teste1?perg=3) Os requisitos, quando precisam ser revistos ou consultados s�o: &numero=pergunta3&quant=5','pergunta3','status=yes,width=320,height=280')">Resultado Parcial</a></div>
	  </td>
    </tr>
    <tr>
      <td colspan="5">4) <i>Como voc� classificaria os procedimentos de sua organiza��o
        para identificar, coletar, armazenar, manter registros sobre controle
        de qualidade, com base nos requisitos, de forma que possam ser recuperados?</i>
      </td>
    </tr>
    <tr>
      <td colspan="5">
        <div align="center">Dificilmente acess&iacute;veis&nbsp;&nbsp;&nbsp; 1
          <input type="radio" name="pergunta4" value="1">
          2
          <input type="radio" name="pergunta4" value="2">
          3
          <input type="radio" name="pergunta4" value="3">
          4
          <input type="radio" name="pergunta4" value="4">
          5
          <input type="radio" name="pergunta4" value="5">
          &nbsp;&nbsp;&nbsp;Facilmente acess&iacute;veis</div>
      </td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;
	  <div align="right"><a href="#"
		onClick="MM_openBrWindow('http://139.82.24.188:9090/per/servlet/Teste1?perg=4) Como voc� classificaria os procedimentos de sua organiza��o para identificar, coletar, armazenar, manter registros sobre controle de qualidade, com base nos requisitos, de forma que possam ser recuperados?&numero=pergunta4&quant=5','pergunta4','status=yes,width=320,height=280')">Resultado Parcial</a></div>
	  </td>
    </tr>
    <tr>
      <td colspan="5">5) <i>De que maneira os requisitos do sistema s�o utilizados
        na sua organiza��o como base para o desenvolvimento de software?</i> </td>
    </tr>
    <tr>
      <td colspan="5">
        <div align="center">Pouco utilizados&nbsp;&nbsp;&nbsp; 1
          <input type="radio" name="pergunta5" value="1">
          2
          <input type="radio" name="pergunta5" value="2">
          3
          <input type="radio" name="pergunta5" value="3">
          4
          <input type="radio" name="pergunta5" value="4">
          5
          <input type="radio" name="pergunta5" value="5">
          &nbsp;&nbsp;&nbsp;Muito utilizados</div>
      </td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;
	  <div align="right"><a href="#"
		onClick="MM_openBrWindow('http://139.82.24.188:9090/per/servlet/Teste1?perg=5) De que maneira os requisitos do sistema s�o utilizados na sua organiza��o como base para o desenvolvimento de software?&numero=pergunta5&quant=5','pergunta5','status=yes,width=320,height=280')">Resultado Parcial</a></div>
	  </td>
    </tr>
    <tr>
      <td colspan="5">6) <i>Como voc� classifica o m�todo utilizado na sua organiza��o
        para o levantamento (elicita��o) de requisitos?</i> </td>
    </tr>
    <tr>
      <td colspan="5">
        <div align="center">Extremamente informal&nbsp;&nbsp;&nbsp; 1
          <input type="radio" name="pergunta6" value="1">
          2
          <input type="radio" name="pergunta6" value="2">
          3
          <input type="radio" name="pergunta6" value="3">
          4
          <input type="radio" name="pergunta6" value="4">
          5
          <input type="radio" name="pergunta6" value="5">
          &nbsp;&nbsp;&nbsp;Muito bem definido</div>
      </td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;
	  <div align="right"><a href="#"
		onClick="MM_openBrWindow('http://139.82.24.188:9090/per/servlet/Teste1?perg=6) Como voc� classifica o m�todo utilizado na sua organiza��o para o levantamento (elicita��o) de requisitos? &numero=pergunta6&quant=5','pergunta6','status=yes,width=320,height=280')">Resultado Parcial</a></div>
	  </td>
    </tr>
    <tr>
      <td colspan="5">7) <i>Durante o uso de um sistema ou durante sua constru��o
        � verificada uma altera��o nos requisitos. Essa altera��o</i>: </td>
    </tr>
    <tr>
      <td colspan="5">
        <div align="center">N&atilde;o &eacute; formalmente registrada&nbsp;&nbsp;&nbsp;
          1
          <input type="radio" name="pergunta7" value="1">
          2
          <input type="radio" name="pergunta7" value="2">
          3
          <input type="radio" name="pergunta7" value="3">
          4
          <input type="radio" name="pergunta7" value="4">
          5
          <input type="radio" name="pergunta7" value="5">
          &nbsp;&nbsp;&nbsp;&Eacute; registrada no documento de requisitos</div>
      </td>
    </tr>
    <tr>
      <td width="42%">
        <div align="center">
		</div>
      </td>
      <td colspan="3">&Eacute; registrada, mas n&atilde;o no documento de requisitos.</td>
      <td width="24%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5" height="14">&nbsp;
	  <div align="right"><a href="#"
		onClick="MM_openBrWindow('http://139.82.24.188:9090/per/servlet/Teste1?perg=7) Durante o uso de um sistema ou durante sua constru��o � verificada uma altera��o nos requisitos. Essa altera��o: &numero=pergunta7&quant=5','pergunta7','status=yes,width=320,height=280')">Resultado Parcial</a></div>
	  </td>
    </tr>
    <tr>
      <td colspan="5">8) <i>Como voce classifica o controle de qualidade feito
        sobre os requisitos?</i> </td>
    </tr>
    <tr>
      <td colspan="5">
        <div align="center">Inexistente&nbsp;&nbsp;&nbsp; 1
          <input type="radio" name="pergunta8" value="1">
          2
          <input type="radio" name="pergunta8" value="2">
          3
          <input type="radio" name="pergunta8" value="3">
          4
          <input type="radio" name="pergunta8" value="4">
          5
          <input type="radio" name="pergunta8" value="5">
          &nbsp;&nbsp;&nbsp;Muito bom</div>
      </td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;
	  <div align="right"><a href="#"
		onClick="MM_openBrWindow('http://139.82.24.188:9090/per/servlet/Teste1?perg=8) Como voce classifica o controle de qualidade feito sobre os requisitos? &numero=pergunta8&quant=5','pergunta8','status=yes,width=320,height=280')">Resultado Parcial</a></div>
	  </td>
    </tr>
    <tr>
      <td colspan="5">9) <i>Quanto do tempo total de um projeto � normalmente
        dedicado ao levantamento de requisitos?</i> </td>
    </tr>
    <tr>
      <td colspan="5">
        <div align="center">&nbsp;&nbsp;&nbsp; 0%
          <input type="radio" name="pergunta9" value="1">
          25%
          <input type="radio" name="pergunta9" value="2">
          50%
          <input type="radio" name="pergunta9" value="3">
          75%
          <input type="radio" name="pergunta9" value="4">
          100%
          <input type="radio" name="pergunta9" value="5">
          &nbsp;&nbsp;&nbsp;</div>
      </td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;
	  <div align="right"><a href="#"
		onClick="MM_openBrWindow('http://139.82.24.188:9090/per/servlet/Teste1?perg=9) Quanto do tempo total de um projeto � normalmente dedicado ao levantamento de requisitos? &numero=pergunta9&quant=5','pergunta9','status=yes,width=320,height=280')">Resultado Parcial</a></div>
	  </td>
    </tr>
    <tr>
      <td colspan="5">10) <i>Como voce classifica o treinamento existente em engenharia
        de requisitos na sua organiza��o?</i> </td>
    </tr>
    <tr>
      <td colspan="5" height="19">
        <div align="center">Inexistente&nbsp;&nbsp;&nbsp; 1
          <input type="radio" name="pergunta10" value="1">
          2
          <input type="radio" name="pergunta10" value="2">
          3
          <input type="radio" name="pergunta10" value="3">
          4
          <input type="radio" name="pergunta10" value="4">
          5
          <input type="radio" name="pergunta10" value="5">
          &nbsp;&nbsp;&nbsp;Muito bom</div>
      </td>
    </tr>
    <tr>
      <td height="15" colspan="2">&nbsp;</td>
      <td width="23%" height="15">&nbsp;&nbsp;Espor&aacute;dico</td>
      <td width="8%" height="15">&nbsp;</td>
      <td width="24%" height="15">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;
	  <div align="right"><a href="#"
		onClick="MM_openBrWindow('http://139.82.24.188:9090/per/servlet/Teste1?perg=10) Como voce classifica o treinamento existente em engenharia de requisitos na sua organiza��o? &numero=pergunta10&quant=5','pergunta10','status=yes,width=320,height=280')">Resultado Parcial</a></div>
	  </td>
    </tr>
    <tr>
      <td colspan="5">11) <i>Como voce classifica o uso de ferramentas para apoiar
        a defini��o de requisitos?</i> </td>
    </tr>
    <tr>
      <td colspan="5" height="26">
        <div align="center">Nenhuma ferramenta &eacute; utilizada&nbsp;&nbsp;&nbsp;
          1
          <input type="radio" name="pergunta11" value="1">
          2
          <input type="radio" name="pergunta11" value="2">
          3
          <input type="radio" name="pergunta11" value="3">
          4
          <input type="radio" name="pergunta11" value="4">
          5
          <input type="radio" name="pergunta11" value="5">
          &nbsp;&nbsp;&nbsp;Ferramentas espec&iacute;ficas</div>
      </td>
    </tr>
    <tr>
      <td height="21" colspan="2">&nbsp;</td>
      <td width="23%" height="21">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Editores
        de texto</td>
      <td width="8%" height="21">&nbsp;</td>
      <td width="24%" height="21">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5" height="11">&nbsp;
	  <div align="right"><a href="#"
		onClick="MM_openBrWindow('http://139.82.24.188:9090/per/servlet/Teste1?perg=11) Como voce classifica o uso de ferramentas para apoiar a defini��o de requisitos? &numero=pergunta11&quant=5','pergunta11','status=yes,width=320,height=280')">Resultado Parcial</a></div>
	  </td>
    </tr>
    <tr>
      <td colspan="5">12) <i>Marque abaixo quais t�cnicas/ferramentas que s�o
        utilizadas em sua empresa no processo de defini��o de requisitos</i>:
      </td>
    </tr>
    <tr>
      <td colspan="5" height="28">
        <div align="left">&nbsp;&nbsp;&nbsp;
          <input type="radio" name="pergunta12" value="1">
          <font size="2">Cen&aacute;rios</font>
          <input type="radio" name="pergunta12" value="2">
          <font size="2">JAD</font>
          <input type="radio" name="pergunta12" value="3">
          <font size="2">Casos de uso</font>
          <input type="radio" name="pergunta12" value="4">
          <font size="2">Doors</font>
          <input type="radio" name="pergunta12" value="5">
          <font size="2">Requisite-Pro</font>
          <input type="radio" name="pergunta12" value="6">
          <font size="2">Caliber-RM</font>
          <input type="radio" name="pergunta12" value="7">
          <font size="2">Outros: enumere-os</font>
          <input type="text" name="outros" maxlength="50" size="20">
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;
	  <div align="right"><a href="#"
		onClick="MM_openBrWindow('http://139.82.24.188:9090/per/servlet/Teste1?perg=12) Marque abaixo quais t�cnicas/ferramentas que s�o utilizadas em sua empresa no processo de defini��o de requisitos: &numero=pergunta12&quant=7','pergunta12','status=yes,width=320,height=280')">Resultado Parcial</a></div>
	  </td>
    </tr>
    <tr>
      <td colspan="5">13) <i>Coloque aqui suas observa��es sobre a engenharia
        de requisitos</i>: </td>
    </tr>
    <tr>
      <td colspan="5">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="pergunta13" rows="10" cols="30">&nbsp;</textarea>
      </td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5"><i>Entre com o seu e-mail:
        <input type="text" name="email">
        </i></td>
    </tr>
    <tr>
      <td colspan="5">
        <div align="center">&nbsp;
          <input type="submit" onClick="return TestarBranco(this.form);" value="Enviar">
        </div>
      </td>
    </tr>
  </table>
</form>
<center>
    <a href="JavaScript:window.history.go(-1)"><img src="voltar.gif" width="121" height="55" border="0"></a>
</center>
</body>
</html>
