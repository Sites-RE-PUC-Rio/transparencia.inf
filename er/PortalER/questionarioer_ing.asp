<html>
<head>
<title>Engenharia de Requisitos - Questionário</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>
<script language="JavaScript">
<!--
function TestarBranco(form)
{
  email = form.email.value
  outros = form.outros.value  

  if ((!(form.pergunta1[0].checked)) && (!(form.pergunta1[1].checked)) &&
	  (!(form.pergunta1[2].checked)) && (!(form.pergunta1[3].checked)) &&
	  (!(form.pergunta1[4].checked)))
    { alert ("Please, answer question 1.")
      return false;}
  if ((!(form.pergunta2[0].checked)) && (!(form.pergunta2[1].checked)) &&
	  (!(form.pergunta2[2].checked)) && (!(form.pergunta2[3].checked)) && 
	  (!(form.pergunta2[4].checked)))
    { alert ("Please, answer question 2.") 
      return false;}
  if ((!(form.pergunta3[0].checked)) && (!(form.pergunta3[1].checked)) &&
	  (!(form.pergunta3[2].checked)) && (!(form.pergunta3[3].checked)) &&
	  (!(form.pergunta3[4].checked)))
    { alert ("Please, answer question 3.") 
      return false;}
  if ((!(form.pergunta4[0].checked)) && (!(form.pergunta4[1].checked)) &&
	  (!(form.pergunta4[2].checked)) && (!(form.pergunta4[3].checked)) &&
	  (!(form.pergunta4[4].checked)))
    { alert ("Please, answer question 4.") 
      return false;}
  if ((!(form.pergunta5[0].checked)) && (!(form.pergunta5[1].checked)) &&
	  (!(form.pergunta5[2].checked)) && (!(form.pergunta5[3].checked)) &&
	  (!(form.pergunta5[4].checked)))
    { alert ("Please, answer question 5.") 
      return false;}
  if ((!(form.pergunta6[0].checked)) && (!(form.pergunta6[1].checked)) &&
	  (!(form.pergunta6[2].checked)) && (!(form.pergunta6[3].checked)) &&
	  (!(form.pergunta6[4].checked)))
    { alert ("Please, answer question 6.") 
      return false;}
  if ((!(form.pergunta7[0].checked)) && (!(form.pergunta7[1].checked)) &&
	  (!(form.pergunta7[2].checked)) && (!(form.pergunta7[3].checked)) &&
	  (!(form.pergunta7[4].checked)))
    { alert ("Please, answer question 7.") 
      return false;}
  if ((!(form.pergunta8[0].checked)) && (!(form.pergunta8[1].checked)) &&
	  (!(form.pergunta8[2].checked)) && (!(form.pergunta8[3].checked)) &&
	  (!(form.pergunta8[4].checked)))
    { alert ("Please, answer question 8.") 
      return false;}
  if ((!(form.pergunta9[0].checked)) && (!(form.pergunta9[1].checked)) &&
	  (!(form.pergunta9[2].checked)) && (!(form.pergunta9[3].checked)) &&
	  (!(form.pergunta9[4].checked)))
    { alert ("Please, answer question 9.") 
      return false;}
  if ((!(form.pergunta10[0].checked)) && (!(form.pergunta10[1].checked)) &&
	  (!(form.pergunta10[2].checked)) && (!(form.pergunta10[3].checked)) &&
	  (!(form.pergunta10[4].checked)))
    { alert ("Please, answer question 10.") 
      return false;}
  if ((!(form.pergunta11[0].checked)) && (!(form.pergunta11[1].checked)) &&
	  (!(form.pergunta11[2].checked)) && (!(form.pergunta11[3].checked)) &&
	  (!(form.pergunta11[4].checked)))
    { alert ("Please, answer question 11.") 
      return false;}
  if ((!(form.pergunta12[0].checked)) && (!(form.pergunta12[1].checked)) &&
	  (!(form.pergunta12[2].checked)) && (!(form.pergunta12[3].checked)) &&
	  (!(form.pergunta12[4].checked)) && (!(form.pergunta12[5].checked)) &&
      (!(form.pergunta12[6].checked)))
    { alert ("Please, answer question 12.") 
      return false;}

  if ((form.pergunta12[6].checked) && (outros == ""))
    { alert ("Please, write the tool or tecnique name used in question 12.") 
      form.outros.focus()
	  return false;}

  if ((email == ""))
    { alert ("Please, enter your email.") 
      form.email.focus() 
      return false;} 
}

//-->
</SCRIPT>

<body bgcolor="#FFFFFF">
<form action="envia_questionario.asp" method="post">
  <table width="100%" border="0" align="center">
    <tr> 
      <td colspan="5"> 
        <div align="center"><b><font size="4">Questionary of Requirements Engineering</font></b></div>
      </td>
    </tr>
    <tr> 
      <td colspan="5">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="5" height="26">1) <i>How do you see the way the client perceive 
        the delivery of the system in relation to their necessities?</i> </td>
    </tr>
    <tr> 
      <td height="26" colspan="5"> 
        <div align="center"><font size="2">Have a lot of problems</font>&nbsp;&nbsp;&nbsp; 
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
          &nbsp;&nbsp;<font size="2">Meet the spectation</font></div>
      </td>
    </tr>
    <tr> 
      <td colspan="5" height="32"> 
        <div align="right"><a href="#" onClick="MM_openBrWindow('http://139.82.24.188:8080/per/servlet/Teste1?perg=1) How do you see the way the client perceive the delivery of the system in relation to their necessities? &numero=pergunta1&quant=5','pergunta1','status=yes,width=320,height=220')"> 
          Parcial Result </a></div>
      </td>
    </tr>
    <tr>
      <td colspan="5" height="11">
        <div align="right"></div>
    </td>
    </tr>
    <tr> 
      <td colspan="5" height="25">2) <i>How do you see the way the clients perceived 
        the importance of the requirements acquisition fase</i>? </td>
    </tr>
    <tr> 
      <td colspan="5"> 
        <div align="center"><font size="2">little valorization</font>&nbsp;&nbsp;&nbsp; 
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
          &nbsp;&nbsp;&nbsp;<font size="2"> Intensive valorization</font></div>
      </td>
    </tr>
      <td colspan="5" height="34"> 
        <div align="right"><a href="#" 
		onClick="MM_openBrWindow('http://139.82.24.188:8080/per/servlet/Teste1?perg= 2) How do you see the way the clients perceived the importance of the requirements acquisition fase? &numero=pergunta2&quant=5','pergunta2','status=yes,width=320,height=220')">Parcial 
          Result </a></div>
      </td>
    <tr> 
      <td colspan="5" height="25">3) <i>The requiriments when needed to be reviewed 
        or consulted are:</i> </td>
    </tr>
    <tr> 
      <td colspan="5"> 
        <div align="center"><font size="2">Hardly accessible</font>&nbsp;&nbsp;&nbsp; 
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
          &nbsp;&nbsp;&nbsp;<font size="2">Easily accessible</font></div>
      </td>
    </tr>
    <tr> 
      <td colspan="5" height="34"> 
        <div align="right"><a href="#" 
		onClick="MM_openBrWindow('http://139.82.24.188:8080/per/servlet/Teste1?perg=3) The requiriments when needed to be reviewed or consulted are:  &numero=pergunta3&quant=5','pergunta3','status=yes,width=320,height=220')">Parcial 
          Resul t</a></div>
      </td>
    </tr>
    <tr> 
      <td colspan="5">4) <i>How do you classified the procedures of your organization 
        to identify, to collect, to store, to keep registers about quality control 
        based on requirements, in the way that can be recovered?</i> </td>
    </tr>
    <tr> 
      <td colspan="5"> 
        <div align="center"><font size="2">Hardly accessible</font>&nbsp;&nbsp;&nbsp; 
          1 
          <input type="radio" name="pergunta4" value="1">
          2 
          <input type="radio" name="pergunta4" value="2">
          3 
          <input type="radio" name="pergunta4" value="3">
          4 
          <input type="radio" name="pergunta4" value="4">
          5 
          <input type="radio" name="pergunta4" value="5">
          &nbsp;&nbsp;&nbsp;<font size="2">Easily accessible</font></div>
      </td>
    </tr>
    <tr> 
      <td colspan="5" height="34"> 
        <div align="right"><a href="#" 
		onClick="MM_openBrWindow('http://139.82.24.188:8080/per/servlet/Teste1?perg=4) How do you classified the procedures of your organization to identify, to collect, to store, to keep registers about quality control based on requirements, in the way that can be recovered?  &numero=pergunta4&quant=5','pergunta4','status=yes,width=320,height=220')">Parcial 
          Result </a></div>
      </td>
    </tr>
    <tr> 
      <td colspan="5" height="48">5) <i>In what way the system requirements are 
        used in your organization as a base for software development?</i> </td>
    </tr>
    <tr> 
      <td colspan="5"> 
        <div align="center">Hardly used&nbsp;&nbsp;&nbsp; 1 
          <input type="radio" name="pergunta5" value="1">
          2 
          <input type="radio" name="pergunta5" value="2">
          3 
          <input type="radio" name="pergunta5" value="3">
          4 
          <input type="radio" name="pergunta5" value="4">
          5 
          <input type="radio" name="pergunta5" value="5">
          &nbsp;&nbsp;&nbsp;Always used</div>
      </td>
    </tr>
    <tr> 
      <td colspan="5" height="33"> 
        <div align="right"><a href="#" 
		onClick="MM_openBrWindow('http://139.82.24.188:8080/per/servlet/Teste1?perg=5) In what way the system requirements are used in your organization as a base for software development?  &numero=pergunta5&quant=5','pergunta5','status=yes,width=320,height=220')">Parcial 
          Result </a></div>
      </td>
    </tr>
    <tr> 
      <td colspan="5">6) <i>How do you classify the method used in your organization 
        for requirements acquisition?</i> </td>
    </tr>
    <tr> 
      <td colspan="5"> 
        <div align="center">Extremaly informal&nbsp;&nbsp;&nbsp; 1 
          <input type="radio" name="pergunta6" value="1">
          2 
          <input type="radio" name="pergunta6" value="2">
          3 
          <input type="radio" name="pergunta6" value="3">
          4 
          <input type="radio" name="pergunta6" value="4">
          5 
          <input type="radio" name="pergunta6" value="5">
          &nbsp;&nbsp;&nbsp;Extremaly formal</div>
      </td>
    </tr>
    <tr> 
      <td colspan="5" height="32"> 
        <div align="right"><a href="#" 
		onClick="MM_openBrWindow('http://139.82.24.188:8080/per/servlet/Teste1?perg=6) How do you classify the method used in your organization for requirements acquisition? &numero=pergunta6&quant=5','pergunta6','status=yes,width=320,height=220')">Parcial 
          Result </a></div>
      </td>
    </tr>
    <tr> 
      <td colspan="5">7) <i>During the use of a system or during your constrution 
        is verified an alteration in the requirements. This alteration</i>: </td>
    </tr>
    <tr> 
      <td colspan="5" height="35"> 
        <div align="center">It&acute;s not formally registered&nbsp;&nbsp;&nbsp; 
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
          &nbsp;&nbsp;&nbsp;It&acute;s registered in the requirements document.</div>
      </td>
    </tr>
    <tr> 
      <td width="42%"> 
        <div align="center"></div>
      </td>
      <td colspan="3">It&acute;s registered, but is not in the requirements document.</td>
      <td width="24%">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="5" height="31"> 
        <div align="right"><a href="#" 
		onClick="MM_openBrWindow('http://139.82.24.188:8080/per/servlet/Teste1?perg=7) During the use of a system or during your constrution is verified an alteration in the requirements. This alteration:  &numero=pergunta7&quant=5','pergunta7','status=yes,width=320,height=220')">Parcial 
          Result</a> </div>
      </td>
    </tr>
    <tr> 
      <td colspan="5" height="25">8) <i>How do you classify the quality control 
        maded about the requirements?</i> </td>
    </tr>
    <tr> 
      <td colspan="5"> 
        <div align="center">Inexistent&nbsp;&nbsp;&nbsp; 1 
          <input type="radio" name="pergunta8" value="1">
          2 
          <input type="radio" name="pergunta8" value="2">
          3 
          <input type="radio" name="pergunta8" value="3">
          4 
          <input type="radio" name="pergunta8" value="4">
          5 
          <input type="radio" name="pergunta8" value="5">
          &nbsp;&nbsp;&nbsp;Very good</div>
      </td>
    </tr>
    <tr> 
      <td colspan="5" height="31"> 
        <div align="right"><a href="#" 
		onClick="MM_openBrWindow('http://139.82.35.68:8080/per/servlet/Teste1?perg=8) How do you classify the quality control maded about the requirements?  &numero=pergunta8&quant=5','pergunta8','status=yes,width=320,height=220')">Parcial 
          Result</a> </div>
      </td>
    </tr>
    <tr> 
      <td colspan="5" height="29">9) <i>How much of the total time in a project 
        is normally dedicated for requirements acquisition?</i> </td>
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
      <td colspan="5" height="31"> 
        <div align="right"><a href="#" 
		onClick="MM_openBrWindow('http://139.82.24.188:8080/per/servlet/Teste1?perg=9) How much of the total time in a project is normally dedicated for requirements acquisition?  &numero=pergunta9&quant=5','pergunta9','status=yes,width=320,height=220')">Parcial 
          Result</a> </div>
      </td>
    </tr>
    <tr> 
      <td colspan="5" height="30">10) <i>How do you classify the requirements 
        engineering existent tranning in your organization?</i> </td>
    </tr>
    <tr> 
      <td colspan="5" height="19"> 
        <div align="center">Inexistent&nbsp;&nbsp;&nbsp; 1 
          <input type="radio" name="pergunta10" value="1">
          2 
          <input type="radio" name="pergunta10" value="2">
          3 
          <input type="radio" name="pergunta10" value="3">
          4 
          <input type="radio" name="pergunta10" value="4">
          5 
          <input type="radio" name="pergunta10" value="5">
          &nbsp;&nbsp;&nbsp;Very good</div>
      </td>
    </tr>
    <tr> 
      <td height="15" colspan="2">&nbsp;</td>
      <td width="23%" height="15">&nbsp;&nbsp;Scattered</td>
      <td width="8%" height="15">&nbsp;</td>
      <td width="24%" height="15">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="5" height="30"> 
        <div align="right"><a href="#" 
		onClick="MM_openBrWindow('http://139.82.24.188:8080/per/servlet/Teste1?perg=10) How do you classify the requirements engineering existent tranning in your organization?  &numero=pergunta10&quant=5','pergunta10','status=yes,width=320,height=220')">Parcial 
          Result</a> </div>
      </td>
    </tr>
    <tr> 
      <td colspan="5" height="29">11) <i>How do you classify the tool use to support 
        the requirements definition?</i> </td>
    </tr>
    <tr> 
      <td colspan="5" height="26"> 
        <div align="center">No tools are used&nbsp;&nbsp;&nbsp; 1 
          <input type="radio" name="pergunta11" value="1">
          2 
          <input type="radio" name="pergunta11" value="2">
          3 
          <input type="radio" name="pergunta11" value="3">
          4 
          <input type="radio" name="pergunta11" value="4">
          5 
          <input type="radio" name="pergunta11" value="5">
          &nbsp;&nbsp;&nbsp;specific tools</div>
      </td>
    </tr>
    <tr> 
      <td height="21" colspan="2">&nbsp;</td>
      <td width="23%" height="21">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Text 
        editors </td>
      <td width="8%" height="21">&nbsp;</td>
      <td width="24%" height="21">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="5" height="31"> 
        <div align="right"><a href="#" 
		onClick="MM_openBrWindow('http://139.82.24.188:8080/per/servlet/Teste1?perg=11) How do you classify the tool use to support the requirements definition?  &numero=pergunta11&quant=5','pergunta11','status=yes,width=320,height=220')">Parcial 
          Result</a> </div>
      </td>
    </tr>
    <tr> 
      <td colspan="5" height="26">12) <i>Check what tecniques/tools are used in 
        your company in the requirements definition process</i>: </td>
    </tr>
    <tr> 
      <td colspan="5" height="27"> 
        <div align="left">&nbsp;&nbsp;&nbsp; 
          <input type="radio" name="pergunta12" value="1">
          <font size="2">Sceneries</font> 
          <input type="radio" name="pergunta12" value="2">
          <font size="2">JAD</font> 
          <input type="radio" name="pergunta12" value="3">
          <font size="2">Use cases</font> 
          <input type="radio" name="pergunta12" value="4">
          <font size="2">Doors</font> 
          <input type="radio" name="pergunta12" value="5">
          <font size="2">Requisite-Pro</font> 
          <input type="radio" name="pergunta12" value="6">
          <font size="2">Caliber-RM</font> 
          <input type="radio" name="pergunta12" value="7">
          <font size="2">Others: specify them</font> 
          <input type="text" name="outros" maxlength="50" size="20">
        </div>
      </td>
    </tr>
    <tr> 
      <td colspan="5">&nbsp;
	    <div align="right"><a href="#" 
		onClick="MM_openBrWindow('http://139.82.24.188:8080/per/servlet/Teste1?perg=12) Check what tecniques/tools are used in your company in the requirements definition process:  &numero=pergunta12&quant=7','pergunta12','status=yes,width=320,height=220')">Parcial 
          Result</a></div>
	  </td>
    </tr>
    <tr> 
      <td colspan="5">13) <i>Write here your observation about requirements engineering</i>: 
      </td>
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
      <td colspan="5"><i>Enter with your e-mail: 
        <input type="text" name="email">
        </i></td>
    </tr>
    <tr> 
      <td colspan="5"> 
        <div align="center">&nbsp; 
          <input type="submit" onClick="return TestarBranco(this.form);" value="Send">
        </div>
      </td>
    </tr>
  </table>
</form>
<center>
</center>
</body>
</html>
