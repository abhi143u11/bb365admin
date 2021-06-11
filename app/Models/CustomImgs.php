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
}
