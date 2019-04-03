<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Customer;
use carbon\carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Customer::latest()->get();

        return view('admin.customer.index',compact('datas'));
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
                    'name'=>'required',
                    'email'=>'required',
                    'mobile'=>'required',
                  
            ]);


            $image=$request->file('image');

            if($image){


                $imageExt=$image->getClientOriginalExtension();

                $time=Carbon::now()->toDateString();

                $imageName=uniqid()."_".rand()."$time".".".$imageExt;

                if(!Storage::disk('public')->exists('customer')){
                    Storage::disk('public')->makeDirectory('customer');
                }

                $newImage=Image::make($image)->resize(150,150)->save(90);

                Storage::disk('public')->put('customer/'.$imageName,$newImage);



            }

            else{
                 $imageName="default.png";

            }
        $customer=new Customer;

            $customer->name=$request->name;
            $customer->email=$request->email;
            $customer->mobile=$request->mobile;
            $customer->bank_name=$request->bank_name;
            $customer->account_number=$request->account_number;
            $customer->branch_name=$request->branch_name;
            $customer->location=$request->location;
            $customer->type=$request->type;
            $customer->shopname=$request->shopname;
            $customer->image=$imageName;
            $customer->save();

            Toastr::success('Customer Successfully Added','Success');
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
         $data=Customer::find($id);
          return view('admin.customer.view',compact("data"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data=Customer::find($id);

       return view('admin.customer.edit',compact("data"));
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
        $customer=Customer::find($id);
        $request->validate([
                    'name'=>'required',
                    'email'=>'required',
                    'mobile'=>'required',
                  
            ]);


        $image=$request->file('image');

            if($image){


                $imageExt=$image->getClientOriginalExtension();

                $time=Carbon::now()->toDateString();

                $imageName=uniqid()."_".rand()."$time".".".$imageExt;

                if(Storage::disk('public')->exists('customer/'.$customer->image)){
                    Storage::disk('public')->delete('customer/'.$customer->image);
                }


                $newImage=Image::make($image)->resize(150,150)->save(90);

                Storage::disk('public')->put('customer/'.$imageName,$newImage);



            }

            else{
                 $imageName=$customer->image;

            }


           $customer->name=$request->name;
            $customer->email=$request->email;
            $customer->mobile=$request->mobile;
            $customer->bank_name=$request->bank_name;
            $customer->account_number=$request->account_number;
            $customer->branch_name=$request->branch_name;
            $customer->location=$request->location;
            $customer->type=$request->type;
            $customer->shopname=$request->shopname;
            $customer->image=$imageName;
            $customer->save();

            Toastr::success('Customer Successfully Update','Success');
            return redirect()->route('admin.customer.index');





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer=Customer::find($id);

             if(Storage::disk('public')->exists('customer/'.$customer->image)){
                    Storage::disk('public')->delete('customer/'.$customer->image);
                }

         $customer->delete();

          Toastr::info('Customer Successfully Delete','Delete');
            return redirect()->route('admin.customer.index');


    }
}
