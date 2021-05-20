<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferSlider extends Model
{
    protected $table = 'offers_slider';
    protected $fillable = [
        'image','category_id'
    ];

    public function categories()
    {
        return $this->hasOne('App\Models\ProductsCategories', 'id', 'category_id');
    }

}
