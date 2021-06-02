<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatDownloads extends Model
{
    protected $primaryKey = 'cat_ai';
    protected $table = 'cat_downloads';
     protected $fillable = ['category_id','user_id'];
}
