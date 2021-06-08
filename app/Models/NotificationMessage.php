<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationMessage extends Model
{
    protected $table = 'notification_message';
    protected $fillable = ['t_title ','t_message','image','sub_cat_id'];
}