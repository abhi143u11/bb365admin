<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frames extends Model
{

    protected $table = 'frames';
    protected $primaryKey = 'id';
    protected $hidden = ['created_at', 'updated_at'];

    public function customer()
    {
        return $this->hasOne('App\Models\Users', 'phone', 'customer_phone');
    }
}
