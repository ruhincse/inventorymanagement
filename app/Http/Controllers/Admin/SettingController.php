<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Brian2694\Toastr\Facades\Toastr;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting');


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
                'oldpassword'=>'required',              
                'NewPassword'=>'required|confirmed',

        ] );


        
        $id=Auth::user()->id;

        $pass=Auth::user()->password;

        if(Hash::check($request->oldpassword,$pass)){

                if(! Hash::check($request->NewPassword,$pass)){

                    $pass=Hash::make($request->NewPassword);

                    $user=User::find($id);
                    $user->password=$pass;
                    $user->save();
                    Auth::logout();
                    return redirect()->back();
                    Toastr::success('Password Successfully Changed',"Success");

                }
                else{

                     Toastr::error('Password cannot be new password',"Error");
                     return redirect()->back();


                }
            
        }

        else{

            Toastr::error('Invalid Old Password',"Error");
            return redirect()->back();
           
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        $data=User::find($id);

       $data->name=$request->username;
       $data->email=$request->email;
       $data->about=$request->about;
       $data->save();

       Toastr::success('Information Successfully Changed','Success');
       return redirect()->route('admin.setting.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
