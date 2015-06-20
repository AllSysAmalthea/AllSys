package socket;

import java.io.EOFException;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

import MessageAck.MessageAck;
import MessageAck.location;
import MessageAck.login;
import MessageAck.register;
import MessageAck.search;
import MessageAck.task;
import sql.Database;

/**
 * Server main class
 * Listening Android application
 * @author FormalHHH
 *
 */

public class Server {
	private int serverPort; 
	private Database db;
	private ServerSocket servsock;
	Server() {
		this("8000");
	}
	Server(String s) {
		serverPort = Integer.parseInt(s);
		ExecutorService threadPool = Executors.newCachedThreadPool();
		db = new Database();
		try {
			servsock = new ServerSocket(serverPort);
			System.out.println("Server listening..");
			while (true) {
				Socket sock=servsock.accept();
				System.out.println("Accept!");
				threadPool.execute(new HandleAClient(sock,db));
			}
		} catch (IOException e) {
			// TODO 自动生成的 catch 块
			e.printStackTrace();
		}
	}
	public int getServerPort() {
		return serverPort;
	}
	public void setServerPort(int serverPort) {
		this.serverPort = serverPort;
	}
	public Database getDb() {
		return db;
	}
	public void setDb(Database db) {
		this.db = db;
	}
	public ServerSocket getServsock() {
		return servsock;
	}
	public void setServsock(ServerSocket servsock) {
		this.servsock = servsock;
	}
}

/**
 * Handler thread
 * Deal with Android messages
 * @author FormalHHH
 *
 */

class HandleAClient implements Runnable {
	private Socket socket;
	private Database db;
	//private static ArrayList<String> users = new ArrayList<String>();
	
	public HandleAClient(Socket socket,Database db) {
		System.out.println("Handling a new client!");
		this.socket = socket;
		this.db = db;
	}
	@Override
	public void run() {
		try {
			ObjectOutputStream output = new ObjectOutputStream(socket.getOutputStream());
			ObjectInputStream input = new ObjectInputStream(socket.getInputStream());
			while (true) {
				MessageAck m = (MessageAck) input.readObject();
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
				case 7://task
					db.taskHandler((task)m,output);
					break;
				case 9:
					db.locationHandler((location)m);
				}
			}
		} catch (EOFException e) {
			System.out.println("Socket closed. Exit thread");
		} catch (Exception e) {
			// TODO 自动生成的 catch 块
			e.printStackTrace();
		}
		
	}
	public Socket getSocket() {
		return socket;
	}
	public void setSocket(Socket socket) {
		this.socket = socket;
	}
	public Database getDb() {
		return db;
	}
	public void setDb(Database db) {
		this.db = db;
	}
}