<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatDownloads extends Model
{
    protected $primaryKey = 'cat_ai';
    protected $table = 'cat_downloads';
     protected $fillable = ['cat_ai','category_id','user_id'];

    
     public function customers()
    {
        return $this->hasOne('App\Models\Users', 'id', 'user_id');
    }  

     public function category()
    {
        return $this->hasOne('App\Models\SubCategories', 'sub_cat_id', 'category_id');
    }    
}
