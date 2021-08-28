@extends('backendUsers.layout.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">SuperAdmin</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">DashBoard</a></li>
                            <li class="breadcrumb-item active">Customer Loan details</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Customer Loan Details</h4>
                </div>
            </div>
        </div>

        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3 me-4">
                                                <!-- Product image -->
                                                <a href="javascript: void(0);" class="text-center d-block mb-4">
                                                    <img src="{{url('backend_asset/assets/images/products/profile.jpg')}}" class="img-fluid" style="max-width: 280px;" alt="Product-img" />
                                                </a>

                                                <div class="d-lg-flex d-none justify-content-center">
                                                    <a href="javascript: void(0);">
                                                        <img src="{{url('backend_asset/assets/images/products/profile.jpg')}}" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img" />
                                                    </a>
                                                    <a href="javascript: void(0);" class="ms-2">
                                                        <img src="{{url('backend_asset/assets/images/products/profile.jpg')}}" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img" />
                                                    </a>
                                                    <a href="javascript: void(0);" class="ms-2">
                                                        <img src="{{url('backend_asset/assets/images/products/profile.jpg')}}" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img" />
                                                    </a>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-lg-8 ms-4">
                                                
                        
                                                <h3 class="mt-0">{{$user->fname}} {{$user->lname}}<a href="javascript: void(0);" class="text-muted"><i class="mdi mdi-square-edit-outline ms-2"></i></a> </h3>
                                                <p class="mb-1">Date Created: {{$user->created_at}}</p>
                                                    
                                                    
                                                <p class="font-16">
                                                    <span class="text-success mdi mdi-star"></span>
                                                    <span class="text-success mdi mdi-star"></span>
                                                    <span class="text-success mdi mdi-star"></span>
                                                    <span class="text-success mdi mdi-star"></span>
                                                    <span class="text-success mdi mdi-star"></span>
                                                </p>

                                                    <!-- Product stock -->
                                                    <div class="mt-3">
                                                        <h4><span class="badge badge-success-lighten">Customer Details</span></h4>
                                                        <div class="d-flex">
                                                            
                                                            <input type="submit" class="btn btn-warning" value="Update Today's Loan" >
                                                            
                                                        </div>

                                                    </div>
                                                   
                                                 <div class="d-flex justify-content-between bg-light p-2 mt-2"> 
                                                    <div>
                                                        <span class="">Firstname</span><br/>
                                                        <span class="badge badge-primary-lighten">{{$user->fname}}</span>
                                                    </div>
                                                    <div>
                                                        <span class="">Lastname</span><br/>
                                                        <span class="badge badge-primary-lighten">{{$user->lname}}</span>
                                    
                                                    </div>
                                                    <div>
                                                        <span class="">Email</span><br/>
                                                        <span class="badge badge-primary-lighten">{{$user->email}}</span>
                                    
                                                    </div>
                                                    
                                                 </div>
                                                 <div class="d-flex justify-content-between bg-light p-2 mt-2"> 
                                                    <div>
                                                        <span class="">Address</span>
                                                        <span class="badge badge-primary-lighten">{{$user->address}}</span>
                                                    </div>
                                                    <div>
                                                        <span class="">PhoneNumber</span>
                                                        <span class="badge badge-primary-lighten">{{$user->phonenumber}}</span>
                                                    </div>
                                                    <div>
                                                        <span class="">Country</span>
                                                        <span class="badge badge-primary-lighten">{{$user->country}}</span>
                                    
                                                    </div>
                                                    
                                                 </div>
                                                 

                                                 <div class="d-flex justify-content-between bg-light p-2 mt-2"> 
                                                    <div>
                                                        <span style="color:#000">Employment Type</span>
                                                        <span class="badge badge-dark-lighten">{{$user->customer_details->employment_type}}</span>
                                                    </div>
                                                    <div>
                                                        <span style="color:#000">Company Address</span>
                                                        <span class="badge badge-dark-lighten">{{$user->customer_details->business_name}}</span>
                                                    </div>
                                                    <div>
                                                        <span style="color:#000">Phonenumber</span>
                                                        <span class="badge badge-dark-lighten">{{$user->customer_details->company_phonenumber}}</span>
                                                    </div>
                                                    
                                                 </div>
                                                 <div class="d-flex justify-content-between bg-light p-2"> 
                                                    <div>
                                                        <span style="color:#000">Risk Appetite</span><br/>
                                                        <span class="badge badge-dark-lighten">{{$user->customer_details->risk_appetite}}</span>
                                                    </div>
                                                    <div>
                                                        <span style="color:#000">Loan Limit</span><br/>
                                                        <span class="badge badge-dark-lighten">{{$user->customer_details->loan_limit}}</span>
                                                    </div>
                                                    <div>
                                                        <span style="color:#000">Country</span><br/>
                                                        <span class="badge badge-dark-lighten">{{$user->country}}</span>
                                    
                                                    </div>
                                                    
                                                 </div>

                                                 <div class="row">
                                                    <div class="col-md-12">
                                                    
                                                        @if(!empty($loanstructure))
                                    
                                                            <div class="mt-4">
                                                            <h5>Loan Structure</h5>
                                                                <div class="row">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-centered mb-0" id="example" style="font-size:14px">
                                                                            <thead class="table-light font-12" >
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>Userid</th>
                                                                                    <th>LoanId</th>
                                                                                    <th>Amount</th>
                                                                                    <th>status</th>
                                                                                    <th>Due Date</th>
                                                                                    <th>Action</th>
                                                                                    
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($loanstructure as $v )
                                                                                    <tr>
                                                                                        <td>{{$v->id}}</td>
                                                                                        <td>{{$v->userid}}</td>
                                                                                        <td>{{$v->loanid}}</td>
                                                                                        <td>{{$v->amount}}</td>
                                                                                        <td>@if($v->status == "unpaid")
                                                                                                <span class="badge bg-danger">{{$v->status}}</span>
                                                                                            @else
                                                                                                <span class="badge bg-success">{{$v->status}}</span>
                                                                                            @endif
                                                                                        </td>
                                                                                        <td>{{$v->due_date}}</td>
                                                                                        <td>
                                                                                        @if($v->status == "unpaid")
                                                                                            <button class="btn btn-danger">update</button>
                                                                                        @elseif($v->status =="paid")
                                                                                             <button class="btn btn-success disabled">update</button>
                                                                                        @endif
                                                                                        
                                                                                        </td>
                                                                                    
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endif  
                                                    
                                                    </div>
                                                 </div>
                                            
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->

                                      
                                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <div class="row p-4" >
                            <div class="col-md-12">
                                 @if(!empty($loanHistory))
                                    
                                    <div class="mt-4">
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-centered mb-0" id="example" style="font-size:14px">
                                                    <thead class="table-light font-12" >
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Fullname</th>
                                                            
                                                            <th>Amount</th>
                                                            <th>Interest</th>
                                                            <th>Total</th>
                                                            <th>Review Status</th>
                                                            <th>Initiated By</th>
                                                            <th>Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($loanHistory as $history )
                                                            <tr>
                                                                <td>{{$history->id}}</td>
                                                                <td>{{$history->user->fname}} {{$history->user->lname}}</td>
                                                                <td>{{$history->loan_amount}}</td>
                                                                <td>{{$history->loan_interest}}</td>
                                                                <td>{{$history->loan_total}}</td>
                                                                <td>{{$history->review_status}}</td>
                                                                <td>{{$history->initiator_userid}}</td>
                                                                <td>{{$history->updated_at}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif   
                        </div>
                    </div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#example tbody").on('click','tr',function(e){
            
        })
    })
</script>
@endsection