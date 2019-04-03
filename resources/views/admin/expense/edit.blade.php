@extends('backend.app')

@section('title','Edit Employee')

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
                                VERTICAL LAYOUT
                            </h2>
                           
                        </div>
           <form action="{{route('admin.expense.update',$data->id)}}" method="POST" >
      <div class="modal-body">
       

        @csrf
        @method('PUT')


           <div class="form-group">
            <label for="exampleFormControlInputf">Expense Details</label>
             <div class="form-line">.

            <textarea name="details"  class="form-line" rows="3">{{$data->details}} </textarea>

          </div>
        </div>

          <div class="form-group">
            <label for="exampleFormControlInputf">Date</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputf" name="dates" value="{{$data->date}}"  disable>
          </div>
        </div>

         <div class="form-group">
            <label for="exampleFormControlInputf">Months</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputf" name="months" value="{{$data->month}}" disable>
          </div>
        </div>


          <div class="form-group">
            <label for="exampleFormControlInputf">Year</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputf" name="years" value="{{$data->year}}">
          </div>
      </div>

      <div class="form-group">
            <label for="exampleFormControlInputf">Amount</label>
             <div class="form-line">
            <input type="text" class="form-control" id="exampleFormControlInputf" value="{{$data->amount}}" name="balance"  placeholder="Your Expenses Amount">
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Expense </button>
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