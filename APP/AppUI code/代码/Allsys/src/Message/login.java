package Message;

import java.io.Serializable;

public class login extends Message implements Serializable{

	public String username,password;
	
	public login(int t,String u,String p) {
		super(t);
		username = u;
		password = p;
		// TODO Auto-generated constructor stub
	}

}
