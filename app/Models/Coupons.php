<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupons extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'coupons';
    protected $fillable = ['coupon_code','max_discount','customer_id',
                           'coupon_type','minimum_price','coupon_status'];

    public function products()
    {
        return $this->hasOne('App\Models\Products', 'product_id', 'coupon_products');
    }                       

    public function categories()
    {
        return $this->hasOne('App\Models\ProductsCategories', 'id', 'coupon_categories');
    }
    

}
