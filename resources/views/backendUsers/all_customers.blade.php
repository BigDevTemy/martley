@extends('backendUsers.layout.app')

@section('content')
   
    
    
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Loan Manager</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">DashBoard</a></li>
                            <li class="breadcrumb-item active">All Customers</li>
                        </ol>
                    </div>
                    
                </div>
            </div>
        </div>

        <h4>All Customers</h4>
        
        <div class="row">
             @if ($errors->any())
                <div class="alert alert-info">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                         <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-centered mb-0" id="example" style="font-size:14px">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Fullname</th>
                                                    <th>Userid</th>
                                                    <th>PhoneNumber</th>
                                                    <th>Home Address</th>
                                                    <th>LoanLimit</th>
                                                    <th>Loan Offficer</th>
                                                    <th>Risk Appetite</th> 
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($get_customers))
                                                    @foreach($get_customers as $v)
                                                        <tr>
                                                            <input type="hidden" value="{{$v->fname}} {{$v->lname}}" id="{{$v->userid}}" title="{{$v->loan_limit}}"/>
                                                            <td>{{$v->id}}</td>
                                                            <td>{{$v->fname}} {{$v->lname}}</td>
                                                            <td>{{$v->userid}}</td>
                                                            <td>{{$v->phonenumber}}</td>
                                                            <td>{{$v->address}}</td>
                                                            <td>{{$v->loan_amount}}</td>
                                                            <td>{{$v->loan_manager_userid}}</td>
                                                            <td>
                                                                @if($v->risk_appetite == "LR")

                                                                    <span class="badge bg-success">Low Risk</span>
                                                                @else
                                                                    <span class="badge bg-danger">High Risk</span>
                                                                @endif
                                                                    
                                                            </td>
                                                            <td><button class="btn btn-success" >Check Details</button> </td>
                                                        </tr>
                                                    @endforeach

                                                @endif

                                                    
                                                          
                                                        </tbody>
                                                    </table>
                                                </div> <!-- end table-responsive-->

                                                <!-- Add note input-->
                                                

                                                <!-- action buttons-->
                                                 <!-- end row-->
                                            </div>
                                            <!-- end col -->
<!-- end col -->

                                        </div> <!-- end row -->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
    </div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  	
      $.noConflict();
  	$('#example').DataTable();
    $("#example tbody").on('click','tr',function(e){
        //var x = $(this).find('input').attr('value').valueOf();
        var id = $(this).find('input').attr('id').valueOf();
        if(e.target.textContent == "Check Details"){
             location = "/LoanManager/get/customer/profile/"+id;
        }
        

      
    })
    
   
  })
</script>
@endsection