<%if session("login")="ok" then %>
<% box = Request.Form("radiobutton") 
   if box = "apagar" then
      Response.Redirect "apagar_noticia.asp"
   else 

 %>
<html>
<head>
<title>Inserir Not�cia</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<!- Recebe a not�cia e t�tulo da not�cia a ser inserida na p�gina-->
<!- Fun��o verifica se os campos not�cia e t�tulo forma preenchidos corretamente-->
<script language="JavaScript">
<!--
function TestarBranco(form)
{ 
noticia = form.noticia.value;
titulo  = form.titulo.value;

  if ((titulo == ""))
    { 
      alert ("Por favor, digite o t�tulo da not�cia.") 
      form.titulo.focus() 
      return false;
    } 
  if ((noticia == ""))
    { alert ("Por favor, digite a not�cia.") 
      form.noticia.focus() 
      return false;
    }
  if ( (!(form.idioma[0].checked)) && (!(form.idioma[1].checked)) )
    { alert ("Por favor, selecione o idioma da noticia.") 
      return false;} 
  
}

//-->
</SCRIPT>

<body bgcolor="#FFFFFF">
<center>
  <table width="100%" border="0">
    <tr>
      <td>
        <div align="center"><b><font size="5">Gerenciador de not&iacute;cias - 
          (inserir) </font></b></div>
      </td>
    </tr>
  </table>
  <!- Envia formul�rio com a not�cia e t�tulo para not�cia_ok.asp --> <br>
    <font size="4">Por favor entre com a not&iacute;cia a ser inserida:</font> 
  <br>
  <form action="noticia_ok.asp"  method="post">
    <table>
      <tr> 
        <td width="57" height="43" valign="top"><font face="Georgia, Times New Roman, Times, serif"><i>T&iacute;tulo:</i></font></td>
        <td width="283" height="43" valign="top"> 
          <input type="text" name="titulo">
        </td>
        <td width="94" height="43" valign="top"> 
          <input type="radio" name="idioma" value="ing">
          <i>Ingl&ecirc;s</i><br>
          <input type="radio" name="idioma" value="port">
          <i>Portugu&ecirc;s</i> </td>
      </tr>
      <tr> 
        <td width="57" valign="top"><font face="Georgia, Times New Roman, Times, serif"><i>Corpo:</i></font></td>
        <td width="283"> 
          <textarea name="noticia" cols="40" rows="9"></textarea>
        </td>
        <td width="94">&nbsp;</td>
      </tr>
      <tr> 
        <td width="57"> 
          <input type="submit" onClick="return TestarBranco(this.form);" name="Submit" value="Enviar">
        </td>
      </tr>
    </table>
  </form> 
</center>
</body>
</html>
<% end if %>
<% end if %>
