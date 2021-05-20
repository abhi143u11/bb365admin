<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Images extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'image_id';
    protected $table = 'images';
    protected $fillable = ['cat_id','image','featured'
     ,'created_at','updated_at','deleted_at'];

    public function categories()
    {
        return $this->hasOne('App\Models\Categories', 'id', 'cat_id');
    }

     public function subcategories()
    {
        return $this->hasOne('App\Models\SubCategories', 'sub_cat_id', 'sub_cat_id');
    }


    
}
