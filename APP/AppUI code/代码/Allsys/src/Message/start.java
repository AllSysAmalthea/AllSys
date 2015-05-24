package Message;

import java.io.Serializable;

public class start extends MessageAck implements Serializable{

	public String weather;
	public String new01_word, new01_picture;
	public String new02_word, new02_picture;
	
	public start() {
		super(0);
		// TODO Auto-generated constructor stub
	}
	
}
