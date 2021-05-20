<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $fillable = ['cat_name','order_no','img','active'];
                           
    public function subcategories() {

    return $this->hasMany('App\Models\SubCategories','cat_id','id');

      }

}

