package rayendemo;

public class Property {

	private String address;
	private float price;
	private int rooms;
	private boolean parking;
	private int id;
	
	
	
	
	public String getAddress() {
		return address;
	}
	public void setAddress(String address) {
		this.address = address;
	}
	public float getPrice() {
		return price;
	}
	public void setPrice(float price) {
		this.price = price;
	}
	public int getRooms() {
		return rooms;
	}
	public void setRooms(int rooms) {
		this.rooms = rooms;
	}
	public boolean isParking() {
		return parking;
	}
	public void setParking(boolean parking) {
		this.parking = parking;
	}
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public Property(String address, float price, int rooms, boolean parking, int id) {
		super();
		this.address = address;
		this.price = price;
		this.rooms = rooms;
		this.parking = parking;
		this.id = id;
	}


	
}
