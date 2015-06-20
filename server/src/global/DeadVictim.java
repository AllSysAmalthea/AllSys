package global;

/*
 * 死亡的灾民
 * time		死亡时间
 * place	死亡地点
 * appearance	死亡时的衣着
 * corpseplace
 */
 
public class DeadVictim extends Victim {
	private Time time;
	private String place;
	private String appearance;
	private String corpseplace;
	private String remark;
	DeadVictim(String s) {
		super(s);
		time = new Time();
		place = "";
		appearance = "";
		corpseplace = "";
		remark = "";
	}
	DeadVictim(Time t,String p,String a,String c,String r) {
		super();
		time = t;
		place = p;
		appearance = a;
		corpseplace = c;
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
	public String getCorpseplace() {
		return corpseplace;
	}
	public void setCorpseplace(String corpseplace) {
		this.corpseplace = corpseplace;
	}
	public String getRemark() {
		return remark;
	}
	public void setRemark(String remark) {
		this.remark = remark;
	}
}
