package sql;

import java.io.IOException;
import java.io.ObjectOutputStream;
import java.net.Socket;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import MessageAck.*;

public class Database {
	Connection conn;
	Statement stmt;
	ResultSet task;
	int tno;
	String tname,tremark;
	boolean free = true;
	boolean havetask = false;
	public Database () {
		try {
			Class.forName("com.mysql.jdbc.Driver");
			Class.forName("com.mysql.jdbc.Driver").newInstance();
		} catch (InstantiationException e1) {
			// TODO 自动生成的 catch 块
			e1.printStackTrace();
		} catch (IllegalAccessException e1) {
			// TODO 自动生成的 catch 块
			e1.printStackTrace();
		} catch (ClassNotFoundException e1) {
			// TODO 自动生成的 catch 块
			e1.printStackTrace();
		}
		try {
			conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/allsys","allsys","B2w7KVuDDYvb694J");
			stmt = conn.createStatement();
		} catch (SQLException e) {
			// TODO 自动生成的 catch 块
			e.printStackTrace();
		}
		System.out.println("Database connected.");
	}
	public loginack loginHandler(login m) {
		loginack res = new loginack(m.username);
		System.out.println("Login: "+m.username);
		try {
			ResultSet rs = stmt.executeQuery(
					"select Pass "
					+ "from citizen "
					+ "where ID='" + m.username + "'");
			if (rs.next()) {
				String password = rs.getString("Pass");
				if (m.password.equals(password)) {
					System.out.println("Login success");
					res.status = 1;
				}
				else {
					System.out.println("Wrong password");
					res.status = 0;
				}
			} else {
				System.out.println("No user \"" + m.username + "\"found");
				res.status = 0;
			}
		} catch (SQLException e) {
			// TODO 自动生成的 catch 块
			e.printStackTrace();
			res.status = 0;
		}
		return res;
	}
	public registerack registerHandler(register m) {
		registerack res;
		System.out.println("Register: "+m.username);
		try {
			stmt.executeUpdate(
					"insert into citizen(NAME,ID,Pass,BLOODTYPE,HOME) values(" +
					"'" + m.username + "'," +
					"'" + m.id + "'," +
					"'" + m.password + "'," +
					"'" + m.blood + "'," +
					"'" + m.addr + "')");
			stmt.executeUpdate(
					"insert into volunteer(ID) values(" +
					"'" + m.id + "')");
			res = new registerack(1);
		} catch (SQLException e) {
			// TODO 自动生成的 catch 块
			e.printStackTrace();
			res = new registerack(0);
		}
		return res;
	}
	public searchack searchHandler(search m) {
		searchack res;
		try {
			ResultSet rs = stmt.executeQuery("select * "
											+ "from citizen,victim "
											+ "where citizen.ID=victim.ID and citizen.ID='" + m.id + "'");
			String str = "";
			if (rs.next()) {
				String s;
				s = rs.getString("ID");
				if (s!=null) str += "ID: " + s + "\r\n";
				s = rs.getString("Name");
				if (s!=null) str += "Name: " + s + "\r\n";
				s = (rs.getInt("Sex")==0?"male":"female");
				str += "Sex: " + s + "\r\n";
				s = rs.getString("Race");
				if (s!=null) str += "Race: " + s + "\r\n";
				s = rs.getString("Home");
				if (s!=null) str += "Home: " + s + "\r\n";
				s = rs.getString("Bloodtype");
				if (s!=null) str += "Bloodtype: " + s + "\r\n";
				s = rs.getString("Vstatus");
				if (s!=null) str += "Status: " + s + "\r\n";
				s = rs.getDate("Vtime").toString();
				str += "Found time: " + s + "\r\n";
				s = rs.getString("Vplace");
				if (s!=null) str += "Found place: " + s + "\r\n"; 
			} else {
				str = "No victim that ID is " + m.id + " found";
			}
			res = new searchack(1,str);
		} catch (SQLException e) {
			// TODO 自动生成的 catch 块
			e.printStackTrace();
			res = new searchack(2,"Failed");
		}
		return res;
	}
	public void taskHandler(task m,ObjectOutputStream output) {
		if (m.task_type==0) {
			new Thread(new Runnable(){
				@Override
				public void run() {
					// TODO 自动生成的方法存根
					System.out.println("\t\ttaskHandler: new thread");
					task = null;
					while (true) {
						if (free) {
							try {
								if (!havetask) {
									task = stmt.executeQuery("select * " + 
															"from task " + 
															"where Tno=(select Tno " + 
																		"from vo_t " + 
																		"where Announced=0 and Vono=(select Vono " + 
																									"from volunteer " + 
																									"where ID='" + m.username + "'))");
									if (task.next()) {
										havetask = true;
										tno = task.getInt("Tno");
										tname = task.getString("Tname");
										tremark = task.getString("Tremark");
									}
									else {
										havetask = false;
										tno = 0;
										tname = null;
										tremark = null;
									}
								} 
								if (havetask) {
									System.out.println("\t\ttaskHandler: found a task");
									stmt.executeUpdate("update volunteer " +
														"set Vostatus=3 " + 
														"where ID='" + m.username + "'");
									stmt.executeUpdate("update vo_t " +
														"set Announced=1 " + 
														"where Tno=" + tno + " and Vono=(select Vono " + 
																						"from volunteer " + 
																						"where ID='" + m.username + "')");
									taskack message = new taskack(0,tname + "\r\n\r\n" + tremark + "\r\n");
									output.writeObject(message);
								} else {
									System.out.println("\t\ttaskHandler: no task found");
								}
							} catch (SQLException | IOException e) {
								// TODO 自动生成的 catch 块
								e.printStackTrace();
							}
						}
						System.out.println("\t\ttaskHandler: task check is over, next term after 10 secs");
						try {
							Thread.sleep(10000);
						} catch (InterruptedException e) {
							// TODO 自动生成的 catch 块
							e.printStackTrace();
						}
					}
					
				}
			}).start();
		} else {
			switch (m.task_type) {
			default:
				try {
					throw new Exception("Unexpected task type");
				} catch (Exception e2) {
					// TODO 自动生成的 catch 块
					e2.printStackTrace();
				}
				break;
			case 1:
				try {
					stmt.executeUpdate("update task " +
										"set Tstatus=2 " + 
										"where Tno='" + tno + "'");
					stmt.executeUpdate("update volunteer " +
										"set Vostatus=1 " + 
										"where ID='" + m.username + "'");
					havetask = false;
					tno = 0;
					tname = null;
					tremark = null;
					taskack message = new taskack(1);
					output.writeObject(message);
				} catch (SQLException e) {
					// TODO 自动生成的 catch 块
					e.printStackTrace();
					taskack message = new taskack(2);
					try {
						output.writeObject(message);
					} catch (IOException e1) {
						// TODO 自动生成的 catch 块
						e1.printStackTrace();
					}
				} catch (IOException e) {
					// TODO 自动生成的 catch 块
					e.printStackTrace();
				}
				break;
			case 2:
				System.out.println(m.username + ": change to busy");
				try {
					stmt.executeUpdate("update volunteer " +
										"set Vostatus=1 " + 
										"where ID='" + m.username + "'");
				} catch (SQLException e1) {
					// TODO 自动生成的 catch 块
					e1.printStackTrace();
				}
				free = false;
				taskack message = new taskack(3);
				try {
					output.writeObject(message);
				} catch (IOException e) {
					// TODO 自动生成的 catch 块
					e.printStackTrace();
				}
				break;
			case 3:
				System.out.println(m.username + ": change to free");
				try {
					stmt.executeUpdate("update volunteer " +
							"set Vostatus=2 " + 
							"where ID='" + m.username + "'");
				} catch (SQLException e1) {
					// TODO 自动生成的 catch 块
					e1.printStackTrace();
				}
				free = true;
				taskack message1 = new taskack(3);
				try {
					output.writeObject(message1);
				} catch (IOException e) {
					// TODO 自动生成的 catch 块
					e.printStackTrace();
				}
				break;
			}
		}
	}
}
