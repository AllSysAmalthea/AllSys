package global;

/**
 * 自用时间类，可看情况删除
 */
public class Time {
	private int year;
	private int month;
	private int day;
	private int hour;
	private int minute;
	private int second;
	Time() {
		
	}
	Time(int y,int m,int d,int h,int min,int sec) {
		setYear(y);
		setMonth(m);
		setDay(d);
		setHour(h);
		setMinute(min);
		setSecond(sec);
	}
	//直接由系统时间添加的构造方法暂时留空
	public String getDate() {
		return year+"年"+month+"月"+day+"日";
	}
	public String getTime() {
		String ret = String.format("%02s:%02s:%02s",hour,minute,second);
		return ret;
	}
	public String getDateTime() {
		return getDate()+" "+getTime();
	}
	public String getYear() {
		return year+"";
	}
	public void setYear(int year) {
		this.year = year;
	}
	public String getMonth() {
		return month+"";
	}
	public void setMonth(int month) {
		this.month = month;
	}
	public String getDay() {
		return day+"";
	}
	public void setDay(int day) {
		this.day = day;
	}
	public String getHour() {
		if (hour==-1) {
			return "XX";
		}
		return hour+"";
	}
	public void setHour(int hour) {
		if (hour<0||hour>24)
			hour=-1;
		if (hour==24)
			hour=0;
		this.hour = hour;
	}
	public String getMinute() {
		if (minute==-1) {
			return "XX";
		}
		return minute+"";
	}
	public void setMinute(int minute) {
		if (minute<0||minute>=60)
			minute=-1;
		this.minute = minute;
	}
	public String getSecond() {
		if (second==-1) {
			return "XX";
		}
		return second+"";
	}
	public void setSecond(int second) {
		if (second<0||second>=60)
			second=-1;
		this.second = second;
	}
}
