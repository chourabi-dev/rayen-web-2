package rayendemo;

public class App {

	public static void main(String[] args) {

		
		// CREATE NEW INSTANCE !!!!! 
		
	//	Voiture voiture = new Voiture();  
		
		// CREATE NEW INSTANCE !!!!!  
		// Voiture voiture2 = new Voiture( "BMW", "X6" );   
		// System.out.println( voiture2.detailsVoiture() );
		
		
	
		Person person = new Person("chourabi","taher",6);
		
		
		
		Employee e = new Employee("DEP-INFO","CHOURABI", "TAHER", 12);
		
		
		System.out.println( e.getDep() );
		System.out.println( e.getFirstname() );
		
		
		System.out.println( e.walk() );
		
		
		
		
		
		
		
		

	}

}
