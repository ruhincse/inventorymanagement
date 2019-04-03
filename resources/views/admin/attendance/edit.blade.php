@extends('backend.app')

@section('title','Edit Attendance')

@push('css')
<link href="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">


@endpush

@section('content')

   <section class="content">
      <div class="container-fluid">
          <div class="block-header">
              <h2>
                Edit Attendance  Table
                  
              </h2>
          </div>
          <!-- Basic Examples -->
          
          <!-- #END# Basic Examples -->
          <!-- Exportable Table -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                      	<a type="submit" href="{{route('admin.attendance')}}" class="btn btn-primary pull-right" >
						Back to Homepage 
						</a>
                          <h2>
                              Attendance  Table
                          </h2>
                          
                          <ul class="header-dropdown m-r--5">
                              
                            
                          </ul>
                      </div>
                      <div class="body">
                          <div class="table-responsive">
                            <form action="{{route('admin.attendance.update',$date->edit_date)}}" method="POST">
                              @csrf
                              @method('PUT')
                              <table class="table table-bordered ">
                          <thead>
                              <tr>
                                  <th>id</th>
                                  <th>Name</th>
                                  <th>Attendance</th>
                                  
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>id</th>
                                  <th>Name</th>
                                  <th>Attendance</th>
                                  
                              </tr>
                          </tfoot>
                          <tbody>
                            <tr>
                              @foreach($empys as $key=>$emp)
                                @foreach($emp->attendances as $data)
                                <td>{{$key+1}} </td>
                                <td> {{$emp->name}}</td>
                                <td>
                                  <input type="hidden" name="user_id[]" value="{{$emp->id}}">

                                  <input type="hidden" name="date" value="{{date('d/m/Y')}}">
                                  <input type="hidden" name="year" value="{{date('Y')}}">

                                  <input type="hidden" name="month" value="{{date('F')}}">
                                    <input type="radio" name="attandance[{{$emp->id}}]" id="{{$emp->name}}" class="with-gap" value="present" {{($data->attendance=='present')?'checked':''}}>
                          <label for="{{$emp->name}}"  >Present</label>

                          <input type="radio" name="attandance[{{$emp->id}}]" id="{{$emp->id}}" class="with-gap" value="absance">
                          <label for="{{$emp->id}}" class="m-l-20">Absance</label>
                      </div>                                           

                        

                                </td>

                            </tr>
                            @endforeach
                            @endforeach
                             
                          </tbody>
                            

                      </table>
                      <button type="submit" class="btn btn-secondary">Update Info</button>
                      </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- #END# Exportable Table -->
      </div>
</section>

      <!-- Modal -->


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