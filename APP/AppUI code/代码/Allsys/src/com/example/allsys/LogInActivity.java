package com.example.allsys;

import android.os.Bundle;
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
import android.widget.ImageButton;
import android.widget.ImageView;

public class LogInActivity extends Activity {

	
	
    @SuppressLint("NewApi")
	@Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);  
        setContentView(R.layout.activity_log_in); 
             
        ImageView iv1=(ImageView)findViewById(R.id.myImageView1);
        iv1.setImageResource(R.drawable.news);
        
        ImageButton ib1 = (ImageButton)findViewById(R.id.header_left_btn);  
        Button login = (Button)findViewById(R.id.Login);
        Button register = (Button)findViewById(R.id.Register);
        register.setOnClickListener(new Button.OnClickListener(){
        	public void onClick(View v){
        		Intent intent = new Intent();
        		intent.setClass(LogInActivity.this, RegisterActivity.class);
        		
        		startActivity(intent);
        		LogInActivity.this.finish();
        	}
        });
        
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.log_in, menu);
        return true;
    }
    
}
