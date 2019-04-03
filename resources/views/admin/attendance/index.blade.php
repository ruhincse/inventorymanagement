@extends('backend.app')

@section('title','Attandance')

@push('css')
<link href="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">


@endpush

@section('content')

   <section class="content">
      <div class="container-fluid">
          <div class="block-header">
              <h2>
                 Attendance  Table
                  
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
						Add Attendance  
						</button>
                          <h2>
                              Attendance  Table
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
                                          <th>Date</th>   
                                                        
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                          <th>id</th>
                                          <th>date</th>
                                        
                                          
                                          <th>Action</th>
                                      </tr>
                                  </tfoot>
                                  <tbody>
                                      @foreach($datas as $key=> $data)
                                      <tr>
                                          <td>{{$key+1}}</td>
                                         <td>{{$data->edit_date}}</td>
                                        
                                         
                                          <td> 

                                             <a href="{{route('admin.attendance.show',$data->edit_date)}}" class="btn btn-info"> <i class="material-icons">visibility</i> </a>



                                              <a href="{{route('admin.attendance.edit',$data->edit_date)}}" class="btn btn-primary"> <i class="material-icons">edit</i> </a>

                                              

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
     <form action="{{route('admin.attandence.store')}}" method="POST" >
    <div class="modal-body">
     

      @csrf

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
                                <td>{{$key+1}} </td>
                                <td> {{$emp->name}}</td>
                                <td>
                                  <input type="hidden" name="user_id[]" value="{{$emp->id}}">

                                  <input type="hidden" name="date" value="{{date('d/m/Y')}}">
                                  <input type="hidden" name="year" value="{{date('Y')}}">

                                  <input type="hidden" name="month" value="{{date('F')}}">
                                    <input type="radio" name="attandance[{{$emp->id}}]" id="{{$emp->name}}" class="with-gap" value="present">
                          <label for="{{$emp->name}}" >Present</label>

                          <input type="radio" name="attandance[{{$emp->id}}]" id="{{$emp->id}}" class="with-gap" value="absance">
                          <label for="{{$emp->id}}" class="m-l-20">Absance</label>
                      </div>                                           

                        

                                </td>

                            </tr>

                            @endforeach
                             
                          </tbody>


                      </table>


	  
  <button type="submit" class="btn btn-primary">Submit </button>
     </form>
  </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


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