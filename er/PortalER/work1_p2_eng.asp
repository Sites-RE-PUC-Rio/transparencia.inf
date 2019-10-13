<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<style >
    <!--
       A:link    { color: #0000CC; text-decoration: none; ; font-family: Arial, Helvetica, sans-serif; font-size: 10pt; font-style: normal}
       A:visited { color: #000099; text-decoration: none; ; font-family: Arial, Helvetica, sans-serif; font-size: 10pt; font-style: normal}
       A:active  { color: #999999; text-decoration: none; ; font-family: Arial, Helvetica, sans-serif; font-size: 10pt; font-style: normal}
	   A:hover   { color: green; ; font-family: Arial, Helvetica, sans-serif; font-size: 10pt; font-style: normal; text-decoration: none}
   -->
   </style>
<body bgcolor="#FFFFFF">
<%if session("login")="ok" then %>
<p><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Result of the first 
  Questionary aplicated to SERPRO</font> - <font size="2"><a href="arquivos/work1/relatorioW1.doc"><font face="Verdana, Arial, Helvetica, sans-serif">Word 
  Document</font></a></font><% else %> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">(portuguese)</font> 
</p>
<p>&nbsp;</p><center>
  <h1>Access Denied!</h1>
</center>
<% end if %>
</body>
</html>
