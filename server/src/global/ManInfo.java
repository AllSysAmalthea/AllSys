package global;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

/*
 * 普通个人信息
 * name		姓名
 * race		民族
 * ID		身份证号
 * huji		户籍
 * bloodtype	血型
 * relativeName	亲属姓名
 * relativeContact	亲属联系方式
 * 
 */
public class ManInfo {
	private String name;
	private String race;
	private String ID;
	private String huji;
	private String bloodtype;
	private String relativeName;
	private String relativeContact;
	
	/*
	 * 使用{}分隔的字符串构造
	 * 格式为{"name"}{"race"}{"ID"}{"huji"}{"bloodtype"}{"relativeName"}{"relativeContact"}
	 */
	ManInfo() {
		name = "";
		race = "";
		ID = "";
		huji = "";
		bloodtype = "";
		relativeName = "";
		relativeContact = "";
	}
	ManInfo(String info) {
		Pattern pattern=Pattern.compile("\\{\".*\"\\}");
		Matcher matcher=pattern.matcher(info);
		name		=matcher.group(1);
		race		=matcher.group(2);
		ID			=matcher.group(3);
		huji		=matcher.group(4);
		bloodtype	=matcher.group(5);
		relativeName=matcher.group(6);
		relativeContact=matcher.group(7);		
	}
	public String getName() {
		return name;
	}
	public String getRace() {
		return race;
	}
	public String getID() {
		return ID;
	}
	public String getHuji() {
		return huji;
	}
	public String getBloodtype() {
		return bloodtype;
	}
	public String getRelativeName() {
		return relativeName;
	}
	public String getRelativeContact() {
		return relativeContact;
	}
	//返回{}分隔的字符串
	public String getInfo() throws Exception {
		String ret;
		ret="{\""+getName()+"}\"";
		ret+="{\""+getRace()+"\"}";
		ret+="{\""+getID()+"\"}";
		ret+="{\""+getHuji()+"\"}";
		ret+="{\""+getBloodtype()+"\"}";
		ret+="{\""+getRelativeName()+"\"}";
		ret+="{\""+getRelativeContact()+"\"}";
		return ret;
	}
}
