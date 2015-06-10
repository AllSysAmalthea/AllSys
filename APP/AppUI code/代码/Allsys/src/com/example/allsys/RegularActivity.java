package com.example.allsys;

import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.OptionalDataException;
import java.net.Socket;
import java.net.UnknownHostException;

import MessageAck.*;
import android.location.Criteria;
import android.location.Location;
import android.location.LocationManager;
import android.os.Bundle;
import android.os.Handler;
import android.os.Looper;
import android.os.Message;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.util.Log;
import android.view.Menu;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.Window;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

public class RegularActivity extends Activity {

	
	ImageButton Location;
	Socket socket = null;
	ObjectOutputStream out;
	ObjectInputStream in;
	Handler handler;
	boolean judge = true;
	int islogin = 0;
	String user_name = "";
	
	@Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);  
        setContentView(R.layout.activity_regular); 
        
        Location = (ImageButton)findViewById(R.id.Location);
        final TextView weather = (TextView)findViewById(R.id.textView4);
        final TextView new01_word = (TextView)findViewById(R.id.textView1);
        final TextView new02_word = (TextView)findViewById(R.id.textView2);
        final Button Search = (Button)findViewById(R.id.Search);
        Button joinus = (Button)findViewById(R.id.Joinus);
        
        new01_word.setText("山东威海4.6级地震 震中附近有三乡镇");
        new02_word.setText("日本东海岸发生9.0级地震");
        
        
        handler = new Handler(){
        	public void handleMessage(Message msg)
			{
        		Bundle mb = msg.getData();
        		switch (msg.what)
        		{
        		case 0:  //start
        			weather.setText(mb.getString("weather"));
        			new01_word.setText(mb.getString("new01_word"));
        			new02_word.setText(mb.getString("new02_word"));
        			
        		}
			}
        };
        
        Search.setOnClickListener(new Button.OnClickListener() {

			@Override
			public void onClick(View arg0) {
				judge = false;
				try {
					if (socket != null)
						socket.close();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				
				Intent intent = new Intent();
				Bundle mbundle = new Bundle();
				mbundle.putInt("islogin", islogin);
				mbundle.putString("usernmae", user_name);
        		intent.setClass(RegularActivity.this, SearchActivity.class);
        		
        		startActivityForResult(intent,2);
			}
        });
        
        joinus.setOnClickListener(new Button.OnClickListener() {

			@Override
			public void onClick(View arg0) {
				
				judge = false;
				try {
					if (socket != null)
						socket.close();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				Intent intent = new Intent();
				Bundle mbundle = new Bundle();
				mbundle.putInt("islogin", islogin);
				mbundle.putString("usernmae", user_name);
				intent.putExtras(mbundle);
        		intent.setClass(RegularActivity.this, LogInActivity.class);
        		
        		startActivityForResult(intent,1);
			}
        });
        
        Location.setOnClickListener(new Button.OnClickListener() {

			@Override
			public void onClick(View arg0) {
				
				Location location = getLocation();
				//Location location = null;
				/*MessageAck msga = new location(location.getLongitude(),location.getLatitude());
				try {
					out.writeObject(msga);
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}*/
				
				judge = false;
				try {
					if (socket != null)
						socket.close();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				
				Intent intent = new Intent();
				Bundle mbundle = new Bundle();
				mbundle.putInt("islogin", islogin);
				mbundle.putString("usernmae", user_name);
				if (location!=null)
				{
					mbundle.putDouble("weidu", location.getLatitude());
					mbundle.putDouble("jingdu", location.getLongitude());
				}else
				{
					mbundle.putDouble("weidu", 32.11586);
					mbundle.putDouble("jingdu", 118.949434);
				}
				intent.putExtras(mbundle);
        		intent.setClass(RegularActivity.this, Map.class);

        		startActivityForResult(intent,3);
			}
        });
        
        new myThread().start();
        
        
                       
    }
	
	@Override
	protected void onActivityResult(int requestCode, int resultCode, Intent data)
	{
		super.onActivityResult(requestCode, resultCode, data);
		switch (resultCode)
		{
		case 1:
			Bundle mbundle = data.getExtras();
			islogin = mbundle.getInt("islogin");
			user_name = mbundle.getString("username");
			break;
		case 2:
			Bundle bundle = data.getExtras();
			islogin = bundle.getInt("islogin");
			user_name = bundle.getString("username");
			break;
		case 3:;
		} 
	}
	
	


class myThread extends Thread{
		
		public myThread(){}
		
		public void run()
		{
		
			 try {  
				 socket = new Socket(CommonDef.addr,CommonDef.port);
	             out = new ObjectOutputStream(socket.getOutputStream()); 
	             in = new ObjectInputStream(socket.getInputStream());
	      
	               
	         } catch (IOException e1) {  
	             e1.printStackTrace();  
	         } catch (Exception e1) {  
	             e1.printStackTrace();  
	         }  
			 Looper.prepare();
			 MessageAck msg = null;
			 
			while (judge)
			{
			 try {
				msg = (MessageAck)in.readObject();
				if (msg == null)
					continue;
				else;
			} catch (OptionalDataException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} catch (ClassNotFoundException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			 	if (!judge)
			 		continue;
			 	else;
			 	switch (msg.type)
			 	{
			 	case 0:
			 		start st = (start)msg;
			 		Message shit = new Message();
			 		shit.what = 0;
			 		Bundle b0 = new Bundle();
			 		b0.putString("new01_word", st.new01_word);
			 		b0.putByteArray("new01_picture", st.new01_picture);
			 		b0.putString("new02_word", st.new02_word);
			 		b0.putByteArray("new02_picture", st.new02_picture);
			 		b0.putString("weather", st.weather);
			 		shit.setData(b0);
			 		handler.sendMessage(shit);
			 		break;
			 	}
			 	
			}
			 
    		
		}
	}
    
	private Location getLocation()
	{
	LocationManager alm = (LocationManager) this.getSystemService(Context.LOCATION_SERVICE);
    if (alm
            .isProviderEnabled(android.location.LocationManager.GPS_PROVIDER)) {
        Toast.makeText(RegularActivity.this, "GPS模块正常", Toast.LENGTH_SHORT)
                .show();
    }else 
    {
    	Toast.makeText(RegularActivity.this, "请开启GPS！",Toast.LENGTH_SHORT).show();
    	return null;
    }
    // 获取位置管理服务
    LocationManager locationManager;
    String serviceName = Context.LOCATION_SERVICE;
    locationManager = (LocationManager) this.getSystemService(serviceName);
    // 查找到服务信息
    Criteria criteria = new Criteria();
    criteria.setAccuracy(Criteria.ACCURACY_FINE); // 高精度
    criteria.setAltitudeRequired(false);
    criteria.setBearingRequired(false);
    criteria.setCostAllowed(true);
    criteria.setPowerRequirement(Criteria.POWER_LOW); // 低功耗

    String provider = locationManager.getBestProvider(criteria, true); // 获取GPS信息
    System.out.println(provider);
    Location location0 = locationManager.getLastKnownLocation(provider); // 通过GPS获取位置
    
    try {
		Thread.sleep(2000);
	} catch (InterruptedException e) {
		// TODO Auto-generated catch block
		e.printStackTrace();
	}
    
    
    return location0;
    //updateToNewLocation(location);
    // 设置监听器，自动更新的最小时间为间隔N秒(1秒为1*1000，这样写主要为了方便)或最小位移变化超过N米
    //locationManager.requestLocationUpdates(provider, 100 * 1000, 500,locationListener);
}

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.log_in, menu);
        return true;
    }
    
}
