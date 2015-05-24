package Message;

import java.io.Serializable;

public class registerack extends MessageAck implements Serializable{
	
	public int status; //1-successful 2-failed
	
	public registerack(int s) {
		super(4);
		status = s;
		// TODO Auto-generated constructor stub
	}

	

}
