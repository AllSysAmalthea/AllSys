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

	
	ImageButton Location;
	ImageButton Safehouse;
	ImageButton Survivor;
	ImageButton Exit;
	ImageButton User;
	Button Task;
	
	@Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);  
        setContentView(R.layout.activity_voluteer); 
        
        Location = (ImageButton)findViewById(R.id.Location);
        Safehouse = (ImageButton)findViewById(R.id.Safehouse);
        Survivor = (ImageButton)findViewById(R.id.Survivor);
        Exit = (ImageButton)findViewById(R.id.exit);
        User = (ImageButton)findViewById(R.id.user);
        Task  = (Button)findViewById(R.id.user);
        
        
      
                       
    }


}
