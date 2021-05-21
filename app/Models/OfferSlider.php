<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferSlider extends Model
{
    protected $table = 'offers_slider';
    protected $fillable = [
        'image','category_id'
    ];

    public function subcategories()
    {
        return $this->hasOne('App\Models\SubCategories', 'sub_cat_id', 'category_id');
    }

}
