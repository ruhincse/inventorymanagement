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
                   Expense Search Table
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">


              <div class="form-group">
                <form action="{{route('admin.expense.month')}}" method="post">
                  @csrf
                  <div class="col-md-3">
                            <div class="form-group">
                            <label for="exampleFormControlInputd">Select Month</label>
                             <div>
                                  <select  name="month"  class="browser-default custom-select">
                                    
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>                               

                                  </select>

                                  <button class="btn btn-primary" type="submit"> Search</button>
                              
                 </div>
               </div>
                 </div>
                </form>
                    </div>                
        </div>
            <div class="row clearfix">


                        <div class="form-group">
                          <form action="{{route('admin.expense.year')}}" method="post">
                            @csrf
                            <div class="col-md-3">
                                      <div class="form-group">
                                      <label for="exampleFormControlInputd">write Year
                                      </label>                                           
                        <input type="year" name="year" placeholder="{{date('Y')}}">
                         </div>
                           </div>
                           <br>
                             <button class="btn btn-primary" type="submit"> Search</button>
                          </form>
                              </div>                
                  </div>
      </div>


    </section>





  

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