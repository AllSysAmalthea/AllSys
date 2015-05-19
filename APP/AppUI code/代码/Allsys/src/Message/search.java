package Message;

import java.io.Serializable;

public class search extends Message implements Serializable{

	public int search_type; //1-people 2-house
	public String name,id;
	
	public search(int t,int st, String n,String i) {
		super(t);
		search_type = st;
		name = n;
		id = i;
		// TODO Auto-generated constructor stub
	}

}
