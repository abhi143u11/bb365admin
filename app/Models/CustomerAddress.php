<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerAddress extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'customer_address_id';
    protected $table = 'customers_address';
    protected $fillable = ['customer_id','full_name','mobile_no','pincode','house_no','area','landmark','city','state','address_type'];

}
