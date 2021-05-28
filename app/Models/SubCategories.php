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
     public function categories()
    {
        return $this->hasOne('App\Models\Categories', 'id', 'cat_id');
    }    
    
      public function images()
    {
        return $this->hasMany('App\Models\Images', 'sub_cat_id', 'sub_cat_id')->take(4);
    } 

       public function imagelist()
    {
        return $this->hasOne('App\Models\Images', 'sub_cat_id', 'sub_cat_id');
    } 
  
  
}