package global;

/*
 * 失踪的灾民
 * time		失踪时间
 * place	失踪地点
 * appearance	失踪时的衣着
 */

public class MissingVictim extends Victim {
	private Time time;
	private String place;
	private String appearance;
	private String remark;
	MissingVictim(String s) {
		super(s);
		time = new Time();
		place = "";
		appearance = "";
		remark = "";
	}
	MissingVictim(Time t,String p,String a,String r) {
		super();
		time = t;
		place = p;
		appearance = a;
		remark = r;
	}
	public Time getTime() {
		return time;
	}
	public void setTime(Time time) {
		this.time = time;
	}
	public String getPlace() {
		return place;
	}
	public void setPlace(String place) {
		this.place = place;
	}
	public String getAppearance() {
		return appearance;
	}
	public void setAppearance(String appearance) {
		this.appearance = appearance;
	}
	public String getRemark() {
		return remark;
	}
	public void setRemark(String remark) {
		this.remark = remark;
	}
}
