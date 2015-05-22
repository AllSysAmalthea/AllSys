package socket;

import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.ArrayList;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

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
		
	}
}