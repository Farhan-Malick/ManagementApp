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

                    <div class="row" >
                        
                         <!-- Column for creating a client -->
                         <div class="col-md-3">
                            @if(session('Clientsuccess'))
                                <div class="alert alert-success mt-3">
                                    {{ session('Clientsuccess') }}
                                </div>
                            @endif
                            <h2>Create Client</h2>
                            <form action="{{ route('clients.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    {{-- <label for="client_name">Name:</label> --}}
                                    <input type="text" class="form-control" placeholder="Enter Client Name" id="client_name" name="name" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Create Client</button>
                            </form>
                        </div>
                        <!-- Column for creating a transaction -->
                        <div class="col-md-4">
                            @if(session('Transactionsuccess'))
                                <div class="alert alert-success mt-3">
                                    {{ session('Transactionsuccess') }}
                                </div>
                            @endif
                            <h2>Create Transaction</h2>
                            <form action="{{ route('transactions.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    {{-- <label for="client_id">Client:</label> --}}
                                    <select class="form-control" id="client_id" name="client_id" required>
                                        <option value="">Select Client</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               <div class="row">
                                <div class="form-group col-md-6">
                                    {{-- <label for="transaction_amount">Amount:</label> --}}
                                    <input type="number" class="form-control" id="transaction_amount" name="amount" required>
                                </div>

                                <div class="form-group col-md-6">
                                    {{-- <label for="transaction_date">Date:</label> --}}
                                    <input type="date" class="form-control" id="transaction_date" name="date" required>
                                </div>
                               </div>
                                <!-- You may include other fields related to transactions -->
                                <button type="submit" class="btn btn-primary">Create Transaction</button>
                            </form>
                        </div>
                        
                       
                        <!-- Column for creating an expense -->
                        <!-- Column for creating an expense -->
                        <div class="col-md-5">
                            @if(session('Expensesuccess'))
                                <div class="alert alert-success mt-3">
                                    {{ session('Expensesuccess') }}
                                </div>
                            @endif
                            <h2>Create Expense</h2>
                            <form action="{{ route('expenses.store') }}" method="POST" id="expenseForm">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        {{-- <label for="client_id">Client:</label> --}}
                                        <select class="form-control" id="Expense" name="client_id" required>
                                            <option value="">Select Client</option>
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6" id="transactionField" style="display: none;">
                                        {{-- <label for="transaction_id">Transaction:</label> --}}
                                        <select class="form-control" id="transaction_id" name="transaction_id" required>
                                            <option value="">Select Transaction</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        {{-- <label for="expense_date">Date:</label> --}}
                                        <input type="date" class="form-control" id="expense_date" name="date" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{-- <label for="expense_amount">Amount:</label> --}}
                                        <input type="number" class="form-control" id="expense_amount" placeholder="Enter Amount you spend" name="amount" required>
                                    </div>
                                 
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <select name="category" class="form-control" required>
                                            <option selected disabled data-toggle="tooltip" data-placement="top" title="Select one of these">--Select Category--</option>
                                            <option value="Fixed Cost" data-toggle="tooltip" data-placement="top" title="Fixed costs are expenses that remain the same no matter how much a company produces, such as rent, property tax, insurance, and depreciation">Fixed Cost</option>
                                            <option value="Variable Cost" data-toggle="tooltip" data-placement="top" title="Variable costs are any expenses that change such as labor, utility expenses, commissions, and raw materials.">Variable Cost</option>
                                            <option value="Miscellaneous" data-toggle="tooltip" data-placement="top" title="Miscellaneous expenses are irregular and unforeseen and do not fit any budgetary allowance">Miscellaneous</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        {{-- <label for="expense_description">Description:</label> --}}
                                        <textarea class="form-control" placeholder="Enter Description" id="expense_description" name="description" required></textarea>
                                    </div>
                                   
                                </div>
                                <!-- You may include other fields related to expenses -->
                                <button type="submit" class="btn btn-primary">Create Expense</button>
                            </form>
                            
                        </div>
                        
                        <script>
                            // When client selection changes, populate transaction options
                            document.getElementById('Expense').addEventListener('change', function() {
                                var clientId = this.value;
                                var transactionField = document.getElementById('transactionField');
                                if (clientId) {
                                    transactionField.style.display = 'block'; // Show the transaction dropdown
                                    var transactionSelect = document.getElementById('transaction_id');
                                    transactionSelect.innerHTML = '<option value="">Select Transaction</option>'; // Clear previous options
                                    // Fetch transactions based on selected client and populate options
                                    // For demonstration, I'll assume you have transactions stored in the $transactions variable
                                    @if(isset($transactions))
                                        @foreach($transactions as $transaction)
                                            if ("{{ $transaction->client_id }}" === clientId) {
                                                var option = document.createElement('option');
                                                option.value = "{{ $transaction->id }}";
                                                option.innerHTML = "{{ $transaction->amount }} RS";
                                                // option.innerHTML = "{{ $transaction->id }} {{ $transaction->client->name }} (<span style='color: green;'>{{ $transaction->amount }}</span>)"; // Dynamic client name and transaction amount in green
                                                transactionSelect.appendChild(option);
                                            }
                                        @endforeach
                                    @endif
                                } else {
                                    transactionField.style.display = 'none'; // Hide the transaction dropdown if no client is selected
                                }
                            });
                        </script>
                    </div>
                    <div class="row mt-5 ">
                        <div class="col-12">
                            {{-- <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success">
                                        <h1>Total Amount: {{ $totalAmount }}</h1>    
                                    </div>
                                </div>
                            </div> --}}
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
                                    <form action="{{ route('home-accounts') }}" method="GET">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" name="search" class="form-control" placeholder="Search by client name">
                                            </div>
                                            {{-- <div class="col-4">
                                                <input type="date" name="date" class="form-control"> <!-- Single date input -->
                                            </div> --}}
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-success">Filter</button>
                                            </div>
                                        </div>
                                      
                                    </form>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Client Name</th>
                                                <th>Transaction Amount</th>
                                                <th>Expense Amount</th>
                                                <th>Expense Category</th>
                                                <th>Expense Description</th>
                                                <th>Expense Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $monthlyTotals = []; // Array to store monthly totals
                                            @endphp
                                        
                                            @foreach($clients as $client)
                                                @foreach($client->transactions as $transaction)
                                                    @php
                                                        $transactionMonth = date('F Y', strtotime($transaction->date));
                                                        if (!isset($monthlyTotals[$transactionMonth])) {
                                                            $monthlyTotals[$transactionMonth] = [
                                                                'totalTransactions' => 0,
                                                                'totalExpenses' => 0,
                                                                'totalPending' => 0,
                                                                'totalFixedCost' => 0,
                                                                'totalVariableCost' => 0,
                                                                'totalMiscellaneous' => 0
                                                            ];
                                                        }
                                                        $monthlyTotals[$transactionMonth]['totalTransactions'] += $transaction->amount;
                                                        $totalExpenseAmount = 0;
                                                        foreach($transaction->expenses as $expense) {
                                                            $totalExpenseAmount += $expense->amount;
                                                            if ($expense->category === "Fixed Cost") {
                                                                $monthlyTotals[$transactionMonth]['totalFixedCost'] += $expense->amount;
                                                            } elseif ($expense->category === "Variable Cost") {
                                                                $monthlyTotals[$transactionMonth]['totalVariableCost'] += $expense->amount;
                                                            } elseif ($expense->category === "Miscellaneous") {
                                                                $monthlyTotals[$transactionMonth]['totalMiscellaneous'] += $expense->amount;
                                                            }
                                                        }
                                                        $monthlyTotals[$transactionMonth]['totalExpenses'] += $totalExpenseAmount;
                                                        $monthlyTotals[$transactionMonth]['totalPending'] += $transaction->amount - $totalExpenseAmount;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $client->id }}</td>
                                                        <td><b style="color: black">{{ $client->name }}</b></td>
                                                        <td class="text-success"><b>{{ $transaction->amount }} RS</b></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    @foreach($transaction->expenses as $expense)
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="text-danger">{{ $expense->amount }} Rs</td>
                                                            <td>
                                                                @if( $expense->category == "Miscellaneous")
                                                                    <b class="text-danger">{{ $expense->category }}</b>
                                                                @elseif( $expense->category == "Fixed Cost")
                                                                    <b class="text-primary">{{ $expense->category }}</b>
                                                                @elseif( $expense->category == "Variable Cost")
                                                                    <b class="text-success">{{ $expense->category }}</b>
                                                                @endif
                                                            </td>
                                                            <td>{{ $expense->description }}</td>
                                                            <td>{{ date('F - d - Y', strtotime($expense->date)) }}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <b class="text-primary"> <b style="color:black">Expense =</b> {{ $totalExpenseAmount }} RS</b><hr style="margin-bottom: 5px;margin-top:8px"> 
                                                            <b><span style="color:black">Pending</span> = <b style="color: green">{{ $transaction->amount - $totalExpenseAmount }} RS</b> </b>
                                                        </td>
                                                        <td>
                                                            <b class="text-primary">Fixed Cost = <span class="text-dark"> {{ $monthlyTotals[$transactionMonth]['totalFixedCost'] }} RS</span></b><hr style="margin-bottom: 0;margin-top:-4px"> 
                                                            <b class="text-success">Variable Cost = <span class="text-dark"> {{ $monthlyTotals[$transactionMonth]['totalVariableCost'] }} RS</span></b><hr style="margin-bottom: 0;margin-top:-4px"> 
                                                            <b class="text-danger">Miscellaneous Cost = <span class="text-dark">{{ $monthlyTotals[$transactionMonth]['totalMiscellaneous'] }} RS</span></b>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        
                                            @foreach($monthlyTotals as $month => $totals)
                                                <tr>
                                                    <td colspan="4"></td>
                                                    <td colspan="4"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <b class="text-danger"> 
                                                            <h6>Total Transactions for {{ $month }}:</b> <b class="text-dark">{{ $totals['totalTransactions'] }} RS</b></h6>
                                                            <br>
                                                        {{-- <h6 class="text-success">Total Pending Amount for {{ $month }}:</b> <b class="text-dark">{{ $totals['totalPending'] }} RS</b></h6> --}}
                                                    </td>
                                                    <td colspan="4">
                                                        <h6><b class="text-primary">Total Fixed Cost: {{ $totals['totalFixedCost'] }} RS</b><br></h6>
                                                        <hr>
                                                        <h6><b class="text-success">Total Variable Cost: {{ $totals['totalVariableCost'] }} RS</b><br></h6>
                                                        <hr>
                                                        <h6><b class="text-danger">Total Miscellaneous: {{ $totals['totalMiscellaneous'] }} RS</b></h6>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        
                                    </table>
                                    {{-- <style>
                                        /* Target the left and right arrow icons in the pagination */
                                        .pagination li span::before,
                                        .pagination li span::after {
                                            font-size: 14px; /* Adjust the font size as needed */
                                        }
                                    </style>
                                    
                                    {{ $transactions->appends(request()->input())->links() }} --}}
                                    
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
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    @include('layouts.footerLinks')
    
</body>

</html>
