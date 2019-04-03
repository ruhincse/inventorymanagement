@extends('backend.app')

@section('title','Edit Product')

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
                               Edit Product
                            </h2>
                           
                        </div>
      <form action="{{route('admin.product.update',$data->id)}}" method="POST">
        @csrf
        @method('PUT')
    <div class="body">
              
          
          <div class="form-group">
            <label for="exampleFormControlInputi">Select Category</label>
             <div class="form-line">
              <select name="category"  class="form-line"> 
                      @foreach($cats as $cat)

                    <option value="{{$cat->id}}" {{$cat->id==$data->category_id ? 'selected':" "}}>{{$cat->cat_name}}</option>

                    @endforeach
                  
              </select>
            

              </div>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInputh">Subcategry</label>
             <div class="form-line">
                <select name="subcat"  class="form-line"> 
                      @foreach($scats as $scat)

                    <option value="{{$scat->id}}" {{ $scat->id==$data->category_id ? 'selected':" "}}>{{$scat->name}}</option>

                    @endforeach
                  
              </select>
          </div>
            </div>

             <div class="form-group">
            <label for="exampleFormControlInputh">Product Name</label>
             <div class="form-line">
            <input type="text" class="form-control" value="{{$data->product_name}}" id="exampleFormControlInputh" name="product_name" placeholder="Product Name">
          </div>
            </div>

          <div class="form-group">
            <label for="exampleFormControlInputg">Product Buying Price</label>
             <div class="form-line">
            <input type="number" class="form-control" value="{{$data->buying_price}}" id="exampleFormControlInputg" name="buying_price" placeholder="Buying Price">
          </div>
            </div>


          <div class="form-group">
            <label for="exampleFormControlInputg">Product Selling Price</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputg" name="selling_price" value="{{$data->selling_price}}"  placeholder="Selling Price">
          </div>
            </div>


            
    

      
      <div class="modal-footer">
        <a href="{{route('admin.subcategory.index')}}" class="btn btn-danger" data-dismiss="modal">Back</a>
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