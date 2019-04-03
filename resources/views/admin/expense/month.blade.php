@extends('backend.app')

@section('title','Expenses')

@push('css')

<link href="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



@endpush

@section('content')

     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   Expense Table
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        
							
              <a href="{{route('admin.expense.search')}}" class="btn btn-primary pull-right">Search Again</a>
							
                            <h2>
                                Expense Table
                            </h2>
                               

                              <br>
                            
                          
                              <center> <span class="badge bg-green mx-auto"><h2>  Monthly Total Expense : {{$monthlyexp}}<h2></span></center>   <br>

                             
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Details</th>
                                            <th>Amount</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Details</th>
                                            <th>Amount</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($datas as $key=> $data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{str_limit($data->details,15)}}</td>
                                            <td>{{$data->amount}}</td>
                                           
                                            <td>{{$data->month}}</td>
                                            <td>{{$data->year}}</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="{{route('admin.expense.store')}}" method="POST" >
      <div class="modal-body">
       

        @csrf


           <div class="form-group">
            <label for="exampleFormControlInputf">Expense Details</label>
             <div class="form-line">.

            <textarea name="details"  class="form-line" rows="3"> </textarea>

          </div>
        </div>

          <div class="form-group">
            <label for="exampleFormControlInputf">Date</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputf" name="dates" value="{{date('d/m/Y')}}" disable>
          </div>
        </div>

         <div class="form-group">
            <label for="exampleFormControlInputf">Months</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputf" name="months" value="{{date('F')}}" disable>
          </div>
        </div>


          <div class="form-group">
            <label for="exampleFormControlInputf">Year</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputf" name="years" value="{{ date('Y')}}">
          </div>
      </div>

      <div class="form-group">
            <label for="exampleFormControlInputf">Amount</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputf" name="balance"  placeholder="Your Expenses Amount">
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Expense </button>
      </div>

		  

       </form>
    </div>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>



    <script>      

        function delEmp(id){

         // alert(id);

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
              document.getElementById('delete-form-'+id).submit();
    
          
        
          }
        })
         

        }
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



<script>
  $(document).ready(function(){

        $('select[name="emp"]').on('change',function(){
          var emp=$(this).val();
        // console.log(emp);

         if(emp){
          $.ajax({

            url:'salary/'+emp,
            type:'get',
            dataType:'json',
            success:function(data){


              $('select[name="salary"]').empty();

              $.each(data,function(key,value){
               // console.log(value);
                
                  $('select[name="salary"]').append('<option value=" '+value.salary+' ">'+value.salary+' </option>')
                

                            

              });
             
              } });


         }



        });

  })
  


</script>




@endpush