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

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <div class="container-fluid mt-5 ">
                        @if(session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card shadow mb-4">
                            <span style="float: right"><a class="btn btn-outline-secondary mt-5 ml-3" href="{{URL('HomeAccounts')}}">Manage Home Accounts</a></span>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="row mt-5 ">
                                        <div class="col-12">
                                            <div class="row ">
                                                <div class="col-12 ">
                                                    <h1 class="mb-5">Home Accounts Managemnet Details</h1>
                                                </div>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Client Name</th>
                                                        <th>Transaction Amount</th>
                                                        <th>Expense Amount</th>
                                                        <th>Expense Description</th>
                                                        <th>Expense Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($clients as $client)
                                                        @foreach($client->transactions as $transaction)
                                                            <tr>
                                                                <td>{{ $client->name }}</td>
                                                                <td>{{ $transaction->amount }} RS</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            @foreach($transaction->expenses as $expense)
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>{{ $expense->amount }} Rs</td>
                                                                    <td>{{ $expense->description }}</td>
                                                                    <td>{{ date('F - d - Y', strtotime($expense->date)) }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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