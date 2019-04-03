 @extends('backend.app')

@section('title','Profile Info')

@push('cs')

@endpush

@section('content')
    
 <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="{{asset('storage/supplier/'.$data->image)}}" alt="AdminBSB - Profile Image" />
                            </div>
                            <div class="content-area">
                                <h3></h3>
                                <p>Designation</p>
                                <p>{{$data->designation}}</p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Joining Date</span>
                                    <span>{{($data->created_at->diffForHumans())}}</span>
                                </li>
                                <li>
                                    <span>Salary</span>
                                    <span>{{$data->salary}}</span>
                                </li>
                                <li>
                                    <span>Account No</span>
                                    <span>{{$data->account_number}}</span>
                                </li>

                                <li>
                                    <span>Addresss</span>
                                    <span>{{$data->address}}</span>
                                </li>

                            </ul>
                            
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                                    
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        

                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    
                                                    <div class="media-body">
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="post">
                                                        <table  class="table">
                                                                <thead>
                                                                    <th>Name</th>
                                                                    <th>salay</th>
                                                                    <th>Account Number</th>
                                                                    <th>Image</th>
                                                                    
                                                                </thead>
                                                                        <tr>
                                                                            
                                                                            <td>{{$data->name}} </td>
                                                                            <td>{{$data->salary}} </td>
                                                                            <td>{{$data->account_number}} </td>
                                                                            <td><img src="{{asset('storage/supplier/'.$data->image)}}" height="100" width="100"> </td>
                                                                        </tr>

                                                                <tbody>
                                                                    
                                                                </tbody>
                                                                    <tfoot>
                                                            
                                                                    <th>Name</th>
                                                                    <th>salay</th>
                                                                    <th>Account Number</th>
                                                                    <th>Image</th>
                                                                    
                                                               </tfoot>


                                                        </table>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>

                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
@endsection


@push('js')
    <script src="{{asset('backend/js/pages/examples/profile.js')}}"></script>


@endpush



