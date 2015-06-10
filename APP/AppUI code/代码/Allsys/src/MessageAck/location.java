package MessageAck;

import java.io.Serializable;

public class location extends MessageAck implements Serializable{
	/**
	 * 
	 */
	private static final long serialVersionUID = 575805929023323838L;
	
	public double jingdu;
	public double weidu;
	
	public location(double j, double w)
	{
		super(9);
		
		jingdu = j;
		weidu = w;
	}
	
	
}
