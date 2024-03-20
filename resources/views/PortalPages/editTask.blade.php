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
        @include('layouts.sidebar')

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
             @include('layouts.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
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


                </div>
                <!-- /.container-fluid -->
                <div class="container-fluid">

                    @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                <h1 class="h3 mb-2 text-gray-800">Edit Task</h1>
                <form action="{{ route('tasks.update', $task->id) }}" method="post">
                    @csrf
                    @method('PUT')
        
                    <div class="row">
                        <div class="col-md-6">
                            <label for="task_name" class="col-form-label">Task Name:</label>
                            <input type="text" name="task_name" class="form-control" value="{{ $task->task_name }}">
                        </div>
                        <div class="col-md-6">
                            <label for="platform" class="col-form-label">Platform:</label>
                            <select name="platform" class="form-select form-control">
                                <option value="Asp.NET" {{ $task->platform == 'Asp.NET' ? 'selected' : '' }}>Asp.NET</option>
                                <option value="React" {{ $task->platform == 'React' ? 'selected' : '' }}>React</option>
                                <option value="WordPress" {{ $task->platform == 'WordPress' ? 'selected' : '' }}>WordPress</option>
                                <option value="PHP" {{ $task->platform == 'PHP' ? 'selected' : '' }}>PHP</option>
                                <option value="Laravel" {{ $task->platform == 'Laravel' ? 'selected' : '' }}>Laravel</option>
                                <option value="Flutter" {{ $task->platform == 'Flutter' ? 'selected' : '' }}>Flutter</option>
                                <option value="Java" {{ $task->platform == 'Java' ? 'selected' : '' }}>Java</option>
                                <option value="JavaScript {{ $task->platform == 'JavaScript' ? 'selected' : '' }}">JavaScript</option>
                                <option value="Other">Other</option>
                                <!-- Add options for other platforms -->
                            </select>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-6">
                            <label for="budget" class="col-form-label">Budget:</label>
                            <input type="text" name="budget" class="form-control" value="{{ $task->budget }}">
                        </div>
                        <div class="col-md-6">
                            <label for="advance_payment" class="col-form-label">Advance Payment:</label>
                            <input type="text" name="advance_payment" class="form-control" value="{{ $task->advance_payment }}">
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-6">
                            <label for="assign_to" class="col-form-label">Assign To:</label>
                            <input type="text" name="assign_to" class="form-control" value="{{ $task->assign_to }}">
                        </div>
                        <div class="col-md-6">
                            <label for="dev_amount" class="col-form-label">Developer Amount:</label>
                            <input type="text" name="dev_amount" class="form-control" value="{{ $task->dev_amount }}">
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-6">
                            <label for="advance_payment_to_dev" class="col-form-label">Advance Payment To Developer:</label>
                            <input type="text" name="advance_payment_to_dev" class="form-control" value="{{ $task->advance_payment_to_dev }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="status" class="col-form-label">Status:</label>
                            <select name="status" class="form-control">
                                <option value="In Progress" {{ $task->status === 'In Progress' ? 'selected' : '' }}>Pending</option>
                                <option value="Completed" {{ $task->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                                <option value="Late" {{ $task->status === 'Late' ? 'selected' : '' }}>Late</option>
                                <option value="Cencil" {{ $task->status === 'Cencil' ? 'selected' : '' }}>Cencil</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="start_date" class="col-form-label">Start Date:</label>
                            <input type="date" name="start_date" class="form-control" value="{{ $task->start_date }}">
                        </div>
                        <div class="col-md-4">
                            <label for="end_date" class="col-form-label">End Date:</label>
                            <input type="date" name="end_date" class="form-control" value="{{ $task->end_date }}">
                        </div>
                        <div class="col-md-4">
                            <label for="deadline" class="col-form-label">Deadline:</label>
                            <input type="date" name="deadline" class="form-control" value="{{ $task->deadline }}">
                        </div>
                    </div>
        
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="description" class="col-form-label">Description:</label>
                            <textarea name="description" rows="4" class="form-control">{{ $task->description }}</textarea>
                        </div>
                    </div>
                   
                    
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update Task</button>
                        </div>
                    </div>
                </form>
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