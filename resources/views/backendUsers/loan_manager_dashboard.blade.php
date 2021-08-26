@extends('backendUsers.layout.app')
@section('content')
    <div class="content">
                        <!-- start page title -->
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
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class=" col-lg-12">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-account-multiple widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Customer Base</h5>
                                                <h3 class="mt-3 mb-3">{{$customer_base}}</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                                                    <span class="text-nowrap">Current</span>  
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
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Loan Count</h5>
                                                <h3 class="mt-3 mb-3">{{$loan_count}}</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-danger me-2"><i class="mdi mdi-arrow-up-bold"></i> 1.08%</span>
                                                    <span class="text-nowrap">Current</span>
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-currency-usd widget-icon bg-success-lighten text-success"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Expected Till Balance</h5>
                                                <h3 class="mt-3 mb-3">&#x20A6; {{$loan_sum}}</h3>
                                                <p class="mb-0 text-muted">
                                                    
                                                    <span class="text-nowrap">Current</span>
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-pulse widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Growth">Current Till</h5>
                                                <h3 class="mt-3 mb-3">&#x20A6; {{$repayment_sum}}</h3>
                                                <p class="mb-0 text-muted">
                                                    
                                                    <span class="text-nowrap">Current</span>
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                            </div> <!-- end col -->

                             <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 order-lg-2 order-xl-1">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="#" class="btn btn-sm btn-link float-end">Export
                                            <i class="mdi mdi-download ms-1"></i>
                                        </a>
                                        <h4 class="header-title mt-2 mb-3">Workdone</h4>

                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap table-hover mb-0">
                                                <tbody>
                                                @if(!empty($workdone))

                                                    <div class="alert alert-info"><h2>No Loan Repayment</h2></div>

                                                @else
                                                    @foreach ($workdone as $customer )
                                                          <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">#</h5>
                                                            <span class="text-muted font-13">{{$customer->id}}</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Fullname</h5>
                                                            <span class="text-muted font-13">{{$customer->user->fname}} {{$customer->user->lname}}</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Amount to Repay</h5>
                                                            <span class="text-muted font-13">{{$customer->amount}}</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Due Date</h5>
                                                            <span class="text-muted font-13">{{$customer->due_date}}</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Status</h5>
                                                            <span class=" font-13 badge bg-danger">unpaid</span>
                                                        </td>
                                                        
                                                    </tr>
                                                 
                                                    @endforeach

                                                @endif
                                                    
                                                  
         
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                        </div>
                        <!-- end row -->    
                    </div> 
    
@endsection