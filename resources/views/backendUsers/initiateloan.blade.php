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
                            <li class="breadcrumb-item active">Initiate Loan</li>
                        </ol>
                    </div>
                    
                </div>
            </div>
        </div>

        <h4>Loan Request</h4>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Loan Initiate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <p class="p-1"> You are about to Book a Loan of <input type="text" value="" id="loan_limit" style="width:60px"/> for <span id="fullname"></span>.Kindly Click on the Agree Button, if this information is Correct</p>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Agreed</button>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
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
                                                                <th>Risk Appetite</th>
                                                                <th>Initiate Button</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if(!empty($customers))
                                                            @foreach($customers as $v)
                                                                <tr>
                                                                    <input type="hidden" value="{{$v->fname}} {{$v->lname}}" id="{{$v->userid}}" title="{{$v->customer_details->loan_limit}}"/>
                                                                    <td>{{$v->id}}</td>
                                                                    <td>{{$v->fname}} {{$v->lname}}</td>
                                                                    <td>{{$v->userid}}</td>
                                                                    <td>{{$v->phonenumber}}</td>
                                                                    <td>{{$v->address}}</td>
                                                                    <td>{{$v->customer_details->loan_limit}}</td>
                                                                    <td>
                                                                        @if($v->customer_details->risk_appetite == "LR")

                                                                            <span class="badge bg-success">Low Risk</span>
                                                                        @else
                                                                            <span class="badge bg-danger">High Risk</span>
                                                                        @endif
                                                                    
                                                                    </td>
                                                                    <td>@if(Auth::user()->hasRole('super-admin')) <button class="btn btn-success" >Initiate</button>   @else <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Initiate</button>@endif</td>
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
        var x = $(this).find('input').attr('value').valueOf();
        var id = $(this).find('input').attr('id').valueOf();
        var limit = $(this).find('input').attr('title').valueOf();
       
        document.getElementById('fullname').innerHTML=x;
        
        document.getElementById('loan_limit').value=limit;
        if(e.target.classList.contains('btn-success')){
            location = "/SuperAdmin/approve/customer/loan/"+id;
        }
    })
    
   
  })
</script>
@endsection