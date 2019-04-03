@extends('backend.app')

@section('title','Edit Supplier')

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
                               Edit Supplier Info
                            </h2>
                           
                        </div>
      <form action="{{route('admin.supplier.update',$data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="body">
              
                      <div class="form-group">
            <label for="exampleFormControlInputi">Email address</label>
             <div class="form-line">
            <input type="email" class="form-control" id="exampleFormControlInputi" name="email"  value="{{$data->email}}" placeholder="name@example.com">
              </div>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInputh">Name</label>
             <div class="form-line">
            <input type="text" class="form-control" value="{{$data->name}}" id="exampleFormControlInputh" name="name" placeholder="User Name">
          </div>
            </div>

          <div class="form-group">
            <label for="exampleFormControlInputg">Mobile No</label>
             <div class="form-line">
            <input type="number" class="form-control" value="{{$data->mobile}}" id="exampleFormControlInputg" name="mobile" placeholder="Mobile no">
          </div>
            </div>

          <div class="form-group">
            <label for="exampleFormControlInputf">Address</label>
             <div class="form-line">
            <input type="text" class="form-control" value="{{$data->address}}" id="exampleFormControlInputf" name="address" placeholder="User Address">
          </div>
            </div>

         

          <div class="form-group">
            <label for="exampleFormControlInputd">Joining Date</label>
             <div class="form-line">
            <input type="date" class="form-control" value="{{$data->join_date}}" id="exampleFormControlInputd" name="join_date">
          </div>
            </div>



          <div class="form-group">
            <label for="exampleFormControlInputc">salary</label>
             <div class="form-line">
            <input type="number" class="form-control" value="{{$data->salary}}" id="exampleFormControlInputc" name="salary" placeholder="1000">
          </div>
            </div>


          <div class="form-group">
            <label for="exampleFormControlInputb">Image</label>
             <div class="form-line">
            <input type="file" class="form-control" id="exampleFormControlInputb" name="image" >
          </div>
            </div>

          <div class="form-group">
            <label for="exampleFormControlInputa">Account Number</label>
             <div class="form-line">
            <input type="number" class="form-control" value="{{$data->account_number}}" id="exampleFormControlInputa" name="account_number" >
          </div>
            </div>

    

      
      <div class="modal-footer">
        <a href="{{route('admin.supplier.index')}}" class="btn btn-danger" data-dismiss="modal">Back</a>
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