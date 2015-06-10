package MessageAck;

import java.io.Serializable;

public class login extends MessageAck implements Serializable{

	/**
	 * 
	 */
	private static final long serialVersionUID = -2090540484181784233L;
	public String username,password;
	
	public login(String u,String p) {
		super(1);
		username = u;
		password = p;
		// TODO Auto-generated constructor stub
	}

}
