@extends('backend.app')

@section('title','Employeer')

@push('css')
<link href="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">


@endpush

@section('content')

     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    JQUERY DATATABLES
                    
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
							 Add Employee
							</button>
                            <h2>
                                Employeer Table
                            </h2>
                            
                            <ul class="header-dropdown m-r--5">
                                
                              
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>id</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Salary</th>
                                            <th>Start date</th>
                                            <th>account_number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>id</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Salary</th>
                                            <th>Start date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($datas as $key=> $data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->mobile}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$data->salary}}</td>
                                            <td>{{$data->join_date}}</td>
                                            <td>{{$data->account_number}}</td>
                                            <td> 

                                               <a href="{{route('admin.employee.show',$data->id)}}" class="btn btn-info"> <i class="material-icons">visibility</i> </a>



                                                <a href="{{route('admin.employee.edit',$data->id)}}" class="btn btn-primary"> <i class="material-icons">edit</i> </a>

                                                <button class="btn btn-danger" onclick=" delEmp( {{$data->id}} )"> <i  class="material-icons">delete</i> </button>
                                                    <form id="form-action-{{$data->id}}" action="{{route('admin.employee.destroy',$data->id)}}" method="POST">
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="{{route('admin.employee.store')}}" method="POST" enctype="multipart/form-data">
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
            <label for="exampleFormControlInputf">Address</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputf" name="address" placeholder="User Address">
          </div>
            </div>

         

          <div class="form-group">
            <label for="exampleFormControlInputd">Joining Date</label>
             <div class="form-line">
            <input type="date" class="form-control" id="exampleFormControlInputd" name="join_date">
          </div>
            </div>

            <div class="form-group">
            <label for="exampleFormControlInputd">Designation</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputd" name="designation">
          </div>
            </div>




          <div class="form-group">
            <label for="exampleFormControlInputc">salary</label>
             <div class="form-line">
            <input type="number" class="form-control" id="exampleFormControlInputc" name="salary" placeholder="1000">
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
            <input type="number" class="form-control" id="exampleFormControlInputa" name="acc_number" >
          </div>
            </div>

    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Employee</button>
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