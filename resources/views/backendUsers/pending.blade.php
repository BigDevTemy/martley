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
                            <li class="breadcrumb-item active">Pending </li>
                        </ol>
                    </div>
                    
                </div>
            </div>
        </div>

        <h4></h4>
        
        <div class="row">
            <div>Pending Customer Approval</div>
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
                                                <th>Loan Officer</th>      
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($get_pending_customer_approval))
                                                @foreach($get_pending_customer_approval as $v)
                                                    <tr>
                                                       
                                                        <td>{{$v->id}}</td>
                                                        <td>{{$v->user->fname}} {{$v->user->lname}}</td>
                                                        <td>{{$v->userid}}</td>
                                                        <td>{{$v->loan_manager_userid}}</td>
                                                        <td><span class="badge bg-danger">{{$v->approved_status}}</span></td>
                                                        
                                                        </tbody>
                                                @endforeach
                                            @endif
                                    </table>
                                </div> <!-- end table-responsive-->

                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>

        <div class="row mt-4">
            <div>Pending Loan Request</div>
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
                                                <th>Fullname</th>
                                                <th>Userid</th>
                                                <th>Loan Officer</th>      
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($get_pending_customer_loan_request))
                                                @foreach($get_pending_customer_loan_request as $v)
                                                    <tr>
                                                       
                                                        <td>{{$v->id}}</td>
                                                        <td>{{$v->user->fname}} {{$v->user->lname}}</td>
                                                        <td>{{$v->userid}}</td>
                                                        <td>{{$v->initiator_userid}}</td>
                                                        <td><span class="badge bg-danger">{{$v->review_status}}</span></td>             
                                        </tbody>
                                                @endforeach
                                            @endif
                                    </table>
                                </div> <!-- end table-responsive-->

                            </div>
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
   $('#example1').DataTable();
  })
</script>
@endsection