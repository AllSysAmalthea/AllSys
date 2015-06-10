package MessageAck;

import java.io.Serializable;

public class start extends MessageAck implements Serializable{

	/**
	 * 
	 */
	private static final long serialVersionUID = -7840167302641930954L;
	public String weather;
	public String new01_word ;
	public String new02_word ;
	public byte[] new01_picture;
	public byte[] new02_picture;
	
	public start()
	{
		super(0);
	}
	
	public start(String w, String word1,byte[] pic1,String word2, byte[] pic2) {
		super(0);
		weather = w;
		new01_word = word1;
		new01_picture = pic1;
		new02_word =word2;
		new02_picture= pic2;
		// TODO Auto-generated constructor stub
	}
	
}
