package Message;

import java.io.Serializable;

public class loginack extends MessageAck implements Serializable{

	public int status; //1-successful 0-failed
	public String username;
	
	public loginack(String u) {
		super(2);
		username = u;
		// TODO Auto-generated constructor stub
	}
	
}
