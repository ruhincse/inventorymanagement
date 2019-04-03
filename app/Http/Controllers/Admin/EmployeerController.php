<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Employeer;
use carbon\carbon;

class EmployeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Employeer::latest()->get();
       return view('admin.employee.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         

        $request->validate([
                    'email'=>'required',
                    'name'=>'required',
                    'mobile'=>'required',
                    'address'=>'required',
                    'join_date'=>'required',
                    'salary'=>'required',
                    'image'=>'required|mimes:jpeg,png,jpg',
                    'acc_number'=>'required',
                    'designation'=>'required'

                ]); 


        $image=$request->file('image');
        if($image){
            $imageext=$image->getClientOriginalExtension();
           $time=carbon::now()->toDateString();
          $imageName=$time.uniqid()."_".rand().".".$imageext;
        

        $newImage=Image::make($image)->resize(120,120)->save(90);

        if(!Storage::disk('public')->exists('employee')){
            Storage::disk('public')->makeDirectory('employee');
        }
        Storage::disk('public')->put('employee/'.$imageName,$newImage);




        }

        else{

            $imageName="default.png";
        }


        $employee=new Employeer();
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->mobile=$request->mobile;
        $employee->address=$request->address;
        $employee->join_date=$request->join_date;
        $employee->salary=$request->salary;
        $employee->account_number=$request->acc_number;
        $employee->image=$imageName;
        $employee->designation=$request->designation;
        $employee->save();


     Toastr::success('data inserted','success');
         return redirect()->back();





         
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Employeer::find($id);

        return view('admin.employee.view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Employeer::find($id);
        return view('admin.employee.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $data=Employeer::find($id);
          $request->validate([
                    'email'=>'required',
                    'name'=>'required',
                    'mobile'=>'required',
                    'address'=>'required',
                    'join_date'=>'required',
                    'salary'=>'required',
                    'acc_number'=>'required',
                    'designatin'=>'required',

                ]); 


        $image=$request->file('image');

        if($image){

          $imageext=$image->getClientOriginalExtension();
           $time=carbon::now()->toDateString();
          $imageName=$time.uniqid()."_".rand().".".$imageext;
        


        if(Storage::disk('public')->exists('employee/'.$data->image)){
            Storage::disk('public')->delete('employee/'.$data->image);
        }




        $newImage=Image::make($image)->resize(120,120)->save(90);

        Storage::disk('public')->put('employee/'.$imageName,$newImage);


        }
        else{
            $imageName=$data->image;

        }

         $data->name=$request->name;
        $data->email=$request->email;
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        $data->join_date=$request->join_date;
        $data->salary=$request->salary;
        $data->account_number=$request->acc_number;
        $data->image=$imageName;
        $data->designation=$request->designation;
        $data->save();


     Toastr::success('Data Successfully Updated','success');
        return redirect()->route('admin.employee.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee=Employeer::find($id);


        if(Storage::disk('public')->exists('employee/'.$employee->image)){

            Storage::disk('public')->delete('employee/'.$employee->image);
        }

          $employee->delete();

          Toastr::warning('The Employee has been remove','Delete');

          return redirect()->back();
    }
}
