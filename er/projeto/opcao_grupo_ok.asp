<%if session("login")="ok" then %>
<% 
   ' Verifica qual a opcao selecionada pelo administrador e direciona para outra página
   ' de acordo com a selecao
   selecao = Request.Form("opcao") 
   if selecao = "criar" then
      Response.Redirect "criar_grupo.asp"
   else 
	  if selecao = "excluir" then
         Response.Redirect "excluir_grupo.asp"
      else
		 if selecao = "incluirUsuario" then
  		 Response.Redirect "agrupar_usuario.asp"
	  else 
		 if selecao = "excluirUsuario" then
		 Response.Redirect "desagrupar_usuario.asp"
	  else 
		 if selecao = "listar" then
		 Response.Redirect "listar_usuarios_grupo.asp"		
      else
		 if selecao = "email" then
		 Response.Redirect "email_grupo.asp"	 
	     end if 	
      end if 
       end if
         end if
  	       end if
			end if
 %>
<%end if%>