@extends('backendUsers.layout.app')
@section('content')
    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <form class="d-flex">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                                <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                                            </div>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </a>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                                <i class="mdi mdi-filter-variant"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class="page-title">Welcome <span class="badge bg-success">{{$user->fname}}!</span></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-5 col-lg-12">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-account-multiple widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Loan Count</h5>
                                                <h3 class="mt-3 mb-3">{{$loan_count}}</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 0.00%</span>
                                                     
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Repayment Count</h5>
                                                <h3 class="mt-3 mb-3">{{$repayment_count}}</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-danger me-2"><i class="mdi mdi-arrow-up-bold"></i> 0.08%</span>
                                                    
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Total Loan</h5>
                                                <h3 class="mt-3 mb-3">{{$loan_sum}}</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-danger me-2"><i class="mdi mdi-arrow-up-bold"></i> 0.08%</span>
                                                    
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Total Repayment</h5>
                                                <h3 class="mt-3 mb-3">{{$repayment_sum}}</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-danger me-2"><i class="mdi mdi-arrow-up-bold"></i> 0.08%</span>
                                                    
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> 
                                </div> <!-- end row -->

                                <!-- end row -->

                            </div> <!-- end col -->

                            <div class="col-xl-7 col-lg-6">
                                <div class="card card-h-100">
                                    <div class="card-body">
                                    
                                         <h4 class="header-title mb-3">Loan History</h4>

                                        <div dir="ltr">
                                        <div class="table-responsive" >
                                            <table class="table table-centered table-nowrap table-hover mb-0" id="example">
                                                <tbody>
                                                
                                                @if(empty($loanHistory))

                                                    <div class="alert alert-info"><h2>No Loan History</h2></div>

                                                @else
                                                    @foreach ($loanHistory as $customer )
                                                          <tr>
                                                        <td>
                                                        
                                                             <input type="hidden" value="{{$customer->loanid}}" id="{{$customer->user->fname}} {{$customer->user->lname}}" title="{{ceil($customer->amount)}}"/>
                                                            <h5 class="font-14 my-1 fw-normal">#</h5>
                                                            <span class="text-muted font-13">{{$customer->id}}</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Fullname</h5>
                                                            <span class="text-muted font-13">{{$customer->user->fname}} {{$customer->user->lname}}</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Amount to Repay</h5>
                                                            <span class="text-muted font-13">{{ceil($customer->loan_amount)}}</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Due Date</h5>
                                                            <span class="text-muted font-13">{{$customer->updated_at}}</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Status</h5>
                                                            @if($customer->loan_status == "unpaid")
                                                                <span class=" font-13 badge bg-danger">{{$customer->loan_status}}</span>
                                                            @elseif($customer->loan_status == "paid")
                                                                <span class=" font-13 badge bg-success">{{$customer->loan_status}}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Update</h5>
                                                             @if($customer->loan_status == "unpaid")
                                                                 <button class=" font-13 btn btn-danger" >Check Loan Structure</button>
                                                            @elseif($customer->loan_status == "paid")
                                                                 <button class=" font-13 btn btn-success">Check Loan Structure</button>
                                                            @endif
                                                           
                                                        </td>
                                                       
                                                    </tr>
                                                 
                                                    @endforeach

                                                @endif
                                                    
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                                            
                            </div>

                            
                        </div> 
                        
                        
                    </div> 
                    <!-- body   -->
                    <div class="row mt-2">
                    
                        <div class="col-lg-5 me-1">
                            <div class="card widget-flat">
                                <div class="card-body">
                                    <div class="float-end">
                                        <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                                    </div>
                                    <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Personal Details</h5>
                                    <div class="d-flex justify-content-between p-1"> 
                                        <div>
                                            <span style="color:#000">Firstname</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->fname}}</span>
                                        </div>
                                        <div>
                                            <span style="color:#000">Lastname</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->lname}}</span>
                                        </div>
                                        <div>
                                            <span style="color:#000">Email</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->email}}</span>
                                        </div>
                                                    
                                    </div>

                                    <div class="d-flex justify-content-between p-1"> 
                                        <div>
                                            <span style="color:#000">Address</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->address}}</span>
                                        </div>
                                          
                                    </div>
                                    <div class="d-flex justify-content-between p-1">
                                        <div>
                                            <span style="color:#000">PhoneNumber</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->phonenumber}}</span>
                                        </div>
                                         <div>
                                            <span style="color:#000">Country</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->country}}</span>
                                        </div>
                                        <div>
                                            <span style="color:#000">State</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->state}}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between p-1">
                                        <div>
                                            <span style="color:#000">State</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->state}}</span>
                                        </div>
                                         <div>
                                            <span style="color:#000">Zip</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->zip}}</span>
                                        </div>
                                        <div>
                                            <span style="color:#000">Sex</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->sex}}</span>
                                        </div>
                                    </div>
                                       
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> 

                         <div class="col-lg-6">
                            <div class="card widget-flat">
                                <div class="card-body">
                                    <div class="float-end">
                                        <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                                    </div>
                                    <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Other Details</h5>
                                    <div class="d-flex justify-content-between p-1"> 
                                        <div>
                                            <span style="color:#000">Employment Type</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->employment_type}}</span>
                                        </div>
                                        <div>
                                            <span style="color:#000">Company Name</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->business_name}}</span>
                                        </div>
                                        <div>
                                            <span style="color:#000">Phonenumber</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->company_phonenumber}}</span>
                                        </div>
                                                    
                                    </div>

                                    <div class="d-flex justify-content-between p-1"> 
                                        <div>
                                            <span style="color:#000">Company Address</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->company_address}}</span>
                                        </div>
                                          
                                    </div>
                                    <div class="d-flex justify-content-between p-1">
                                        <div>
                                            <span style="color:#000">TurnOver</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->turn_over}}</span>
                                        </div>
                                         <div>
                                            <span style="color:#000">Limit</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->loan_limit}}</span>
                                        </div>
                                        <div>
                                            <span style="color:#000">Risk Appetite</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->risk_appetite}}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between p-1">
                                        <div>
                                            <span style="color:#000">Loan Manager</span><br/>
                                            <span class="badge badge-dark-lighten">{{$user->loan_manager_userid}}</span>
                                        </div>
                                         <div>
                                            <span style="color:#000">Status</span><br/>
                                            @if($user->approved_status == "Approved")
                                           
                                                <span class="badge badge-success-lighten">{{$user->approved_status}}</span>
                                            @else
                                                 <span class="badge badge-danger-lighten">{{$user->approved_status}}</span>
                                            
                                            @endif
                                            
                                        </div>
                                        <div>
                                            <span style="color:#000">inLoan</span><br/>
                                            @if($user->inloan ==1)
                                                <span class="badge badge-danger-lighten">inloan</span>
                                            @else
                                                <span class="badge badge-danger-lighten">inloan</span>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> 
                    </div>
                    
                </div>
       <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
   
    $("#example tbody").on('click','tr',function(e){
        console.log(e.target.textContent)
        if(e.target.textContent == "Check Loan Structure"){
            var id = $(this).find('input').attr('value').valueOf();
            location = "/LoanManager/customer/loan_detail/"+id;
        }
            
    })
  })
  </script>
@endsection