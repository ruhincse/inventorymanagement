<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Brian2694\Toastr\Facades\Toastr;
use App\Product;
use App\Category;
use App\Subcategory;
use carbon\carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats=Category::latest()->get();
        $subcats=Subcategory::latest()->get();
       $datas=Product::latest()->get();
       return view('admin.product.index',compact('datas','cats','subcats'));
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
                'subcat'=>'required',
                'product_name'=>'required',
                'buying_price'=>'required',
                'selling_price'=>'required',

        ]);

        $product=new Product;       

        $product->category_id=$request->category;
        $product->subcategory_id=$request->subcat;
        $product->product_name=$request->product_name;
        $product->buying_price=$request->buying_price;
        $product->selling_price=$request->selling_price;
        $product->save();

        Toastr::success('Product Succerssfully Added','Success');
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

      $data=Subcategory::where('category_id',$id)->get();
      return json_encode($data);

   


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Product::find($id);
        $cats=Category::latest()->get();
        $scats=Subcategory::latest()->get();
        return view('admin.product.edit',compact('data','cats','scats'));
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
        

        $request->validate([
                'category'=>'required',
                'subcat'=>'required',
                'product_name'=>'required',
                'buying_price'=>'required',
                'selling_price'=>'required',

        ]);

        $product=Product::find($id);

             

        $product->category_id=$request->category;
        $product->subcategory_id=$request->subcat;
        $product->product_name=$request->product_name;
        $product->buying_price=$request->buying_price;
        $product->selling_price=$request->selling_price;
        $product->save();

        Toastr::success('Product Succerssfully Update','Update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Product::find($id)->delete();
         Toastr::warning('Product Succerssfully Delete','Delete');
        return redirect()->route('admin.product.index');
    }
}
