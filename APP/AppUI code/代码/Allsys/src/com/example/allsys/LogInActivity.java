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
import android.view.Menu;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.Window;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.Toast;

public class LogInActivity extends Activity {

	Socket socket = null;
	ObjectOutputStream out;
	ObjectInputStream in;
	Handler handler;
	boolean judge = true;
	int islogin = 0;
	String user_name = "";
	
    @SuppressLint("NewApi")
	@Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);  
        setContentView(R.layout.activity_log_in); 
             
        ImageView iv1=(ImageView)findViewById(R.id.myImageView1);
        
        ImageButton ib1 = (ImageButton)findViewById(R.id.header_left_btn);  
        Button login = (Button)findViewById(R.id.Login);
        Button register = (Button)findViewById(R.id.Register);
        final EditText Username = (EditText)findViewById(R.id.Username);
        final EditText Password = (EditText)findViewById(R.id.Password);
        
        Bundle mbundle = this.getIntent().getExtras();
        islogin = mbundle.getInt("islogin");
        if (islogin == 1)
        {
        	user_name = mbundle.getString("username");
        	Bundle mb =  new Bundle();
        	mb.putString("username", user_name);
        	Intent intent = new Intent(LogInActivity.this,VoluteerActivity.class);
			intent.putExtras(mb);
			startActivityForResult(intent, 1);
        }else;
        

        
        handler = new Handler(){
        	public void handleMessage(Message msg)
			{
        		Bundle mb = msg.getData();
        		switch (msg.what)
        		{
        		case 0:  //successful
        			//Toast.makeText(this.getApplicationContext(), "denglu chenggong!",Toast.LENGTH_SHORT).show();
        			Intent intent = new Intent(LogInActivity.this,VoluteerActivity.class);
        			intent.putExtras(mb);
        			startActivityForResult(intent, 1);
        			break;
        		case 100:
        			Toast.makeText(getApplicationContext(), "log in failed!",Toast.LENGTH_SHORT).show();
        		}
			}

			
        };
        
        login.setOnClickListener(new Button.OnClickListener(){

			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				String username = Username.getText().toString();
				String password = Password.getText().toString();
				
				MessageAck msgA = new login(username,password);
				
				try {
					out.writeObject(msgA);
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}
        	
        });
        
        register.setOnClickListener(new Button.OnClickListener(){
        	public void onClick(View v){
        		
        		judge = false;
				try {
					if (socket != null)
						socket.close();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
        		
        		Intent intent = new Intent();
        		intent.setClass(LogInActivity.this, RegisterActivity.class);
        		
        		startActivityForResult(intent,2);
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
			islogin= 1;
			user_name = mbundle.getString("username");
			this.setResult(1,data);
			finish();
		case 2:
			new myThread().start();
		}  
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
	 	bundle.putInt("islogin", islogin);
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
			 
			 if (!judge)
				 continue;
			 else;
			 	switch (msg.type)
			 	{
			 	case 2:
			 		loginack st = (loginack)msg;
			 		Message shit = new Message();
			 		if (st.status == 1)
			 			shit.what = 0;
			 		else
			 			shit.what = 100;
			 		Bundle b0 = new Bundle();
			 		user_name = st.username;
			 		b0.putString("username",st.username);
			 		shit.setData(b0);
			 		handler.sendMessage(shit);
			 		break;
			 	}
			 	
			}
			 
    		
		}
	}
    
    
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.log_in, menu);
        return true;
    }
    
}
