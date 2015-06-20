package socket;

/**
 * Arg 1: Server port
 * Default: 8000
 * @author FormalHHH
 *
 */

public class Main {
	public static void main(String args[]) {
		if (args.length==0)
			new Server("8000");
		else if (args.length==1)
			new Server(args[0]);
	}
}
