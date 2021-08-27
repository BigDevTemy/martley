 <div class="leftside-menu leftside-menu-detached">

                    <div class="leftbar-user">
                        <a href="javascript: void(0);">
                            <img src="{{url('backend_asset/assets/images/users/avatar-1.jpg')}}" alt="user-image" height="42" class="rounded-circle shadow-sm">
                            <span class="leftbar-user-name">{{Auth::user()->fname}}</span>
                            @foreach(Auth::user()->Roles as $role)
                                <span class="leftbar-user-name">({{$role->name}})</span>
                            @endforeach
                            
                        </a>
                    </div>

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item">Navigation</li>

                        <li class="side-nav-item ">
                            @if(Auth::user()->hasRole('super-admin'))
                                <a href="{{route('admindashboard')}}" class="side-nav-link">
                                    <i class="uil-home-alt"></i>
                                    <span class="badge bg-info rounded-pill float-end">new</span>
                                    <span> Dashboard </span>
                                </a>
                            @elseif(Auth::user()->hasRole('loan_officers'))
                                <a href="{{route('loanadmindashboard')}}" class="side-nav-link">
                                    <i class="uil-home-alt"></i>
                                    <span class="badge bg-info rounded-pill float-end">new</span>
                                    <span> Dashboard </span>
                                </a>
                            @endif
              
                        </li>
                        @if(Auth::user()->hasRole('super-admin'))
                            <li class="side-nav-title side-nav-item">Apps</li>

                            <li class="side-nav-item">
                                <a href="{{route('awaiting_customer_approval')}}" class="side-nav-link">
                                    <i class="uil-calender"></i>
                                    <span> Awaiting Customer Approval </span>
                                </a>
                                <a href="{{route('awaiting_loan_approval')}}" class="side-nav-link">
                                    <i class="uil-calender"></i>
                                    <span> Awaiting Loan Request </span>
                                </a>
                            </li>
                        @endif

                       
                    @if(Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('loan_officers') )
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> Loan Managers </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{route('create_new_customer')}}">Create New Customer</a>
                                    </li>
                                    <li>
                                        <a href="{{route('initiateLoan')}}">Initiate Loan</a>
                                    </li>
                                    <li>
                                        <a href="#">Customer Awaiting Approval/Result</a>
                                    </li>
                                    <li>
                                        <a href="#">Daily Order</a>
                                    </li>
                                    <li>
                                        <a href="#">Total Order</a>
                                    </li>
                                    <li>
                                        <a href="#">Customer Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">Daily Till</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>

                        @endif

                    @if(Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('teller') )
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                                <i class="uil-briefcase"></i>
                                <span> Teller </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarProjects">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="#">Post Transaction</a>
                                    </li>
                                    <li>
                                        <a href="#">Daily/Edit Transaction</a>
                                    </li>
                                    <li>
                                        <a href="#">Till Balance <span class="badge rounded-pill badge-dark-lighten text-dark font-10 float-end">New</span></a>
                                    </li>
                                    <li>
                                        <a href="apps-projects-add.html">Query Till <span class="badge rounded-pill badge-success-lighten font-10 float-end">New</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if(Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('manager'))
                        <li class="side-nav-item">
                            <a href="apps-social-feed.html" class="side-nav-link">
                                <i class="uil-rss"></i>
                                <span> Manager </span>
                            </a>
                        </li>
                    

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
                                <i class="uil-clipboard-alt"></i>
                                <span> Approve Customer </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTasks">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="#">All Customer</a>
                                    </li>
                                    <li>
                                        <a href="#">Customer Details</a>
                                    </li>
                                    <li>
                                        <a href="#">Daily WorkLoad for Loan Managers</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if(Auth::user()->hasRole('super-admin'))
                        <li class="side-nav-item">
                            <a href="apps-file-manager.html" class="side-nav-link">
                                <i class="uil-folder-plus"></i>
                                <span> Accounting </span>
                            </a>
                        </li>
                        <li class="side-nav-title side-nav-item">User Manager</li>

                        <li class="side-nav-title side-nav-item">Permission Management</li>

                        <li class="side-nav-title side-nav-item">Analysis</li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                                <i class="uil-copy-alt"></i>
                                <span> All Loans </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPages">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="pages-profile.html">Loan Management</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="landing.html" target="_blank" class="side-nav-link">
                                <i class="uil-globe"></i>
                                <span class="badge bg-light text-dark float-end">New</span>
                                <span> Loan Analysis </span>
                            </a>
                        </li>

                    @endif

                        
   
                      
                    </ul>

                    <!-- Help Box -->
                    <div class="help-box help-box-light text-center">
                        <a href="javascript: void(0);" class="float-end close-btn text-body">
                            <i class="mdi mdi-close"></i>
                        </a>
                        <img src="{{url('backend_asset/assets/images/help-icon.svg')}}" height="90" alt="Helper Icon Image" />
                        <h5 class="mt-3">Marley Loan Investment</h5>
                        <p class="mb-3">App developed by WebScript</p>
                        <a href="javascript: void(0);" class="btn btn-outline-primary btn-sm">Logout</a>
                    </div>
                    <!-- end Help Box -->
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                    <!-- Sidebar -left -->

                </div>