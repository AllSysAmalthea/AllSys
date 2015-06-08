package MessageAck;

import java.io.Serializable;

public class register extends MessageAck implements Serializable{

	/**
	 * 
	 */
	private static final long serialVersionUID = 2716597874033488017L;
	public String username,tel,id,password,blood,addr;
	
	public register(String u, String te, String i, String p, String b, String a) {
		super(3);
		username = u;
		tel = te;
		id = i;
		password = p;
		blood = b;
		addr = a;
		// TODO Auto-generated constructor stub
	}

}
