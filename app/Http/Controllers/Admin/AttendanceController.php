<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Brian2694\Toastr\Facades\Toastr;
use App\Attandance;
use App\Employeer;
use carbon\carbon;

class AttendanceController extends Controller
{
    public function index(){
    	//$datas=Attandance::latest()->get();
    	$empys=Employeer::latest()->get();


    	$datas = Attandance::groupBy('edit_date')
						->selectRaw('count(*) as total, edit_date')
						->get();
    	return view('admin.attendance.index',compact('datas','empys'));
    }
    public function store(Request $request){

    		$data=Attandance::where('date',$request->date)->first();
    		if($data){
    			Toastr::error(' Attendace already Taken !',"Exists");
    			return redirect()->route('admin.attendance'); 
    				}
    		else{
    			$users=$request->user_id;

    			foreach ( $users as $user) {
    				
    				

    				$data=[
    					'user_id'=>$user,
    					'attendance'=>$request->attandance[$user],
    					'edit_date'=>date('d_m_Y'),    				
    				 	'date'=>$request->date,
    					'month'=>$request->month,
    					'year'=>$request->year
    				];

    			Attandance::create($data); 
    			
    		}

    			
    		Toastr::success('Attendace successfullly Taken !',"success");
    			return redirect()->route('admin.attendance'); 
    			

    		}
    		}

    		public function edit($id){
    			

    			$empys=Employeer::latest()->get();

    			$date=Attandance::where('edit_date',$id)->first();
    				
    			return view('admin.attendance.edit',compact('date','empys'));
    		}
    		public function update(Request $request, $id){
    			



    			$data=Attandance::where('edit_date',$id)->delete();

				$users=$request->user_id;

    			foreach ( $users as $user) {
    				
    				

    				$data=[
    					'user_id'=>$user,
    					'attendance'=>$request->attandance[$user],
    					'edit_date'=>$id,    				
    				 	'date'=>$request->date,
    					'month'=>$request->month,
    					'year'=>$request->year
    				];

    			Attandance::create($data); 
    			
    		}
    		Toastr::warning('Attandance Successfully Updated','Updated');
    			return redirect()->route('admin.attendance');

    		}

    	public function show($id){
    		   $empys=Employeer::latest()->get();

    			$date=Attandance::where('edit_date',$id)->first();
    				
    			return view('admin.attendance.show',compact('date','empys'));
    	}
    			

    	public function destroy($id){
    		return $id;
    	}



    		

    		//$data=new Attandance($data[]);   */ 		
   
}
