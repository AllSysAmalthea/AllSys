package sql;

import MessageAck.location;

/**
 * Algorithm to find the nearest volunteer
 * from the task place 
 * @author FormalHHH
 *
 */

public class Nearest {
	public static double square(double c) {
		return c*c;
	}
	public static double distance(location a,location b) {
		return Math.sqrt(square(a.jingdu - b.jingdu) + square(a.weidu - b.weidu)); 
	}
	public static location nearest(location t,location[] v) {
		location ret = new location(1000,1000);
		for (location e:v) {
			if (distance(e,t)<distance(ret,t)) {
				ret = e;
			}
		}
		return ret;
	}
}
