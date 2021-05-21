<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscription';
    protected $fillable = ['amount', 'credit'];
    protected $primaryKey ='subscription_id';
}
