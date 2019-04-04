@extends('backend.app')

@section('title','Invoice')

@push('css')

@endpush

@section('content')

   <section class="content">

      <div class="container-fluid">


         <div class="col-md-12">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <h4 class="text-right">{{$customer->name}}</h4>
                                                
                                            </div>
                                            <div class="pull-right">

                                                <h4>Invoice # <br>
                                                    <strong>{{mt_rand()}}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <br>
                                                      {{$customer->location}}<br>
                                                      <abbr title="Phone">Mobile:</abbr>  {{$customer->mobile}}
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Order Date: </strong> 
                                                    	{{date("F m  Y")}}
                                                    </p>
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="bg-red">Pending</span></p>
                                                    <p class="m-t-10"><strong>Order ID: </strong> {{mt_rand()}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr><th>#</th>
                                                            <th>Item</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>

                                                        	@foreach(Cart::content() as $key=> $carts)
                                                            <tr>
                                                                <td>{{ $sl++}}</td>
                                                                <td>{{$carts->name}}</td>          
                                                                <td>{{$carts->qty}}</td>
                                                                <td>{{$carts->price}}</td>
                                                                <td>{{$carts->price * $carts->qty}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-3 col-md-offset-9">
                                                <p class="text-right"><b>Sub-total:</b> {{Cart::subtotal()}}</p>
                                                <p class="text-right">{{Cart::tax()}}</p>
                                                <p class="text-right">VAT: 12.9%</p>
                                                <hr>
                                                <h3 class="text-right">{{Cart::total()}}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#exampleModal">Submit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        
        

</div>
</section>


<!-- Model-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment Method</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="{{route('admin.create.order')}}" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
       

        @csrf

           <input type="hidden" class="form-control" name="customer_id" value="{{$customer->id}}">  
          <div class="form-group">
            <label for="exampleFormControlInputd">Payment Type</label>
             <div class="form-line">
                  <select  name="payment_type" >
                    
                    <option value="hadncash">Hadncash</option>
                    <option value="check">check</option>
                    <option value="due">Due</option>

                  </select>
              
          </div>
            </div>


       


          <div class="form-group">
            <label for="exampleFormControlInputg">Total</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputg" name="total" value="{{Cart::total()}}">
          </div>
            </div>


          <div class="form-group">
            <label for="exampleFormControlInputg">Payment</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputg" name="payment" value="{{Cart::total()}}">
          </div>
            </div>



          <div class="form-group">
            <label for="exampleFormControlInputg">Due</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputg" name="due" value="">
          </div>
            </div>


    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Order Submit </button>
      </div>

      

       </form>
    </div>
  </div>
</div>



@endsection


@push('js')

 


@endpush


























