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
                                    <h4 class="page-title">Loan Manager <span class="badge bg-success">Daily Order</span></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Expected Recovery Order</h5>
                                                <h3 class="mt-3 mb-3">0</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-danger me-2"><i class="mdi mdi-arrow-up-bold"></i> 0.00%</span>
                                                    
                                                </p>
                                            </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-lg-6">
                                <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Current Till</h5>
                                                <h3 class="mt-3 mb-3">0</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-danger me-2"><i class="mdi mdi-arrow-up-bold"></i> 0.00%</span>
                                                    
                                                </p>
                                            </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div>
                        </div>
                    <!-- body   -->
                    <div class="row mt-2">
                    
                       <div class="row mt-4">
            <div>Loan Manager Daily Revenue</div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-centered mb-0" id="example1" style="font-size:14px">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Loan Manager</th>
                                                <th>Userid</th>
                                                <th>Today's Order</th>      
                                                <th>Recovered Order</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @if(!empty($loan_managers))
                                            @foreach ($loan_managers as $manager )
                                                <tr>
                                                    <input type="hidden" value="{{$manager->userid}}"/>
                                                    <td>#</td>
                                                    <td>{{$manager->fname}}</td>
                                                    <td>{{$manager->userid}}</td>
                                                    <td>
                                                        <div style="display: none">
                                                            {{ $sum = 0 }}
                                                        </div>
                                                       @foreach ($manager->loan_manager_order as $v )
                                                           @if(\Carbon\Carbon::now()->toDateString() == $v->due_date and $v->status == "unpaid" )
                                                                <div style="display: none">{{$sum += $v->amount}}</div>
                                                           @endif
                                                           
                                                       @endforeach
                                                       
                                                        {{ceil($sum)}}
                                                    </td>
                                                    <td>
                                                    <div style="display: none">
                                                            {{ $sum1 = 0 }}
                                                        </div>
                                                       @foreach ($manager->loan_manager_order as $v )
                                                           @if(\Carbon\Carbon::now()->toDateString() == $v->due_date and $v->status == "paid" )
                                                                <div style="display: none">{{$sum1 += $v->amount}}</div>
                                                           @endif
                                                           
                                                       @endforeach
                                                       
                                                        {{ceil($sum1)}}
                                                    </td>
                                                    <td><button class="btn btn-success">View Details</button></td>
                                                </tr>   
                                            @endforeach

                                           @endif
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->

                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
 
                    </div>
                    
                </div>
       <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $.noConflict();
  	$('#example1').DataTable();
    $("#example1 tbody").on('click','tr',function(e){
        if(e.target.textContent == "View Details"){
            var userid = $(this).find('input').attr('value').valueOf();
            location = "/SuperAdmin/LoanManager/order/dashboard/"+userid;
        }
            
    })
  })
  </script>
@endsection