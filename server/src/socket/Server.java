package socket;

import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.ArrayList;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

import message.*;
import sql.Database;


public class Server {
	public static int serverPort = 31241; 
	private static Database db;
	ServerSocket servsock;
	Server() {
		ExecutorService threadPool = Executors.newCachedThreadPool();
		db = new Database();
		try {
			servsock = new ServerSocket(serverPort);
			while (true) {
				Socket sock=servsock.accept();
				threadPool.execute(new HandleAClient(sock));
			}
			
		} catch (IOException e) {
			// TODO 自动生成的 catch 块
			e.printStackTrace();
		}
	}
}

class HandleAClient implements Runnable {
	private Socket socket;
	private Database db;
	//private static ArrayList<String> users = new ArrayList<String>();
	
	public HandleAClient(Socket socket) {
		this.socket = socket;
	}
	@Override
	public void run() {
		try {
			ObjectOutputStream output = new ObjectOutputStream(socket.getOutputStream());
			ObjectInputStream input = new ObjectInputStream(socket.getInputStream());
			while (true) {
				Message m = (Message) input.readObject();
				switch (m.type) {
				default:
					throw new Exception("Unexpected Package Type");
				case 1://login
					output.writeObject(db.loginHandler((login)m));
					break;
				case 3://register
					output.writeObject(db.registerHandler((register)m));
					break;
				case 5://search
					output.writeObject(db.searchHandler((search)m));
					break;
				/*case 7://task
					output.writeObject(db.taskHandler((task)m));
					break;*/
				}
			}
		} catch (Exception e) {
			// TODO 自动生成的 catch 块
			e.printStackTrace();
		}
		
	}
}