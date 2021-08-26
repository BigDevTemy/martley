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
                                            <div class="col-lg-5">
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
                                            <div class="col-lg-7">
                                                @if(!empty($getUserDetails))
                                                <form class="ps-lg-4">
                                                    <!-- Product title -->
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

                                                    <!-- Product description -->
                                                    <div class="mt-4">
                                                        <h6 class="font-14">Loan Amount:</h6>
                                                        <h3> $139.58</h3>
                                                    </div>

                                                    <!-- Quantity -->
                                                    <div class="mt-4">
                                                        <h6 class="font-14">Interest Rate (%)</h6>
                                                        <div class="d-flex">
                                                            <input type="number" min="5" value="15" name="interest" class="form-control" placeholder="Qty" style="width: 90px;">
                                                            <button type="button" class="btn btn-danger ms-2"><i class="mdi mdi-cart me-1"></i> Approve Loan</button>
                                                        </div>
                                                    </div>
                                        
                                                    <!-- Product description -->
                                                    <div class="mt-4">
                                                        <h6 class="font-14">Additional Information by Loan Manager:</h6>
                                                        <p> {{$getUserDetails->additional_infor}}</p>
                                                    </div>

                                                    <!-- Product information -->
                                                    <div class="mt-4">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <h6 class="font-14">Available Stock:</h6>
                                                                <p class="text-sm lh-150">1784</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <h6 class="font-14">Number of Orders:</h6>
                                                                <p class="text-sm lh-150">5,458</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <h6 class="font-14">Revenue:</h6>
                                                                <p class="text-sm lh-150">$8,57,014</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            @endif
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->

                                      
                                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>


@endsection