<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'transaction_id ';
    protected $table = 'transaction';
    protected $fillable = [
        'name', 'mobile_number', 'payment_id', 'user_id','bill_id','user_type', 
        'transaction_type', 'transaction_signature',
        'status', 'payment_method', 'amount', 'remarks',
    ];
}
