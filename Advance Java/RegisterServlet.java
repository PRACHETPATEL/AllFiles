package com.servlets;

import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;

public class RegisterServlet extends HttpServlet {    
    public void doPost(HttpServletRequest req, HttpServletResponse res) throws IOException, ServletException {
        res.setContentType("text/html");
        String condition = "notcheck";
        PrintWriter out = res.getWriter();
        String name = req.getParameter("user_name");
        String email = req.getParameter("email");
        String password = req.getParameter("password");
        String gender = req.getParameter("gender");
        String course = req.getParameter("course");
        condition = req.getParameter("agree");
        if (condition == null) {
            out.println("<h1>Form not subbmited!!</h1>");
            out.println("<h1>Please Agree Terms And Conditions </h1>");
        }
        else if (condition.equals("check")) {
            out.println("<h1>Form Subbmited</h1>");
            out.println("<h2>Name: " + name + "</h2>");
            out.println("<h2>Email: " + email + "</h2>");
            out.println("<h2>Password: " + password + "</h2>");
            out.println("<h2>Gender: " + gender + "</h2>");
            out.println("<h2>Course: " + course + "</h2>");
        }
        
    }
}
