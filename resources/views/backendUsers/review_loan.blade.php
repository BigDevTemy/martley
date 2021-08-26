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
                            <li class="breadcrumb-item active">Review Loan</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Review Loan</h4>
                </div>
            </div>
        </div>

        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <!-- Product image -->
                                                <a href="javascript: void(0);" class="text-center d-block mb-4">
                                                    <img src="{{url('backend_asset/assets/images/products/product-5.jpg')}}" class="img-fluid" style="max-width: 280px;" alt="Product-img" />
                                                </a>

                                                <div class="d-lg-flex d-none justify-content-center">
                                                    <a href="javascript: void(0);">
                                                        <img src="{{url('backend_asset/assets/images/products/product-1.jpg')}}" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img" />
                                                    </a>
                                                    <a href="javascript: void(0);" class="ms-2">
                                                        <img src="{{url('backend_asset/assets/images/products/product-6.jpg')}}" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img" />
                                                    </a>
                                                    <a href="javascript: void(0);" class="ms-2">
                                                        <img src="{{url('backend_asset/assets/images/products/product-3.jpg')}}" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img" />
                                                    </a>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-lg-9">
                                                
                                                @if(!empty($getUserDetails))
                                                
                                                    @if ($errors->any())
                                                        <div class="alert alert-info">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                <form class="ps-lg-4 ms-4" method="post" action="{{route('updatereview')}}" >
                                                    <!-- Product title -->
                                                    {{csrf_field()}}
                                                    <h3 class="mt-0">{{$getUserDetails->fname}} {{$getUserDetails->lname}}<a href="javascript: void(0);" class="text-muted"><i class="mdi mdi-square-edit-outline ms-2"></i></a> </h3>
                                                    <p class="mb-1">Date Created: {{$getUserDetails->created_at}}</p>
                                                    <p class="font-16">
                                                        <span class="text-success mdi mdi-star"></span>
                                                        <span class="text-success mdi mdi-star"></span>
                                                        <span class="text-success mdi mdi-star"></span>
                                                        <span class="text-success mdi mdi-star"></span>
                                                        <span class="text-success mdi mdi-star"></span>
                                                    </p>

                                                    <!-- Product stock -->
                                                    <div class="mt-3">
                                                        <h4><span class="badge badge-success-lighten">loanRequest</span></h4>
                                                    </div>
                                                    <input type="hidden" name="userid" value="{{$getUserDetails->userid}}"/>
                                                    <!-- Product description -->
                                                    <div class="mt-4">
                                                        <h6 class="font-14">Loan Amount:</h6>
                                                        
                                                        <h3> <input type="number" min="0" value="{{$getUserDetails->customer_details->loan_limit}}" name="loanlimit" class="form-control" placeholder="Limit" style="width: 200px;"></h3>
                                                    </div>
                                                    <div class="mt-4">
                                                        <h6 class="font-14">Loan Tenure:</h6>
                                                        
                                                        <h3> <input type="number" min="23" value="23" name="loantenure" class="form-control" placeholder="Tenure" style="width: 200px;"></h3>
                                                    </div>
                                                    <div class="mt-4">
                                                        <h6 class="font-14">Loan Manager Name:{{$getCustomerDetails->loan_manager->fname}}</h6>
                                                        
                                                        <h3> <input type="hidden"  name="loan_manager" value="{{$getCustomerDetails->loan_manager_userid}}" class="form-control" placeholder="Tenure" style="width: 200px;"></h3>
                                                    </div>
                                                    <!-- Quantity -->
                                                    <div class="mt-4">
                                                        <h6 class="font-14">Interest Rate (%)</h6>
                                                        <div class="d-flex">
                                                            <input type="number" min="5" value="15" name="interest" class="form-control" placeholder="Qty" style="width: 200px;">
                                                            <input type="submit" class="btn btn-success ms-2" value="Approve Loan" >
                                                            <input type="submit" class="btn btn-danger ms-2" value="Reject Loan" >
                                                        </div>
                                                    </div>
                                        
                                                    <!-- Product description -->
                                                    <div class="mt-4">
                                                        <h6 class="font-14">Additional Information by Loan Manager:</h6>
                                                        <p> {{$getUserDetails->additional_infor}}</p>
                                                    </div>
                                                    
                                                    <!-- Product information -->
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
                                                        
                                                </form>
                                                @endif
                                            
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->

                                      
                                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>


@endsection