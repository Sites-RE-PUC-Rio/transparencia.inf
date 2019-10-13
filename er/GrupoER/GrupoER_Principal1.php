
<HTML>
<head>
<title>Engenharia de Requisitos na PUC-Rio</title>
<base target="_self">
<style>
<!--
div.Section1
	{page:Section1;}
h3
	{margin-bottom:.0001pt;
	text-align:center;
	page-break-after:avoid;
	font-size:14.0pt;
	font-family:"Times New Roman";
	font-weight:bold;
	margin-left:0cm; margin-right:0cm; margin-top:0cm}
-->
</style>
</head>
<body topmargin="0" leftmargin="0">
<?php
 $pagina = $_GET["pagina"];
?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="50%" valign="top">
      <table border="0" cellpadding="0" width="100%" cellspacing="10">
<?php
// ************ H O M E ************
if ($pagina == 'home')
{?>
        <tr>
          <td width="100%"><b><font face="Arial" size="5" color="#FFCC00">Engenharia
            de Requisitos na PUC-Rio</font></b>
            <p style="margin-left: 10"><font face="Arial" size="3">Bem vindo a página
            do grupo de Engenharia de Requisitos na PUC-Rio.&nbsp; Nosso grupo
            é um dos principais grupos de pesquisa dessa área e uma referência
            mundial.&nbsp; Já formamos 3 doutores e 11 mestres.&nbsp; Desses
            trabalhos surgiram uma série de resultados que influenciaram e
            continuam influenciando a pesquisa na área.&nbsp; Esses resultados
            foram, em sua maior parte, publicados em eventos ou periódicos de
            Engenharia de Requisitos.<br>
            <br>
            Notáveis contribuições de nosso grupo são os trabalhos
            relacionados ao Léxico Ampliado da Linguagem, a Cenários e a
            Requisitos Não-Funcionais.&nbsp;<br>
            <br>
            Nosso grupo entende que os requisitos não devem ser considerados
            estanques.&nbsp;&nbsp; O paradigma de requisitos congelados levou a
            várias a uma larga história de fracassos.&nbsp; Nosso desafio é
            manter requisitos como base do desenvolvimento, mas ao mesmo tempo
            lidar com isso num contexto de constante evolução.&nbsp; Portanto
            quando nos referimos a base de requisitos, na verdade estamos
            falando de uma base dinâmica.<br>
            <br>
            Atualmente, um de nossos maiores interesses é o estudo de uma nova
            geração de software: <b>agentes</b>.&nbsp;&nbsp; O estudo de como
            o paradigma de agentes irá influenciar a engenharia de requisitos,
            bem como a engenharia de requisitos irá ajudar a criarmos métodos
            de engenharia de software é nosso desafio maior para os próximos
            anos.<br>
            <br>
            Outro aspecto que nos interessa é o estudo de como a engenharia de
            requisitos e seus métodos podem ajudar na criação de sistemas de
            apoio a carências relacionadas a área de saúde.<br>
            <br>
            Os itens a sua esquerda detalham nossos desafios e resultados já
            alcançados.&nbsp; Comentários e sugestões são sempre bem vindos.&nbsp;
            Para isso usem o
            <a target="_blank" href="http://www.er.les.inf.puc-rio.br">canal livre</a>.</font></p>
          <p><font face="Arial" size="3">&nbsp;</font></p>
            <p>&nbsp;
          </td>
        </tr>
<?php } ?>
<?php
// ************ P R O J E T O S ************
if ($pagina == "projetos")
{?>
        <tr>
          <td width="100%"><b><font face="Arial" size="5" color="#FFCC00">Projetos</font></b>
            <p><font face="Arial" size="2">Atualmente os integrantes do GrupoER
            estão envolvidos nos seguintes projetos:</font></p>
            <ul type="square">
              <li><font face="Arial" size="2"><a href="http://wer.inf.puc-rio.br/WERpapers" target="_blank">WERpapers</a>
                - Anais do Workshop em Engenharia de Requisitos.</font></li>
	      <li><font face="Arial" size="2"><a href="http://www.teccomm.les.inf.puc-rio.br/ESSMA" target="_blank">ESSMA</a>
                - Engenharia de Software - Sistema Multi Agente.</font></li>
              <li><font face="Arial" size="2"><a href="http://www.er.les.inf.puc-rio.br" target="_blank">ER</a>
                - ER é um portal onde reunimos várias informações relevantes
                sobre Engenharia de Requisitos.</font></li>
              <li><font face="Arial" size="2"><a href="http://139.82.24.189/cel/" target="_blank">C&amp;L</a>
                - C&amp;L é um Editor de Léxico e Cenários.</font></li>
              <li><font face="Arial" size="2"><a href="http://www.inf.puc-rio.br/~draco/" target="_blank">Draco-PUC</a>
                - O projeto Draco-PUC investiga a construção de software
                baseado na reutilização de domínios.</font></li>
            </ul>
          </td>
        </tr>
<?php } ?>
<?php
// ************ I N T E G R A N T E S ************
if ($pagina == "integrantes")
{?>
        <tr>
          <td width="100%"><b><font face="Arial" size="5" color="#FFCC00">Integrantes</font></b>
            <p style="margin-left: 10"><font color="#0000FF">Coordenador:</font></p>
            <p style="margin-left: 20"><font face="Arial"><font size="3"><b>Julio Cesar
            Sampaio do Prado Leite</b></font><br>
            <font face="Arial" size="2">julio@inf.puc-rio.br</font><br>
            <font size="2"><a href="http://www.inf.puc-rio.br/~julio" target="_blank">http://www.inf.puc-rio.br/~julio</a></font></font></p>
            <p style="margin-left: 10"><font color="#0000FF">Pesquisadores:</font></p>
            <p style="margin-left: 20"><font size="3" face="Arial"><b>Karin Koogan Breitman</b></font><font face="Arial"><br>
            <font size="2">karin@inf.puc-rio.br</font><br>
            <font size="2"><a href="http://www.inf.puc-rio.br/~karin" target="_blank">http://www.inf.puc-rio.br/~karin</a></font></font></p>
            <p style="margin-left: 10"><font color="#0000FF">Doutorandos:</font>
            <p style="margin-left: 20"><font size="3" face="Arial"><b>Antônio
            Pádua</b></font><font face="Arial"><br>
            <font size="2">padua.uerj@globo.com</font></font>
            <p style="margin-left: 20"><font size="3" face="Arial"><b>Claudia Hazan</b></font><font face="Arial"><br>
            <font size="2">claudinhah@yahoo.com</font></font>
            <p style="margin-left: 20"><font size="3" face="Arial"><b>Lyrene
            Fernandes da Silva</b></font><font face="Arial"><br>
            <font size="2">lyrene@inf.puc-rio.br</font><br>
            <font size="2"><a href="http://www.inf.puc-rio.br/~lyrene" target="_blank">http://www.inf.puc-rio.br/~lyrene</a></font></font><p style="margin-left: 20"><font size="3" face="Arial"><b>Miriam
            Sayão</b></font><font face="Arial"><br>
            <font size="2">miriam@inf.puc-rio.br</font>
            </font></p>
            <p style="margin-left: 20"><font size="3" face="Arial"><b>Nestor
            Adolfo Mamani Macedo</b></font><font face="Arial"><br>
            <font size="2">nestor@inf.puc-rio.br</font>
            </font>
            <p style="margin-left: 10"><font color="#0000FF">Mestrandos:</font><p style="margin-left: 20"><font size="3" face="Arial"><b>Carolina
            Howard Felicíssimo</b></font><font face="Arial"><br>
            <font size="2">cfelicissimo@inf.puc-rio.br</font></p>
            </font><p style="margin-left: 20"><font size="3" face="Arial"><b>Paulo
            Bastos</b></font><font face="Arial"><br>
            <font size="2">prbastos@hotmail.com</font></font></p>
            <p style="margin-left: 20"><font size="3" face="Arial"><b>Roberto
            Holanda Christoph</b></font><font face="Arial"><br>
            <font size="2">roberto@m4u.com.br</font></font><p style="margin-left: 20"><font size="3" face="Arial"><b>William
          Oliveira</b></font><font face="Arial"><br>
          <font size="2">wosouza@inf.puc-rio.br</font></font>
          </td>
        </tr>
<?php } ?>
<?php
// ************ D I S C I P L I N A S ************
if ($pagina == "disciplinas")
{?>
        <tr>
          <td width="100%"><b><font face="Arial" size="5" color="#FFCC00">Disciplinas</font></b>
            <ul type="square">
              <li><font face="Arial" size="3"><a href="http://www.er.les.inf.puc-rio.br/pes" target="_blank">Princípios
                de Engenharia de Software</a></font></li>
              <li><font face="Arial" size="3"><a href="http://www-di.inf.puc-rio.br/~julio/evol.htm" target="_blank">Evolução
                de Software</a></font></li>
              <li><font face="Arial" size="3">Engenharia de Requisitos</font></li>
            </ul>
            <p>&nbsp;
          </td>
        </tr>
<?php } ?>
<?php
// ************ P U B L I C A Ç Õ E S ************
if ($pagina == "publicacoes")
{?>
        <tr>
          <td width="100%"><b><font face="Arial" size="5" color="#FFCC00">Publicações</font></b>
            <p><b><font face="Arial" color="#0000FF" size="3">Artigos </b>(a 
            partir de 2000)<b>:</b></font></p>
            <ul>
              <li>
              <p style="margin-top: 8"><font face="Arial">Holanda, R.; 
              Felicissimo, C. H.; Leite, J.C.S.P - <font color="#0000FF">C&L: Uma Ferramenta de Edição e Visualização de Cenários e Léxicos</font>, Submetido para o SBES 2003.
              [<a href="trabalhos/C&L.pdf" target="_blank">pdf</a>]</font></li>
              <li>
              <p style="margin-top: 8"><font face="Arial">Silva, L. F.; Sayão, 
              M.; Leite, J.C.S.P.;Breitman, K.K. - </font>
              <span lang="PT-BR" style="font-weight: 400">
              <font face="Arial" size="3" color="#0000FF">Enriquecendo o Código 
              com Cenários</font><font face="Arial" size="3">, Submetido para o 
              SBES 2003.</font></span></li>
              <li>
              <p style="margin-top: 8"><font face="Arial">Breitman, K.K.; Leite, 
              J.C.S.P.<b> </b>–<b> </b><font color="#0000FF">Scenario Evolution: 
              A Closer View on Relationships</font> – in Proceedings of the 
              Fourth International Conference on Requirements Engineering 
              (ICRE’00) – 2000.
              <a href="http://www-di.inf.puc-rio.br/~karin/icre.pdf" style="color: blue; text-decoration: underline; text-underline: single">
              [aqui]</a></font></li>
              <li>
              <p style="margin-top: 8"><font face="Arial">Breitman, K.K; Leite, 
              J.C.S.P - <font color="#0000FF">Managing User Stories</font> - 
              Workshop on time constrained software engineering -&nbsp; TCRE02, 2003.
              <a href="http://www.enel.ucalgary.ca/tcre02/" style="color: blue; text-decoration: underline; text-underline: single">
              [aqui]</a></font></li>
              <li>
              <p style="margin-top: 8"><font face="Arial">Breitman, K.K; Leite, 
              J.C.S.P.- <font color="#0000FF">Lexicon Based Ontology 
              Construction</font> - 2nd. International Workshop on Software 
              Engineering for Large Scale Multi Agent Systems - SELMAS -&nbsp; ACM 
              computer Press, Portland Oregon, 2003. <span lang="PT-BR">
              <a href="http://www-di.inf.puc-rio.br/~karin/ontologia.pdf" style="color: blue; text-decoration: underline; text-underline: single">
              <span lang="EN-US">[aqui]</span></a></span></font></li>
              <li>
              <p style="margin-top: 8"><font face="Arial">Breitman, K.K; Leite, 
              J.C.S.P -&nbsp; <font color="#0000FF">Mini tutorial on Ontology 
              Development</font> - 11th. IEEE International Requirements 
              Engineering Conference -&nbsp; Monterey, Canada, 2003. <b>
              <a href="http://www-di.inf.puc-rio.br/~karin/tutorial.pdf" style="color: blue; text-decoration: underline; text-underline: single">
              <span style="FONT-WEIGHT: normal">[aqui]</span></a></b></font></li>
              <li>
              <p style="margin-top: 8"><font face="Arial">Breitman, K.K -
              <font color="#0000FF">Semantic Interoperability by Aligning 
              Ontologies</font><a title href="#_ftn1" name="_ftnref1" style="color: blue; text-decoration: underline; text-underline: single"><span style="font-weight: normal">*</span></a><span style="font-weight: normal">- 
              Workshop on Requirements Engineering for Open Systems (REOS) - 
              with the 11th. IEEE International Requirements Engineering 
              Conference -&nbsp; Monterey, Canada, 2003.
              <a href="http://www-di.inf.puc-rio.br/~karin/reos.pdf" style="color: blue; text-decoration: underline; text-underline: single">
              [aqui]</a></span></font></li>
          </ul>
          <h3 style="MARGIN-LEFT: 18pt; TEXT-ALIGN: justify">
          <span style="font-weight: normal">&nbsp;</span></h3>


            <p><b><font face="Arial" color="#0000FF" size="3">Teses:</font></b></p>
            <ul>
              <li><font face="Arial" size="3"><a href="http://www.inf.puc-rio.br/~karin" target="_blank">Karin
                Koogan Breitman</a>: Evolução de Software, PUC-Rio, Maio de
                2000. [<a href="http://www-di.inf.puc-rio.br/~julio/tese4.pdf" target="_blank">pdf</a>]</font></li>
            </ul>
            <ul>
              <li><font face="Arial" size="3"><a href="http://www.math.yorku.ca/~cysneiro" target="_blank">Luiz
                Marcio Cysneiros</a>: Requisitos Não-Funcionais: da Elicitação
                ao Modelo Conceitual, PUC-Rio, Fevereiro de 2001. [<a href="http://www-di.inf.puc-rio.br/~julio/Tese%20-%205.pdf" target="_blank">pdf</a>]</font></li>
            </ul>
            <ul>
              <li><font face="Arial" size="3"><a href="http://www.e-dablio.com/" target="_blank">Soeli
                Terezinha Fiorini</a>: Arquitetura para Reutilização de
                Processos de Software, Abril de 2001, Departamento de Informática,
                PUC-Rio. [<a href="http://www-di.inf.puc-rio.br/~julio/tese-soeli.pdf" target="_blank">pdf</a>]</font></li>
            </ul>
            <p><b><font face="Arial" color="#0000FF" size="3">Dissertações:</font></b><b>
            <ul>
            </b>
            <li><font face="Arial" size="3">Uso de Patrones en el Proceso de
              Construcción de Escenarios, Novembro de 2001, Universidad
              Nacional de La Plata, Marcela Ridao. [<a href="http://www-di.inf.puc-rio.br/~julio/Tesis-marcela.pdf" target="_blank">pdf</a>]</font></li>
            </ul>
            <ul>
              <li><font face="Arial" size="3">Una Estrategia de Modelado
                Conceptual de Obejtos basada en Modelos de Requisitos en
                Lenguaje Natural, Novembro de 2001, Universidad Nacional de La
                Plata, Maria Carmen Leonardi. [<a href="http://www-di.inf.puc-rio.br/~julio/tesis-carmen.pdf" target="_blank">pdf</a>]</font></li>
            </ul>
            <ul>
              <li><font face="Arial" size="3">Integrando Requisitos Não-Funcionais
                à Modelagem Orientada a Objetos, PUC-Rio, Março 2000. Jaime de
                Melo Sabat Neto.</font></li>
            </ul>
            <ul>
              <li><font face="Arial" size="3">Integrando Requisitos Não-Funcionais
                aos Requisitos Baseados em Ações Concretas do SERBAC, PUC-Rio,
                Abril 1999. Nestor Adolfo Mamani Macedo.</font></li>
            </ul>
            <ul>
              <li><font face="Arial" size="3">Integrando Requisitos Não
                Funcionais ao Processo de Desenvolvimento de Sistemas, PUC-Rio,
                Abril 1997. Luiz Marcio Cysneiros.</font></li>
            </ul>
            <ul>
              <li><font face="Arial" size="3">Processos de Negócio e
                Hipertextos: Uma Proposta para Elicitação de Requisitos,
                PUC-Rio, Abril 1995. Co-orientação com T. Diana L.v.A.
                Macedo-Soares (Dep. de Eng. Industrial PUC-Rio). Soeli T.
                Fiorini.</font></li>
            </ul>
            <ul>
              <li><font face="Arial" size="3">Gerenciamento de Conflitos na
                Elicitação de Requisitos, Tese de Mestrado, PUC-RIO, Setembro
                1994. Adolfo Gil Mathias.</font></li>
            </ul>
            <ul>
              <li><font face="Arial" size="3">FAES - Um Assistente para
                Entrevistas, PUC-RIO, Junho 1994. Ana Paula Gilvaz.</font></li>
            </ul>
            <ul>
              <li><font face="Arial" size="3">Recuperação de Requisitos a
                Partir de Especificações Estruturadas, PUC-Rio, Abril 1994.
                Paulo Monteiro Cerqueira.</font></li>
            </ul>
            <ul>
              <li><font face="Arial" size="3">SERBAC: Um Método de Apoio a
                Definição de Requisitos, PUC-Rio, Abril 1994. Antonio de Padua
                Oliveira.</font></li>
            </ul>
            <ul>
              <li><font face="Arial" size="3">CDR: Cooperação na Definição
                de Requisitos, PUC-Rio, Março 1994. Co-orientação com Marcos
                da Silva Borges (UFRJ). Florys Fábia Almeida Pereira.</font></li>
            </ul>
            <p>&nbsp;
          </td>
        </tr>
<?php } ?>
<?php
// ************ T R A B A L H O S   D E S E N V O L V I D O S ************
if ($pagina == "trabdesenvolvidos")
{?>
        <tr>
          <td width="100%"><b><font face="Arial" size="5" color="#FFCC00">
          Trabalhos Desenvolvidos</font></b>
            <p><font face="Arial"><font size="3" color="#0000FF"><b>Mini-Curso
            em Gerência de Requisitos, <i>Claudia Hazan</i>, 2003 </b></font></font>
            [<a href="trabalhos/Hazan_minicurso.pdf">pdf</a>]<br>
            <b>Resumo:</b><font face="Arial" size="3"> O mini-curso Gerência
            de Requisitos tem como propósito apresentar uma maneira de
            implementar um processo de gestão de requisitos efetivo em
            organizações que desejam obter uma certificação CMM – nível 2. Serão
            abordados os seguintes tópicos:</font><br>
            <font face="Arial" size="3">&nbsp; -&nbsp;&nbsp;Introdução - conceitos básicos
            sobre requisitos</font><br>
          <font face="Arial" size="3">&nbsp; -&nbsp;&nbsp;Visão Geral do Modelo CMM</font><br>
          <font face="Arial" size="3">&nbsp; -&nbsp;&nbsp;Área Chave de Processo (ACP)
          Gerência de Requisitos de Software: </font><br>
          <font face="Arial" size="3">&nbsp; -&nbsp;&nbsp;Práticas Chaves do Modelo CMM</font><br>
          <font face="Arial" size="3">&nbsp; -&nbsp; Experiência de implantação da Gerência
          de Requisitos no SERPRO</font><br>
            <p><b><font face="Arial" size="3" color="#0000FF">XP - Extreme Programming,
              <i>Roberto Holanda</i></font></b><font size="3" color="#0000FF"><b>,
              2002</b></font><font color="#00FFFF"> </font>[<a href="trabalhos/XP.pdf">pdf</a>]<br>
              <b>Resumo: </b><font face="Arial" size="3">Este trabalho tem por objetivo descrever a metodologia de desenvolvimento
              de software conhecida como XP (extreme programming), que visa prover
              uma metodologia que permita o desenvolvimento rápido e eficiente
              de sofwares de todos os portes e tem um número significativos de
              seguidores.</font></p>
            <p><b><font face="Arial" size="3" color="#0000FF">An&aacute;lise individual
              e compara&ccedil;&atilde;o entre metodologias de desenvolvimento,
              <i>Roberto Holanda</i></font></b><font size="3" color="#0000FF"><b>,
              2002</b></font><font color="#00FFFF"> </font>[<a href="trabalhos/Comparacao%20entre%20metodologias%20de%20desenvolvimento.pdf">pdf</a>]<br>
              <b>Resumo: </b><font face="Arial" size="3">Este texto pretende realizar uma comparação independente de uma
              experimentação prática de 3 metodologias de desenvolvimento usadas
              no mercado atualmente: XP, RUP e OOHDM. Serão definidos critérios
              de comparação após uma breve análise individual e uma posterior
              análise de suas vantagens e desvantagens. Estes critérios serão
              usados então para a realização da comparação entre as mesmas.</font></p>
            </td>
        </tr>
<?php } ?>
<?php
// ************ C O L A B O R A D O R E S ************
if ($pagina == "colaboradores")
{?>
        <tr>
          <td width="100%"><b><font face="Arial" size="5" color="#FFCC00">Colaboradores</font></b>
            <ul>
              <li><font face="Arial" size="3">Projeto <a href="http://www.teccomm.les.inf.puc-rio.br/essma/" target="_blank">ESSMA</a>
                - <a href="http://www.inf.puc-rio.br" target="_blank">PUC-Rio</a></font></li>
              <li><font face="Arial" size="3">Prof. <a href="http://www.cs.toronto.edu/DCS/People/Faculty/jm.html" target="_blank">John
                Mylopoulos</a> - University of Toronto (<a href="http://www.cs.toronto.edu/DCS/People/Faculty/" target="_blank">UofT</a>)</font></li>
              <li><font face="Arial" size="3">Prof. <a href="http://www.dsic.upv.es/~opastor/" target="_blank">Oscar
                Pastor</a> - <a href="http://www.upv.es/menuc.html" target="_blank">Universidad
                Politécnica de Valencia</a>&nbsp;</font></li>
              <li><font face="Arial" size="3">Prof. <a href="http://www.cin.ufpe.br/~jbc/" target="_blank">Jaelson
                de Castro</a>- Universidade Federal de Pernambuco (<a href="http://www.cin.ufpe.br" target="_blank">UFPE</a>)&nbsp;</font></li>
              <li><font face="Arial" size="3">Prof. <a href="http://www.cic.unb.br/docentes/cartaxo/cartaxo.html" target="_blank">Francisco
                Pinheiro</a> - Universidade de Brasília (<a href="http://www.cic.unb.br/" target="_blank">UNb</a>)&nbsp;</font></li>
              <li><font face="Arial" size="3">Prof. <a href="http://www.exa.unicen.edu.ar/personales/leonardi.htm" target="_blank">Carmen
                Leonardi</a>, Prof. Jorge Doorn, Prof. Glads e Prof. Graciela - <a href="http://www.exa.unicen.edu.ar/index.html" target="_blank">Universidad
                Nacional del Centro de la Provincia de Buenos Aires</a>&nbsp;&nbsp;&nbsp;</font></li>
              <li><font face="Arial" size="3">Prof. <a href="http://163.10.5.31:8080/servlet/ContextosLifiano?action=INFOCOMP&amp;idLifiano=gustavo" target="_blank">Gustavo
                Rossi</a> - <a href="http://163.10.5.31:8080/servlet/Start?action=START" target="_blank">Universidad
                Nacional de La Plata</a></font></li>
              <li><font face="Arial" size="3">Prof. <a href="http://www-staff.socs.uts.edu.au/~brian/" target="_blank">Brian
                Henderson Sellers</a> - <a href="http://it.uts.edu.au/research/strengths_cotar_open.html" target="_blank">Faculty
                of Information Technology Sydney</a>&nbsp;</font></li>
            </ul>
            <p>&nbsp;
          </td>
        </tr>
<?php } ?>
      </table>
    </td>
    <td width="17%" valign="top">
      &nbsp;
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td width="100%" bgcolor="#FCFCFC" align="center"><a href="http://link.springer.de/link/service/journals/00766/index.htm" target="_blank"><img border="0" src="RE.gif" width="120" height="48"></a>
            <hr>
          </td>
        </tr>
        <tr>
          <td width="100%" bgcolor="#FCFCFC" align="center">&nbsp;<a href="http://www.re03.org/" target="_blank"><img border="0" src="RE_Logo2003.jpg" width="69" height="70"></a>
            <p><b><font size="1" face="Arial">RE Conference</font></b><br>
            <hr>
          </td>
        </tr>
        <tr>
          <td width="100%" bgcolor="#FCFCFC" align="center"><a href="http://www.ase-conference.org/index.htm" target="_blank"><img border="0" src="aselogo.gif" width="67" height="73"></a>
            <p><b><font size="1" face="Arial">ASE Conference</font></b><br>
            <hr>
          </td>
        </tr>
        <tr>
          <td width="100%" bgcolor="#FCFCFC" align="center"><a href="http://wer.inf.puc-rio.br" target="_blank"><img border="0" src="wer2003_logo.jpg" width="69" height="67"></a>
            <p><b><font size="1" face="Arial">Workshop em ER</font></b><br>
            <hr>
          </td>
        </tr>
        <tr>
          <td width="100%" bgcolor="#FCFCFC" align="center"><a href="http://www.fsf.org/home.pt.html" target="_blank"><img border="0" src="SoftFree.jpg" width="88" height="84"></a>&nbsp;
            <p><font size="1" face="Arial"><b>Free Software Foudation</b></font><br>
            <hr>
          </td>
        </tr>
        <tr>
          <td width="100%" bgcolor="#FCFCFC" align="center">&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</HTML>