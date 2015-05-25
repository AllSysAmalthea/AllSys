package sql;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import message.*;

public class Database {
	Connection conn;
	Statement stmt;
	public Database () {
		try {
			conn = DriverManager.getConnection("", "", "");
			stmt = conn.createStatement();
		} catch (SQLException e) {
			// TODO 自动生成的 catch 块
			e.printStackTrace();
		}
	}
	public loginack loginHandler(login m) {
		loginack res = new loginack(2,m.username);
		try {
			ResultSet rs = stmt.executeQuery(
					"select Pass "
					+ "from User "
					+ "which ID='" + m.username + "'");
			String password = rs.getString("Pass");
			if (m.password.equals(password)) res.status = 1;
			else res.status = 0;
		} catch (SQLException e) {
			// TODO 自动生成的 catch 块
			e.printStackTrace();
			res.status = 0;
		}
		return res;
	}
	public registerack registerHandler(register m) {
		registerack res;
		try {
			ResultSet rs = stmt.executeQuery(
					"insert into User(NAME,ID,Pass,BLOODTYPE,HOME) values(" +
					"'" + m.username + "'," +
					"'" + m.id + "'," +
					"'" + m.password + "'," +
					"'" + m.blood + "'," +
					"'" + m.addr + "')");
			res = new registerack(4,1);
		} catch (SQLException e) {
			// TODO 自动生成的 catch 块
			e.printStackTrace();
			res = new registerack(4,0);
		}
		return res;
	}
	public searchack searchHandler(search m) {
		searchack res;
		try {
			ResultSet rs = stmt.executeQuery("");
			while (rs.next()) {
				
			}
			res = new searchack(6,1,"");
		} catch (SQLException e) {
			// TODO 自动生成的 catch 块
			e.printStackTrace();
			res = new searchack(6,0,"");
		}
		return res;
	}
}
