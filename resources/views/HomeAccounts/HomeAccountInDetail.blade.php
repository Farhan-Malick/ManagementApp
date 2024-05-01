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
            <div id="content ">
               <div class="container-fluid mt-5">
                   
                    <div class="row mt-5 ">
                        <div class="col-12">
                            <div class="row ">
                                <div class="col-12 ">
                                    <h1 class="">Home Accounts Managemnet Details <a href="{{URL('HomeAccountsInDetail')}}" class="btn btn-primary float-right">CHECK IN DEITAL</a></h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    @if(session('error'))
                                        <div class="alert alert-danger mt-3">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @if(session('success'))
                                    <div class="alert alert-danger mt-3">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Client Name</th>
                                                <th>Transaction Amount</th>
                                                <th></th>
                                                <th>Expense Amount</th>
                                                <th>Expense Description</th>
                                                <th>Expense Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $monthlyTotal = [];
                                                $totalPending = 0;
                                                $startDate = date('Y-m-01', strtotime('April 2024'));
                                                $endDate = date('Y-m-t', strtotime('April 2024'));
                                            @endphp
                                            @foreach($clients as $client)
                                                @foreach($client->transactions as $transaction)
                                                    @if($transaction->date >= $startDate && $transaction->date <= $endDate)
                                                        <tr>
                                                            <td>{{ $client->id }}</td>
                                                            <td><b style="color: black">{{ $client->name }}</b></td>
                                                            <td class="text-success"><b>{{ $transaction->amount }} RS</b></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        @foreach($transaction->expenses as $expense)
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="text-danger">{{ $expense->amount }} Rs</td>
                                                                <td>{{ $expense->description }}</td>
                                                                <td>{{ date('F - d - Y', strtotime($expense->date)) }}</td>
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="text-right"><b style="color:black">Expense Total  =</b></td>
                                                            <td>
                                                                @php
                                                                    $totalExpenseAmount = 0;
                                                                @endphp
                                                                @foreach($transaction->expenses as $expense)
                                                                    @php
                                                                        $totalExpenseAmount += $expense->amount;
                                                                    @endphp
                                                                @endforeach
                                                                <b class="text-primary"> {{ $totalExpenseAmount }} RS</b>
                                                            </td>
                                                            <td>
                                                                @php
                                                                    $pendingAmount = $transaction->amount - $totalExpenseAmount;
                                                                    $totalPending += $pendingAmount; // Accumulate total pending
                                                                @endphp
                                                                <b><span style="color:black">Pending</span> = <b style="color: green">{{ $pendingAmount }} RS</b> </b>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            // Calculate the total for April 2024
                                                            if (!isset($monthlyTotal['April 2024'])) {
                                                                $monthlyTotal['April 2024'] = 0;
                                                            }
                                                            $monthlyTotal['April 2024'] += $transaction->amount;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            @foreach($monthlyTotal as $month => $total)
                                                <tr>
                                                    <td colspan="6"><b class="text-danger "> <h2>Total Transactions for {{ $month }}:</b> <b class="text-dark">{{ $total }} RS</b></h2></td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="6"><b class="text-success  "><h2>Total Pending Amount for April 2024:</b> <b class="text-dark">{{ $totalPending }} RS</b></h2></td>
                                            </tr>
                                        </tbody>
                                    </table>
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
