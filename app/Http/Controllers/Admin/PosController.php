<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Brian2694\Toastr\Facades\Toastr;
use App\Customer;
use App\Category;
use App\Subcategory;
use App\Product;
use Cart;

class PosController extends Controller
{
    public function index(){
    		$customers=Customer::latest()->get();
    		$categories=Category::latest()->get();
            
           
    	return view('admin.pos',compact('customers','categories'));
    }

    public function subcat($id){
           $data=Subcategory::where('category_id',$id)->get();
           return json_encode($data);
    	// return response()->json($data);
    	
    }

    public function searchproduct($id){
    		$data=Product::where('subcategory_id',$id)->get();

    		return json_encode($data);
    }

    public function productprice($id){
    		$data=Product::where('id',$id)->get();
    		
    			return json_encode($data);
    		
    	
    	//$data=Product::('id',$id)->first();

    	//return  json_encode($data);
    }

    public function store(Request $request){
    	$request->validate([
    			'customer'=>'required',
    			'category'=>'required',
    			'subcats'=>'required',
    			'products'=>'required',
    			'pricex'=>'required',
    			'qty'=>'required'

    	]);

    	$product=Product::where('id',$request->products)->first();
    	
        $data=[
        	'id'=>$request->products,
        	'name'=>$product->product_name,
        	'qty'=>$request->qty,
        	'price'=>$request->pricex,
        	'weight'=>'0'

        ];  
    
       Cart::add($data);  	
    	Toastr::success('Cart successfully added',"added");
    	return redirect()->route('admin.pos');
    	
    }



    public function updatepos($qty,$id){

                
         
           $data=Cart::update($id, $qty);       

           return json_encode($data);
          // return redirect()->route('admin.pos');

    }


    public function removecart($id){       

        Cart::remove($id);
        return redirect()->back();
    }

    public function invoice(Request $request){


            $request->validate([
                    'custs_id'=>'required'
            ],

            [
                'custs_id.required'=>'Select a Customer to create invoice'
            ]
        );


        $id=$request->custs_id;

        $customer=Customer::where('id',$id)->first();
        $cart=Cart::content();
       return view('admin.invoice',compact('customer'));
    }

    public function customerid($id){
        return $id;
    }
}
