<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'blog';
    protected $fillable = ['name','photo','description','tags','created_at','updated_at','deleted_at'];
}
