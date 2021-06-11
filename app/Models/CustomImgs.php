<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomImgs extends Model
{
     use SoftDeletes;
        protected $primaryKey = 'image_id';
    protected $table = 'custom_images';
    protected $fillable = ['image','psd'];

      public function categories()
    {
        return $this->hasOne('App\Models\Categories', 'id', 'category');
    }

        public function subcategories()
    {
        return $this->hasOne('App\Models\SubCategories', 'sub_cat_id', 'category');
    }
}
