<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Brian2694\Toastr\Facades\Toastr;
use App\Expenses;
use carbon\carbon;


class ExpensesController extends Controller
{
    public function index(){
    	$date=date('d/m/Y');
    	$month=date('F');
    	$year=date('Y');
    	
    	$todayexp=Expenses::where('date',$date)->sum('amount');
    	$monthlyexp=Expenses::where('month',$month)->sum('amount');
    	$yearlyexp=Expenses::where('year',$year)->sum('amount');
    	$datas=Expenses::latest()->get();
    	return view('admin.expense.index',compact('datas','todayexp','monthlyexp','yearlyexp'));
    }

    public function store(Request $request){

    	$request->validate([
    			'details'=>'required',
    			'months'=>'required',
    			'years'=>'required',
    			'balance'=>'required',
    			'dates'=>'required'
    	]);
    	$expense=new Expenses;

    	$expense->details=$request->details;
    	$expense->amount=$request->balance;
    	$expense->date=$request->dates;
    	$expense->month=$request->months;
    	$expense->year=$request->years;
    	$expense->save();
    	Toastr::success('Expense Successfully added',"success");
    	return redirect()->back();  	


    }


    public function expmonth(Request $request){
    	return $request->all();

    }

    public function edit($id){
    	$data=Expenses::find($id);
    	return view('admin.expense.edit',compact('data'));
    }

    public function update(Request $request, $id){
        

    	 $request->validate([
    			'details'=>'required',
    			'months'=>'required',
    			'years'=>'required',
    			'balance'=>'required',
    			'dates'=>'required'
    	]);

    	 $expense=Expenses::find($id);


        $expense->details=$request->details;
    	$expense->amount=$request->balance;
    	$expense->date=$request->dates;
    	$expense->month=$request->months;
    	$expense->year=$request->years;
    	$expense->save();
    	Toastr::success('Expense Successfully Update','Update');
    	return redirect()->route('admin.expenses');  	






    

    }


    public function monthexpense(Request $request){
         $monthlyexp=Expenses::where('month',$request->month)->sum('amount');
        $datas=Expenses::where('month',$request->month)->latest()->get();
        return view('admin.expense.month',compact('datas','monthlyexp'));
    }

    public function yearlyexpense(Request $request){
         

        $yearlyexp=Expenses::where('year',$request->year)->sum('amount');
        $datas=Expenses::where('year',$request->year)->latest()->get();
        return view('admin.expense.year',compact('datas','yearlyexp'));
    }


    public function expense(){

    	return view('admin.expense.searchexpense');
    }

    public function destroy($id){

    	 $expense=Expenses::find($id)->delete();
    	 Toastr::warning('Expense Successfully Delete','Update');
    	return redirect()->route('admin.expenses');  
    }
}
