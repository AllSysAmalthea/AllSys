package com.example.allsys;

import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.InetAddress;
import java.net.Socket;

import android.app.Application;
import android.util.Log;

public class ApplicationUtil extends Application{

	private Socket socket;
	private ObjectOutputStream out = null;
	private ObjectInputStream in = null;


	public void init(String addr,int port) throws IOException, Exception{
		Log.v("socket", "create_socket! "+addr+" "+String.valueOf(port));
		this.socket = new Socket(addr,port);
		this.out = new ObjectOutputStream(socket.getOutputStream());
		this.in = new ObjectInputStream(socket.getInputStream());
	}
	
	public Socket getSocket() {
		return socket;
	}

	public void setSocket(Socket socket) {
		this.socket = socket;
	}

	public ObjectOutputStream getOut() {
		return out;
	}

	public void setOut(ObjectOutputStream out) {
		this.out = out;
	}

	public ObjectInputStream getIn() {
		return in;
	}

	public void setIn(ObjectInputStream in) {
		this.in = in;
	}
	
}
