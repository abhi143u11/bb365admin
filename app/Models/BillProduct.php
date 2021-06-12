<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillProduct extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'bill_products';
    protected $fillable = ['bill_id','product_cat_id','product_id',
                           'product_name','image','mrp','sub_total',
                            'size','discount','vendor_id','quantity'];


    public function products()
    {
        return $this->hasOne('App\Models\Products', 'product_id', 'product_name');
    }  

    public function categories()
    {
        return $this->hasOne('App\Models\ProductsCategories', 'id', 'product_cat_id');
    }
    
}