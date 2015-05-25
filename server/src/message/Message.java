package message;

public class Message {
	public int type; //1-login 2-loginack 3-register 4-registerack
			  //5-search 6-searchack  7-task  8-taskack
			  //0-start  
	
	public Message(int t)
	{
		type = t;
	}
}
