

    public class SimpleServlet extends HttpServlet
    { 
        /**
         * Handle the HTTP GET method by building a simple web page.
         */
        public void doGet (HttpServletRequest request,
                	   HttpServletResponse response)
        throws ServletException, IOException
        {
	    PrintWriter		out;
	    String		title = "Simple Servlet Output";

	    // set content type and other response header fields first
            response.setContentType("text/html");

	    // then write the data of the response
	    out = response.getWriter();

            out.println("<HTML><HEAD><TITLE>");
	    out.println(title);
	    out.println("</TITLE></HEAD><BODY>");
	    out.println("<H1>" + title + "</H1>");
	    out.println("<P>This is output from SimpleServlet.");
	    out.println("</BODY></HTML>");
	    out.close();
        }
    }

