<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_name',
        'platform',
        'budget',
        'advance_payment',
        'assign_to',
        'dev_amount',
        'advance_payment_to_dev',
        'rem_pay_to_dev',
        'start_date',
        'end_date',
        'deadline',
        'description',
        'status'
    ];
}
