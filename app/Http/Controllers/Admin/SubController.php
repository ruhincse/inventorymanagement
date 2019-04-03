<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Brian2694\Toastr\Facades\Toastr;
use App\Subcategory;
use App\Category;
use carbon\carbon;

class SubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Subcategory::latest()->get();
        $cats=Category::latest()->get();

        return view('admin.subcategory.index',compact('datas','cats'));
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
                    'category'=>'required',
                    'subcat'=>'required'
            ]);

            $subcat= new Subcategory;

            $subcat->name=$request->subcat;
            $subcat->category_id=$request->category;
            $subcat->save();

            Toastr::success('Subcategory Successfully Added!',"Success");
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
        $cats=Category::latest()->get();
        $data=Subcategory::find($id);
        return view('admin.subcategory.edit',compact('data','cats'));
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
       $data=Subcategory::find($id)->delete();
       Toastr::warning("SubCategory Successfully Delete!",'Delete');
       return redirect()->back();
    }
}
