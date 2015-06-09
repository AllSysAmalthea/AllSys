package MessageAck;

import java.io.Serializable;

public class taskack extends MessageAck implements Serializable{


	/**
	 * 
	 */
	private static final long serialVersionUID = -44536523960040950L;
	public int taskack_type;//0-task   1-Done successful  2-Done fail  3-state change successful 4-state change fail   
	public String task; 
	
	public taskack(int t) {
		super(8);
		taskack_type = t;
		// TODO Auto-generated constructor stub
	}
	
	public taskack(int t,String tsk) {
		super(8);
		taskack_type = t;
		task = tsk;
		// TODO Auto-generated constructor stub
	}

}
