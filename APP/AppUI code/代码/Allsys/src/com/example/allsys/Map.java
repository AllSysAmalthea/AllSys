package com.example.allsys;

import com.baidu.lbsapi.BMapManager;
import com.baidu.lbsapi.MKGeneralListener;
import com.baidu.mapapi.map.BaiduMap;
import com.baidu.mapapi.map.BaiduMapOptions;
import com.baidu.mapapi.map.BitmapDescriptor;
import com.baidu.mapapi.map.BitmapDescriptorFactory;
import com.baidu.mapapi.map.MapStatus;
import com.baidu.mapapi.map.Marker;
import com.baidu.mapapi.map.MarkerOptions;
import com.baidu.mapapi.map.OverlayOptions;
import com.baidu.mapapi.map.MapStatus.Builder;
import com.baidu.mapapi.map.MapView;
import com.baidu.mapapi.model.LatLng;
import com.baidu.pplatform.comapi.basestruct.GeoPoint;
import com.baidu.mapapi.SDKInitializer;
import com.baidu.mapapi.*;

import android.app.Activity;  
import android.content.Intent;
import android.content.IntentFilter;
import android.os.Bundle;  
import android.util.Log;
import android.view.Menu;  
import android.widget.Toast;  
  
public class Map extends Activity{  
      
    private MapView     mapView  = null ;
    BaiduMap mBaiduMap;
    private Marker mMarkerA;
    BitmapDescriptor bdA ;
    
    int islogin = 0;
	String user_name = "";
	double jingdu = 118.949434;
	double weidu = 32.11586;
           
    @Override  
    protected void onCreate(Bundle savedInstanceState) {  
          
        super.onCreate(savedInstanceState);
        
        Bundle mbundle = this.getIntent().getExtras();
        /*islogin = mbundle.getInt("islogin");
        user_name = mbundle.getString("username");
        jingdu = mbundle.getDouble("jingdu");
        weidu = mbundle.getDouble("weidu");*/
        
        //检查key是否正确以及是否联网
        IntentFilter iFilter = new IntentFilter();
		iFilter.addAction(SDKInitializer.SDK_BROADTCAST_ACTION_STRING_PERMISSION_CHECK_ERROR);
		iFilter.addAction(SDKInitializer.SDK_BROADCAST_ACTION_STRING_NETWORK_ERROR);
		String s = (iFilter).getAction(0);
		Log.d(Map.class.getSimpleName(), "action: " + s);
		if (s.equals(SDKInitializer.SDK_BROADTCAST_ACTION_STRING_PERMISSION_CHECK_ERROR)) {
			System.out.println("key error");
		} else if (s
				.equals(SDKInitializer.SDK_BROADCAST_ACTION_STRING_NETWORK_ERROR)) {
			System.out.println("have not network");
		}else System.out.println("not error");
        SDKInitializer.initialize(getApplicationContext());   
        
        //初始化地图
        BaiduMapOptions BMO = new BaiduMapOptions();
        BMO.scaleControlEnabled(true);
        BMO.zoomGesturesEnabled(true);
        LatLng Location =new LatLng(weidu,jingdu);
        MapStatus status = new MapStatus.Builder().target(Location).build();
        BMO.mapStatus(status);
        
        mapView=new MapView(this,BMO);
        setContentView(mapView);
         
         mBaiduMap = mapView.getMap(); 
         initOverlay(); 
         //普通地图  
         mBaiduMap.setMapType(mBaiduMap.MAP_TYPE_NORMAL);  
          
         
         
    }  
    
    public void initOverlay() {
		// add marker overlay
		LatLng llA = new LatLng(weidu, jingdu);
		bdA =  BitmapDescriptorFactory.fromResource(R.drawable.icon_gcoding);
		OverlayOptions ooA = new MarkerOptions().position(llA).icon(bdA)
				.zIndex(9).draggable(true);
		mMarkerA = (Marker) (mBaiduMap.addOverlay(ooA));
    }
      
    //重写以下方法。管理API  
      
    @Override  
    protected void onDestroy(){  
    		mapView.onDestroy();
            super.onDestroy();  
    }  
      
    @Override  
    protected void onPause(){  
          
            mapView.onPause();  
            super.onPause();  
    }  
    @Override  
    protected void onResume(){  
          
            mapView.onResume();  
              
            super.onResume();  
    }  
  
    @Override  
    public boolean onCreateOptionsMenu(Menu menu) {  
          
        getMenuInflater().inflate(R.menu.log_in, menu);            
        return true;  
    }  
}  