@extends('backend.app')

@section('title','POS Table')

@push('css')
<link href="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

<link href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


@endpush

@section('content')

   <section class="content">

      <div class="container-fluid">
          <button type="submit" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal"> Add Customer</button> <br/> <br/> <br/> 
          <form action="{{route('admin.product.store')}}" method="post">
            @csrf

           <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                  <thead>
                                    <th>Customer</th>
                                    <th>Category</th>
                                    <th>subcategory</th>
                                    <th>product</th>
                                    <th>price</th>
                                    <th>Qty</th>
                                    
                                  </thead>

                                  <tbody>

                                    <tr>
                                      <td>
                                        <select name="customer" class="form-control show-tick" required>

                                          @foreach($customers as $customer)
                                          <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        
                                        @endforeach
                                        </select>
                                      </td>
                                      <td>
                                        <select name="category" class="form-control show-tick" required>
                                           <option value="">select Category</option>
                                          @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                        
                                          @endforeach
                                        </select>
                                      </td>
                                      <td>

                                        <select name="subcats"  class="form-control show-tick" required> 
                                            <option>Select Category</option>                  
                 
                                           </select>

                                      </td>

                                      <td>

                                        <select name="products"  class="form-control show-tick" required> 
                                                         
                                               <option> Select subcategory</option>  
                                           </select>
                                       
                                        

                                      </td>


                                       <td>
                                        <input name="pricex"  type="text" class="custom-file-input" required>
                                       
                           

                                      </td>

                                      <td>
                                        <input name="qty"  type="number" class="custom-file-input" required>
                                       
                           

                                      </td>

                                     



                                   
                                    </tr>
                                      
                                  </tbody>


                              </table>
            <button type="submit" class="btn btn-danger pull-right">Add Product</button>


                                </form>


                                <h2 class="text-center">Order Information</h2>
   <table class="table table-bordered  ">
                                  <thead>


                                    <th>product Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                  </thead>

                                  <tbody>
                                  
                                      @foreach(Cart::content() as $key=>$data)
                                   
                                    <tr>
                                     <td>{{$data->name}}</td>
                                     <td>
                                      

                                      <input type="text" name="qty" value="{{$data->qty}}">

                                      <input type="hidden" id="rowIds" name="rowId" value="{{$data->rowId}}">                          
                                     </td>                                

                                      <td> {{$data->price}} </td>

                                   
                                    
                                         <td> <input type="text" name="pricess" name="total" value="{{$data->price * $data->qty}}" disabled>

                                      


                                       </td>                                     
                                     <td> <a href="{{route('admin.cart.remove',$data->rowId)}}" onclick="return confirm('Are You sure to Remove Product')"  class="btn btn-danger" ><i class="material-icons">delete</i></td>                                     
                                    </tr>
                                     @endforeach
                                  
                                      
                                  </tbody>


                              </table>


                              <div class="pull-right"> 
                                <form action="{{route('admin.create.invoice')}}" method="post">
                                  @csrf
                               <span>Quantity: {{Cart::count()}} </span><br>
                               <span>Sub Total: {{Cart::subtotal()}} </span><br>
                               <span>Sub Tax {{Cart::tax()}} </span><br>
                               <h3>Sub Total = {{Cart::total()}} </h3>
                               <input type="hidden" name="custs_id" id='cust_id'>

                      <button type="submit" class="btn btn-danger">Create Invoice</button>
                      </form> 

                                </div>
                              

                            
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="{{route('admin.customer.store')}}" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
       

        @csrf

        <div class="form-group">
            <label for="exampleFormControlInputi">Email address</label>
             <div class="form-line">
            <input type="email" class="form-control" id="exampleFormControlInputi" name="email" placeholder="name@example.com">
              </div>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInputh">Name</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputh" name="name" placeholder="User Name">
          </div>
            </div>

          <div class="form-group">
            <label for="exampleFormControlInputg">Mobile No</label>
             <div class="form-line">
            <input type="number" class="form-control" id="exampleFormControlInputg" name="mobile" placeholder="Mobile no">
          </div>
            </div>


          <div class="form-group">
            <label for="exampleFormControlInputg">Shop name</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputg" name="shopname" placeholder="Your Shop Name">
          </div>
            </div>

          <div class="form-group">
            <label for="exampleFormControlInputf">Bank Name</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputf" name="bank_name" placeholder="bank Name">
          </div>
            </div>

          







        <div class="form-group">
            <label for="exampleFormControlInputd">Branch Name</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputd" name="branch_name" placeholder="Your Bank Branch Name">
          </div>
            </div>

          <div class="form-group">
            <label for="exampleFormControlInputd">Account Number</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputd" name="account_number" placeholder="Your Account Number">
          </div>
            </div>

            <div class="form-group">
            <label for="exampleFormControlInputd">Customer Type</label>
             <div class="form-line">
                  <select  name="type" >
                    
                    <option value="dealer">Dealer</option>
                    <option value="wholesell">Wholesell</option>
                    <option value="retailer">Retailer</option>

                  </select>
              
          </div>
            </div>

           <div class="form-group">
            <label for="exampleFormControlTextarea1">Location</label>
            <textarea class="form-line"  name="location" rows="3"></textarea>
          </div>



         


          <div class="form-group">
            <label for="exampleFormControlInputb">Image</label>
             <div class="form-line">
            <input type="file" class="form-control" id="exampleFormControlInputb" name="image" >
          </div>
            </div>


    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Customer </button>
      </div>

      

       </form>
    </div>
  </div>
</div>


</div>
</section>



@endsection


@push('js')

 
  <script src="{{asset('backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
  <script src="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
  <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
  <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
  <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
  <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
  <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
  <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
 <script src="{{asset('backend/js/pages/tables/jquery-datatable.js')}}"></script>


 

<script type="text/javascript"> 

    $(document).ready(function(){
      $('select[name="category"]').on('change',function(){
        var cat=$(this).val();
        //console.log(cat);
        if(cat){
          $.ajax({


            url:'ssubcat/'+cat,
            type:'get',
            dataType:'json',
            success:function(data){
                     
                    $('select[name="subcats"]').empty();
                   
                        $.each(data,function(key,value){
                      //  console.log(value.name);

                          $('select[name="subcats"]').append('<option value=" '+value.id+'">'+value.name+ '</option>')


                        });

            }
          });
        }

      });
    });


    $(document).ready(function(){
      $('select[name="subcats"]').on('change',function(){
        var subcat=$(this).val();
          
          if(subcat){
            $.ajax({
              
                url:'searchproduct/'+subcat,
                type:"GET",
                dataType:"json",
                success:function(data){

                 // console.log(data);
                
                  $('select[name="products"]').empty();
                     $.each(data,function(key,value){
                           //console.log(value.selling_price);

                          $('select[name="products"]').append('<option value=" '+value.id+'">'+value.product_name+'</option>')                        

                         // $('input[name="price"]').val(value.selling_price)


                        });
                }
            });  
                }
             });

            });


        $(document).ready(function(){
          $('select[name="products"]').on('change',function(){
              var proid=$(this).val();
              
              if(proid){

                $.ajax({
                  url:"prices/"+proid,
                   type:"get",
                  dataType:"json",
                 
                  success:function(data){
                    //console.log(data);
                      $.each(data,function(key,value){
                      //  console.log(value.selling_price);

                        $('input[name="pricex"]').val(value.selling_price);
                   // $('input[name="price"]').val(value.selling_price);

                   //  $('prices').val(value.selling_price);

                      })
                   
                  }

                 
                });

                //console.log()
      


          }

        });

          })



//here
        $(document).ready(function(){
            $('input[name="qty"]').on('change',function(){


              var qty=$(this).val();
              var id=$('#rowIds').val();
               //console.log(id);
              //  console.log(qty);

             if(qty){
                $.ajax({

                  url:'http://127.0.0.1:8000/admin/updatecart/' +qty+'/'+id,
                  type:"get", 
                  dataType:'text',
                      //data:{rowid:id},
                      success:function(data){
                      //   console.log(data.name);
                        
                        
    

                      // window.location.href;
                       // console.log(data)
                      }

                });

             }

              
            });


        })


        $(document).ready(function(){
          $('select[name="customer"]').on('change',function(){
              var id=$(this).val();
              if(id){
                $.ajax({
                    url:"cartcustomer/"+id,
                    type:'get',
                    dataType:'json',
                    success:function(data){
                      console.log(data);
                    $('#cust_id').val(data);

                     // $('#cust_id').value= data;
                      
                    }

                })
              }
          })
        })
</script>


@endpush







