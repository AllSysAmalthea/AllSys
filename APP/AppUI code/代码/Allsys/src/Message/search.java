package Message;

import java.io.Serializable;

public class search extends MessageAck implements Serializable{

	public int search_type; //1-people 2-house
	public String name,id;
	
	public search(int st, String n,String i) {
		super(5);
		search_type = st;
		name = n;
		id = i;
		// TODO Auto-generated constructor stub
	}

}
