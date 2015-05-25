package message;

import java.io.Serializable;

public class loginack extends Message implements Serializable{

	public int status; //1-successful 0-failed
	public String username;
	
	public loginack(int t,String u) {
		super(t);
		username = u;
		// TODO Auto-generated constructor stub
	}
	
}
