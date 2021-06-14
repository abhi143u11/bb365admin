<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'users';
    protected $fillable = [
        'name', 'phone', 'email', 'password','usertype','device_token','device_type','password','remember_token'
    ];

    public function address(){
        
        return $this->hasMany('App\Models\CustomerAddress','customer_id','id');
    }

    public function category(){
        
        return $this->hasOne('App\Models\Categories','id','category_id');
    }

    public function subscription(){
        
        return $this->hasOne('App\Models\Subscription','subscription_id','package_type');
    }
   
      
}
