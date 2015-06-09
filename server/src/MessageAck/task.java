package MessageAck;

import java.io.Serializable;

public class task extends MessageAck implements Serializable{
	
	/**
	 * 
	 */
	private static final long serialVersionUID = 5696789059628483557L;
	public int task_type; //1-Done  2-Buzy  3-free
	public String username;
	
	public task(int t) {
		super(7);
		task_type =  t;
		// TODO Auto-generated constructor stub
	}
	
	public task(int t, String s) {
		super(7);
		task_type =  t;
		username = s;
		// TODO Auto-generated constructor stub
	}

}
