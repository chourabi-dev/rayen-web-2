package miniprojet.cinema.app.cinema.app;

import java.awt.Color;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import javax.swing.JButton;

import miniprojet.cinema.app.cinema.app.database.DatabaseUtilites;

/**
 * Hello world!
 *
 */
public class App 
{
    public static void main( String[] args )
    {
        /*System.out.println( "Hello World!" );
        
        
        
        
        DatabaseUtilites db = new DatabaseUtilites();
        
        
        ResultSet movies =  db.getMoviesList();
        
        
        try {
        	while (movies.next()) {

                String title = movies.getString("title");

                // do something with the extracted data...
                
                System.out.println(title);
            }
        }catch (SQLException e) {
            // handle the exception
        	System.out.println(e.getMessage());
        	 
        }*/
        
        
       
    /*
           MainWindow moviesScreen = new MainWindow();
       
       
       moviesScreen.setTitle("Welcome to my movie theatre");
       moviesScreen.setVisible(true);
       
       JButton button = new JButton();
       
       
       button.setText("click me");
       button.setBackground(Color.red);
       
       
       moviesScreen.getPanel1().setBackground(Color.white);
       moviesScreen.getPanel1().add(button);
        */
        
        
        
        Intro intro = new Intro();
       
       intro.setTitle("Welcome to my movie theatre");
       intro.setVisible(true);
       
       
       intro.getjButton2().addActionListener(new ActionListener() {

           @Override
            public void actionPerformed(ActionEvent e) { 
                ((JButton)e.getSource()).getParent().getParent().getParent().getParent().setVisible(false);
                
                Dashboard admin = new Dashboard();
                
                admin.setTitle("Admin dashboard");
                admin.setVisible(true);
            }
            
        });
       
       
        intro.getjButton1().addActionListener(new ActionListener() {

           @Override
            public void actionPerformed(ActionEvent e) { 
                ((JButton)e.getSource()).getParent().getParent().getParent().getParent().setVisible(false);
                
                   MainWindow moviesScreen = new MainWindow();
       
       
                    moviesScreen.setTitle("Sign up");
                    moviesScreen.setVisible(true);
                    
                    
            }
            
        });
       
        
        
        
    }
}
