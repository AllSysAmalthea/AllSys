package message;

import java.io.Serializable;

public class searchack extends Message implements Serializable{

	public int status; //1-successful 2-failed
	public String message;
	
	public searchack(int t,int s, String m) {
		super(t);
		status = s;
		message = m;
		// TODO Auto-generated constructor stub
	}

}
