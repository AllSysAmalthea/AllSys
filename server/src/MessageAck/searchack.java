package MessageAck;

import java.io.Serializable;

public class searchack extends MessageAck implements Serializable{

	/**
	 * 
	 */
	private static final long serialVersionUID = 7962155794804381156L;
	public int status; //1-successful 2-failed
	public String message;
	
	public searchack(int s, String m) {
		super(6);
		status = s;
		message = m;
		// TODO Auto-generated constructor stub
	}

}
