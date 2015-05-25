package message;

import java.io.Serializable;

public class register extends Message implements Serializable{

	public String username,tel,id,password,blood,addr;
	
	public register(int t,String u, String te, String i, String p, String b, String a) {
		super(t);
		username = u;
		tel = te;
		id = i;
		password = p;
		blood = b;
		addr = a;
		// TODO Auto-generated constructor stub
	}

}
