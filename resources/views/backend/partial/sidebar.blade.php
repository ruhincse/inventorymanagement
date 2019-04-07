 <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info" style="background:#3d5520">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->username}}</div>
                    <div class="email">{{Auth::user()->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                          

                            <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="material-icons">input</i>Sign Out
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                


                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->

            @if(Request::is('admin*'))
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="{{Request::is('admin/dashboard*')?'active':''}}">
                        <a href="{{route('admin.dashboard')}}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>

                   

                    <li class="{{Request::is('admin/employee*')?'active':''}}">
                        <a href="{{route('admin.employee.index')}}">
                            <i class="material-icons">account_box</i>
                            <span>Employee</span>
                        </a>
                    </li>

                    <li class="{{Request::is('admin/supplier*')?'active':''}}">
                        <a href="{{route('admin.supplier.index')}}">
                            <i class="material-icons">accessible</i>
                            <span>Supplier</span>
                        </a>
                    </li>

                    <li class="{{Request::is('admin/customer*')?'active':''}}">
                        <a href="{{route('admin.customer.index')}}">
                            <i class="material-icons">accessibility</i>
                            <span>Customer</span>
                        </a>
                    </li>

                    <li class="{{Request::is('admin/salary*')?'active':''}}">
                        <a href="{{route('admin.salary.index')}}">
                            <i class="material-icons">payment</i>
                            <span>Salary</span>
                        </a>
                    </li>

                    <li class="{{Request::is('admin/category*')?'active':''}}">
                        <a href="{{route('admin.category.index')}}">
                            <i class="material-icons">assignment</i>
                            <span>Category</span>
                        </a>
                    </li>


                    <li class="{{Request::is('admin/subcategory*')?'active':''}}">
                        <a href="{{route('admin.subcategory.index')}}">
                            <i class="material-icons">label</i>
                            <span>Subcategory</span>
                        </a>
                    </li>

                    <li class="{{Request::is('admin/product*')?'active':''}}">
                        <a href="{{route('admin.product.index')}}">
                            <i class="material-icons">business_center</i>
                            <span>Product</span>
                        </a>
                    </li>

                     <li class="{{Request::is('admin/expense*')?'active':''}}">
                        <a href="{{route('admin.expenses')}}">
                            <i class="material-icons">account_balance</i>
                            <span>Expense</span>
                        </a>
                    </li>

                    <li class="{{Request::is('admin/expense*')?'active':''}}">
                        <a href="{{route('admin.expenses')}}">
                            <i class="material-icons">account_balance</i>
                            <span>Search Expense</span>
                        </a>
                    </li>




                     <li class="{{Request::is('admin/attendance*')?'active':''}}">
                        <a href="{{route('admin.attendance')}}">
                            <i class="material-icons">touch_app</i>
                            <span>Attandance</span>
                        </a>
                    </li>

                    <li class="{{Request::is('admin/pos*')?'active':''}}">
                        <a href="{{route('admin.pos')}}">
                            <i class="material-icons">add_shopping_cart</i>
                            <span>POS</span>
                        </a>
                    </li>


                    <li class="{{Request::is('admin/pendingorder*')?'active':''}}">
                        <a href="{{route('admin.order.pending')}}">
                            <i class="material-icons">transfer_within_a_station</i>
                            <span>Pending Order</span>
                        </a>
                    </li>

                     <li class="{{Request::is('admin/allproduct*')?'active':''}}">
                        <a href="{{route('admin.allorder')}}">
                            <i class="material-icons">shop</i>
                            <span>All Order</span>
                        </a>
                    </li>





                        <li class="header">System </li>

                       <li>
                           <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                             <i class="material-icons">input</i><span>Sign Out</span>
                             </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                               </form>

                                


                            </li>


                             <li class="{{Request::is('admin/setting*')?'active':''}}">
                        <a href="{{route('admin.setting.index')}}">
                            <i class="material-icons">lock</i>
                            <span>Change Information</span>
                        </a>
                    </li>


                </ul>
            </div>

            @endif
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; {{ date('Y') }} <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
     
        <!-- #END# Right Sidebar -->
    </section>