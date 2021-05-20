<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bills extends Model
{

    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'bill';
    protected $fillable = ['name','mobile','area','state','house_no','landmark','address_type','city','pincode',
                           'status','coupon_code','discount','sub_total',
                           'total_amount','notes','bill_date','email_sent',
                           'notofication_sent'];

    public function get_order_number()
    {
        return '#' . str_pad($this->id, 8, "0", STR_PAD_LEFT);
    }

    public function users()
    {
        return $this->hasOne('App\Models\Users', 'id', 'name');
    }

    public function billproduct()
    {
        return $this->hasMany('App\Models\BillProduct','bill_id','id');
    }  

    public function products()
    {
        return $this->hasOne('App\Models\Products', 'product_id', 'product_name');
    }  

    public function categories()
    {
        return $this->hasOne('App\Models\ProductsCategories', 'id', 'product_cat_id');
    }


}
