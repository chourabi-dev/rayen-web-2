package rayendemo;

public class Voiture {
	
	
	// ALL CLASS ATTRIBUTES ARE PRIVATE => ENCAPSULATION
	
	private String mark;
	private String model;
	
	
	
	// DEFUALT CONSTRUCTOR
	public Voiture(){
		
	}

	
	public Voiture(String mark, String model) { 
		this.mark = mark;
		this.model = model;
	}

	

	public String getMark() {
		return mark;
	}


	public void setMark(String mark) {
		this.mark = mark;
	}


	public String getModel() {
		return model;
	}


	public void setModel(String model) {
		this.model = model;
	}


	public String detailsVoiture(){
		
		return this.mark.concat( " " ).concat(this.model);
	}
}
