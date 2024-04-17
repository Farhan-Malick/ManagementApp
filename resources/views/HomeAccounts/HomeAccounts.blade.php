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
                    <div class="row">
                        
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
                                    <label for="client_name">Name:</label>
                                    <input type="text" class="form-control" id="client_name" name="name" required>
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
                                    <label for="client_id">Client:</label>
                                    <select class="form-control" id="client_id" name="client_id" required>
                                        <option value="">Select Client</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="transaction_amount">Amount:</label>
                                    <input type="number" class="form-control" id="transaction_amount" name="amount" required>
                                </div>
                                <div class="form-group">
                                    <label for="transaction_date">Date:</label>
                                    <input type="date" class="form-control" id="transaction_date" name="date" required>
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
                                <div class="form-group">
                                    <label for="client_id">Client:</label>
                                    <select class="form-control" id="Expense" name="client_id" required>
                                        <option value="">Select Client</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="transactionField" style="display: none;">
                                    <label for="transaction_id">Transaction:</label>
                                    <select class="form-control" id="transaction_id" name="transaction_id" required>
                                        <option value="">Select Transaction</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="expense_amount">Amount:</label>
                                    <input type="number" class="form-control" id="expense_amount" name="amount" required>
                                </div>
                                <div class="form-group">
                                    <label for="expense_description">Description:</label>
                                    <textarea class="form-control" id="expense_description" name="description" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="expense_date">Date:</label>
                                    <input type="date" class="form-control" id="expense_date" name="date" required>
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
                            {{-- <table class="table">
                                <thead>
                                    <tr>
                                        <th>Client Name</th>
                                        <th>Transaction Amount</th>
                                        <th></th>
                                        <th>Expense Amount</th>
                                        <th>Expense Description</th>
                                        <th>Expense Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clients as $client)
                                        @foreach($client->transactions as $transaction)
                                            <tr>
                                                <td><b style="color: black">{{ $client->name }}</b></td>
                                                <td><b style="color: black">{{ $transaction->amount }} RS</b></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @foreach($transaction->expenses as $expense)
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{ $expense->amount }} Rs</td>
                                                    <td>{{ $expense->description }}</td>
                                                    <td>{{ date('F - d - Y', strtotime($expense->date)) }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>Expense Total =</td>
                                                <td>
                                                    @php
                                                        $totalExpenseAmount = 0;
                                                    @endphp
                                                    @foreach($transaction->expenses as $expense)
                                                        @php
                                                            $totalExpenseAmount += $expense->amount;
                                                        @endphp
                                                    @endforeach
                                                   <b> {{ $totalExpenseAmount }} RS</b>
                                                </td>
                                                <td>
                                                    @php
                                                        $pendingAmount = $totalExpenseAmount - $transaction->amount;
                                                    @endphp
                                                    <b>Pending = {{ $pendingAmount }} RS</b>
                                                </td>
                                            </tr>
                                            
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table> --}}


                            <table class="table">
                                <thead>
                                    <tr>
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
                                                    <td><b style="color: black">{{ $client->name }}</b></td>
                                                    <td><b style="color: black">{{ $transaction->amount }} RS</b></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                @foreach($transaction->expenses as $expense)
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ $expense->amount }} Rs</td>
                                                        <td>{{ $expense->description }}</td>
                                                        <td>{{ date('F - d - Y', strtotime($expense->date)) }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>Expense Total =</td>
                                                    <td>
                                                        @php
                                                            $totalExpenseAmount = 0;
                                                        @endphp
                                                        @foreach($transaction->expenses as $expense)
                                                            @php
                                                                $totalExpenseAmount += $expense->amount;
                                                            @endphp
                                                        @endforeach
                                                        <b class="text-danger"> {{ $totalExpenseAmount }} RS</b>
                                                    </td>
                                                    <td>
                                                        @php
                                                            $pendingAmount = $totalExpenseAmount - $transaction->amount;
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
                                            <td colspan="6"><b class="text-danger">Total Transactions for {{ $month }}:</b> {{ $total }} RS</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6"><b class="text-success  ">Total Pending Amount for April 2024:</b> {{ $totalPending }} RS</td>
                                    </tr>
                                </tbody>
                            </table>
                            

                            
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
