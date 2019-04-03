@extends('backend.app')

@section('title','Edit Customer')

@push('css')



@endpush

@section('content')
  <section class="content">
        <div class="container-fluid">
             <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Edit Customer
                            </h2>
                           
                        </div>
      <form action="{{route('admin.customer.update',$data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="body">
              
          <div class="form-group">
            <label for="exampleFormControlInputi">Email address</label>
             <div class="form-line">
            <input type="email" class="form-control" value="{{$data->email}}" id="exampleFormControlInputi" name="email" placeholder="name@example.com">
              </div>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInputh">Name</label>
             <div class="form-line">
            <input type="text" class="form-control"  value="{{$data->name}}" id="exampleFormControlInputh" name="name" placeholder="User Name">
          </div>
            </div>

             <div class="form-group">
            <label for="exampleFormControlInputg">Shop name</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputg" value="{{$data->shopname}}" name="shopname" placeholder="Your Shop Name">
          </div>
            </div>


          <div class="form-group">
            <label for="exampleFormControlInputg">Mobile No</label>
             <div class="form-line">
            <input type="number" class="form-control"  value="{{$data->mobile}}" id="exampleFormControlInputg" name="mobile" placeholder="Mobile no">
          </div>
            </div>

          <div class="form-group">
            <label for="exampleFormControlInputf">Bank Name</label>
             <div class="form-line">
            <input type="text" class="form-control"  value="{{$data->bank_name}}" id="exampleFormControlInputf" name="bank_name" placeholder="bank Name">
          </div>
            </div>

          







        <div class="form-group">
            <label for="exampleFormControlInputd">Branch Name</label>
             <div class="form-line">
            <input type="text" class="form-control"  value="{{$data->branch_name}}" id="exampleFormControlInputd" name="branch_name" placeholder="Your Bank Branch Name">
          </div>
            </div>

          <div class="form-group">
            <label for="exampleFormControlInputd">Account Number</label>
             <div class="form-line">
            <input type="text" class="form-control"  value="{{$data->account_number}}" id="exampleFormControlInputd" name="account_number" placeholder="Your Account Number">
          </div>
            </div>

            <div class="form-group">
            <label for="exampleFormControlInputd">Customer Type</label>
             <div class="form-line">
                  <select  name="type" >
                    
                    <option value="dealer" 
                          {{("dealer"==$data->type)?'selected':""}}
                    >Dealer</option>
                    <option value="wholesell"  {{("wholesell"==$data->type)?'selected':""}}>Wholesell</option>
                    <option value="retailer" {{("retailer"==$data->type)?'selected':""}}>Retailer</option>

                  </select>
              
          </div>
            </div>

           <div class="form-group">
            <label for="exampleFormControlTextarea1">Location</label>
            <textarea class="form-line"  name="location" rows="3">{{ $data->location}}</textarea>
          </div>


           <div class="form-group">
            <label for="Image">Image</label>

            <input type="file" class="form-control"   id="Image" name="image" >
            
          </div>

    

      
      <div class="modal-footer">
        <a href="{{route('admin.customer.index')}}" class="btn btn-danger" data-dismiss="modal">Back</a>
        <button type="submit" class="btn btn-primary">Update Employee</button>
      </div>
</div>
      

               </form>
                            


        </div>

        </div>
        </div>
      </div>
      
</section>

       @endsection

 @push('js')



@endpush