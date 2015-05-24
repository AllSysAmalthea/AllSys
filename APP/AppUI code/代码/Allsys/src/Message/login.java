package Message;

import java.io.Serializable;

public class login extends MessageAck implements Serializable{

	public String username,password;
	
	public login(String u,String p) {
		super(1);
		username = u;
		password = p;
		// TODO Auto-generated constructor stub
	}

}
