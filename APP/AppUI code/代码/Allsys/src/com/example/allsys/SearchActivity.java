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
import android.widget.TextView;

public class SearchActivity extends Activity {

	ImageButton Location;
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
        setContentView(R.layout.activity_search); 
             
        
        ImageButton ib1 = (ImageButton)findViewById(R.id.exit);  
        Button search = (Button)findViewById(R.id.Search);
        final EditText searchContent = (EditText)findViewById(R.id.searchContent);
        final TextView searchResult = (TextView)findViewById(R.id.searchresult); 
        
        new myThread().start();
        
        handler = new Handler(){
        	public void handleMessage(Message msg)
			{
        		Bundle mb = msg.getData();
        		searchResult.setText(mb.getString("message"));
			}
        };
        
        search.setOnClickListener(new Button.OnClickListener() {

			@Override
			public void onClick(View arg0) {
				String getid = searchContent.getText().toString();
				MessageAck msga = new search(1,getid,getid);
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
			 
			 if (judge && msg.type!=2)
			 {
			 	
			 		searchack st = (searchack)msg;
			 		Message shit = new Message();
			 		if (st.status == 1)
			 			shit.what = 0;
			 		else
			 			shit.what = 100;
			 		Bundle b0 = new Bundle();
			 		
			 		b0.putString("message",st.message);
			 		shit.setData(b0);
			 		handler.sendMessage(shit);
			 		
			 	
			 	
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
