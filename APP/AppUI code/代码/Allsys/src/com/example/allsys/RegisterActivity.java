package com.example.allsys;

import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.OptionalDataException;
import java.net.Socket;

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

public class RegisterActivity extends Activity {

	Socket socket = null;
	ObjectOutputStream out;
	ObjectInputStream in;
	Handler handler;
	boolean judge = true;
	
    @SuppressLint("NewApi")
	@Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);  
        setContentView(R.layout.activity_register); 
             
        ImageView iv1=(ImageView)findViewById(R.id.myImageView1);
        
        ImageButton ib1 = (ImageButton)findViewById(R.id.header_left_btn);  
        Button register = (Button)findViewById(R.id.Register);
        
        final EditText Name = (EditText)findViewById(R.id.Name); 
        final EditText Tel = (EditText)findViewById(R.id.Tel); 
        final EditText ID = (EditText)findViewById(R.id.ID); 
        final EditText Password = (EditText)findViewById(R.id.Password); 
        final EditText Confirm = (EditText)findViewById(R.id.Confirm); 
        final EditText Blood = (EditText)findViewById(R.id.Blood); 
        final EditText Addr = (EditText)findViewById(R.id.Addr); 
        
        new myThread().start();
        
        handler = new Handler(){
        	public void handleMessage(Message msg)
			{
        		Bundle mb = msg.getData();
        		switch (msg.what)
        		{
        		case 0:  //successful
        			judge = false;
    				try {
    					if (socket != null)
    						socket.close();
    				} catch (IOException e) {
    					// TODO Auto-generated catch block
    					e.printStackTrace();
    				}
            		
            		finish();
            		break;
        		case 100:
        			Toast.makeText(getApplicationContext(), "register failed",Toast.LENGTH_SHORT).show();
        		}
			}

        };
        
        register.setOnClickListener(new Button.OnClickListener(){
        	public void onClick(View v){
        		
        		String name = Name.getText().toString();
        		String tel = Tel.getText().toString();
        		String id = ID.getText().toString();
        		String password = Password.getText().toString();
        		String confirm = Confirm.getText().toString();
        		String blood = Blood.getText().toString();
        		String addr = Addr.getText().toString();
        		
        		MessageAck msgA = new register(name,tel,id,password,blood,addr);
        		
        		try {
					out.writeObject(msgA);
				} catch (IOException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
        		
        		
        	}
        });
            
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
			 	case 4:
			 		registerack st = (registerack)msg;
			 		Message shit = new Message();
			 		if (st.status == 1)
			 			shit.what = 0;
			 		else
			 			shit.what = 100;
			 		Bundle b0 = new Bundle();
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
