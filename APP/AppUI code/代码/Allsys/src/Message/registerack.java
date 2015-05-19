package Message;

import java.io.Serializable;

public class registerack extends Message implements Serializable{
	
	public int status; //1-successful 2-failed
	
	public registerack(int t, int s) {
		super(t);
		status = s;
		// TODO Auto-generated constructor stub
	}

	

}
