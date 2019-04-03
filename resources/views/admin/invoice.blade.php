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
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>

                                                        	@foreach(Cart::content() as $carts)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{$carts->name}}</td>
                                                                <td>Lorem ipsum dolor sit amet.</td>
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
                                                <a href="#" class="btn btn-success waves-effect waves-light">Submit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        
        

</div>
</section>



@endsection


@push('js')

 


@endpush


























