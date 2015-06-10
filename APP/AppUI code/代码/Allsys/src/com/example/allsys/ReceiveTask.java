package com.example.allsys;

import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.Socket;

import android.bluetooth.BluetoothAdapter;
import android.bluetooth.BluetoothDevice;
import android.content.BroadcastReceiver;
import android.content.Intent;
import android.content.IntentFilter;
import android.location.Location;
import android.os.Handler;
import android.os.IBinder;
import android.app.Activity;
import android.app.Service;


public class ReceiveTask extends Service{
	//private static final int REQUEST_ENABLE_BT = 3;
	
	private static final int REQUEST_ENABLE_BT = 3;
	private BluetoothAdapter bluetoothAdapter = null;
	
	@Override
	public IBinder onBind(Intent arg0) {
		// TODO Auto-generated method stub
		
		
		return null;
	}
	
	@Override
	public void onCreate()
	{
		super.onCreate();
		 bluetoothAdapter = BluetoothAdapter.getDefaultAdapter();
		 
         btThread bt = new btThread();
         new Thread(bt).start();
	}
	
	public int onStartCommand(Intent intent, int flags, int startId)
	{
		return super.onStartCommand(intent, flags, startId);
	}
	
	@Override
	public void onDestroy()
	{
		super.onDestroy();
	}
	
	class btThread implements Runnable{

		@Override
		public void run() {
			// TODO Auto-generated method stub
			while (true)
			{
				if (bluetoothAdapter != null)
					bluetoothAdapter.startDiscovery();
				try {
					Thread.sleep(15000);
				} catch (InterruptedException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}
		}
		
	}
}
