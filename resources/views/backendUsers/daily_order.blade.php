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
                                    <h4 class="page-title">Daily Order</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-5 col-lg-12">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-account-multiple widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Expected Till</h5>
                                                <h3 class="mt-3 mb-3">{{ceil($expected_till)}}</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 0.00%</span>
                                                     
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-lg-12">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Daily Till</h5>
                                                <h3 class="mt-3 mb-3">{{ceil($current_till)}}</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-danger me-2"><i class="mdi mdi-arrow-up-bold"></i> 0.08%</span>
                                                    
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                                <!-- end row -->

                            </div> <!-- end col -->

                            <div class="col-xl-7 col-lg-6">
                                <div class="card card-h-100">
                                    <div class="card-body">
                                    
                                         <h4 class="header-title mb-3">Daily Tracker</h4>

                                        <div dir="ltr">
                                        <div class="table-responsive" id="example">
                                            <table class="table table-centered table-nowrap table-hover mb-0">
                                                <tbody>
                                                @if(empty($workdone))

                                                    <div class="alert alert-info"><h2>No Loan Order</h2></div>

                                                @else
                                                    @foreach ($workdone as $customer )
                                                          <tr>
                                                        <td>
                                                        <input type="hidden" value="{{$customer->loanid}}" id="{{$customer->user->fname}} {{$customer->user->lname}}" title="{{ceil($customer->amount)}}"/>
                                                        <span id="{{$customer->due_date}}"></span>
                                                            <h5 class="font-14 my-1 fw-normal">#</h5>
                                                            <span class="text-muted font-13">{{$customer->id}}</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Fullname</h5>
                                                            <span class="text-muted font-13">{{$customer->user->fname}} {{$customer->user->lname}}</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Amount to Repay</h5>
                                                            <span class="text-muted font-13">{{ceil($customer->amount)}}</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Due Date</h5>
                                                            <span class="text-muted font-13">{{$customer->due_date}}</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Status</h5>
                                                            @if($customer->status == "unpaid")
                                                                <span class=" font-13 badge bg-danger">{{$customer->status}}</span>
                                                            @elseif($customer->status == "paid")
                                                                <span class=" font-13 badge bg-success">{{$customer->status}}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Update</h5>
                                                             @if($customer->status == "unpaid")
                                                                 <button class=" font-13 btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Clear Loan</button>
                                                            @elseif($customer->status == "paid")
                                                                 <button class=" font-13 btn btn-success disabled">Loan Cleared</button>
                                                            @endif
                                                           
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Details</h5>
                                                            <button class=" font-13 btn btn-info">more</button>
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
                    
                </div>

@endsection