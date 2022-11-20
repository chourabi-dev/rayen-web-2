package rayendemo;

public class Employee  extends Person  {

	private String dep;
	
	
	public Employee(String dep, String firstname, String lastname, int age) {
		
		
		// we must call Person constructor
		
		super(firstname,lastname,age);  // New PERSON
		 
		this.dep = dep;
	}
	


	public String getDep() {
		return dep;
	}


	public void setDep(String dep) {
		this.dep = dep;
	}
	
	
	@Override
	public String walk() {
		return "Employee is always runnung...";
	}
	
	
	
	
	// REDEFENITION toString
	
	
	@Override  // EACH CLASS OOP EXTENDS CLASS Object, In object we have some methods, including toString, => Override => delete old declartio and replace it with new methid
	public String toString() {
		return this.getFirstname().concat(" ").concat( this.getDep() );
	}
	
	
	
	
	
}
