import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet(urlPatterns = {"/NewServlet"})
public class NewServlet extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        request.setCharacterEncoding("UTF-8");
        String catastrosJson = request.getParameter("catastros");

        try (PrintWriter out = response.getWriter()) {
            out.println("<!DOCTYPE html>");
            out.println("<html lang=\"es\">");
            out.println("<head>");
            out.println("<meta charset=\"utf-8\" />");
            out.println("<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\" />");
            out.println("<title>Catastros Asociados</title>");
            out.println("<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">");
            out.println("</head>");
            out.println("<body>");
            out.println("<div class=\"container mt-5\">");
            out.println("<h1 class=\"text-center\">Catastros Asociados</h1>");
            out.println("<div class=\"table-responsive mt-4\">");
            out.println("<table class=\"table table-striped table-bordered\">");
            out.println("<thead class=\"table-dark\">");
            out.println("<tr>");
            out.println("<th>Tipo de Impuesto</th>");
            out.println("<th>Zona</th>");
            out.println("<th>Distrito</th>");
            out.println("</tr>");
            out.println("</thead>");
            out.println("<tbody>");

            if (catastrosJson != null && !catastrosJson.isEmpty()) {
                catastrosJson = catastrosJson.substring(1, catastrosJson.length() - 1); 
                String[] catastros = catastrosJson.split("\\},\\{");
                for (String catastro : catastros) {
                    catastro = catastro.replace("{", "").replace("}", "").replace("\"", "");
                    String[] atributos = catastro.split(",");

                    String impuesto = "";
                    String zona = "";
                    String distrito = "";

                    for (String atributo : atributos) {
                        String[] claveValor = atributo.split(":");
                        String clave = claveValor[0];
                        String valor = claveValor[1];

                        switch (clave) {
                            case "impuesto":
                                impuesto = valor;
                                break;
                            case "zona":
                                zona = valor;
                                break;
                            case "distrito":
                                distrito = valor;
                                break;
                        }
                    }
                    String tipoImpuesto = "";
                    switch (impuesto) {
                        case "1":
                            tipoImpuesto = "Impuesto Alto";
                            break;
                        case "2":
                            tipoImpuesto = "Impuesto Medio";
                            break;
                        case "3":
                            tipoImpuesto = "Impuesto Bajo";
                            break;
                        default:
                            tipoImpuesto = "Impuesto Desconocido";
                            break;
                    }
                    out.println("<tr>");
                    out.println("<td>" + tipoImpuesto + "</td>");
                    out.println("<td>" + zona + "</td>");
                    out.println("<td>" + distrito + "</td>");
                    out.println("</tr>");
                }
            } else {
                out.println("<tr><td colspan=\"3\" class=\"text-center\">No se recibieron catastros.</td></tr>");
            }

            out.println("</tbody>");
            out.println("</table>");
            out.println("</div>"); 
            out.println("</div>"); 
            out.println("<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>");
            out.println("</body>");
            out.println("</html>");
        }
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }
}
