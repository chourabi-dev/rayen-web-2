package rayendemo;

import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class App {

	public static void main(String[] args) {

		
		// CREATE NEW INSTANCE !!!!! 
		
	    //	Voiture voiture = new Voiture();  
		
		// CREATE NEW INSTANCE !!!!!  
		// Voiture voiture2 = new Voiture( "BMW", "X6" );   
		// System.out.println( voiture2.detailsVoiture() );
		
		
	
		/*
		 * 	Person person = new Person("chourabi","taher",6);
		
		
		
		Employee e = new Employee("DEP-INFO","CHOURABI", "TAHER", 12);
		
		
		System.out.println( e.getDep() );
		System.out.println( e.getFirstname() );
		
		System.out.println( e.walk() );
		
		 * */
		
		
		/*
		// declation !!!
		List<String> employees;
		
		
		// init
		
		employees = new ArrayList<String>();
		
		
		// add element !!
		
		employees.add("chourabi taher");
		
		employees.add("rayen");
		
		
		System.out.println( employees.size() );
		
		
		
		// loop
		for(int i = 0; i < employees.size(); i++) {
			
			System.out.println( employees.get(i) );
		}
		
		
		// foreach
		
		for( String e : employees ) {
			System.out.println( e );
		}
		
		
		
		
		// delete by index !!! 
		employees.remove( 1 );
		
		
		for( String e : employees ) {
			System.out.println( e );
		}*/
		
		
		
		
		/*String username;
		String password;
		
		
		Scanner sc = new Scanner(System.in);
		
		
		// read from keyborad
		
		
		
		
		// check if username and password == admin admin else try 3 times
		boolean connected = false;
		int trys = 0;
		
		
		while( connected == false || trys < 3  ) {
			
			System.out.println("Username:");
			
			username = sc.nextLine();
			
			System.out.println("Password:");
			
			password = sc.nextLine();
			
			
			if( username.equals( "admin" ) && password.equals( "admin" )   ) {
				System.out.println("Welcome");
				connected = true;
				
			}else {
				System.out.println("Wrong username or password");
				trys++;
			}
			
		}
		
		 * */
		
		
		
		// Q1
		
		/*List<Integer> list = new ArrayList<Integer>();
		
		list.add(0);
		list.add(1);
		
		int n = 0;
		
		System.out.println("please enter list length:");

		Scanner sc = new Scanner(System.in);
		
		n = sc.nextInt();
		
		// 0  1 1 2 3 5 8 ..................
		
		if( n >= 3 ) {
			
			
			int itarations = n - 2;
			
			
			for( int i=0; i < itarations; i++ ) {
				
				list.add(  list.get( list.size() - 1 )  + list.get( list.size() - 2 )  );
			}
			
			
			// SHOW LIST TO USER
			
			
			for(int i:list) {
				System.out.print( i + " - " );
			}
			
			
			
		}else {
			System.out.println("Length must be >=  3 ");
		}*/
		
		
		/*
		
		
		Rentals r = new Rentals();
		
		Scanner sc = new Scanner(System.in);
		
		int rep = -1;
		
		while( rep == -1 ) {
			
			String choice;
			
			choice = sc.nextLine();

			switch( choice ) {
			 case "0" :
				 	System.out.println("address : ");
				 	String address = sc.nextLine();
				 	
				 	System.out.println("Price : ");
				 	float price = sc.nextFloat();
				 	
				 	
				 	System.out.println("rooms : ");
				 	int rooms = sc.nextInt();
				 	
				 	System.out.println("parking yes => 1 no  => 0 ");
				 	int res = sc.nextInt();
				 	
				 	System.out.println("ID : ");
				 	int id = sc.nextInt();
				 	
				 	boolean parking = res == 1 ? true : false;

				 	Property p = new Property(address,price,rooms,parking, id);
				 	
				 	r.addProperty(p);
				 	
				 	
				 	
				 
				  break;
			 case "1" :
				 
				 	for( Property tmp : r.getProperties() ) {
				 		System.out.println( tmp.getId()+ " "+ tmp.getAddress() );
				 	}
				 
				  break;
				  
			 case "2" :
				 
					System.out.println("delete ID : ");
				 	int idToDelete = sc.nextInt();
				 	
				 	r.removeProperty( idToDelete );
				 
				  break;
					  
				 
			 case "3" :
				 
				 
				 	System.out.println("compare ID 1 : ");
				 	int id1 = sc.nextInt();
				 	
				 	
				 	System.out.println("compare ID 2 : ");
				 	int id2 = sc.nextInt();
				 	
				 	
				 	
				 	
				 	System.out.println(   r.compare(  r.getPropertyByID(id1)  ,  r.getPropertyByID(id2)   ).getAddress()   );
				 	
				 	
				 
				 
				  break;
				  
			}
			

			
			
			
		}*/
		
		
		
		
		
		
		/*// declarer un tableau de 10 entier
		
		int[] notes;
		
		// give notes a size
		
		notes = new  int[10];
		
		
		// fill the tables
		
		Scanner sc = new Scanner(System.in);
		
		for(int i = 0; i < notes.length  ; i++) {
			System.out.println("Note N°"+ i +" :" );
			
			notes[i] =  sc.nextInt();
		}
		
		// calcul moyn !!
		
		int somme = 0;
		
		for(int i = 0; i < notes.length  ; i++) {
			
			somme += notes[i];
		}
		
		System.out.println("Moyen : "+ (somme / notes.length )  );*/
		
		
		
		
		Scanner sc = new Scanner(System.in);
		
		/*
		 * 
		
		List<Integer> notes = new ArrayList<Integer>();
		
		
		
		for(int i = 0; i < 10 ; i++) {
			System.out.println("Note N°"+ i +" :" );
			
			notes.add( sc.nextInt() ) ;
		}
		
		
		
		int somme = 0;
		
		for( int note:notes ) {
			
			somme += note;
		}
		
		System.out.println("Moyen : "+ (somme / 10 )  );
		 * */
		
		
		
		// Animal  => nom => pattes
		// Lion => jump() 
		
		
		Lion lion = new Lion("Simba",4);
		
		lion.jump();
		

	}

}
