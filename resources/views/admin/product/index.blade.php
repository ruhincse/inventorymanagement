@extends('backend.app')

@section('title','Product')

@push('css')
<link href="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


@endpush

@section('content')

     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   Product Table
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
              Add Product 
              </button>
                            <h2>
                                Product Table
                            </h2>
                            
                            <ul class="header-dropdown m-r--5">
                                
                              
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Product Name</th>
                                            <th>Category Name</th>                           
                                            <th>Subcat Name</th>                            
                                            <th>Selling Price</th>                           
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                           <th>Product Name</th>  
                                           <th>Category Name</th> 
                                           <th>Subcat Name</th> 
                                           <th>Selling Price</th> 
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($datas as $key=> $data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{str_limit($data->product_name,20)}}</td>
                                            <td>{{$data->category->cat_name}}</td>
                                            <td>{{$data->subcat->name}}</td>
                                            <td>{{$data->selling_price}}</td>
                                            
                                            <td>                                          

                                               <a href="{{route('admin.product.edit',$data->id)}}" class="btn btn-primary"> <i class="material-icons">edit</i> </a>

                                                <button class="btn btn-danger" onclick=" delEmp( {{$data->id}} )"> <i  class="material-icons">delete</i> </button>
                                                    <form id="form-action-{{$data->id}}" action="{{route('admin.product.destroy',$data->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        


                                                    </form>

                                                   </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>


        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="{{route('admin.product.store')}}" method="POST">
        <div class="modal-body">
       

        @csrf



           <div class="form-group">
            <label for="exampleFormControlInputh">Category  Name</label>
              <select name="category"> 
                  @foreach($cats as $cat)
                    <option value="{{$cat->id}}">{{$cat->cat_name}} </option>
                  @endforeach
              </select>
            </div>



           <div class="form-group">
            <label for="exampleFormControlInputh">Subcategory  Name</label>
              <select name="subcat"> 
                 
                  
                 
              </select>
            </div>


          <div class="form-group">
            <label for="exampleFormControlInputh">Product Name</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputh" name="product_name" placeholder="Product Name">
          </div>
            </div>

          <div class="form-group">
            <label for="exampleFormControlInputg">Product Buying Price</label>
             <div class="form-line">
            <input type="number" class="form-control" id="exampleFormControlInputg" name="buying_price" placeholder="Buying Price">
          </div>
            </div>


          <div class="form-group">
            <label for="exampleFormControlInputg">Product Selling Price</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputg" name="selling_price" placeholder="Selling Price">
          </div>
            </div>

         
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Product </button>
      </div>

      

       </form>
    </div>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>



    <script>      

        function delEmp(id){

         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
              event.preventDefault();
              document.getElementById('form-action-'+id).submit();
    
          
        
          }
        })
         

        }
    </script>




    <script type="text/javascript">
            $(document).ready(function(){
                $('select[name="category"]').on('change',function(){

                  var cat=$(this).val();
                 // console.log(cat);
                    if(cat){
                 $.ajax({
                      url:'product/'+cat,
                      type:'get',
                      dataType:'json',
                      success:function(data){
                        //console.log(data);

                        $('select[name="subcat"]').empty();
                        $.each(data,function(key,value){
                          $('select[name="subcat"]').append('<option value=" '+ value.id +'"> '+value.name +'</option>')


                        });


                       

                      }


                 });

                 }




                })



            })


    </script>

@endsection


@push('js')

    <script src="{{asset('backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
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



@endpush