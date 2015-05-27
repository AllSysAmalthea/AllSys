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

public class VoluteerActivity extends Activity {

	
	Button Busy;
	Button Free;
	Button Done;
	ImageButton Exit;
	ImageButton User;
	
	
	@Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);  
        setContentView(R.layout.activity_voluteer); 
        
        Busy = (Button)findViewById(R.id.Busy);
        Free = (Button)findViewById(R.id.Free);
        Done = (Button)findViewById(R.id.Done);
        Exit = (ImageButton)findViewById(R.id.exit);
        User = (ImageButton)findViewById(R.id.user);
        
        
      
                       
    }


}
