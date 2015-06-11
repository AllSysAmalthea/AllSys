package hextopng;

import java.awt.image.BufferedImage;
import java.io.BufferedReader;
import java.io.ByteArrayInputStream;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;

import javax.imageio.ImageIO;

public class HextoPNG {
	public static int CharToHex(char c) {
		if (c>='0'&&c<='9')
			return c-'0';
		if (c>='A'&&c<='F')
			return c-'A'+10;
		if (c>='a'&&c<='f')
			return c-'a'+10;
		return -1;
	}
	public static byte HexStringToByte(String s) throws Exception {
		if (s.length()!=2)
			throw new Exception("Illegal hex");
		return (byte) (CharToHex((s.charAt(0)))*16+CharToHex(s.charAt(1)));
	}
	public static void main(String[] args) throws IOException {
		byte[] img = new byte[32000];
		String line;
		String[] bts;
		@SuppressWarnings("resource")
		BufferedReader br = new BufferedReader(new InputStreamReader(new FileInputStream("in.txt")));
		int j=0;
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
		ByteArrayInputStream bais = new ByteArrayInputStream(img);
		BufferedImage bi=ImageIO.read(bais);
		System.err.println(j + " " + bi);
		ImageIO.write(bi, "PNG", new FileOutputStream("out.png"));
	}
}
