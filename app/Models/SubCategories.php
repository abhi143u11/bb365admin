<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategories extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'sub_cat_id';
    protected $table = 'sub_categories';
    protected $fillable = ['sub_cat_name','img','active'];
                           
  

}

