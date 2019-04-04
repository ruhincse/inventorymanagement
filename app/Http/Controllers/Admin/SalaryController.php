<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Salary;
use App\Employeer;
use carbon\carbon;
use DB;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employeer::all();
        $datas=Salary::latest()->get();
        return view('admin.salary.index',compact('datas','employees'));
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
                'emp'=>'required',
                'salary'=>'required',
                'months'=>'required',
                'years'=>'required',

        ]);


            $salary=DB::table('salaries')
                        ->where('emp_id',$request->emp)
                        ->where('month',$request->months)
                        ->first();


                       // print_r($salary);
                      

                        if(!$salary){
                            $employee=Employeer::find($request->emp);





                            $salaries=new Salary();
                            $salaries->salary=$request->salary;
                            $salaries->name=$employee->name;
                            $salaries->emp_id=$request->emp;
                            $salaries->month=$request->months;
                            $salaries->year=$request->years;
                            $salaries->status=1;                           
                            $salaries->save();
                            Toastr::success('Salary Paid to {{$employee->name}} Successfull',"Paid");
                            return redirect()->back();


                        }

                        else{

                            Toastr::error('Salary  Already Paid ',"Paid");
                            return redirect()->back();
                        }



            /*
            $salary=Salary::where('emp_id',$request->emp)->where('month',$request->months)->first();


            if($salary){
                echo "exists";
            }


            else{
                echo "NOt availabe";
            }


                 */


               

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $employees=Employeer::where('id',$id)->get();

      return json_encode($employees);
      


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
