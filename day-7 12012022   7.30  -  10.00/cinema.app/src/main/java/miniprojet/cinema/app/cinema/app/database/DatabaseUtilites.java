package miniprojet.cinema.app.cinema.app.database;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Optional;

public class DatabaseUtilites {
	
	
	
	
	public ResultSet getMoviesList() {

        
        String sqlSelectAllPersons = "SELECT * FROM movies";
        String connectionUrl = "jdbc:mysql://localhost:3306/cinemaapp?serverTimezone=UTC";

        try {
        	Connection conn = DriverManager.getConnection(connectionUrl, "root", "");
        	PreparedStatement ps = conn.prepareStatement(sqlSelectAllPersons); 
            ResultSet rs = ps.executeQuery(); 
            
            return rs;
            
        
        } catch (SQLException e) {
            // handle the exception
        	System.out.println(e.getMessage());
        	
        	return null;
        }
	}
        
	
        
        
        
	
	public ResultSet signinWithUsernameAndPassword(String username, String password) {

        
        String sqlSelectAllPersons = "SELECT * FROM `users` WHERE `username` = ? AND `password` = ?";
        String connectionUrl = "jdbc:mysql://localhost:3306/cinemaapp?serverTimezone=UTC";

        try {
        	Connection conn = DriverManager.getConnection(connectionUrl, "root", "");
        	PreparedStatement ps = conn.prepareStatement(sqlSelectAllPersons); 
                
                ps.setString(1, username);
                ps.setString(2, password);
                
                ResultSet rs = ps.executeQuery(); 
            
            return rs;
            
        
        } catch (SQLException e) {
            // handle the exception
        	System.out.println(e.getMessage());
        	
        	return null;
        }
	}
        
        
        
        
        
        
        
	
	public boolean createAccount( String username, String password, String fullname) {

        
        String sqlSelectAllPersons = "INSERT INTO `users`( `username`, `password`, `fullname`) VALUES (?,?,?)";
        String connectionUrl = "jdbc:mysql://localhost:3306/cinemaapp?serverTimezone=UTC";

        try {
        	Connection conn = DriverManager.getConnection(connectionUrl, "root", "");
        	PreparedStatement ps = conn.prepareStatement(sqlSelectAllPersons); 
                
                ps.setString(1, username);
                ps.setString(2, password);
                ps.setString(3, fullname);
                
                return ps.execute();
            
        
        } catch (SQLException e) {
            // handle the exception
        	System.out.println(e.getMessage());
        	
        	return false;
        }
	}
        
        
        

}
