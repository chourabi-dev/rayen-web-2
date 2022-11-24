package rayendemo;

public class Animal {

	private String nom;
	private int pattes;
	public String getNom() {
		return nom;
	}
	public int getPattes() {
		return pattes;
	}
	public void setNom(String nom) {
		this.nom = nom;
	}
	public void setPattes(int pattes) {
		this.pattes = pattes;
	}
	
	
	
	
	public Animal(String nom, int pattes) {
		this.nom = nom;
		this.pattes = pattes;
	}
	
	
}
