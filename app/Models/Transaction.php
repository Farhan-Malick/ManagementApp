<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'amount', 'date'];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
