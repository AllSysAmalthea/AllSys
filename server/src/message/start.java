package message;

import java.io.Serializable;

public class start extends Message implements Serializable{

	public String weather;
	public String new01_word, new01_picture;
	public String new02_word, new02_picture;
	
	public start(int t) {
		super(t);
		// TODO Auto-generated constructor stub
	}
	
}
