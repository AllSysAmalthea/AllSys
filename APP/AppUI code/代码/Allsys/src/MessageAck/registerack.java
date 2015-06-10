package MessageAck;

import java.io.Serializable;

public class registerack extends MessageAck implements Serializable{
	
	/**
	 * 
	 */
	private static final long serialVersionUID = -7948840264137924842L;
	public int status; //1-successful 2-failed
	
	public registerack(int s) {
		super(4);
		status = s;
		// TODO Auto-generated constructor stub
	}

	

}
