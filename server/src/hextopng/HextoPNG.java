package hextopng;

import java.awt.image.BufferedImage;
import java.io.BufferedReader;
import java.io.ByteArrayInputStream;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;

import javax.imageio.ImageIO;

/**
 * This class can turn a TXT file into a PNG file
 * if the TXT file is a sequence of hexadecimal bytes 
 * @author FormalHHH
 *
 */

public class HextoPNG {
	HextoPNG() {
		
	}
	public static int CharToHex(char c) {
		if (c>='0'&&c<='9')
			return c-'0';
		if (c>='A'&&c<='F')
			return c-'A'+10;
		if (c>='a'&&c<='f')
			return c-'a'+10;
		return -1;
	}
	public byte HexStringToByte(String s) throws Exception {
		if (s.length()!=2)
			throw new Exception("Illegal hex btte");
		return (byte) (CharToHex((s.charAt(0)))*16+CharToHex(s.charAt(1)));
	}
	public BufferedImage BRToBI(BufferedReader br) {
		byte[] img = new byte[32000];
		String line;
		String[] bts;
		int j=0;
		try {
			while (null!=(line=br.readLine())) {
				bts=line.split(" ");
				for (int i=3; i<bts.length; i++) {
					System.err.println(bts[i]);
					try {
						img[j]=HexStringToByte(bts[i]);
						System.err.println(img[j]);
						j++;
					}
					catch (Exception e) {
						e.printStackTrace();
					}
				}
			}
		} catch (IOException e) {
			// TODO 自动生成的 catch 块
			e.printStackTrace();
		}
		ByteArrayInputStream bais = new ByteArrayInputStream(img);
		BufferedImage bi=null;
		try {
			bi = ImageIO.read(bais);
		} catch (IOException e) {
			// TODO 自动生成的 catch 块
			e.printStackTrace();
		}
		System.err.println(j + " " + bi);
		return bi;
	}
	public static void main(String[] args) throws IOException {
		String in,out;
		if (args.length==0)
			in = "in.txt";
		else
			in = args[0];
		if (args.length<2)
			out = "out.png";
		else
			out = args[1];
		HextoPNG me = new HextoPNG();
		BufferedReader br = new BufferedReader(
								new InputStreamReader(
									new FileInputStream(in)));
		BufferedImage bi=me.BRToBI(br);;
		ImageIO.write(bi, "PNG", new FileOutputStream(out));
	}
}
