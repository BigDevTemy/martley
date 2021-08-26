@extends('backendUsers.layout.app')

@section('content')

    <div class="content">
                        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Loan Manager</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">DashBoard</a></li>
                            <li class="breadcrumb-item active">Add New Customer</li>
                        </ol>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Checkout Steps -->
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <a href="#billing-information" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link rounded-0 active">
                                    <i class="mdi mdi-account-circle font-18"></i>
                                    <span class="d-none d-lg-block">Personal Information</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#shipping-information" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                    <i class="mdi mdi-truck-fast font-18"></i>
                                    <span class="d-none d-lg-block">Business Information</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#payment-information" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                    <i class="mdi mdi-cash-multiple font-18"></i>
                                    <span class="d-none d-lg-block">Loan Information</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Steps Information -->
                        <div class="tab-content">
                                @if ($errors->any())
                                    <div class="alert alert-info">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <!-- Billing Content-->
                            <div class="tab-pane show active" id="billing-information">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h4 class="mt-2">Personal information</h4>

                                        <p class="text-muted mb-4">Fill the form below deligently for a proper KYC.</p>

                                        <form action="{{route('addCustomer')}}" method="post">
                                            {{csrf_field()}}
                                                            <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="billing-first-name" class="form-label">First Name <span class="text-danger">*</span></label>
                                                                            <input class="form-control" type="text" placeholder="Enter your first name" name="cus_fname" id="billing-first-name" value="{{ old('cus_fname') }}" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="billing-last-name" class="form-label">Last Name <span class="text-danger">*</span></label>
                                                                            <input class="form-control" type="text" placeholder="Enter your last name" name="cus_lname" id="billing-last-name" value="{{old('cus_lname')}}"  />
                                                                        </div>
                                                                    </div>
                                                            </div> <!-- end row -->
                                                            <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Sex </label>
                                                                            <select data-toggle="select2" title="Country" name="cus_sex" class="form-control">
                                                                                <option value="">Select Sex</option>
                                                                                <option value="male">Male</option>
                                                                                <option value="female">Female</option>
                                                                                                            
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="billing-email-address" class="form-label">Email Address <span class="text-secondary">(optional)</span></label>
                                                                            <input class="form-control" type="email" placeholder="Enter your email" name="cus_email" id="billing-email-address" value="{{ old('cus_email') }}"  />
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="billing-phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                                                            <input class="form-control" type="text" placeholder="(xx) xxx xxxx xxx" id="billing-phone" name="cus_phonenumber" value="{{ old('cus_phonenumber') }}"  />
                                                                        </div>
                                                                </div>
                                                            </div> <!-- end row -->
                                                            <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label for="billing-address" class="form-label">Address</label>
                                                                            <input class="form-control" type="text" placeholder="Enter full address" id="billing-address" name="cus_address" value="{{ old('cus_address') }}" >
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="mb-3">
                                                                            <label for="billing-town-city" class="form-label">Town / City</label>
                                                                            <input class="form-control" name="town" type="text" placeholder="Enter your city name" id="billing-town-city" value="{{old('town')}}" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="mb-3">
                                                                            <label for="billing-state" class="form-label">State</label>
                                                                            <input class="form-control" name="state" type="text" placeholder="Enter your state" id="billing-state" value="{{old('state')}}" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="mb-3">
                                                                            <label for="billing-zip-postal" class="form-label">Zip / Postal Code</label>
                                                                            <input class="form-control" type="text" name="zip" placeholder="Enter your zip code" id="billing-zip-postal" value="{{old('zip')}}"/>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Country </label>
                                                                            <select data-toggle="select2" title="Country" name="country" class="form-control">
                                                                                <option value="">Select Country</option>
                                                                                <option value="NG">Nigeria</option>
                                                                                                            
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        

                                                                        <div class="mb-3 mt-3">
                                                                            <label for="example-textarea" class="form-label">Additional Information:</label>
                                                                            <textarea class="form-control" id="example-textarea" name="additional_info" rows="3" placeholder="Write some note.." value="{{old('additional_info')}}"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->

                                                                <!-- end row -->
                                                            
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class=" rounded d-flex align-items-center justify-content-center mt-4">
                                                                
                                                                    
                                                                    <img src="{{url('backend_asset/assets/images/users/logo.jpg')}}" style="width:70%;margin-top:50%"/>
                                                                <!-- end table-responsive -->
                                                            </div> <!-- end .border-->

                                                        </div> <!-- end col -->            
                                                    </div> <!-- end row-->
                                                </div>
                                                <!-- End Billing Information Content-->

                                                <!-- Shipping Content-->
                                                <div class="tab-pane" id="shipping-information">
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <h4 class="mt-2">Business Information</h4>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="border p-3 rounded mb-3 mb-md-0">
                                                                        <address class="mb-0 address-lg">
                                                                            <div class="form-check">
                                                                                <input type="radio" id="customRadio1" name="employment_typeI" class="form-check-input" value="employed" >
                                                                                <label class="form-check-label font-16 fw-bold" for="customRadio1">Employed </label>
                                                                            </div>
                                                                        
                                                                            
                                                                        </address>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="border p-3 rounded">
                                                                        <address class="mb-0 address-lg">
                                                                            <div class="form-check">
                                                                                <input type="radio" id="customRadio2" name="employment_type" class="form-check-input" value="self_employed" checked>
                                                                                <label class="form-check-label font-16 fw-bold" for="customRadio2">Self Employed</label>
                                                                            </div>
                                                                            
                                                                        </address>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end row-->

                                                            <h4 class="mt-4">Add Business Information</h4>

                                                            

                                                            
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="mb-3">
                                                                            <label for="new-adr-first-name" class="form-label">Business name/Company name</label>
                                                                            <input class="form-control" type="text" placeholder="Business name/Company name" id="new-adr-first-name" name="cust_bus_name" value="{{old('cust_bus_name')}}" />
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                                <div class="row">
                                                                    <div class="col-12">
                    
                                                                        <div class="mb-3 mt-3">
                                                                            <label for="example-textarea" class="form-label">Shop/Company Address:</label>
                                                                            <textarea class="form-control" id="example-textarea" rows="3" placeholder="Write some note.." name="cust_bus_addr" value="{{old('cust_bus_addr')}}" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="mb-3">
                                                                            <label for="new-adr-phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                                                            <input class="form-control" type="text" placeholder="(xx) xxx xxxx xxx" id="new-adr-phone" name="cust_bus_phonenumber" value="{{old('cust_bus_phonenumber')}}" />
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            
                                                                
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Risk Appetite</label>
                                                                            <select data-toggle="select2" title="Country" class="form-control" name="risk_appetite" value="{{old('risk_appetite')}}">
                                                                                <option value="0">Select Risk Type</option>
                                                                                <option value="LR">Low Risk</option>
                                                                                <option value="HR">High Risk</option>
                                                                                
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->

                                                                



                                                                <!-- end row-->

                                                            
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="border p-3 mt-4 rounded justify-content-center">
                                                                <h4 class="header-title mb-3">Customer Image</h4>
                                                                <img src="{{url('backend_asset/assets/images/users/avatar-8.jpg')}}" style="border-radius:50%"/>
                                                                
                                                                <!--<input type="file" name="cus_image" class="mt-2"/> -->
                                                            </div> <!-- end .border-->

                                                        </div> <!-- end col -->            
                                                    </div> <!-- end row-->
                                                </div>
                                                
                                                <div class="tab-pane" id="payment-information">
                                                    <div class="row">

                                                        <div class="col-lg-12">
                                                            <h4 class="mt-2">Loan Information</h4>

                                                            <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label for="new-adr-address" class="form-label">Monthly Turn Over</label>
                                                                            <input class="form-control" type="text" placeholder="Enter Monthly Turn Over " id="new-adr-address" name="monthly_turn_over" value="{{old('monthly_turn_over')}}">
                                                                        </div>
                                                                    </div>
                                                            </div> 

                                                            <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label for="new-adr-address" class="form-label">Loan Limit</label>
                                                                            <input class="form-control" type="text" placeholder="Loan Limit " id="new-adr-address" name="loan_limit" value="{{old('loan_limit')}}">
                                                                        </div>
                                                                    </div>
                                                            </div> 

                                                            <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                        
                                                                        <input type="submit"  value="Add New Customer" class="form-control bg-dark" style="color:#fff" />

                                                                        
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        

                                                        </div> <!-- end col -->

                                                            
                                                    </div> <!-- end row-->
                                                </div>
                                            </form>
                           

                        </div> <!-- end tab content-->

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row-->
        
    </div>
@endsection
