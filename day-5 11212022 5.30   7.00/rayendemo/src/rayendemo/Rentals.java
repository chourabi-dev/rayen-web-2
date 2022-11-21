package rayendemo;

import java.util.ArrayList;
import java.util.List;

public class Rentals {
	
	private List<Property> properties ;
	
	public Rentals() {
		this.properties = new ArrayList<Property>();
		
	}
	
	
	public void addProperty( Property tmp ) {
		this.properties.add(tmp);
	}
	
	public void removeProperty( int id ) {
		
		for(int i = 0 ; i < this.properties.size(); i++) {
			
			
			if( this.properties.get(i).getId() == id ) {
				this.properties.remove(i);
				break;
			}
			
			
		}

	}
	
	
	public Property getPropertyByID( int id ) {
		
		for(int i = 0 ; i < this.properties.size(); i++) {
			
			
			if( this.properties.get(i).getId() == id ) {
				return this.properties.get(i);
			}
			
			
		}
		
		
		return null;

	}
	
	
	
	public Property compare( Property tmp1, Property tmp2 ) {
		
		if( tmp1.getPrice() < tmp2.getPrice() ) {
			return tmp1;
		}
		
		return tmp2;

	}


	public List<Property> getProperties() {
		return properties;
	}


	public void setProperties(List<Property> properties) {
		this.properties = properties;
	}
	
	
	
	
	
	
	
}
