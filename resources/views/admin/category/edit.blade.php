@extends('backend.app')

@section('title','Edit Category')

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
                               Edit Category
                            </h2>
                           
                        </div>
      <form action="{{route('admin.category.update',$data->id)}}" method="POST">
        @csrf
        @method('PUT')
    <div class="body">
              
          
          <div class="form-group">
            <label for="exampleFormControlInputh">Category Name</label>
             <div class="form-line">
            <input type="text" class="form-control"  value="{{$data->cat_name}}" id="exampleFormControlInputh" name="cat_name" placeholder="Category Name">
          </div>
            </div>

            
    

      
      <div class="modal-footer">
        <a href="{{route('admin.salary.index')}}" class="btn btn-danger" data-dismiss="modal">Back</a>
        <button type="submit" class="btn btn-primary">Update Category</button>
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