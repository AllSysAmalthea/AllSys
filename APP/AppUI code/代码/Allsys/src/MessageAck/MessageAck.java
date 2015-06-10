package MessageAck;

import java.io.Serializable;

public class MessageAck implements Serializable{
	/**
	 * 
	 */
	private static final long serialVersionUID = 2254895096485824374L;
	public int type; //1-login 2-loginack 3-register 4-registerack
			  //5-search 6-searchack  7-task  8-taskack
			  //9-location
			  //0-start  
	
	public MessageAck(int t)
	{
		type = t;
	}
}
