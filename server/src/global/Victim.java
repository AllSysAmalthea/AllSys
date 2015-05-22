package global;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

/*
 * 灾民
 * status：状态
 * 父类：ManInfo
 * 子类：MissingVictim、DeadVictim、InjuredVictim
 */
public class Victim extends ManInfo {
	int status;
	
	/*
	 * 使用{}分隔的字符串构造
	 * 格式为{}{}{}{}{}{}{}{status}
	 */
	Victim(String info) {
		super(info);
		Pattern pattern=Pattern.compile("\\{[0-2]\\}");
		Matcher matcher=pattern.matcher(info);
		setStatus((int)(info.charAt(matcher.start()+1)-'0'));
	}
	@Override
	public String getInfo() throws Exception {
		String ret=super.getID();
		ret+="{"+status+"}";
		if (status==0)
			ret+=((MissingVictim)this).getInfo();
		else if (status==1)
			ret+=((DeadVictim)this).getInfo();
		else if (status==2)
			ret+=((InjuredVictim)this).getInfo();
		else
			throw new Exception("灾民状态异常");
		return ret;
	}

	public int getStatus() {
		return status;
	}

	public void setStatus(int status) {
		this.status = status;
	}
}
