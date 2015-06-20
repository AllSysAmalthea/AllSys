package global;

/*
 * 受伤的灾民
 * time		受伤时间
 * place	受伤地点
 * description	伤情描述
 */
 
public class InjuredVictim extends Victim {
	private Time time;
	private String place;
	private String description;
	private String remark;
	InjuredVictim(String s) {
		super(s);
		time = new Time();
		place = "";
		description = "";
		remark = "";
	}
	InjuredVictim(Time t,String p,String d,String r) {
		super();
		time = t;
		place = p;
		description = d;
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
	public String getDescription() {
		return description;
	}
	public void setDescription(String description) {
		this.description = description;
	}
	public String getRemark() {
		return remark;
	}
	public void setRemark(String remark) {
		this.remark = remark;
	}
}
