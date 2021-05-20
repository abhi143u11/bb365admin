<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'video';
    protected $fillable = ['title','image','link','product_id'];

    public function products()
    { 
       return $this->hasOne('App\Models\Products','product_id','product_id');
   }
}
