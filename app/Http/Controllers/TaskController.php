<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
       return view("PortalPages.taskUpload");
    }
    public function saveTask(Request $request)
    {
        $request->validate([
            'budget' => 'nullable|numeric',
            'advance_payment' => 'nullable|numeric',
            'dev_amount' => 'nullable|numeric',
            'advance_payment_to_dev' => 'nullable|numeric',
        ]);
        $task = Task::create([
            'task_name' => $request->input('task_name'),
            'platform' => $request->input('platform'),
            'budget' => $request->input('budget'),
            'advance_payment' => $request->input('advance_payment'),
            'assign_to' => $request->input('assign_to'),
            'dev_amount' => $request->input('dev_amount'),
            'advance_payment_to_dev' => $request->input('advance_payment_to_dev'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'deadline' => $request->input('deadline'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        // You can add any additional logic here, such as redirecting to a success page

        return redirect()->back()->with('success', 'Task created successfully');
    }
    // public function taskDetail()
    // {
    //     $tasks = Task::all();
    //       // Initialize totals
    //     $totalBudget = 0;
    //     $totalAdvancePayment = 0;
    //     $totalDevAmount = 0;
    //     $totalAdvancePaymentToDev = 0;
    //     $totalDevPending = 0;

    //     foreach ($tasks as $task) {
    //         $totalBudget += $task->budget;
    //         $totalAdvancePayment += $task->advance_payment;
    //         $totalDevAmount += $task->dev_amount;
    //         $totalAdvancePaymentToDev += $task->advance_payment_to_dev;
    //         // Calculate DevPending and add to the total
    //         $devPending = $task->dev_amount - $task->advance_payment_to_dev;
    //           // Calculate Employer Pending and add to the total
    //           $employerPending = $totalBudget - $totalAdvancePayment;
    //         $totalDevPending += max(0, $devPending); // Ensure that negative values are not added
    //          // Calculate Employer Profit and add to the total
    //          $employerProfit = $employerPending - $totalDevPending;
    //     }
    //     return view("PortalPages.index", compact('tasks', 'employerProfit','employerPending','totalBudget', 'totalAdvancePayment', 'totalDevAmount', 'totalAdvancePaymentToDev', 'totalDevPending'));
    // }

    public function taskDetail()
{
    $tasks = Task::all();
    // Initialize totals
    $totalBudget = 0;
    $totalAdvancePayment = 0;
    $totalDevAmount = 0;
    $totalAdvancePaymentToDev = 0;
    $totalDevPending = 0;

    // Counter to skip first 7 records
    $skipCount = 0;

    foreach ($tasks as $task) {
        if ($skipCount < 7) {
            $skipCount++;
            continue; // Skip processing this task
        }

        $totalBudget += $task->budget;
        $totalAdvancePayment += $task->advance_payment;
        $totalDevAmount += $task->dev_amount;
        $totalAdvancePaymentToDev += $task->advance_payment_to_dev;
        
        // Calculate DevPending and add to the total
        $devPending = $task->dev_amount - $task->advance_payment_to_dev;
        $totalDevPending += max(0, $devPending); // Ensure that negative values are not added
        
        // Calculate Employer Pending and add to the total
        $employerPending = $totalBudget - $totalAdvancePayment;
        $employerProfit = $employerPending - $totalDevPending;
    }

    return view("PortalPages.index", compact('tasks', 'employerProfit', 'employerPending', 'totalBudget', 'totalAdvancePayment', 'totalDevAmount', 'totalAdvancePaymentToDev', 'totalDevPending'));
}

    public function edit(Task $task)
    {
        return view('PortalPages.editTask', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
       
        $request->validate([
            'budget' => 'nullable|numeric',
            'advance_payment' => 'nullable|numeric',
            'dev_amount' => 'nullable|numeric',
            'advance_payment_to_dev' => 'nullable|numeric',
        ]);
        $task->update($request->all());
        return redirect()->route('taskDetail')->with('success', 'Task updated successfully');
    }


}
