<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Supplier;
use carbon\carbon;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $datas=Supplier::latest()->get();

        return view('admin.supplier.index',compact('datas'));
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
                    'account_number'=>'required',
                    

                ]); 


        $image=$request->file('image');
        if($image){
            $imageext=$image->getClientOriginalExtension();
           $time=carbon::now()->toDateString();
          $imageName=$time.uniqid()."_".rand().".".$imageext;
        

        $newImage=Image::make($image)->resize(120,120)->save(90);

        if(!Storage::disk('public')->exists('supplier')){
            Storage::disk('public')->makeDirectory('supplier');
        }
        Storage::disk('public')->put('supplier/'.$imageName,$newImage);




        }

        else{

            $imageName="default.png";
        }


        $supplier=new Supplier;
        $supplier->name=$request->name;
        $supplier->email=$request->email;
        $supplier->mobile=$request->mobile;
        $supplier->address=$request->address;
        $supplier->join_date=$request->join_date;
        $supplier->salary=$request->salary;
        $supplier->account_number=$request->account_number;
        $supplier->image=$imageName;
      
        $supplier->save();


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
        $data=Supplier::find($id);
        return view('admin.supplier.view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data=Supplier::find($id);
        return view('admin.supplier.edit',compact('data'));
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
        $supplier=Supplier::find($id);




        $request->validate([
                    'email'=>'required',
                    'name'=>'required',
                    'mobile'=>'required',
                    'address'=>'required',
                    'join_date'=>'required',
                    'salary'=>'required',
                    'account_number'=>'required',
                    

                ]); 


        $image=$request->file('image');
        if($image){
            $imageext=$image->getClientOriginalExtension();
           $time=carbon::now()->toDateString();
          $imageName=$time.uniqid()."_".rand().".".$imageext;
        
           if(Storage::disk('public')->exists('supplier/'. $supplier->image)){
            Storage::disk('public')->delete('supplier/'.$supplier->image);
            }
        
        $newImage=Image::make($image)->resize(120,120)->save(90);


        Storage::disk('public')->put('supplier/'.$imageName,$newImage);




        }

        else{

            $imageName=$supplier->image;
        }


        $supplier->name=$request->name;
        $supplier->email=$request->email;
        $supplier->mobile=$request->mobile;
        $supplier->address=$request->address;
        $supplier->join_date=$request->join_date;
        $supplier->salary=$request->salary;
        $supplier->account_number=$request->account_number;
        $supplier->image=$imageName;
      
        $supplier->save();


     Toastr::success('data Updated','Update');
         return redirect()->route("admin.supplier.index");




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier=Supplier::find($id);

         if(Storage::disk('public')->exists('supplier/'. $supplier->image)){
            Storage::disk('public')->delete('supplier/'.$supplier->image);
            }

        $supplier->delete();
         Toastr::warning('Supplier Deleted','Deleted');
         return redirect()->route("admin.supplier.index");



    }
}
