<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Brian2694\Toastr\Facades\Toastr;
use App\Customer;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Order;
use App\Orderdetails;
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

        print_r($product);
        
    	
        $data=[
        	'id'=>$product->id,
        	'name'=>$product->product_name,
        	'qty'=>$request->qty,
        	'price'=>$request->pricex,
        	'weight'=>'0'

        ];  
    
       Cart::add($data);  
        /*$data=Cart::content();
       echo "<pre>";
       print_r($data);	
       echo "</pre>";   
       exit; */
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
        $sl=1;
       return view('admin.invoice',compact('customer','sl'));
    }

    public function customerid($id){
        return $id;
    }


    public function order(Request $request){
                $request->validate([
                'customer_id'=>'required',
                'payment_type'=>'required',
                'total'=>'required',
                'payment'=>'required',
                'due'=>'required',
        ]);
 
        $data['customer_id']=$request->customer_id;
        $data['order_status']='pending';
        $data['payment_type']=$request->payment_type;
        $data['total_products']=Cart::count();
        $data['order_date']=date('d_m_Y');       
        $data['sub_total']=Cart::subtotal();   
        $data['total']=$request->total;
        $data['payment_type']=$request->payment_type;        
        $data['pay']=$request->payment;
        $data['due']=$request->due;

            $order=Order::create($data);
            $order_id=$order->id;

               // Attandance::create($data);

            $data=Cart::content();

         //  print_r($data);
          // exit;

         //   qty price   total
            foreach ($data as $datas) {
                    $orders['order_id']=$order_id;
                    $orders['product_id']=$datas->id;
                    $orders['qty']=$datas->qty;
                    $orders['price']=$datas->price;
                    $orders['total']=$datas->price*$datas->qty;
                    Orderdetails::create($orders);         
            }


            Toastr::success('Order Confirmed Please Provide the Product ',"ordered Confirmed");
            return redirect()->route('admin.dashboard');
               

       

    }
}
