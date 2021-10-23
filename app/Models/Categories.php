<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Categories extends Model
{
  use SoftDeletes;
  protected $primaryKey = 'id';
  protected $table = 'categories';
  protected $fillable = ['cat_name', 'order_no', 'img', 'active'];

  public function subcategories()
  {
    //old working
    //return $this->hasMany('App\Models\SubCategories','cat_id','id')->with('images')->has('images')->where('active',1)->where('festival_date',NULL)->orderBy('festival_date','asc');
    return $this->hasMany('App\Models\SubCategories', 'cat_id', 'id')->with('images')->has('images')->where('active', 1)->where('cat_id', '!=', 48)->orderBy('festival_date', 'asc');

    return $this->hasMany('App\Models\SubCategories', 'cat_id', 'id')->with('images')->has('images')->where('active', 1)->where('festival_date', NULL)->orderBy('festival_date', 'asc');
  }


  public function subcategories2()
  {

    return $this->hasMany('App\Models\SubCategories', 'cat_id', 'id')->with('images')->has('images')->where('active', 1)->whereDate('festival_date', '>=', Carbon::today())->orderBy('festival_date', 'asc');
  }
}
