<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Project Portal - Dashboard</title>
    @include('layouts.headLinks')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        {{-- @include('layouts.sidebar') --}}

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
             {{-- @include('layouts.navbar') --}}
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                {{-- <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div> --}}
                <!-- /.container-fluid -->
                <div class="container-fluid mt-5 ">

                <!-- Page Heading -->
                {{-- <h1 class="h3 mb-2 text-gray-800">Task Detail</h1> --}}
                @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary">All Tasks
                            <span style="float: right"><a class="btn btn-outline-primary" href="{{URL('taskUpload')}}">Add New Task</a></span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 12px;">
                                <thead style="color: black">
                                    <tr>
                                        <th>id</th>
                                        <th>STUDENT_TASK_NAME</th>
                                        <th>Platform</th>
                                        <th>Budget</th>
                                        <th>Advance_Payment</th>
                                        <th>Pending</th>
                                        <th>Assign_To</th>
                                        <th>DevAmount</th>
                                        <th>DevAdvance</th>
                                        <th>DevPending</th>
                                        <th>Employer_Profit</th>
                                        <th>StartDate</th>
                                        <th>End_Date</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot  style="color: black">
                                    <tr>
                                        <th></th>    
                                        <th></th>
                                        <th></th>
                                        <th style="color: red">{{ $totalBudget }} Rs</th>
                                        <th style="color: red">{{ $totalAdvancePayment }} Rs</th>
                                        <th style="color: green">{{$employerPending}} Rs</th>
                                        <th></th>
                                        <th style="color: red">{{ $totalDevAmount }} Rs</th>
                                        <th style="color: red">{{ $totalAdvancePaymentToDev }} Rs</th>
                                        <th style="color: green">{{ $totalDevPending }} Rs</th>
                                        <th style="color: green">{{$employerProfit}} Rs</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td>{{$task->id}}</td>
                                            <td>{{ $task->task_name }}</td>
                                            <td>{{ $task->platform }}</td>
                                            <td>{{ $task->budget }}</td>
                                            <td>{{ $task->advance_payment }}</td>
                                            <td>
                                                @if( $task->budget ==  $task->advance_payment)
                                                   <b> Payment Completed</b>
                                                   @else
                                                    <b style="color: red">{{ $task->budget -  $task->advance_payment }}</b>
                                                @endif
                                            </td>
                                            <td>{{ $task->assign_to }}</td>
                                            <td>{{ $task->dev_amount }}</td>
                                            <td>{{ $task->advance_payment_to_dev }}</td>
                                            <td>
                                                @if($task->advance_payment_to_dev == 0.00)
                                                    <span style="color: red">{{ $task->dev_amount }}</span>
                                                @elseif($task->advance_payment_to_dev == $task->dev_amount)
                                                <b>Payment Completed</b>
                                                
                                                @else
                                                    <b style="color: red">{{ $task->dev_amount - $task->advance_payment_to_dev }}</b>
                                                @endif
                                            </td>
                                            <td>//</td>
                                            <td>{{ $task->start_date }}</td>
                                            <td>{{ $task->end_date }}</td>
                                            <td>{{ $task->deadline }}</td>
                                            @if($task->status == "In Progress")
                                                <td>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm">Pending</a>
                                                </td>
                                            @elseif($task->status == "Completed")
                                                <td>
                                                    <a href="#" class="btn btn-outline-success btn-sm">Completed</a>
                                                </td>
                                                @elseif($task->status == "Late")
                                                <td>
                                                    <a href="#" class="btn btn-outline-warning btn-sm">Late</a>
                                                </td>
                                            @else
                                            <td>
                                                <a href="#" class="btn btn-outline-danger btn-sm">Cencil</a>
                                            </td>
                                            @endif
                                        
                                            <td>
                                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footerLinks')


</body>

</html>