package com.example.allsys;

import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.OptionalDataException;
import java.net.Socket;

import com.example.allsys.RegularActivity.myThread;

import MessageAck.*;
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

public class VoluteerActivity extends Activity {

	
	Button Busy;
	Button Free;
	Button Done;
	ImageButton Exit;
	ImageButton User;
	TextView taskview;
	
	Socket socket = null;
	ObjectOutputStream out;
	ObjectInputStream in;
	Handler handler;
	String user_name = "";
	boolean judge = true;
	
	
	@Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);  
        setContentView(R.layout.activity_voluteer); 
        
        Busy = (Button)findViewById(R.id.Busy);
        Free = (Button)findViewById(R.id.Free);
        Done = (Button)findViewById(R.id.Done);
        Exit = (ImageButton)findViewById(R.id.exit);
        User = (ImageButton)findViewById(R.id.user);
        taskview = (TextView)findViewById(R.id.businesscardsingle_content_abstract);
        
        Bundle mbundle = this.getIntent().getExtras();
        user_name = mbundle.getString("username");
        
        new myThread().start();
        
        handler = new Handler(){
        	public void handleMessage(Message msg)
			{
        		switch (msg.what)
        		{
        		case 0:
        			Bundle mb = msg.getData();
        			taskview.setText(mb.getString("task"));
        			break;
        		case 1 :
        			Toast.makeText(getApplicationContext(), "task Done",Toast.LENGTH_SHORT).show();
        			taskview.setText("Already Done\n");
        			break;
        		case 2 :
        			Toast.makeText(getApplicationContext(), "task submit fail!",Toast.LENGTH_SHORT).show();
        			break;
        		case 3 :
        			Toast.makeText(getApplicationContext(), "state change",Toast.LENGTH_SHORT).show();
        			break;
        		case 4 :
        			Toast.makeText(getApplicationContext(), "state change fail!",Toast.LENGTH_SHORT).show();
        			break;
        		}
			}

			
        };
        
        Busy.setOnClickListener(new Button.OnClickListener(){

			@Override
			public void onClick(View arg0) {
				MessageAck msga = new task(2,user_name);
				Log.v("state","change busy");
				try {
					out.writeObject(msga);
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}
        });
        
        Free.setOnClickListener(new Button.OnClickListener(){

			@Override
			public void onClick(View arg0) {
				MessageAck msga = new task(3,user_name);
				Log.v("state","change free");
				try {
					out.writeObject(msga);
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}
        });
        
        Done.setOnClickListener(new Button.OnClickListener(){

			@Override
			public void onClick(View arg0) {
				MessageAck msga = new task(1,user_name);
				try {
					out.writeObject(msga);
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}
        });
        
        
        
                       
    }
	
	@Override 
    public void onBackPressed() { 
		
		judge = false;
    	if (socket!=null)
			try {
				socket.close();
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		
	 	Intent data = new Intent();
	 	Bundle bundle = new Bundle();
	 	bundle.putString("username",user_name);
	 	data.putExtras(bundle);
		this.setResult(1,data);
        super.onBackPressed(); 
        //System.out.println("°´ÏÂÁËback¼ü   onBackPressed()");        
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
			 
			 MessageAck fuck = new task(0,user_name);
		        try {
					out.writeObject(fuck);
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			 
			 
			 
			while (judge)
			{
			 try {
				msg = (MessageAck)in.readObject();
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
			 
			 if (judge && msg.type==8)
			 {
			 	taskack ta = (taskack)msg;
			 	switch (ta.taskack_type)
			 	{
			 	case 0:
			 		
			 		Message shit = new Message();
			 		shit.what = 0;
			 		Bundle b0 = new Bundle();
			 		b0.putString("task", ta.task);
			 		shit.setData(b0);
			 		handler.sendMessage(shit);
			 		break;
			 		
			 	default: 
			 		Log.v("message","receive a message  "+ta.taskack_type);
			 		Message shit1 = new Message();
			 		shit1.what = ta.taskack_type;
			 		Bundle b1 = new Bundle();
			 		b1.putString("task", ta.task);
			 		shit1.setData(b1);
			 		handler.sendMessage(shit1);
			 	}
			 }
			 	
			}
			 
    		
		}
	}


}
