package MessageAck;

import java.io.Serializable;

public class loginack extends MessageAck implements Serializable{

	/**
	 * 
	 */
	private static final long serialVersionUID = 6520412544928404026L;
	public int status; //1-successful 0-failed
	public String username;
	
	public loginack(String u) {
		super(2);
		username = u;
		// TODO Auto-generated constructor stub
	}
	
}
